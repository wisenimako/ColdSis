<?php

namespace App\Filament\Auth;

use Afsakar\FilamentOtpLogin\Filament\Pages\Login as OtpLogin;
use Afsakar\FilamentOtpLogin\Models\OtpCode;
use App\Models\User;
use App\Notifications\VerifyLogin;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;

class Login extends OtpLogin
{


    public string $contact = '';

    public function form(Form $form): Form
    {
        return $form;
    }


    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getLoginFormComponent(),
                        $this->getPasswordFormComponent()
                            ->label("Voucher Token / Password"),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
            'otpForm' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getOtpCodeFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getLoginFormComponent(): Component
    {
        return TextInput::make('login')
            ->label('Index Number')
            ->required()
            ->hint('eg. 100000000025')
            ->helperText("Enter your 10-digits BECE index number followed by the last 2 digits of the year of examination. For example, 100000000025 for the year 2025.")
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        $login_type = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'candidate_index';

        return [
            $login_type => $data['login'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.login' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }

    public function verifyCode(): void
    {
        $login_type = $this->data["login"];
        if (filter_var($login_type, FILTER_VALIDATE_EMAIL)) {
            $this->contact = $this->data['email'];
        } else {
            $phone_number = User::where('candidate_index', $this->data['login'])->first()->phone_number;
            $this->contact = $phone_number;
        }

        $code = OtpCode::whereCode($this->data['otp'])
            ->whereContact($this->contact)
            ->first();


        if (!$code) {
            throw ValidationException::withMessages([
                'data.otp' => __('filament-otp-login::translations.validation.invalid_code'),
            ]);
        } elseif (!$code->isValid()) {
            throw ValidationException::withMessages([
                'data.otp' => __('filament-otp-login::translations.validation.expired_code'),
            ]);
        } else {
            $this->dispatch('codeVerified');

            $code->delete();
        }
    }

    protected function sendOtpToUser(string $otpCode): void
    {
        $this->notify(new VerifyLogin($otpCode));

        Notification::make()
            ->title(__('filament-otp-login::translations.notifications.title'))
            ->body(__('filament-otp-login::translations.notifications.body', ['seconds' => config('filament-otp-login.otp_code.expires')]))
            ->success()
            ->send();
    }


    public function generateCode(): void
    {
        $login_type = $this->data["login"];
        if (filter_var($login_type, FILTER_VALIDATE_EMAIL)) {
            $this->contact = $this->data['email'];
        } else {
            $phone_number = User::where('candidate_index', $this->data['login'])->first()->phone_number;
            $this->contact = $phone_number;
        }

        do {
            $length = config('filament-otp-login.otp_code.length');

            $code = str_pad(rand(0, 10 ** $length - 1), $length, '0', STR_PAD_LEFT);
        } while (OtpCode::whereCode($code)->whereContact($this->contact)->exists());

        $this->otpCode = $code;

        $data = $this->form->getState();

        OtpCode::updateOrCreate([
            'contact' => $this->contact,
        ], [
            'code' => $this->otpCode,
            'expires_at' => now()->addSeconds(config('filament-otp-login.otp_code.expires')),
        ]);

        $this->dispatch('countDownStarted');
    }

}

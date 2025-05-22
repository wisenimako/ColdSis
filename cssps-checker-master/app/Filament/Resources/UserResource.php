<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use BezhanSalleh\FilamentShield\Resources\RoleResource;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Rawilk\FilamentPasswordInput\Password;
use Rmsramos\Activitylog\Actions\ActivityLogTimelineTableAction;
use Rmsramos\Activitylog\RelationManagers\ActivitylogRelationManager;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?string $label = 'User Account';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Information')
                    ->description('Users access basic information')
                    ->columns(2)
                    ->schema([

                        Forms\Components\TextInput::make('name')
                            ->label("Full Name")
                            ->columnSpanFull()
                            ->placeholder('Enter Full Name')
                            ->required(),

                        TextInput::make('candidate_index')
                            ->label("Index Number"),

                        Forms\Components\TextInput::make('email')
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->label('Email'),

                        PhoneInput::make("phone_number")
                            ->label("Phone Number")
                            ->placeholder("Enter Phone Number")
                            ->required(),

                        Password::make("password")
                            ->prefixIcon("heroicon-o-lock-closed")
                            ->label("Password")
                            ->helperText("Enter the password that will be used to log in. Changing this will update the user's password.")
                            ->password()
                            ->revealable()
                            ->copyable(color: 'warning')
                            ->regeneratePassword(color: 'info')
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->dehydrated(fn($state) => filled($state))
                            ->required(
                                fn(string $context): bool => $context === "create"
                            ),
//                        ToggleButtons::make('force_renew_password')
//                            ->label('Change Password on Next Login')
//                            ->inline()
//                            ->boolean()
//                            ->default(1)
//                            ->required(),
                    ]),

                Forms\Components\Section::make('Roles')
                    ->aside()
                    ->description('Users access roles and permissions assigned to them to determine what they can do')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('roles')
                            ->label('Assigned Roles & Permissions')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionModalHeading('Add New Role')
                            ->createOptionForm(fn(
                                $form
                            ) => RoleResource::form($form))
                            ->helperText('System Default roles are automatically assigned to each user type. Include panel_user to allow user to access their management panel and vice versa'),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('candidate_index')
                    ->label("Index Number")
                    ->placeholder("N/A")
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Phone Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPassword = 'password';

        $userTypes = [
            'super_admin' => 'dev@coldsis.com',
            'students' => 'student@example.com',
        ];

        // Ensure roles exist
        $panelRole = Role::firstOrCreate(['name' => 'panel_user', 'guard_name' => 'web']);
        $students = Role::firstOrCreate(['name' => 'students', 'guard_name' => 'web']);

        foreach ($userTypes as $role => $email) {
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'password' => Hash::make($defaultPassword),
                    'name' => Str::headline($role),
                    'phone_number' => fake()->phoneNumber(),
                    'candidate_index' => fake()->unique()->numberBetween(1000000000, 9999999999),
                ]
            );

            $mainRole = Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);

            $user->syncRoles([$mainRole, $panelRole]); // Assign both roles, removing others
        }
    }
}

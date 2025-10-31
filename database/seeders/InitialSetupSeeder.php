<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitialSetupSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage services',
            'manage portfolios',
            'manage team',
            'manage testimonials',
            'manage blog',
            'manage pages',
            'manage seo',
            'manage users',
            'manage messages',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $roles = [
            'super-admin' => $permissions,
            'content-manager' => [
                'manage services',
                'manage portfolios',
                'manage team',
                'manage testimonials',
                'manage blog',
                'manage pages',
                'manage messages',
            ],
            'seo-specialist' => [
                'manage seo',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($rolePermissions);
        }

        if (! User::where('email', 'admin@devgenfour.com')->exists()) {
            $admin = User::create([
                'name' => 'Administrator',
                'email' => 'admin@devgenfour.com',
                'password' => Hash::make('Password!123'),
            ]);

            $admin->assignRole('super-admin');
        }
    }
}

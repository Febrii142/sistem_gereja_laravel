<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin'], ['guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'Admin'], ['guard_name' => 'web']);
        $sekretaris = Role::firstOrCreate(['name' => 'Sekretaris'], ['guard_name' => 'web']);
        $bendahara = Role::firstOrCreate(['name' => 'Bendahara'], ['guard_name' => 'web']);
        $jemaat = Role::firstOrCreate(['name' => 'Jemaat'], ['guard_name' => 'web']);

        // Create permissions
        $permissions = [
            'view dashboard',
            'manage users',
            'manage jemaat',
            'manage persembahan',
            'manage jadwal-ibadah',
            'manage komsel',
            'manage pelayanan',
            'view reports',
            'manage settings',
            'view activity-log',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission], ['guard_name' => 'web']);
        }

        // Assign permissions to roles
        $superAdmin->givePermissionTo(Permission::all());
        
        $admin->givePermissionTo([
            'view dashboard',
            'manage jemaat',
            'manage persembahan',
            'manage jadwal-ibadah',
            'manage komsel',
            'manage pelayanan',
            'view reports',
            'view activity-log',
        ]);

        $sekretaris->givePermissionTo([
            'view dashboard',
            'manage jemaat',
            'manage jadwal-ibadah',
            'manage komsel',
            'manage pelayanan',
            'view reports',
        ]);

        $bendahara->givePermissionTo([
            'view dashboard',
            'manage persembahan',
            'view reports',
        ]);

        $jemaat->givePermissionTo([
            'view dashboard',
        ]);

        // Create default users
        $user1 = User::firstOrCreate(
            ['email' => 'admin@gereja.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $user1->assignRole('Super Admin');

        $user2 = User::firstOrCreate(
            ['email' => 'admin2@gereja.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
        $user2->assignRole('Admin');

        $user3 = User::firstOrCreate(
            ['email' => 'sekretaris@gereja.com'],
            [
                'name' => 'Sekretaris',
                'password' => Hash::make('password'),
            ]
        );
        $user3->assignRole('Sekretaris');

        $user4 = User::firstOrCreate(
            ['email' => 'bendahara@gereja.com'],
            [
                'name' => 'Bendahara',
                'password' => Hash::make('password'),
            ]
        );
        $user4->assignRole('Bendahara');

        $user5 = User::firstOrCreate(
            ['email' => 'jemaat@gereja.com'],
            [
                'name' => 'Jemaat User',
                'password' => Hash::make('password'),
            ]
        );
        $user5->assignRole('Jemaat');
    }
}

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
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $sekretaris = Role::create(['name' => 'Sekretaris']);
        $bendahara = Role::create(['name' => 'Bendahara']);
        $jemaat = Role::create(['name' => 'Jemaat']);

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
            Permission::create(['name' => $permission]);
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
        $user1 = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gereja.com',
            'password' => Hash::make('password'),
        ]);
        $user1->assignRole('Super Admin');

        $user2 = User::create([
            'name' => 'Admin User',
            'email' => 'admin2@gereja.com',
            'password' => Hash::make('password'),
        ]);
        $user2->assignRole('Admin');

        $user3 = User::create([
            'name' => 'Sekretaris',
            'email' => 'sekretaris@gereja.com',
            'password' => Hash::make('password'),
        ]);
        $user3->assignRole('Sekretaris');

        $user4 = User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gereja.com',
            'password' => Hash::make('password'),
        ]);
        $user4->assignRole('Bendahara');

        $user5 = User::create([
            'name' => 'Jemaat User',
            'email' => 'jemaat@gereja.com',
            'password' => Hash::make('password'),
        ]);
        $user5->assignRole('Jemaat');
    }
}

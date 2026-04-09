<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that roles are seeded correctly.
     */
    public function test_roles_are_seeded(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);

        $expectedRoles = ['Super Admin', 'Admin', 'Sekretaris', 'Bendahara', 'Jemaat'];

        $this->assertEquals(count($expectedRoles), Role::count());

        foreach ($expectedRoles as $roleName) {
            $this->assertNotNull(
                Role::where('name', $roleName)->first(),
                "Role {$roleName} was not created"
            );
        }
    }

    /**
     * Test that permissions are seeded correctly.
     */
    public function test_permissions_are_seeded(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);

        $expectedPermissions = [
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

        $this->assertEquals(count($expectedPermissions), Permission::count());

        foreach ($expectedPermissions as $permissionName) {
            $this->assertNotNull(
                Permission::where('name', $permissionName)->first(),
                "Permission {$permissionName} was not created"
            );
        }
    }

    /**
     * Test that default users are seeded correctly.
     */
    public function test_default_users_are_seeded(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);

        $this->assertEquals(5, User::count());

        $adminUser = User::where('email', 'admin@gereja.com')->first();
        $this->assertNotNull($adminUser);
        $this->assertTrue($adminUser->hasRole('Super Admin'));
    }

    /**
     * Test that seeder is idempotent (can run multiple times).
     */
    public function test_seeder_is_idempotent(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $firstCount = [
            'roles' => Role::count(),
            'permissions' => Permission::count(),
            'users' => User::count(),
        ];

        // Run seeder again
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $secondCount = [
            'roles' => Role::count(),
            'permissions' => Permission::count(),
            'users' => User::count(),
        ];

        $this->assertEquals($firstCount, $secondCount, 'Seeder created duplicates');
    }
}

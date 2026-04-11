<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   
    public function run(): void
    {
         // Create Admin Role if not exists
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to admin role
        $role->syncPermissions($permissions);

        // Create Admin User
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'superadmin',
                'password' => Hash::make('password123'),
            ]
        );

        // Assign role to user
        $user->assignRole($role);
        
        $this->call([
            PermissionSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}

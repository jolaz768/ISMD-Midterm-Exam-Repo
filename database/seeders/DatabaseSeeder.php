<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Role::firstOrCreate(['name' => 'admin']);

        // Create admin user
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        // Assign role
        $user->assignRole('admin');

        Role::firstOrCreate(['name' => 'owner']);
        Role::firstOrCreate(['name' => 'employee']);

        // Create owner user
        $user = User::factory()->create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        // Assign role
        $user->assignRole('owner');

        Role::firstOrCreate(['name' => 'employee']);

        $user = User::factory()->create([
            'name' => 'employee',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        // Assign role
        $user->assignRole('employee');

        

        $this->call([
            PermissionSeeder::class,
        ]);
    }
}

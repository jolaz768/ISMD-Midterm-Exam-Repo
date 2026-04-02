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

        // Create owner user
        $user = User::factory()->create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        // Assign role
        $user->assignRole('owner');

        Role::firstOrCreate(['name' => 'staff']);

        $user = User::factory()->create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        // Assign role
        $user->assignRole('staff');

        

        $this->call([
            PermissionSeeder::class,
        ]);
    }
}

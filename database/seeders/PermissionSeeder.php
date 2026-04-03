<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    protected array $defaultPermissions = [
        'can view users',
        'can create users',
        'can edit users',
        'can delete users',
        'can view roles',
        'can create roles',
        'can edit roles',
        'can delete roles',
        'can view permissions',
        'can create permissions',
        'can edit permissions',
        'can delete permissions',

    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->defaultPermissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }
    }
}

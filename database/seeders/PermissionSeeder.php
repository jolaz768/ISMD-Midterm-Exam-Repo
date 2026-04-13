<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    protected array $defaultPermissions = [
        'view users',
        'create users',
        'update users',
        'delete users',

        'view roles',
        'create roles',
        'update roles',
        'delete roles',
        
        'view permissions',
        'create permissions',
        'update permissions',
        'delete permissions',

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

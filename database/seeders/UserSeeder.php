<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $viewPermissionPosts = Permission::create(['name' => 'View posts']);
        $createPermissionPosts = Permission::create(['name' => 'Create posts']);
        $updatePermissionPosts = Permission::create(['name' => 'Update posts']);
        $deletePermissionPosts = Permission::create(['name' => 'Delete posts']);

        $adminRole = Role::Create(['name' => 'Admin']);

        $admin = User::create([
            'name' => 'Albert',
            'email' => 'albert@gmail.com',
            'password' => bcrypt('albert123')
        ]);
        $admin->assignRole($adminRole);

        $writerRole = Role::Create(['name' => 'Writer']);

        $writer = User::create([
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('juan123')
        ]);
        $writer->assignRole($writerRole);
    }
}

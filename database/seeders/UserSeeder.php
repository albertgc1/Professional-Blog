<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

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

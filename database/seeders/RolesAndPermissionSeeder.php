<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'toggle']);
        Permission::create(['name' => 'send']);

        $admin->givePermissionTo(Permission::all());
        $user->givePermissionTo(['view']);

        $users = User::all();

        foreach($users as $user) {
            $user->assignRole('user');
        }

        $admin1 = User::create([
            'name' => 'Administrator',
            'email' => 'lovely@gmail.com',
            'password' => bcrypt('lovelyadmin123'),
        ]);

        $user1 = User::create([
            'name' => 'Customer',
            'email' => 'henlu@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $admin1->assignRole('admin');
        $user1->assignRole('user');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'super_admin'], ['title' => 'Super Admin']);

        User::firstOrCreate(['email' => 'superadmin@gmail.com'], [
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
        ])->assignRole('super_admin');

        Role::firstOrCreate(['name' => 'admin'], ['title' => 'Admin']);

        User::firstOrCreate(['email' => 'admin@gmail.com'], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        Role::firstOrCreate(['name' => 'user'], ['title' => 'User']);

        User::firstOrCreate(['email' => 'user@gmail.com'], [
            'name' => 'User',
            'password' => bcrypt('password'),
        ])->assignRole('user');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'user']);

        User::create([
            "name" => "admin admin",
            "email" => "admin@snapnet.test",
            "password" => Hash::make("admin1234")
        ])->assignRole('admin');
    }
}

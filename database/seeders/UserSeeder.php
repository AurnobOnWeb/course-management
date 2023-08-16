<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $superadmin =User::create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
        ]);

        $superadmin->assignRole('super-admin');  

        $admin =User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
        ]);
        $admin->assignRole('admin');  
    }
}

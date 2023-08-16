<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {  
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
       $permission = [
        
            ['name' => 'view dashboard'],
            // dashboard finished
            ['name' => 'view course'],
            ['name' => 'create course'],
            ['name' => 'edit course'],
            ['name' => 'delete course'],
            //course finished 
            ['name' => 'view batch'],
            ['name' => 'create batch'],
            ['name' => 'edit batch'],
            ['name' => 'delete batch'],
            // batch finsih
            ['name' => 'view teacher'],
            ['name' => 'create teacher'],
            ['name' => 'edit teacher'],
            ['name' => 'delete teacher'],
            //teacher finished
            ['name' => 'view student'],
            ['name' => 'create student'],
            ['name' => 'edit student'],
            ['name' => 'delete student'],
            ['name' => 'autoenroll'],
            // Student
            ['name' => 'view enroll'],
            ['name' => 'enroll'],
            //enroll
            ['name' => 'view all payment'],
            ['name' => 'view due payment'],
            ['name' => 'view full payment'],
            ['name' => 'edit payment'],
            ['name' => 'delete payment'],
            //payment
            ['name' => 'completed batch'],
            ['name' => 'course report'],
            ['name' => 'batch report'],
            //Report
            ['name' => 'website setting add'],
            ['name' => 'website setting view'],
            ['name' => 'website setting delete'],
            //Report
            ['name' => 'manage role'],
            ['name' => 'add role'],
            ['name' => 'edit role'],
            ['name' => 'delete role'],
            //role
            ['name' => 'teacher role'],
            ['name' => 'add teacher role'],
            ['name' => 'view teacher role'],
            ['name' => 'delete teacher role'],
            //massage role
            ['name' => 'message'],
            //visitor role
            ['name' => 'visitor'],
            ['name' => 'teacher salary'],


    ];
    foreach($permission as $item){
        Permission::create($item);
    } 
    $role = Role::create(['name' => 'super-admin']);
    $roles = Role::create(['name' => 'admin']);
    $role->givePermissionTo(Permission::all());
    $roles->givePermissionTo(Permission::all());

    }
}

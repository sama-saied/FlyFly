<?php

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker::create();

        Admin::create([
            'name'      =>  'Sama',    //$faker->name
            'email'     =>  'sama@admin.com',
            'password'  =>  bcrypt('samapassword'),
            'role'      =>  'super Admin',
        ]);

        Admin::create([
            'name'      =>  'Nada',    //$faker->name
            'email'     =>  'nada@admin.com',
            'password'  =>  bcrypt('nadapassword'),
            'role'      =>  'super Admin',
        ]);

        Admin::create([
            'name'      =>  'Jasmin',    //$faker->name
            'email'     =>  'jasmin@admin.com',
            'password'  =>  bcrypt('adminpassword'),
            'role'      =>  'Sub Admin',
        ]);
    }
}
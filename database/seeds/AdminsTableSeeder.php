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
            'name'      =>  'sama',    //$faker->name
            'email'     =>  'sama@admin.com',
            'password'  =>  bcrypt('password'),
        ]);

        Admin::create([
            'name'      =>  'nada',    //$faker->name
            'email'     =>  'nada@admin.com',
            'password'  =>  bcrypt('password'),
        ]);
    }
}

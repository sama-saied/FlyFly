<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>  'Mobie-Electronics',
         
            'menu'          =>  1,
        ]);

        factory('App\Models\Category', 5)->create();
    }

}
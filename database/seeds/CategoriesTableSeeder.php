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
            'name'          =>  'Electronics',
          
            'parent_id'     =>  null,
           
        ]);

        factory('App\Models\Category', 2)->create();
    }
}
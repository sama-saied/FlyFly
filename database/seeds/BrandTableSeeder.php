<?php
use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name'          =>  'Nokia',
           
        ]);
        Brand::create([
            'name'          =>  'Samsung',
           
        ]);
    }
}

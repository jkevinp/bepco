<?php

use Illuminate\Database\Seeder;
use bepc\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
		//diamord rooms
		for($x = 0; $x < 50; $x++)
			$products  = Product::create(array('name' => 'Diamond '.$x ,'price' => rand(100,500)));
	
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('StockTableSeeder');
    }
}

class StockTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('stock')->insert([
        	array('Name'=>'The Victoria', 'Price'=>374662, 'Bedrooms'=>4, 'Bathrooms'=>2, 'Storeys'=>2, 'Garages'=>2),
        	array('Name'=>'The Xavier', 'Price'=>513268, 'Bedrooms'=>4, 'Bathrooms'=>2, 'Storeys'=>1, 'Garages'=>2),
        	array('Name'=>'The Como', 'Price'=>454990, 'Bedrooms'=>4, 'Bathrooms'=>3, 'Storeys'=>2, 'Garages'=>3),
        	array('Name'=>'The Aspen', 'Price'=>384356, 'Bedrooms'=>4, 'Bathrooms'=>2, 'Storeys'=>2, 'Garages'=>2),
        	array('Name'=>'The Lucretia', 'Price'=>572002, 'Bedrooms'=>4, 'Bathrooms'=>3, 'Storeys'=>2, 'Garages'=>2),
        	array('Name'=>'The Toorak', 'Price'=>521951, 'Bedrooms'=>5, 'Bathrooms'=>2, 'Storeys'=>1, 'Garages'=>2),
        	array('Name'=>'The Skyscape', 'Price'=>263604, 'Bedrooms'=>3, 'Bathrooms'=>2, 'Storeys'=>2, 'Garages'=>2),
        	array('Name'=>'The Clifton', 'Price'=>386103, 'Bedrooms'=>3, 'Bathrooms'=>2, 'Storeys'=>1, 'Garages'=>1),
        	array('Name'=>'The Geneva', 'Price'=>390600, 'Bedrooms'=>4, 'Bathrooms'=>3, 'Storeys'=>2, 'Garages'=>2)
        ]);
    }
}
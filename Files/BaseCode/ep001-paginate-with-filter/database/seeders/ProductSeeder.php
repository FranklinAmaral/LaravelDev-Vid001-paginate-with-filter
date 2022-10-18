<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i=0; $i < 1000; $i++) { 
            
            DB::table('products')->insert([
                'name' => $faker->name(),
                'value' => rand(10,1000),
                'quantity' => rand(2000, 10000),
                'status' => rand(0,1),
            ]);
        }
    }
}

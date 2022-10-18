<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class ClientSeeder extends Seeder
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
            DB::table('clients')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'address' => $faker->address(),
                'status' => rand(0,1),
            ]);
        }

    }
}

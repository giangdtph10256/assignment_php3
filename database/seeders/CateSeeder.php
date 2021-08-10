<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Fakeractory;
use Illuminate\Support\Facades\DB;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Fakeractory::create();

        for($i = 0; $i < 20; $i++){
            $data = [
                'name' => $faker->name,
            ];

            DB::table('categories')->insert($data);
        }
    }
}

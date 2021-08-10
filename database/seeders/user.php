<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Fakeractory;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
            'name'=> 'dogiang2',
            'email' => 'dogiang22@gmail.com',
            'password' => bcrypt('12345678'),
            'address' => 'Vĩnh Phúc',
            'gender' => '1',
            'role' => '2',
       ];
       DB::table('users')->insert($data);
    }
}

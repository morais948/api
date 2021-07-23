<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = [
            [
                'name' => 'balbina',
                'email' => 'oficialdeckk@gmail.com',
                'password' => bcrypt('123456'),
            ],
        ];

        DB::table('users')->insert($attr);
    }
}

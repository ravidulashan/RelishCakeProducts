<?php

use Illuminate\Database\Seeder;

class LoginTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('login')->insert([
            'username' => 'ravidu',
            'password' => bcrypt('1234'),
            'confirmed'=>1,
            'confirmation_code'=>'1990-09-15',
            'user_id'=>1,

        ]);
    }
}

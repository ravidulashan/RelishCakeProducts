<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Ravidu',
            'last_name' => 'Lashan',
            'email'=> 'ravidu@gmail.com',
            'password'=>bcrypt('test'),
            'confirmed'=>1,
            'confirmation_code'=>str_random(15),
            'gender'=>1,
            'birthday'=>'1990-09-15',
            'tel_no'=>'0713925453',
            'user_type'=> 1,
            'delivery_address'=>'19/3,Walpola,Angoda',
            'billing_address'=>'19/3,Walpola,Angoda',
            'reg_date'=>'2016-05-10',
        ]);


    }
}

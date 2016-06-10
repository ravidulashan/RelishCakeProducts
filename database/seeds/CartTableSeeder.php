<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart')->insert([
            'sub_total' =>1000 ,
            'req_date'=>Carbon::now()->format('Y-m-d'),
            'ord_date'=>Carbon::now()->format('Y-m-d'),
            'sms_state'=>2,
            'user_id'=>1,
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s') ,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
    }
}

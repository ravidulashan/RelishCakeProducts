<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CakeDescTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array("Piece","1 kg", "600 g", "2 kg", "2 kg g", "800 g", "1 kg", "2.5 kg", "2 kg");
        $price_array = array(500, 1000, 800, 2000, 1400,500, 2000,750);
        $served_amount=array("1","10","5","20");
        for ($i = 0; $i < 4; ++$i) {

            DB::table('cake_desc')->insert([
                'quantity' => $array[$i],
                'served_amount' => $served_amount[$i],
                'price' => $price_array[$i],
                'cake_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);

            DB::table('cake_desc')->insert([
                'quantity' => $array[$i],
                'served_amount' =>  $served_amount[$i],
                'price' => $price_array[$i],
                'cake_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);

            DB::table('cake_desc')->insert([
                'quantity' => $array[$i],
                'served_amount' =>  $served_amount[$i],
                'price' => $price_array[$i],
                'cake_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);

            DB::table('cake_desc')->insert([
                'quantity' => $array[$i],
                'served_amount' =>  $served_amount[$i],
                'price' => $price_array[$i],
                'cake_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);


            DB::table('cake_desc')->insert([
                'quantity' => $array[$i],
                'served_amount' => $served_amount[$i],
                'price' => $price_array[$i],
                'cake_id' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);

            DB::table('cake_desc')->insert([
                'quantity' => $array[$i],
                'served_amount' =>  $served_amount[$i],
                'price' => $price_array[$i],
                'cake_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }
    }
}

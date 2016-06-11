<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class RequestQuantityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cake_type = array("Birthday cakes", "Cup cakes", "Custom cakes", "Wedding cakes");
        $served_amount = array("35-40 pieces", "45-50 pieces", "60-66 pieces", "70-75 pieces", "More than 100 pieces");
        $served_amount_cupcake = array("35-40 pieces", "45-50 pieces", "55-60 pieces", "65-70 pieces", "More than 80 pieces");

        for ($i = 0; $i < 4; ++$i) {
            for ($y = 0; $y < 5; $y++) {
                if ($cake_type[$i] == "Cup cakes") {

                    DB::table('request_quantity')->insert([
                        'quantity' => '1 kg',
                        'served_amount' => $served_amount_cupcake[$y],
                        'type' => $cake_type[$i],
                        'created_at' =>\Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),


                    ]);
                } else {
                    DB::table('request_quantity')->insert([
                        'quantity' => '1 kg',
                        'served_amount' => $served_amount[$y],
                        'type' => $cake_type[$i],
                        'created_at' =>Carbon::now()->format('Y-m-d H:i:s') ,
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),


                    ]);
                }

            }
        }

    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CartItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cake_desc_array=array(19,20,21,22,23,24,25,26,27,28);
        $price_array=array(1000,1000,1000,1000,1000,1000,500,500,500,500);
        for($i=0;$i<10;++$i){
            DB::table('cart_item')->insert([
                'qty' => 1,
                'wording'=>"Very delicious",
                'price'=>$price_array[$i],
                'cake_desc_id'=>$cake_desc_array[$i],
                'cart_id'=>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
            if($i==9){
                DB::table('cart_item')->insert([
                    'qty' => 1,
                    'wording'=>"Very delicious",
                    'price'=>$price_array[$i],
                    'cake_desc_id'=>36,
                    'cart_id'=>1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ]);
            }
        }
    }
}

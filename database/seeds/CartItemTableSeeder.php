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
        $cake_desc_array=array(1,2,3,4,5,6,7,8,9,10);
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

        }
    }
}

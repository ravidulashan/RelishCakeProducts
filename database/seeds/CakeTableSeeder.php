<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CakeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$cake_array1=array("Chocolate Mousse","Chocolate Chip","Chocolate Fudge","Chocolate Cake","Chocolate Meringue","Nut $ Crisp","Brownie","Chocolate Fudge $ Nut");
        $url_array1=array("images/cake/fudge.jpg","images/cake/fondant.jpg","images/cake/apple.jpg","images/cake/delicious.jpg","images/cake/mango.jpg","images/cake/orange.jpg","images/cake/chocolateflavourd.jpg","images/cake/chocolatefudge.jpg");
        for($i=0;$i<8;++$i){
            DB::table('cake')->insert([
                'name' => $cake_array1[$i],
                'cake_desc'=>"Very delicious",
                'type'=>'Chocolate cakes',
                'img_url'=>$url_array1[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }

        $cake_array2=array('Getaux Opera','Coffee cake','Tiramisu');
        $url_array2=array("images/cake/fudge.jpg","images/cake/fondant.jpg","images/cake/apple.jpg");
        for($i=0;$i<8;++$i){
            DB::table('cake')->insert([
                'name' => $cake_array2[$i],
                'cake_desc'=>"Very delicious",
                'type'=>'Coffee cakes',
                'img_url'=>$url_array2[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }*/


        $cake_array=array("Cuddly Cat","Spider Man","Cars","Teen girl","Cute bunny","Present","Layered up","Toys","Plane");
        $url_array1=array("images/bcake/bcake1.jpg","images/bcake/bcake2.jpg","images/bcake/bcake3.jpg","images/bcake/bcake4.jpg","images/bcake/bcake5.jpg","images/bcake/bcake6.jpg","images/bcake/bcake8.jpg","images/bcake/bcake9.jpg");
        for($i=0;$i<9;$i++){
            DB::table('cake')->insert([
                'name' => $cake_array[$i],
                'cake_desc'=>"Very delicious",
                'type'=>'Birthday cakes',
                'img_url'=>$url_array1[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }
    }
}

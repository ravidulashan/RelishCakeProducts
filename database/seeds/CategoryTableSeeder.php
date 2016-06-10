<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=array('Chocolate cakes','Coffee cakes','Fruity cakes','Cheesecakes','Puff cakes');
        for($i=0;$i<5;++$i){
            DB::table('category')->insert([

                'type' => $array[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }

    }
}

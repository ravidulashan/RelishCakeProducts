<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /*  $this->call(UsersTableSeeder::class);
            $this->call(CategoryTableSeeder::class);
       $this->call(CakeTableSeeder::class);
        $this->call(CakeDescTableSeeder::class);*/
        $this->call(CartTableSeeder::class);
        $this->call(CartItemTableSeeder::class);
    }
}

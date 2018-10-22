<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('sales')->truncate();
        $sales = array(
          array('id' => '24','discount'=>0,'order_id' => '15','product_id' => '12','customer_id' => '13','quantity' => '3','price' => '2500','price_buy' => '7000','created_at' => '2018-02-02 13:31:16','updated_at' => '2018-02-02 13:31:16')
        );

        DB::table('sales')->insert($sales);
    }
}

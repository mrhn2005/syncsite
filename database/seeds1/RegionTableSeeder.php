<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->truncate();
        $deliveries = array(
          array('id' => '1','region' => 'تهران','price' => '5000','created_at' => '2018-04-22 00:00:00','updated_at' => '2018-04-22 00:00:00'),
          array('id' => '2','region' => 'پارک فناوری پردیس','price' => '0','created_at' => '2018-04-22 00:00:00','updated_at' => '2018-04-22 00:00:00')
        );
         DB::table('deliveries')->insert($deliveries);
    }
}

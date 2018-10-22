<?php

use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        DB::table('banners')->truncate();
        $maincats= array(
  array('id' => '1','link' => 'https://mahalijat.com','path' => '15291803171.webp','created_at' => '2018-06-17 00:48:37','updated_at' => '2018-06-17 00:48:37'),
  array('id' => '2','link' => 'https://mahalijat.com','path' => '15291804722.webp','created_at' => '2018-06-17 00:51:12','updated_at' => '2018-06-17 00:51:12'),
  array('id' => '3','link' => 'https://mahalijat.com','path' => '15291805953.webp','created_at' => '2018-06-17 00:53:15','updated_at' => '2018-06-17 00:53:15')
);
            DB::table('banners')->insert($maincats);
    }
}

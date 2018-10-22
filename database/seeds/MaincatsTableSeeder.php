<?php

use Illuminate\Database\Seeder;

class MaincatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maincats')->truncate();
        $maincats = array(
          array('id' => '1','name' => '
                    محصولات محلی و طبیعی
                    ','photo' => '','created_at' => '2018-01-13 02:16:18','updated_at' => '2018-01-13 02:16:18','slug'=>'محصولات-طبیعی-و-ارگانیک'),
          array('id' => '2','name' => '
                    صنایع دستی
                    ','photo' => '','created_at' => '2018-01-13 02:16:18','updated_at' => '2018-01-13 02:16:18','slug'=>'صنایع-دستی'),
        array('id' => '3','name' => '
                    محصولات ارگانیک
                    ','photo' => '','created_at' => '2018-01-13 02:16:18','updated_at' => '2018-01-13 02:16:18','slug'=>'صنایع-دستی')
        );
            DB::table('maincats')->insert($maincats);
    }
    
}

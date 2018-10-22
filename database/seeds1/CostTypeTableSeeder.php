<?php

use Illuminate\Database\Seeder;

class CostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cost_types')->truncate();
        $maincats = array(
            array('id' => '1','name' => '
                        خرید محصول
                    '),
            array('id' => '2','name' => '
                    بسته بندی
                    '),
            array('id' => '3','name' => '
                    تبلیغات
            '),
            array('id' => '4','name' => '
                   حمل و نقل
                    '),
            array('id' => '5','name' => '
                   فتوشاپ
                    '),
            array('id' => '6','name' => '
                    سایت
                    '),
            array('id' => '7','name' => '
                  نیروی کار
                    '),
            array('id' => '8','name' => '
                 متفرقه
                    '),
        );
            DB::table('cost_types')->insert($maincats);
    }
    
}

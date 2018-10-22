<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::table('orders')->truncate();
        $orders = array(
          array('id' => '15','address'=>'بزرگراه رسالت-استاد حسن بنا جنوبی(مجیدیه جنوبی)-خیابان فرهاد حسینی-بن بست آزادی- پلاک 4-زنگ 1','customer_id' => '13','transaction_id' => '25','address_id' => '11','phone' => '09102092102','payment' => 'پرداخت آنلاین','total_price' => '7,500','delivered' => '1','created_at' => '2018-02-02 13:31:16','updated_at' => '2018-02-04 19:29:08')
        );

            DB::table('orders')->insert($orders);
    }
}

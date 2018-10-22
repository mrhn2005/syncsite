<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
DB::table('categories')->truncate();
        $categories = array(
  array('id' => '1','name' => 'خشکبار','photo' => '1515659008driedfoods.jpg','maincat_id' => '1','slug' => 'خشکبار','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-02-05 01:37:07'),
  array('id' => '2','name' => 'چاشنی و ادویه‌جات','photo' => '1515659364spices.jpg','maincat_id' => '1','slug' => 'ادویه-جات','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-07-03 15:06:00'),
  array('id' => '3','name' => 'عرقیجات','photo' => '1515659379aromas.jpg','maincat_id' => '1','slug' => 'عرقیجات','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-02-05 01:37:58'),
  array('id' => '4','name' => 'عسل‌ و مربا','photo' => '1515659394honey.jpg','maincat_id' => '1','slug' => 'عسل-و-مربا','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-05-05 22:26:22'),
  array('id' => '5','name' => 'شیره','photo' => '1515659405juice.jpg','maincat_id' => '1','slug' => 'شیره','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-02-05 01:38:07'),
  array('id' => '6','name' => 'روغن‌ها','photo' => '1515659421oil.jpg','maincat_id' => '1','slug' => 'روغن-ها','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-02-05 01:38:12'),
  array('id' => '7','name' => 'چای و دمنوش','photo' => '1515659434tea.jpg','maincat_id' => '1','slug' => 'چای-لاهیجان','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-07-03 15:06:13'),
  array('id' => '9','name' => 'محصولات چوبی','photo' => '1515830200wooden.jpg','maincat_id' => '2','slug' => 'محصولات-چوبی','created_at' => '2017-12-29 00:26:32','updated_at' => '2018-02-05 01:38:25'),
  array('id' => '10','name' => 'دستباف و دست دوز','photo' => '1515830902dastbaft.jpg','maincat_id' => '2','slug' => 'دستباف-و-دست-دوز','created_at' => '2018-01-13 18:38:22','updated_at' => '2018-02-05 01:38:35'),
  array('id' => '11','name' => 'زیورآلات','photo' => '1515832710jewelry.jpg','maincat_id' => '2','slug' => 'زیورآلات','created_at' => '2018-01-13 19:08:30','updated_at' => '2018-02-05 01:38:40'),
  array('id' => '12','name' => 'شور و ترشیجات','photo' => '1516010644torshi.jpg','maincat_id' => '1','slug' => 'ترشیجات','created_at' => '2018-01-15 20:34:04','updated_at' => '2018-07-03 15:08:11'),
  array('id' => '13','name' => 'دیگر محصولات محلی','photo' => '1516185477all.jpg','maincat_id' => '1','slug' => 'دیگر-محصولات-سالم','created_at' => '2018-01-17 21:07:57','updated_at' => '2018-07-03 15:09:30'),
  array('id' => '14','name' => 'تابلوی مسی','photo' => '1523686594تابلو-مسی.jpg','maincat_id' => '2','slug' => 'تابلوی-مسی','created_at' => '2018-04-14 10:46:34','updated_at' => '2018-04-14 10:46:34'),
  array('id' => '15','name' => 'نمک و شکر','photo' => '1530123890بنر نمک (1).jpg','maincat_id' => '1','slug' => 'نمک','created_at' => '2018-06-20 00:12:59','updated_at' => '2018-07-03 15:07:32')
);
            DB::table('categories')->insert($categories);
    }
}

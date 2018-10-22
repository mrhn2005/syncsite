<?php

use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->truncate();
        

$photos = array(
  array('id' => '1','name' => '1514069245chai-sabz-ghalam.jpg','product_id' => '1','main_photo' => '0','created_at' => '2017-12-24 05:47:25','updated_at' => '2018-01-02 01:58:40'),
  array('id' => '2','name' => '1514060177bargezardalu.jpg','product_id' => '2','main_photo' => '0','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-30 01:37:59'),
  array('id' => '3','name' => '1514067005alubokhara.jpg','product_id' => '3','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 05:10:05'),
  array('id' => '4','name' => '1514065125alujangali.jpg','product_id' => '4','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:38:45'),
  array('id' => '5','name' => '1514067184qaisi.jpg','product_id' => '5','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 05:13:04'),
  array('id' => '7','name' => '1514057500anab.jpg','product_id' => '7','main_photo' => '0','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-28 21:13:22'),
  array('id' => '8','name' => '1514064819peste.jpg','product_id' => '8','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:33:39'),
  array('id' => '9','name' => '1514065865felfelghermez.jpg','product_id' => '9','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:51:05'),
  array('id' => '10','name' => '1514065366felfelsiah.jpg','product_id' => '10','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:42:46'),
  array('id' => '11','name' => '1514065561darchin.jpg','product_id' => '11','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:46:01'),
  array('id' => '12','name' => '1514066876zardchube.jpg','product_id' => '12','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 05:07:56'),
  array('id' => '13','name' => '1514067929sumac.jpg','product_id' => '13','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 05:25:29'),
  array('id' => '14','name' => '1514066165hel.jpg','product_id' => '14','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:56:05'),
  array('id' => '16','name' => '1514057206pudrzanjabil.jpg','product_id' => '16','main_photo' => '0','created_at' => '2017-12-14 14:21:19','updated_at' => '2018-01-02 01:55:05'),
  array('id' => '17','name' => '1514064161shahnastaran.jpg','product_id' => '17','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:22:41'),
  array('id' => '18','name' => '1514063262nana.jpg','product_id' => '18','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:07:42'),
  array('id' => '19','name' => '1514063507kakuti.jpg','product_id' => '19','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:11:47'),
  array('id' => '20','name' => '1514063133badranj.jpg','product_id' => '20','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:05:33'),
  array('id' => '21','name' => '1514062635asalbamoom.jpg','product_id' => '21','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 03:57:15'),
  array('id' => '22','name' => '1514062960avishan.jpg','product_id' => '22','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:02:40'),
  array('id' => '23','name' => '1514062839asalbamoom.jpg','product_id' => '23','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 04:00:39'),
  array('id' => '24','name' => '1514061304shire1.jpg','product_id' => '24','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 03:35:04'),
  array('id' => '25','name' => '1514068178shireangur.jpg','product_id' => '25','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 05:29:38'),
  array('id' => '26','name' => '1514062242shire3.jpg','product_id' => '26','main_photo' => '1','created_at' => '2017-12-14 14:21:19','updated_at' => '2017-12-24 03:50:42'),
  array('id' => '27','name' => '1513264628nabat.jpg','product_id' => '27','main_photo' => '0','created_at' => '2017-12-14 22:03:54','updated_at' => '2017-12-29 04:45:02'),
  array('id' => '28','name' => '1513267001golmohammadi.jpg','product_id' => '28','main_photo' => '0','created_at' => '2017-12-14 22:56:41','updated_at' => '2017-12-29 04:32:53'),
  array('id' => '29','name' => '1513271084albalukhoshk.jpg','product_id' => '29','main_photo' => '0','created_at' => '2017-12-15 00:04:44','updated_at' => '2018-01-03 23:41:35'),
  array('id' => '30','name' => '1513271965chube-darchin.jpg','product_id' => '30','main_photo' => '1','created_at' => '2017-12-15 00:19:25','updated_at' => '2017-12-15 00:19:25'),
  array('id' => '31','name' => '1514055438konjed.jpg','product_id' => '31','main_photo' => '0','created_at' => '2017-12-24 01:57:18','updated_at' => '2017-12-29 04:32:21'),
  array('id' => '32','name' => '1514055790gardegol.jpg','product_id' => '32','main_photo' => '0','created_at' => '2017-12-24 02:03:10','updated_at' => '2018-01-03 23:23:19'),
  array('id' => '33','name' => '1514056228adviekhoreshti.jpg','product_id' => '33','main_photo' => '0','created_at' => '2017-12-24 02:10:28','updated_at' => '2017-12-30 03:32:39'),
  array('id' => '34','name' => '1514056878adviepoloei.jpg','product_id' => '34','main_photo' => '0','created_at' => '2017-12-24 02:21:18','updated_at' => '2018-01-03 23:56:05'),
  array('id' => '35','name' => '1514058972namak.jpg','product_id' => '35','main_photo' => '0','created_at' => '2017-12-24 02:56:12','updated_at' => '2018-01-03 23:33:56'),
  array('id' => '36','name' => '1514059365kashk.jpg','product_id' => '36','main_photo' => '0','created_at' => '2017-12-24 03:02:45','updated_at' => '2018-01-09 21:02:25'),
  array('id' => '37','name' => '1514059906anjir.jpg','product_id' => '37','main_photo' => '0','created_at' => '2017-12-24 03:11:46','updated_at' => '2017-12-30 03:18:27'),
  array('id' => '38','name' => '1514060550roghankonjed.jpg','product_id' => '38','main_photo' => '0','created_at' => '2017-12-24 03:22:30','updated_at' => '2017-12-30 04:39:52'),
  array('id' => '39','name' => '1514067741roghanheivani.jpg','product_id' => '39','main_photo' => '1','created_at' => '2017-12-24 03:31:45','updated_at' => '2017-12-24 05:22:21'),
  array('id' => '40','name' => '1514068586chaimomtazbahare.jpg','product_id' => '40','main_photo' => '1','created_at' => '2017-12-24 05:36:26','updated_at' => '2017-12-24 05:36:26'),
  array('id' => '41','name' => '1514069037chaighalam.jpg','product_id' => '41','main_photo' => '1','created_at' => '2017-12-24 05:43:57','updated_at' => '2017-12-24 05:43:57'),
  array('id' => '44','name' => '1514469990anab1.jpg','product_id' => '7','main_photo' => '1','created_at' => '2017-12-28 21:06:31','updated_at' => '2017-12-28 21:13:22'),
  array('id' => '48','name' => '1514496736konjed-2.jpg','product_id' => '31','main_photo' => '1','created_at' => '2017-12-29 04:32:16','updated_at' => '2017-12-29 04:32:21'),
  array('id' => '49','name' => '1514496768golemohamadi.jpg','product_id' => '28','main_photo' => '1','created_at' => '2017-12-29 04:32:48','updated_at' => '2017-12-29 04:32:53'),
  array('id' => '50','name' => '1514497496nabat1.jpg','product_id' => '27','main_photo' => '1','created_at' => '2017-12-29 04:44:56','updated_at' => '2017-12-29 04:45:02'),
  array('id' => '52','name' => '1514578701anjir1.jpg','product_id' => '37','main_photo' => '1','created_at' => '2017-12-30 03:18:21','updated_at' => '2017-12-30 03:18:27'),
  array('id' => '53','name' => '1514579550adviekhoreshti1.jpg','product_id' => '33','main_photo' => '1','created_at' => '2017-12-30 03:32:30','updated_at' => '2017-12-30 03:32:39'),
  array('id' => '54','name' => '1514583585roghankonjed1.jpg','product_id' => '38','main_photo' => '1','created_at' => '2017-12-30 04:39:45','updated_at' => '2017-12-30 04:39:52'),
  array('id' => '55','name' => '1514831640peste2.jpg','product_id' => '8','main_photo' => '0','created_at' => '2018-01-02 01:34:00','updated_at' => '2018-01-02 01:34:00'),
  array('id' => '56','name' => '1514832900zanjabil.jpg','product_id' => '16','main_photo' => '1','created_at' => '2018-01-02 01:55:00','updated_at' => '2018-01-02 01:55:05'),
  array('id' => '57','name' => '1514833114CHAISABZ2.jpg','product_id' => '1','main_photo' => '1','created_at' => '2018-01-02 01:58:34','updated_at' => '2018-01-02 01:58:40'),
  array('id' => '58','name' => '1514835048sibkhshk2.jpg','product_id' => '6','main_photo' => '0','created_at' => '2018-01-02 02:30:48','updated_at' => '2018-01-02 02:30:48'),
  array('id' => '59','name' => '1514989594avishan1.jpg','product_id' => '15','main_photo' => '1','created_at' => '2018-01-03 21:26:34','updated_at' => '2018-01-03 21:26:38'),
  array('id' => '60','name' => '1514996594gardegol1.jpg','product_id' => '32','main_photo' => '1','created_at' => '2018-01-03 23:23:14','updated_at' => '2018-01-03 23:23:19'),
  array('id' => '61','name' => '1514997229salt.jpg','product_id' => '35','main_photo' => '1','created_at' => '2018-01-03 23:33:49','updated_at' => '2018-01-03 23:33:56'),
  array('id' => '62','name' => '1514997688albalukhoshk1.jpg','product_id' => '29','main_photo' => '1','created_at' => '2018-01-03 23:41:28','updated_at' => '2018-01-03 23:41:35'),
  array('id' => '64','name' => '1514999101adviepoloei2.jpg','product_id' => '34','main_photo' => '1','created_at' => '2018-01-04 00:05:01','updated_at' => '2018-01-04 00:05:14'),
  array('id' => '66','name' => '1515047010bargezardalu2.jpg','product_id' => '2','main_photo' => '1','created_at' => '2018-01-04 13:23:30','updated_at' => '2018-01-04 13:23:45'),
  array('id' => '67','name' => '1515048054sibkhshk3.jpg','product_id' => '6','main_photo' => '1','created_at' => '2018-01-04 13:40:54','updated_at' => '2018-01-04 13:41:07'),
  array('id' => '68','name' => '1515506540kashk3.jpg','product_id' => '36','main_photo' => '1','created_at' => '2018-01-09 21:02:20','updated_at' => '2018-01-09 21:02:25'),
  array('id' => '69','name' => '15156784741515047010bargezardalu2.jpg','product_id' => '42','main_photo' => '0','created_at' => '2018-01-11 20:47:54','updated_at' => '2018-01-11 20:47:54'),
  array('id' => '71','name' => '1515829515ahu.jpg','product_id' => '44','main_photo' => '0','created_at' => '2018-01-13 14:45:15','updated_at' => '2018-01-13 14:45:15'),
  array('id' => '72','name' => '1515829656car1.jpg','product_id' => '43','main_photo' => '0','created_at' => '2018-01-13 14:47:36','updated_at' => '2018-01-13 14:47:36'),
  array('id' => '73','name' => '1515832427dastband2.jpg','product_id' => '45','main_photo' => '0','created_at' => '2018-01-13 15:33:47','updated_at' => '2018-01-13 15:33:47'),
  array('id' => '74','name' => '1515833100gushvare.jpg','product_id' => '46','main_photo' => '0','created_at' => '2018-01-13 15:45:00','updated_at' => '2018-01-13 15:45:00'),
  array('id' => '75','name' => '1516011263torshi1.jpg','product_id' => '47','main_photo' => '0','created_at' => '2018-01-15 17:14:23','updated_at' => '2018-01-15 17:14:23'),
  array('id' => '76','name' => '1516011373torshi1.jpg','product_id' => '48','main_photo' => '0','created_at' => '2018-01-15 17:16:13','updated_at' => '2018-01-15 17:16:13'),
  array('id' => '77','name' => '1516011478torshi1.jpg','product_id' => '49','main_photo' => '0','created_at' => '2018-01-15 17:17:58','updated_at' => '2018-01-15 17:17:58'),
  array('id' => '78','name' => '1516014114tomato paste1.jpg','product_id' => '50','main_photo' => '0','created_at' => '2018-01-15 18:01:54','updated_at' => '2018-01-15 18:01:54'),
  array('id' => '80','name' => '1516803711keshmesh1.jpg','product_id' => '52','main_photo' => '0','created_at' => '2018-01-24 17:51:51','updated_at' => '2018-01-24 17:51:51')
);
DB::table('photos')->insert($photos);
        
    }
}

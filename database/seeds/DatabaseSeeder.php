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
       

        // $path = 'mahalija_mahalijat.sql';
        // $local_path = config('filesystems.disks.local.root') . DIRECTORY_SEPARATOR . $path;
        // DB::unprepared(file_get_contents($local_path));
        // $this->command->info('Country table seeded!');
        // DB::statement('DELETE FROM products');
         $this->call(AdminTableSeeder::class);
        //  $this->call(CategoryTableSeeder::class);
        //  $this->call(SalesTableSeeder::class);
         $this->call(PhotoTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(MaincatsTableSeeder::class);
         $this->call(RegionTableSeeder::class);
         $this->call(ProvinceTableSeeder::class);
         $this->call(CityTableSeeder::class);
           
        //  $this->call(BannerTableSeeder::class);
        //  $this->call(OrderTableSeeder::class);
    }
}

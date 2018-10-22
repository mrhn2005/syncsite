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
         $this->call(AdminTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
        //  $this->call(SalesTableSeeder::class);
         $this->call(PhotoTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(MaincatsTableSeeder::class);
         $this->call(RegionTableSeeder::class);
        //  $this->call(CostTypeTableSeeder::class);
         $this->call(OrderTableSeeder::class);
    }
}

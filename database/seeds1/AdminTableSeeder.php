<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student= new Admin();
        $student->name="mahliyas";
        $student->email="mahliyas@mahalijat.ir";
        $student->password=bcrypt("mahliyas2017");
        $student->save();
    }
}

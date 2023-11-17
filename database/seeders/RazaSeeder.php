<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('raza')->insert(['esp_id'=> 1, 'raz_nombre'=> 'PUG','created_at'=>date('Y-m-d'), 'updated_at'=>date('Y-m-d')]);
    }
}

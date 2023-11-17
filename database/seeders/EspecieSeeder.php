<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especie')->insert(['esp_nombre'=> 'CANINO', 'created_at'=>date('Y-m-d'), 'updated_at'=>date('Y-m-d')]);
        DB::table('especie')->insert(['esp_nombre'=> 'FELINO', 'created_at'=>date('Y-m-d'), 'updated_at'=>date('Y-m-d')]);
    }
}

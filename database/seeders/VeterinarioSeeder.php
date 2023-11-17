<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeterinarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veterinario')->insert(['vet_nombre_completo'=> 'RUBEN BALDERRAMA', 'created_at'=>date('Y-m-d'), 'updated_at'=>date('Y-m-d')]);
    }
}

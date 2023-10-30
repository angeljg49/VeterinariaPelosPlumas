<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario: admin password: 123
        DB::table('usuario')->insert(['usu_rol'=> 1, 'usu_nombre'=> 'admin', 'password'=> '$2a$10$NG35pKeAdwbVGrsRftPgY.e82QwU1ICV8zJBUwvXM.5SIf7BGUBeS','usu_email'=> 'admin@gmail.com','created_at'=>date('Y-m-d'), 'updated_at'=>date('Y-m-d')]);
    }
}

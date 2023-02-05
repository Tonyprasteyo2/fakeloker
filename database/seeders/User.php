<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('useradmins')->insert([
            "nama_lengkap"=>"Tony",
            "email"=>"raihansky234@gmail.com",
            "password"=>bcrypt("Tony123a"),
            "role"=>"admin",
            "foto"=>"34.png"
        ]);
        DB::table('apikeys')->insert([
            "api"=>"Tony",
        ]);
    }
}
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
            "email"=>"a@yahoo.com",
            "password"=>bcrypt("Tony123a"),
            "role"=>"admin",
            "foto"=>"34.png"
        ]);
    }
}
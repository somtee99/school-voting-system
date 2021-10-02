<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Admin2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin["first_name"] =  "Collins";
        $admin["last_name"] = "Ikpeme";
        $admin["email"] = "collinsikpeme@gmail.com";
        $admin["password"] = bcrypt("ci3333");
        $admin["user_type"] = "admin";
        $admin["uuid"] = Str::uuid();

        User::create($admin);
    }
}

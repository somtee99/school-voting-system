<?php

namespace Database\Seeders;

use Str;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin["first_name"] =  "Admin";
        $admin["last_name"] = "User";
        $admin["email"] = "admin@voting.com";
        $admin["password"] = bcrypt("admin");
        $admin["user_type"] = "admin";
        $admin["uuid"] = Str::uuid();

        User::create($admin);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");
        User::truncate();
        DB::table("role_user")->truncate();

        $adminRole = Role::whereName("Admin")->first();
        $memberRole = Role::whereName("Member")->first();

        $adminUser = User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin12345")
        ]);

        $memberUser = User::create([
            "name" => "Member",
            "email" => "member@gmail.com",
            "password" => bcrypt("member12345")
        ]);

        $adminUser->roles()->attach($adminRole);
        $memberUser->roles()->attach($memberRole);
    }
}

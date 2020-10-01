<?php

use App\User;
use App\ImportUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        factory(User::class, 20)->create();
        factory(ImportUser::class, 10)->create();
    }
}

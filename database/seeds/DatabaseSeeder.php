<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
         $this->call(RolesTableSeeder::class);
         $this->call(UserTableSeeder::class);
         DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}

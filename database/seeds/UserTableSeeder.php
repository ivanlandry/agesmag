<?php

use App\Role;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $utilisateur = User::create([
            'name'=>"landry",
            'tel'=>"699020345",
            'email'=>'chedjoulandryivan@gmail.com',
            'password'=>Hash::make('password')
        ]);

        $admin = User::create([
            'name'=>"admin",
            'tel'=>"666666666",
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin')
        ]);

        $adminRole = Role::where('name','admin')->first();
        $utilisateurRole = Role::where('name','utilisateur')->first();

        $admin->roles()->attach($adminRole);
        $utilisateur->roles()->attach($utilisateurRole);
    }
}

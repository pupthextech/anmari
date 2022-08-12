<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'    => 'Super',
            'last_name'    => 'Admin',
            'mobile_num'    => '09195252973',
            'email'    => 'hextechrepo@gmail.com',
            'address'    => 'Gen. Santos Ave. Lower Bicutan, Taguig City',
            'username'    => 'adminanmari',
            'password'   =>  Hash::make('hextech2022'),
            'gender'   =>  'male',
            'user_type'   =>  'admin',
        ]);
    }
}

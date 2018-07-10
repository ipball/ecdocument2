<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'username' => 'tawatsak',
            'password' =>  Hash::make('123456'),
            'email' => 'itoffside@hotmail.com',
            'name' => 'Tawatsak Tangeaim',
            'department' => 'MD',
            'user_type' => 'admin',
            'created_at' => date('Y-m-d H:i:s')
        ));
    }
}

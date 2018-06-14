<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['username'=>'admin', 'password'=> '123456'];
        User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

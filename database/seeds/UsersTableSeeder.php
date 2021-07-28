<?php

use App\User;
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
        $newUser = new User;
        $newUser->name = 'Stefano';
        $newUser->email = 'prova@email.it';
        $newUser->password = Hash::make('prova');
        $newUser->save();
    }
}

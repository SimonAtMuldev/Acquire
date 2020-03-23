<?php

use App\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name'      => 'Admin',
            'email'     => 'simon@siacom.co',
            'password'  => Hash::make('pw'),
            'role'      => 5,
            'api_token' => Str::random(32),
        ]);

        factory(\App\User::class, 10)->create();
    }
}

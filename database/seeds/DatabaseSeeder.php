<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(GameSeeder::class);


        /** TIP Seeding the Relational table game_user with data */
        $game1 = App\Game::find(1);
        $game2 = App\Game::find(2);
        $game3 = App\Game::find(3);
        $game4 = App\Game::find(4);

        // TIP: Define constant array filled with user->id
        define('GAME1', [1,2,3]);
        define('GAME2', [4,5,6,7]);
        define('GAME3', [8,9]);
        define('GAME4', [10,11]);

        // TIP: Adding players (users) to each game
        $game1->users()->attach(GAME1);
        $game2->users()->attach(GAME2);
        $game3->users()->attach(GAME3);
        $game4->users()->attach(GAME4);

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        define('AMOUNT_OF_CARDS',  25);


        Company::Create([
            'name'    => 'LUXOR',
            'value'   => 200,
            'image'   => '/companies/luxor.png',
            'amount_of_cards' => AMOUNT_OF_CARDS
        ]);
        Company::Create([
            'name'  => 'TOWER',
            'value' => 200,
            'image'   => '/companies/tower.png',
            'amount_of_cards' => AMOUNT_OF_CARDS
        ]);
        Company::Create([
            'name'  => 'FESTIVAL',
            'value' => 300,
            'image'   => '/companies/festival.png',
            'amount_of_cards' => AMOUNT_OF_CARDS
        ]);
        Company::Create([
            'name'  => 'AMERICAN',
            'value' => 300,
            'image'   => '/companies/american.png',
            'amount_of_cards' => AMOUNT_OF_CARDS
        ]);
        Company::Create([
            'name'  => 'WORLDWIDE',
            'value' => 300,
            'image'   => '/companies/worldwide.png',
            'amount_of_cards' => AMOUNT_OF_CARDS
        ]);
        Company::Create([
            'name'  => 'CONTINENTAL',
            'value' => 400,
            'image'   => '/companies/continental.png',
            'amount_of_cards' => AMOUNT_OF_CARDS
        ]);
        Company::Create([
            'name'  => 'IMPERIAL',
            'value' => 400,
            'image'   => '/companies/imperial.png',
            'amount_of_cards' => AMOUNT_OF_CARDS
        ]);

    }
}

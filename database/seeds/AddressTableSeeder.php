<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = new \App\Address([
            'house_number' => 'Lot 135',
            'street_name' => 'Nailuva Rd',
            'town' => 'Suva',
            'suburb' => 'Raiwai'
        ]);
        $address->save();

        $address = new \App\Address([
            'house_number' => 'Lot 133',
            'street_name' => 'McFarlane St',
            'town' => 'Suva',
            'suburb' => 'Raiwai'
        ]);
        $address->save();

        $address = new \App\Address([
            'house_number' => '434',
            'street_name' => 'Bryce St',
            'town' => 'Suva',
            'suburb' => 'Raiwaqa'
        ]);
        $address->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = new \App\Account([
            'account_number' => '123456789',
            'fnpf_number' => '987654321',
            'firc_id' => 'FJ11111',
            'account_type' => 'Savings',
            'debit_card_number' => '01234567891011',
            'branch' => 'Laucala'
        ]);
        $account->save();

        $account = new \App\Account([
            'account_number' => '1111111111',
            'fnpf_number' => '2222222222',
            'firc_id' => 'FJ2222',
            'account_type' => 'Savings',
            'debit_card_number' => '1111222233334444',
            'branch' => 'Suva'
        ]);
        $account->save();

        $account = new \App\Account([
            'account_number' => '2222222222',
            'fnpf_number' => '3333333333',
            'firc_id' => 'FJ3333',
            'account_type' => 'Simple Access',
            'debit_card_number' => '4444333322221111',
            'branch' => 'Nadi'
        ]);
        $account->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = new \App\User([
           'address_id' => 1,
           'account_id' => 1,
           'first_name' => 'Karunesh',
           'last_name' => 'Ratman',
           'gender' => 'Male',
           'marital_status' => 'single',
           'tin_number' => 'FJ00000',
           'occupation' => 'ICT Professor',
           'email' => 'ratman@gmail.com',
           'phone' => '9999999',
           'password' => bcrypt('test_pw')
       ]);
        $user->save();

        $user = new \App\User([
            'address_id' => 2,
            'account_id' => 2,
            'first_name' => 'Alex',
            'last_name' => 'Dharmendra',
            'gender' => 'Male',
            'marital_status' => 'Single',
            'tin_number' => 'FJ00001',
            'occupation' => 'Medical Doctor',
            'email' => 'alex@gmail.com',
            'phone' => '8888888',
            'password' => bcrypt('test_pw')
        ]);
        $user->save();

        $user = new \App\User([
            'address_id' => 3,
            'account_id' => 3,
            'first_name' => 'Sunjay',
            'last_name' => 'Sharma',
            'gender' => 'Male',
            'marital_status' => 'Single',
            'tin_number' => 'FJ00002',
            'occupation' => 'Business Analyst',
            'email' => 'sharma@gmail.com',
            'phone' => '7777777',
            'password' => bcrypt('test_pw')
        ]);
        $user->save();
    }
}

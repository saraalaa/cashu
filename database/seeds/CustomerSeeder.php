<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'id' => 1,
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'website' => 'https://customer.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}

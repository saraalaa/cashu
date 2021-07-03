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
        config()->set('seeding', true);

        $this->call(RoleSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserRoleSeeder::class);

        config()->set('seeding', false);
    }
}

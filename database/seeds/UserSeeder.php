<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Models\User::class, 3)
            ->create()
            ->each(function ($user) {
                $user->sales()->createMany(factory(App\Models\Sale::class, 3)->make()->toArray());
                $user->configs()->createMany(factory(App\Models\Config::class, 1)->make()->toArray());
            });
    }
}

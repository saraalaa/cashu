<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Sales',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Back Office',
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Admin',
        ]);
    }
}

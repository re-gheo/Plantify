<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_states')->insert([
            'user_state' => 'Granted',
        ]);

        DB::table('user_states')->insert([
            'user_state' => 'Banned',
        ]);

        DB::table('user_states')->insert([
            'user_state' => 'Locked',
        ]);
    }
}

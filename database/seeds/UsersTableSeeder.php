<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            ['slack_id' => null, 'name' => 'Milos Milosevic', 'email' => 'milos.milosevic@labs.devana.rs', 'password' => bcrypt('12345678')]
        );

        DB::table('users')->insert($users);
    }
}

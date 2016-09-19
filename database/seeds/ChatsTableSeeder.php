<?php

use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->delete();

        $chats = array(
            ['user_id' => '1', 'type_id' => '1', 'chat_id' => '@antic', 'name' => 'Stefan Antic'],
            ['user_id' => '1', 'type_id' => '1', 'chat_id' => '@dzimi', 'name' => 'Vanja Paunovic'],
            ['user_id' => '1', 'type_id' => '1', 'chat_id' => '@dusan_b', 'name' => 'Dusan Budimkic'],
            ['user_id' => '1', 'type_id' => '1', 'chat_id' => '@micko', 'name' => 'Milos Milosevic'],
            ['user_id' => '1', 'type_id' => '1', 'chat_id' => '@nina', 'name' => 'Nikolina Burmudzija'],
            ['user_id' => '1', 'type_id' => '1', 'chat_id' => '@ivona', 'name' => 'Ivona Jovanovic'],
            ['user_id' => '1', 'type_id' => '1', 'chat_id' => '@masa', 'name' => 'Malisa Pusonja'],

        );

        DB::table('chats')->insert($chats);
    }
}

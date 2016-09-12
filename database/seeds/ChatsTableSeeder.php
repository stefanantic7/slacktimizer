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
        );

        DB::table('chats')->insert($chats);
    }
}

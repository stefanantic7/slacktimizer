<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        $types = array(
            ['name' => 'im', 'acronym' => '@'],
            ['name' => 'channel', 'acronym' => '#'],
            ['name' => 'group', 'acronym' => '#']
        );

        DB::table('types')->insert($types);
    }
}

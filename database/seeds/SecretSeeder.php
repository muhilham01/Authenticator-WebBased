<?php

use Illuminate\Database\Seeder;

class SecretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secrets')->insert([
            'name' => 'mustofa',
            'secret' => '4UGUCD7QFPRADZSF',
        ]);
    }
}

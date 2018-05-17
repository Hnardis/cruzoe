<?php

use Illuminate\Database\Seeder;

class FormatSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('format')->delete();
        DB::table('format')->insert([
            [
                'for_id' => 1,
                'for_nom' => 'wav',
            ],
            [
                'for_id' => 2,
                'for_nom' => 'mp3',
            ],
            [
                'for_id' => 3,
                'for_nom' => 'aac',
            ]
        ]);
    }
}

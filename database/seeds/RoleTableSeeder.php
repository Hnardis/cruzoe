<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'abonne',
                'description' => "Rôle d'un abonné"
            ],
            [
                'name' => 'admin',
                'description' => "Rôle d'un administrateur"
            ],
            [
                'name' => 'dev',
                'description' => "Role d'un développeur"
            ],
        ]);
    }
}

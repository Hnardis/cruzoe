<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_abonne = Role::where('name', 'abonne')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_dev = Role::where('name', 'dev')->first();

        $dev = new User();
        $dev->name = 'Dav';
        $dev->email = 'davidhihea@gmail.com';
        $dev->password = bcrypt('dav');
        $dev->save();
        $dev->roles()->attach($role_dev);
    
        $abonne = new User();
        $abonne->name = 'Abonné de test';
        $abonne->email = 'abonne@gmail.com';
        $abonne->password = bcrypt('abonne');
        $abonne->save();
        $abonne->roles()->attach($role_abonne);

        $abonne = new User();
        $abonne->name = 'Administrateur';
        $abonne->email = 'admin@gmail.com';
        $abonne->password = bcrypt('admin');
        $abonne->save();
        $abonne->roles()->attach($role_admin);
    }
}

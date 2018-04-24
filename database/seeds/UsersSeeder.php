<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Petugas 1',
            'email' => 'petugas1@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        //Eloquent way
        App\User::insert([
            'name' => 'Petugas 2',
            'email' => 'petugas2@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        factory(App\User::class, 10)->create()->each(function ($u) {
            $u->violations()->saveMany(factory(App\Violation::class)->times(5)->make());
        });
        // DB::table('users')->insert([
        //     'name' => 'Pelanggar 1',
        //     'email' => 'pelanggar1@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Pelanggar 2',
        //     'email' => 'pelanggar2@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
    }
}

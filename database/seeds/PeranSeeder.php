<?php

use Illuminate\Database\Seeder;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = App\Peran::create([
        	'role' => 'Petugas'
        ]);

        $role2 = App\Peran::create([
        	'role' => 'Verifikator'
        ]);

        $user1 = App\User::find(1);
        $user1->roles()->sync($role1);

        $user2 = App\User::find(2);
        $user2->roles()->sync($role1);

        $user3 = App\User::find(3);
        $user3->roles()->sync($role2);
    }
}

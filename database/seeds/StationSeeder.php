<?php

use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $station1 = App\Station::create([
        	'address' => 'Jl. Jakarta'
        ]);

        $station2 = App\Station::create([
        	'address' => 'Jl. Japati'
        ]);

        $station3 = App\Station::create([
        	'address' => 'Jl. Pahlawan'
        ]);

        $user1 = App\User::find(1);
        $user1->stations()->saveMany([$station1, $station2]);

        $user2 = App\User::find(2);
        $user2->stations()->saveMany([$station2, $station3]);
        
    }
}

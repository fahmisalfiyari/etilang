<?php

use Illuminate\Database\Seeder;

class ViolationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('violations')->insert([
        //     'violator_identity_number' => 'KTP-12345',
        //     'violator_name' => 'Mukidi',
        //     'officer_id' => '1',
        //     'status' => 'NEW',
        // ]);

        // DB::table('violations')->insert([
        //     'violator_identity_number' => 'KTP-67890',
        //     'violator_name' => 'Maskulin',
        //     'officer_id' => '1',
        //     'status' => 'NEW',
        // ]);

        factory(App\Violation::class, 50)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();

        $locations = [
            [
                'name'      => 'Antwerp',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Deurne',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Luchtbal',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Borgerhout',
                'postcode'  => 2000
            ],
            [
                'name'      => 'Brasschaat',
                'postcode'  => 2000
            ],

        ];
        DB::table('locations')->insert($locations);
    }
}

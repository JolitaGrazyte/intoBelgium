<?php

use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        $events = [
            [
                'title'             => 'Event 1',
                'description'       => 'some description...',
                'street_address'    => 'Meir 3',
                'date'              => \Carbon\Carbon::now(),
                'location_id'       => 1,
                'postcode'          => 2000,
                'city'              => 'Antwerp',
                'user_id'           =>  1

            ],

            [
                'title'             => 'Event 2',
                'description'       => 'some description...',
                'street_address'    => 'Lange Nieuwstraat 126',
                'date'              => \Carbon\Carbon::now(),
                'location_id'       => 1,
                'postcode'          => 2000,
                'city'              => 'Antwerp',
                'user_id'           =>  1

            ],
            [
                'title'             => 'Event 3',
                'description'       => 'some description...',
                'street_address'    => ' ',
                'date'              => \Carbon\Carbon::now(),
                'location_id'       => 1,
                'postcode'          => 2000,
                'city'              => 'Antwerp',
                'user_id'           =>  1

            ],


        ];
        DB::table('events')->insert($events);
    }
}

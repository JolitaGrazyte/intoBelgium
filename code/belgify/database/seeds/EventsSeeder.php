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

        $now = \Carbon\Carbon::now();

        $events = [
            [
                'title'             => 'Event 1',
                'description'       => 'some description...',
                'street_address'    => 'Meir 3',
                'date'              => $now->addDays(6),
                'location_id'       => 1,
                'user_id'           =>  2,
                'created_at'        => $now,
                'updated_at'        => $now

            ],

            [
                'title'             => 'Event 2',
                'description'       => 'some description...',
                'street_address'    => 'Lange Nieuwstraat 126',
                'date'              => $now->addDays(4),
                'location_id'       => 3,
                'user_id'           =>  1,
                'created_at'        => $now,
                'updated_at'        => $now

            ],
            [
                'title'             => 'Event 3',
                'description'       => 'some description...',
                'street_address'    => ' ',
                'date'              => $now->addDays(12),
                'location_id'       => 5,
                'user_id'           =>  3,
                'created_at'        => $now,
                'updated_at'        => $now

            ],

            [
                'title'             => 'Event 4',
                'description'       => 'some description...',
                'street_address'    => ' ',
                'date'              => $now->addDays(22),
                'location_id'       => 6,
                'user_id'           => 12,
                'created_at'        => $now,
                'updated_at'        => $now

            ],


        ];
        DB::table('events')->insert($events);
    }
}

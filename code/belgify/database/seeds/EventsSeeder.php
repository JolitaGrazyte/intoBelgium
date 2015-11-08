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
                'location_id'       => 1,
                'user_id'           =>  2,
                'created_at'        => \Carbon\Carbon::now()->subDays(21),
                'updated_at'        => \Carbon\Carbon::now()->subDays(22),
                'date'              => \Carbon\Carbon::now()->addDays(10)

            ],

            [
                'title'             => 'Event 2',
                'description'       => 'some description...',
                'street_address'    => 'Lange Nieuwstraat 126',
                'location_id'       => 3,
                'user_id'           =>  1,
                'created_at'        => \Carbon\Carbon::now()->subDays(13),
                'updated_at'        => \Carbon\Carbon::now()->subDays(13),
                'date'              => \Carbon\Carbon::now()->addDays(6)

            ],
            [
                'title'             => 'Event 3',
                'description'       => 'some description...',
                'street_address'    => ' ',
                'location_id'       => 5,
                'user_id'           =>  3,
                'created_at'        => \Carbon\Carbon::now()->subDays(12),
                'updated_at'        => \Carbon\Carbon::now()->subDays(12),
                'date'              => \Carbon\Carbon::now()->addDays(16)

            ],

            [
                'title'             => 'Event 4',
                'description'       => 'some description...',
                'street_address'    => ' ',
                'location_id'       => 6,
                'user_id'           => 12,
                'created_at'        => \Carbon\Carbon::now()->subDays(1),
                'updated_at'        => \Carbon\Carbon::now()->subDays(1),
                'date'              => \Carbon\Carbon::now()->addDays(22)

            ],


        ];
        DB::table('events')->insert($events);
    }
}

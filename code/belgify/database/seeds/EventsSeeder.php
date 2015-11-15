<?php

use Illuminate\Database\Seeder;
use App\Event;

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
//
        $events = [
            [
                'title'             => 'Shopping at the market',
                'description'       => 'we are going to visit the market at the square.',
                'street_address'    => 'Meir 3',
                'location_id'       =>  1,
                'user_id'           =>  3,
                'created_at'        => \Carbon\Carbon::now()->subDays(21),
                'updated_at'        => \Carbon\Carbon::now()->subDays(22),
                'date'              => \Carbon\Carbon::now()->addDays(10)

            ],

            [
                'title'             => 'Sorting garbage is useful and fun.',
                'description'       => "in this session, i'll teach you what to do with the garbage we produce.
                                        I'll show you how do you have to sort it. It's a nice and funny session at my place." ,
                'street_address'    => 'Lange Nieuwstraat 126',
                'location_id'       => 3,
                'user_id'           =>  1,
                'created_at'        => \Carbon\Carbon::now()->subDays(13),
                'updated_at'        => \Carbon\Carbon::now()->subDays(13),
                'date'              => \Carbon\Carbon::now()->addDays(6)

            ],
            [
                'title'             => 'How do you get your child subscribed to a school.',
                'description'       => "This session is interesting for parents with children who this next fall have to start going to school." ,
                'street_address'    => 'Kerkstraat 155',
                'location_id'       =>  5,
                'user_id'           =>  5,
                'created_at'        => \Carbon\Carbon::now()->subDays(12),
                'updated_at'        => \Carbon\Carbon::now()->subDays(12),
                'date'              => \Carbon\Carbon::now()->addDays(16)

            ],

            [
                'title'             => 'Sport activities.',
                'description'       => 'A session about sport activities for little children around Antwerp.',
                'street_address'    => 'Boomstesteenweg 120',
                'location_id'       => 3,
                'user_id'           => 7,
                'created_at'        => \Carbon\Carbon::now()->subDays(1),
                'updated_at'        => \Carbon\Carbon::now()->subDays(1),
                'date'              => \Carbon\Carbon::now()->addDays(22)

            ],


        ];
        DB::table('events')->insert($events);

//        factory(Event::class, 50)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->delete();

        for($i=1; $i <= 500; ++$i){

            $votes[] =
                [

                    'comment_id'    =>  rand(1, 200),
                    'user_id'       =>  rand(1, 27)
                ];

        }

//        $votes = [
//            [
//
//                'comment_id'    =>  1,
//                'user_id'    =>  1
//            ],
//
//            [
//
//                'user_id'    =>  2,
//                'comment_id'    =>  1
//            ],
//
//            [
//
//                'user_id'    =>  3,
//                'comment_id'    =>  1
//            ],
//
//            [
//
//                'comment_id'    =>  1,
//                'user_id'    =>  2
//            ],
//
//            [
//
//                'user_id'    =>  2,
//                'comment_id'    =>  2
//            ],
//
//            [
//
//                'user_id'    =>  3,
//                'comment_id'    =>  2
//            ],
//
//        ];

        DB::table('votes')->insert($votes);
    }
}

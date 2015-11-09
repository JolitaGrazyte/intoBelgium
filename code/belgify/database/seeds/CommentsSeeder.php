<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
//
//        $comments = [
//            [
//
//                'body'       => 'answer answer answer answer',
//                'post_id'    =>  1,
//                'user_id'    =>  1
//            ],
//
//            [
//
//                'body'       => 'answer answer answer answer',
//                'user_id'    =>  2,
//                'post_id'    =>  1
//            ],
//
//            [
//
//                'body'       => 'answer answer answer answer',
//                'user_id'    =>  3,
//                'post_id'    =>  1
//            ],
//
//            [
//
//                'body'       => 'answer answer answer answer',
//                'post_id'    =>  1,
//                'user_id'    =>  2
//            ],
//
//            [
//
//                'body'       => 'answer answer answer answer',
//                'user_id'    =>  2,
//                'post_id'    =>  2
//            ],
//
//            [
//
//                'body'       => 'answer answer answer answer',
//                'user_id'    =>  3,
//                'post_id'    =>  2
//            ],
//
//        ];
//
//        DB::table('comments')->insert($comments);

        factory(Comment::class, 50)->create();
    }
}

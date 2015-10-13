<?php

use Illuminate\Database\Seeder;

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

        $comments = [
            [
                'title'      => 'Answer 1',
                'body'       => 'answer answer answer answer',
                'post_id'    =>  1,
                'user_id'    =>  1
            ],

            [
                'title'      => 'Answer 2',
                'body'       => 'answer answer answer answer',
                'user_id'    =>  2,
                'post_id'    =>  1
            ],

            [
                'title'      => 'Answer 3',
                'body'       => 'answer answer answer answer',
                'user_id'    =>  3,
                'post_id'    =>  1
            ],

            [
                'title'      => 'Answer 1',
                'body'       => 'answer answer answer answer',
                'post_id'    =>  1,
                'user_id'    =>  2
            ],

            [
                'title'      => 'Answer 2',
                'body'       => 'answer answer answer answer',
                'user_id'    =>  2,
                'post_id'    =>  2
            ],

            [
                'title'      => 'Answer 3',
                'body'       => 'answer answer answer answer',
                'user_id'    =>  3,
                'post_id'    =>  2
            ],

        ];

        DB::table('comments')->insert($comments);
    }
}

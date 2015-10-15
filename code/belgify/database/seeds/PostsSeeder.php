<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        $posts = [
            [
                'title'      => 'Question 1',
                'body'       => 'question question question question',
                'user_id'    =>  1
            ],
            [
                'title'      => 'Question 2',
                'body'       => 'question question question question',
                'user_id'    =>  1
            ],
            [
                'title'      => 'Question 3',
                'body'       => 'question question question question',
                'user_id'    =>  1
            ],
            [
                'title'      => 'Question 4',
                'body'       => 'question question question question',
                'user_id'    =>  1
            ],

        ];
        DB::table('posts')->insert($posts);
    }
}

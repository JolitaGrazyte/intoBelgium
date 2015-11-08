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
        $now = \Carbon\Carbon::now();

        $posts = [
            [
                'title'      => 'Question 1',
                'body'       => 'question question question question',
                'user_id'    =>  1,
                'created_at' => $now,
                'updated_at'  => $now

            ],
            [
                'title'      => 'Question 2',
                'body'       => 'question question question question',
                'user_id'    =>  1,
                'created_at' => $now,
                'updated_at'  => $now
            ],
            [
                'title'      => 'Question 3',
                'body'       => 'question question question question',
                'user_id'    =>  2,
                'created_at' => $now,
                'updated_at'  => $now
            ],
            [
                'title'      => 'Question 4',
                'body'       => 'question question question question',
                'user_id'    =>  3,
                'created_at' => $now,
                'updated_at'  => $now
            ],

        ];
        DB::table('posts')->insert($posts);
    }
}

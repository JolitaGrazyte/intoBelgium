<?php

use Illuminate\Database\Seeder;
use App\Post;

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
                'title'      => 'Subscribing to a High-School/university.',
                'body'       => 'What is the usual routine for subscribing to a university in Belgium. Can you get some funding.',
                'user_id'    =>  8,
                'created_at' => $now,
                'updated_at'  => $now

            ],
            [
                'title'      => 'What are the student places in this town?',
                'body'       => 'I wonder if there are special places, special caffees where students come together for a talk. I want to apply to a university next year.
                                So, i would like to meet some students and chat about the student life, ask some questions. ',
                'user_id'    =>  8,
                'created_at' => $now,
                'updated_at'  => $now
            ],
            [
                'title'      => 'Child Sick on weekend ?',
                'body'       => 'What do i do if my child is got sick on weekend ?',
                'user_id'    =>  9,
                'created_at' => $now,
                'updated_at'  => $now
            ],
            [
                'title'      => 'Cooking with belgium vegetable...',
                'body'       => "I just came over to Belgium. I'm a cook. I would like to find a job as a chef, but not used to cook with Belgian vegetables.
                                What are the vegetables of the season? And where do i buy them best? ",
                'user_id'    =>  13,
                'created_at' => $now,
                'updated_at'  => $now
            ],

        ];
        DB::table('posts')->insert($posts);
//        factory(Post::class, 50)->create();

    }
}

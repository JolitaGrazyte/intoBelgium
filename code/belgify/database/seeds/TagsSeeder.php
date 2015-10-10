<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        $tags = [
            [
                'name' => 'Garbage',
            ],
            [
                'name' => 'City',
            ],
            [
                'name' => 'Market',
            ],
            [
                'name' => 'Food',
            ],
            [
                'name' => 'Kids',
            ],
            [
                'name' => 'School',
            ],
            [
                'name' => 'University',
            ],
            [
                'name' => 'Transport',
            ],
        ];
        DB::table('tags')->insert($tags);
    }
}
<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = [

            [
                'username'  =>  'Jolita',
                'email'     =>  'test@test.be',
                'password'  =>  Hash::make('testing'),

            ]
        ];
        DB::table('users')->insert($users);

        factory(User::class, 25)->create();

    }
}

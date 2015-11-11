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
                'first_name'    =>  'Jolita',
                'last_name'     =>  'Grazyte',
                'username'      =>  'Jolita',
                'email'         =>  'jolita.grazyte@student.kdg.be',
                'password'      =>  Hash::make('testing'),
                'location_id'   =>  1,
                'role'          =>  1

            ]
        ];
        DB::table('users')->insert($users);

        $users = [

            [
                'first_name'    =>  'Vic',
                'last_name'     =>  'Denys',
                'username'      =>  'Vic Denys',
                'email'         =>  'vic.denys@student.kdg.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  1,
                'role'          =>  1

            ]
        ];
        DB::table('users')->insert($users);

        factory(User::class, 25)->create();

    }
}

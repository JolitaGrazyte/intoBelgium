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

            ],

            [
                'first_name'    =>  'Vic',
                'last_name'     =>  'Denys',
                'username'      =>  'Vic Denys',
                'email'         =>  'vic.denys@student.kdg.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  1,
                'role'          =>  1

            ],

            [
                'first_name'    =>  'Lis',
                'last_name'     =>  'Janssens',
                'username'      =>  'Lis Janssens',
                'email'         =>  'lis.janssens@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Belgium',
                'occupation'    =>  'Teacher',
                'role'          =>  1
            ],
            [
                'first_name'    =>  'Jan',
                'last_name'     =>  'Janssens',
                'username'      =>  'Jan Janssens',
                'email'         =>  'jan.janssens@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Belgium',
                'occupation'    =>  'Dokter',
                'role'          =>  1
            ],

            [
                'first_name'    =>  'Wout',
                'last_name'     =>  'Peters',
                'username'      =>  'Wout Peters',
                'email'         =>  'wout.peters@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Belgium',
                'occupation'    =>  'Student',
                'role'          =>  1
            ],

            [
                'first_name'    =>  'Jakob',
                'last_name'     =>  'Baum',
                'username'      =>  'Jacob Baum',
                'email'         =>  'jacob.baum@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'German',
                'occupation'    =>  'Student',
                'role'          =>  2
            ],

            [
                'first_name'    =>  'Antonella',
                'last_name'     =>  'Alvarez',
                'username'      =>  'Antonella Alvarez',
                'email'         =>  'antonella.alvarez@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Argentina',
                'occupation'    =>  'Housewife',
                'role'          =>  2
            ],

            [
                'first_name'    =>  'Anna',
                'last_name'     =>  'Kovalski',
                'username'      =>  'Anna Kovalski',
                'email'         =>  'anna.kovalski@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Polen',
                'role'          =>  2
            ],
            [
                'first_name'    =>  'Alina',
                'last_name'     =>  'Kabaeva',
                'username'      =>  'Alina Kabaeva',
                'email'         =>  'alina.kabaeva@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Russia',
                'role'          =>  2
            ],
            [
                'first_name'    =>  'Halil',
                'last_name'     =>  'Karan',
                'username'      =>  'Halil Karan',
                'email'         =>  'halil.karan@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Turkey',
                'role'          =>  2
            ],
            [
                'first_name'    =>  'Halil',
                'last_name'     =>  'Karan',
                'username'      =>  'Halil Karan',
                'email'         =>  'halil.karan@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Turkey',
                'role'          =>  2
            ],

//            Ömer Faruk Sorak

            ];
        DB::table('users')->insert($users);

//        factory(User::class, 25)->create();

    }
}

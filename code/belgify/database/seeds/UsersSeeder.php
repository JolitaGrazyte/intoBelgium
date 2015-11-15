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
            //1
            [
                'first_name'    =>  'Jolita',
                'last_name'     =>  'Grazyte',
                'username'      =>  'Jolita',
                'email'         =>  'jolita.grazyte@student.kdg.be',
                'password'      =>  Hash::make('testing'),
                'location_id'   =>  1,
                'role'          =>  1

            ],

            //2
            [
                'first_name'    =>  'Vic',
                'last_name'     =>  'Denys',
                'username'      =>  'Vic Denys',
                'email'         =>  'vic.denys@student.kdg.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  1,
                'role'          =>  1

            ],

            //3
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

            //4
            [
                'first_name'    =>  'Els',
                'last_name'     =>  'De Wachter',
                'username'      =>  'Els De Wachter',
                'email'         =>  'els.dewachter@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Belgium',
                'occupation'    =>  'Social worker',
                'role'          =>  1
            ],

            //5
            [
                'first_name'    =>  'Marijke',
                'last_name'     =>  'De Busser',
                'username'      =>  'Marijke De Busser',
                'email'         =>  'marijke.debusser@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Netherlands',
                'occupation'    =>  '',
                'role'          =>  1
            ],

            //6
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


            //7
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

            //8
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


            //9
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

            //10
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

            //11
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

            //12
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

            //13
            [
                'first_name'    =>  'Abdel',
                'last_name'     =>  'Hanine',
                'username'      =>  'Abdel Hanine',
                'email'         =>  'abdel.hanine@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Morocco',
                'role'          =>  2
            ],

            //14
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

            //15
            [
                'first_name'    =>  'Ömer',
                'last_name'     =>  'Faruk Sorak',
                'username'      =>  'Ömer Faruk Sorak',
                'email'         =>  'omer.faruk.sorak@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Turkey',
                'role'          =>  2
            ],

            //16
            [
                'first_name'    =>  'Salma',
                'last_name'     =>  'Faruk',
                'username'      =>  'Salma Faruk',
                'email'         =>  'salma.faruk@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Morocco',
                'role'          =>  2
            ],


            //17
            [
                'first_name'    =>  'Karima',
                'last_name'     =>  'Sorak',
                'username'      =>  'Karima Sorak',
                'email'         =>  'karima.sorak@telenet.be',
                'password'      =>  Hash::make('test'),
                'location_id'   =>  3,
                'origin'        => 'Morocco',
                'role'          =>  2
            ],


            ];
        DB::table('users')->insert($users);

//        factory(User::class, 25)->create();

    }
}

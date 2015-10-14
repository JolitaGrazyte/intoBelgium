<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    public function findByEmailOrCreate($userData){

//        dd($userData);

        $name = explode(' ', $userData->name);
        $role = 1;

            return User::firstOrCreate([

                'username'  =>  $userData->name,
                'first_name'=>  $name[0],
                'last_name' =>  $name[1],
                'email'     =>  $userData->email,
                'role'      =>  $role


            ]);

    }

}
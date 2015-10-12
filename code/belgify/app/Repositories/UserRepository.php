<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    public function findByEmailOrCreate($userData){

        $name = explode(' ', $userData->name);
        $role = 1;

        return User::firstOrCreate([

            'username'  =>  $userData->username,
            'email'     =>  $userData->email,
            'role'      =>  $role


        ]);
    }



}
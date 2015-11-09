<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\QueryException;

class UserRepository {

    public function findByEmailOrCreate($userData){

        try{
            $name = explode(' ', $userData->name);
            $role = 1;

            return User::firstOrCreate([

                'username'  =>  $userData->name,
                'first_name'=>  $name[0],
                'last_name' =>  $name[1],
                'email'     =>  $userData->email,
                'role'      =>  $role


            ]);

        }catch (QueryException $e){


            if (strpos($e->getMessage(),'Duplicate') !== false) {

                return 'isDuplicate';
            }

        }
    }
}
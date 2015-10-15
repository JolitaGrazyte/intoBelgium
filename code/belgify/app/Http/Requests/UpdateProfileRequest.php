<?php

namespace App\Http\Requests;

//use App\Http\Requests\Request;
//use App\Http\Requests\RegisterRequest;

class UpdateProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ( \Auth::check('auth')) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'username'  => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:4',
            'role'      => 'required|digits_between: 1,2'

        ];
    }
}

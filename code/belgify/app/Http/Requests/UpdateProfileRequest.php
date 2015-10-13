<?php

namespace App\Http\Requests;


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
        $path   = Request::path();
        $pathid = explode('/', $path);
        $id     = $pathid[1];


        return [

            'username'  => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users' . ($id ? ",id,$id" : ''),

        ];
    }
}

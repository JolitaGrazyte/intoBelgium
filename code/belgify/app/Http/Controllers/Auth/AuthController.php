<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\AuthenticateUser;
use App\AuthenticateUserListener;
use Illuminate\Auth\Guard;
use Illuminate\Http\Response;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;


class AuthController extends Controller implements AuthenticateUserListener
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    protected $redirectPath =   '/dashboard';

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     * @param Guard $auth
     */
    public function __construct( Guard $auth )
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    public function postLogin( Request $request){

        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($request->ajax()) {
            if($this->auth->attempt($credentials, $request->has('remember'))){
                return response()->json([redirect()->intended($this->redirectPath())->getTargetUrl()]);
            }
        }

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect()->intended($this->redirectPath());
        }



        return redirect($this->loginPath())

            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);

    }


    public function postRegister( RegisterRequest $request ){

        $user = $this->create($request);

        if($user) $this->auth->login($user);

        return redirect()->route('dashboard');

    }
//
//    /**
//     * Get a validator for an incoming registration request.
//     *
//     * @param  array  $data
//     * @return \Illuminate\Contracts\Validation\Validator
//     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|confirmed|min:6',
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param $request
     * @return User
     * @internal param array $data
     */
    protected function create($request)
    {
        return User::create([
            'role'      => $request->get('role'),
            'username'  => $request->get('username'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password')),
        ]);
    }

    /**
     * Login with some social provider, like facebook, twiiter and google+.
     *
     * @param AuthenticateUser $authenticateUser
     * @param Request $request
     * @param null $provider
     * @return mixed
     */
    public function login( AuthenticateUser $authenticateUser, Request $request, $provider = null)
    {

        return $authenticateUser->execute($request->has('code'), $this, $provider);

    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userHasLoggedIn($user)
    {

        Session::flash('message', 'Welcome, ' . $user->first_name.' '. $user->last_name);

        return redirect()->route('dashboard');
    }

}

<?php

namespace App;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\UserRepository;


class AuthenticateUser {

    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Guard
     */
    private $auth;

    /**
     * @param UserRepository $users
     * @param Socialite $socialite
     * @param Guard $auth
     */
    public function __construct( UserRepository $users, Socialite $socialite, Guard $auth ){

        $this->users     = $users;
        $this->socialite = $socialite;
        $this->auth      = $auth;
    }

    /**
     * @param $hasCode
     * @param $listener
     * @param $social_provider
     * @return mixed
     */
    public function execute( $hasCode, AuthenticateUserListener $listener, $social_provider ){

        if(!$hasCode) return $this->getAuthorizationFirst($social_provider);

        $user = $this->users->findByEmailOrCreate($this->getSocialUser($social_provider));
        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);

    }

    /**
     * @param $social_provider
     * @return mixed
     */
    public function getAuthorizationFirst($social_provider){

        return $this->socialite->driver($social_provider)->redirect();
    }

    /**
     * @param $social_provider
     * @return \Laravel\Socialite\Contracts\User
     */
    private function getSocialUser($social_provider)
    {
        return $this->socialite->driver($social_provider)->user();
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class GitHubAuthController extends Controller {

    public function auth () {
        return Socialite::driver ('github') -> redirect ();
    }

    public function callback () {

        $user = $this -> findOrCreateUser (Socialite::driver ('github') -> user ());

        Auth::login ($user);

        return redirect () -> action ('CommentController@index');

    }

    private function findOrCreateUser ($githubUser) {

        return User::firstOrCreate ([
            'github_id' => $githubUser -> getId ()
        ], [
            'name' => $githubUser -> getName (),
            'email' => $githubUser -> getEmail (),
            'password' => bcrypt (Str::random (32)),
        ]);
    }

}

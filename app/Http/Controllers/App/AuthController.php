<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\AuthLoginRequest;
use App\Http\Requests\App\AuthRegisterRequest;
use App\User;
use App\UserProfile;

class AuthController extends Controller
{
    public function login() {
        return view('app.auth.login');
    }

    public function doLogin(AuthLoginRequest $request) {

        if(auth()->attempt(["email" => $request->get('email'), "password" => $request->get('password')], $request->has('remember')))
            return redirect()->route('app.dashboard.index');
        else
            return redirect()->route('app.auth.login')->withInput()->withErrors(["email" => trans('login.failed')]);

    }

    public function register() {
        return view('app.auth.register');
    }

    public function doRegister(AuthRegisterRequest $request) {

        $user = new User();
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->is_active = true;
        $user->save();

        $profile = new UserProfile();
        $profile->user_id = $user->id;
        $profile->firstname = $request->get('firstname');
        $profile->surname = $request->get('surname');
        $profile->save();

        auth()->login($user);
        return redirect()->route('app.dashboard.index');
    }
}

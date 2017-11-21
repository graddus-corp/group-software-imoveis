<?php

namespace GroupSoftware\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GroupSoftware\Helpers\ActionBar;

class AuthController extends Controller {

    public function index() {
        return view('auth.index');
    }

    public function signin(Request $request) {
        $email = $request->input('email');
        $password = $request->input('pass');

        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            ActionBar::create(ActionBar::CSS_ERRORS, trans('messages.login_failed'));

            return redirect()->back()->with(array('email' => $email));
        }

        return redirect()->route('properties.index');
    }

    public function signout() {
        Auth::logout();

        return redirect()->route('authentication.index');
    }
}

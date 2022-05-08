<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  string  $username/email
     * @param string $password
     * @param string $passwordConfirm
     * @return \Illuminate\View\View
     */
    public function login(Request $request)
    {
        $input = $request->all();

        if (strlen($input['email']) == 0 || strlen($input['password']) == 0)
            return view('login', ['alert' => (object)array('type' => 'danger', 'message' => 'Missing Required Fields!')]);

        $account = Account::where('email', $input['email'])->first(); //if email found



        if ($account) {
            if (password_verify($input['password'], $account->password))
                return redirect("/dashboard?success=true"); //password matches

            return view('login', ['alert' => (object)array('type' => 'danger', 'message' => 'The password you entered is incorrect!')]);

        }

        return view('login', ['alert' => (object)array('type' => 'danger', 'message' => 'Your account is not registered')]);
    }

    /**
     * Show the profile for a given user.
     *
     * @param  string  $username/email
     * @return \Illuminate\View\View
     */
    public function logout()
    {
    }

    /**
     * Show the profile for a given user.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function register(Request $request)
    {
        $input = $request->all();

        if (strlen($input['email']) == 0 || strlen($input['password']) == 0 || strlen($input['confirm_password']) == 0 || strlen($input['first_name']) == 0 || strlen($input['last_name']) == 0) {
            return view('register', ['alert' => (object)array('type' => 'danger', 'message' => 'Missing required fields!')]);
        }

        if ($input['password'] != $input['confirm_password'])
            return view('register', ['alert' => (object)array('type' => 'danger', 'message' => 'Passwords do not match!')]);

        $account = Account::where('email', $input['email'])->first();
        if ($account)
            return view('register', ['alert' => (object)array('type' => 'danger', 'message' => 'Account already exists!')]);

        $account = new Account([
            'email' => $input['email'],
            'password' => password_hash($input['password'], PASSWORD_DEFAULT),
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
        ]);

        if ($account->save())
            return redirect('/login?success=true');
        return view('register', ['alert' => (object)array('type' => 'danger', 'message' => 'Account could not be created!')]);
    }
}

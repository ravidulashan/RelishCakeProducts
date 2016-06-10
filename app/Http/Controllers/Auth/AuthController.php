<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function authenticate(Request $req)
    {
        // Recieve the input from request object and check whether the input is in database
        $email = $req->input('email');
        $password = $req->input('password');


        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Auth::login(Auth::user());
            return redirect()->intended('/');
        } else {
            $req->session()->put('error', 'Email address or password is/are invalid. Try again!');
            return redirect('/login')->with('error', 'Email address or password is/are invalid. Try again!');
        }
    }


    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
//        return 'asdasd';
        return redirect('/');
    }
    /* public function __construct()
     {
         $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
     }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /* protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => 'required|max:255',
             'email' => 'required|email|max:255|unique:users',
             'password' => 'required|min:6|confirmed',
         ]);
     }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
}
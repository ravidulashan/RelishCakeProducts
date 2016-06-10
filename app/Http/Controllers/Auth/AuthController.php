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

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

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


    public function checkAvailability(Request $request)
    {

        $email = $request->input('email');
        if ($user = User::where('email', '=', $email)->first()) {
            return json_encode(false);
        }
        return json_encode(true);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function registerUser(Request $request)
    {

         $fname = $request->input('firstname');
         $lname = $request->input('lastname');
         $gender = $request->input('gender');
         $days = $request->input('days');
         $months = $request->input('months');
         $years = $request->input('years');
         $tel = $request->input('telephone');
         $email = $request->input('email');
         $password = $request->input('password');

         $user = new User();
         $user->first_name = $fname;
         $user->last_name = $lname;
         $user->email = $email;
         $user->password = bcrypt($password);
         $user->confirmed = 0;
         $user->confirmation_code = uniqid() . time();
         $user->gender = $gender;
         $user->birthday = $years . '-' . $months . '-' . $days;
         $user->tel_no = $tel;
         $user->user_type = 1;
         $user->reg_date = date('Y-m-d');
         $user->save();

         if (Auth::attempt(['email' => $email, 'password' => $password])) {
             Auth::login(Auth::user());
             return redirect()->intended('/');
         } else {
             // On failure redirect to the login page
             $request->session()->put('error', 'Critical error, please contact the admin. Thank you!');
             return redirect('/login');
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

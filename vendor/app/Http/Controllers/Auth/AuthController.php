<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
//    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return redirect('/home');
    }
    
//    public function postLogin() {
//
//        if (Auth::check()) {
//            if (Auth::user()->rol_id == 1) {
//                return Redirect::to('/admin/');
//            }
//            else{
//                return Redirect::to('/operator/');
//            }
//        }
//    }
    
    public function postLogin(Request $request)
    {

        $tvar = $request->input('email');
        $pw = $request->input('password');
        
         $usuario = array(
            'email' => $tvar,
            'password' => $pw
        );
        
        if (Auth::attempt($usuario,$request->input('remember-me', 0))){
            if (Auth::user()->rol_id == 1) {
                return redirect('/admin/home');
            }else if (Auth::user()->rol_id == 2){
                return redirect('/operator/home');
            }
        }else{
            return view('auth.login')->with('errorslog',"User or password invalid");
        }


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
//            'rol_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rol_id' => $data['rol_id'],
        ]);
    }
}

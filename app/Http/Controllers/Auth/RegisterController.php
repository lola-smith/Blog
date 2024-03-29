<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\VerifyUser;
use App\Mail\VerifyEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
  

        $VerifyUser=new VerifyUser();
        $VerifyUser->user_id=$user->id;
        $VerifyUser->token=str_random(50);
        $VerifyUser->save();

        Mail::to($user->email)->send(new VerifyEmail($user));
        return $user; 
    }

    protected function registered(Request $request, $user)
    {
        //

        $this->guard()->logout();
        return redirect()->route('login')->with('success','accont created you need to verified youre email frist '); 
    }
    public function verifyEmail($token){

        $verifyUser = VerifyUser::where('token',$token)->firstOrFail();
        
        if($verifyUser->user->verified){
            return redirect()->route('login')->with('error','this accont has been verifyed allredy'); 

        }
        else{
            $verifyUser->user->verified=true;
            $verifyUser->user->save();
            return redirect()->route('login')->with('success','your email is verified successfully'); 

        }
    }
}

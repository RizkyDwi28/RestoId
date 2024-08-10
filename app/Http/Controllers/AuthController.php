<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage(){
        return view('user.login');
    }

    public function loginAction(Request $request){
        
        $credentials = [
           'email' => $request->email,
           'password' => $request->password
        ];

        if($request->remember != null){
            Cookie::queue('emailCookie',$request->email,30);
        }

        if(Auth::attempt($credentials,true)){
            $user = DB::table('users')->where('email','=',$request->email)->first();
            
            session()->put('currUserSession', $user);

            return redirect(route('home'))->with('message', 'Successfully login as '.$user->username.'.');
        }

        return back()->withErrors(['message' => 'Invalid Credentials']);
    }

    public function registerPage(){
        return view('user.register');
    }

    public function registerAction(Request $request){
        $rules = [
            'username' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        
        $user->role_id = 2;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new WelcomeMail($data));

        $user->save();

        return redirect(route('login.page'))->with('message','Successfully register new account for '.$user->username.'.' );
    }

    public function logout(){
        $user = Auth::user();

        Auth::logout();

        session()->flush();

        return redirect(route('login.page'))->with('message','Successfully logout from '.$user->username.'.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function editProfile(){
        $user_id  = session()->get('currUserSession')->id;
        
        $user = User::find($user_id);

        $data = [
            'user' => $user
        ];

        return view('user.edit.profile',$data);
    }
    
    public function updateProfile(Request $request){
        
        $user_id = session()->get('currUserSession')->id;
        
        $rules = [
            'username' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$user_id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($user_id);

        $user->username = $request->username;
        $user->email = $request->email;

        $user->save();

        return back()->with('message', 'Successfully update profile.');
    }

    public function editPassword(){
        return view('user.edit.password');
    }

    public function updatePassword(Request $request){
        
        $rules = [
            'old_password' => 'required|min:6|current_password',
            'new_password' => 'required|min:6|different:old_password',
            'confirm_new_password' => 'required|min:6|same:new_password'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = session()->get('currUserSession')->id;

        $user = User::find($user_id);

        $user->password = bcrypt($request->new_passowrd);

        $user->save();

        return back()->with('message', 'Successfully update password.');
    }
}

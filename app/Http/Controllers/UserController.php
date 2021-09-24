<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function showLogin(){
        return view('login');
    }

    public function showRegister(){
        return view('register');
    }

    public function login(request $request){
        if(
            Auth::attempt([
                'matric_no' => request('email'), 
                'password' => request('password') 
            ])||
            Auth::attempt([
                'email' => request('email'), 
                'password' => request('password')
            ])
        ){
            $user = Auth::user(); 
            Auth::login($user); 

            return redirect('/');
          
        }else{
            return redirect('/login');
        }
    }

    public function register(request $request){
        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'matric_no' => 'required|unique:users',
    		'password' => 'required',
        ]);

        if($validation->fails()){
            return redirect('/register');
        }

        $user['uuid'] = Str::uuid();
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['matric_no'] = $request->matric_no;
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        $user['user_type'] = 'student';
        
        $user = User::create($user);
        Auth::login($user);

        return redirect('/');
    }
}

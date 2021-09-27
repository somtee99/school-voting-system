<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function showLogin(){
        return view('admin.login');
    }

    public function login(request $request){
        if(
            Auth::attempt([
                'email' => request('email'), 
                'password' => request('password')
            ])
        ){
            $user = Auth::user(); 
            Auth::login($user); 

            return redirect('/');
          
        }else{
            return redirect('/admin/election/create');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;

class UserController extends Controller
{
    function login(Request $req)
    {
        $crediential = $req->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        $user= User::where(['email'=>$req->email])->first();
        if (Auth::attempt($crediential)) {
            $req->session()->put('loginuser', $user);
            if($user->roleid==1)
            {
                //admin
                return redirect('/Admin');
            }
            elseif($user->roleid==2)
            {
                //cashier
                return redirect('/cashier');
            }
            elseif($user->roleid==3)
            {
                //tourcompany
                return redirect('/tourcst');
            }

        }
        else{
            return "username or password does not match";
        }

    }
    function adduser(Request $req)
    {
        $data = $req->input();
        try{
            $person = new User;
            $person->name = $data['name'];
            $person->username = $data['username'];
            $person->password=Hash::make($data['password']);
            $person->email = $data['email'];
            $person->roleid = $data['roleid'];
            $person->save();
            return redirect('/sigin')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/signin')->with('failed',"operation failed");
        }
    }
}

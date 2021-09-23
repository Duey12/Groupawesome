<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class logout extends Controller
{
   function userlogout(){
     Session::flush();
     return redirect('/signin');
   }
}

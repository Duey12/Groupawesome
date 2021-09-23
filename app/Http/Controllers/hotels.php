<?php

namespace App\Http\Controllers;
use App\Models\hotel;

use Illuminate\Http\Request;

class hotels extends Controller
{
  function hotel(){
    $hotels=hotel::all();
    return view('hotel',['hotel'=>$hotels]);
  }
}

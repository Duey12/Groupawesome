<?php

namespace App\Http\Controllers;
use App\Models\tour_comp;

use Illuminate\Http\Request;

class tour extends Controller
{
  function tours(){
    $tour=tour_comp::all();
    return view('tour',['tour'=>$tour]);
  }
}

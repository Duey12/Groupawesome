<?php

namespace App\Http\Controllers;
use App\Models\hotel;

use Illuminate\Http\Request;

class adminhotel extends Controller
{
  function hotel(){
    $hotels=hotel::all();
    return view('adminhotel',['hotel'=>$hotels]);
  }
  function addhotel(Request $request){
    hotel::insert(['hotel_name'=>$request->hname]);
    return redirect('/adminhotel');
  }
  function deletehotel(Request $request){
    hotel::where('hotel_id',$request->hotel)->delete();
    return redirect('/adminhotel');
  }
}

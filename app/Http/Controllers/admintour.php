<?php

namespace App\Http\Controllers;
use App\Models\tour_comp;

use Illuminate\Http\Request;

class admintour extends Controller
{
  function tours(){
    $tour=tour_comp::all();
    return view('admintour',['tour'=>$tour]);
  }
  function addtour(Request $request){
    tour_comp::insert(['tour_comp_name'=>$request->tname]);
    return redirect('/admintour');
  }
  function deletetour(Request $request){
    tour_comp::where('tour_comp_id',$request->tour)->delete();
    return redirect('/admintour');
  }
}

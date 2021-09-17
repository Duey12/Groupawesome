<?php

namespace App\Http\Controllers;

use App\Models\programme;
use App\Models\cost;
use App\Models\guest;
use App\Models\excurison;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //
    function  walkinview(Request $request){
        $programmes=programme::all();
        return view('create_walkin',['programmes'=>$programmes,'booking'=>$request->booking]);
    }

    function  walkin(Request $request){
      if($request->booking){
        $cost=cost::where('programme_id',$request->programme)->first();
        $adult_cost=$cost->adult_cost*$request->adults;
        $children_cost=$cost->children_cost*$request->children;
        $total_cost=$adult_cost+$children_cost;
        $excursion=excurison::insert(['date_booked'=>date('Y-m-d'),'exc_date'=>$request->date,
        'adults_num'=>$request->adults,'child_num'=>$request->children,'child_cost'=>$children_cost,
        'adult_cost'=>$adult_cost,'total_cost'=>$total_cost,'booking_id'=>$request->booking,'programme_id'=>$request->programme]);
        return redirect('/pay');
      }
    $cost=cost::where('programme_id',$request->programme)->first();
    $adult_cost=$cost->adult_cost*$request->adults;
    $children_cost=$cost->children_cost*$request->children;
    $total_cost=$adult_cost+$children_cost;
    $user_id=guest::insertGetId(['guest_name'=>$request->gname]);
    $booking_id=booking::insertGetId(['guest_id'=>$user_id,'guest_type'=>'walk in','total_cost'=>$total_cost,'booking_date'=>date('Y-m-d H:i:s')]);
    $excursion=excurison::insert(['date_booked'=>date('Y-m-d'),'exc_date'=>$request->date,
    'adults_num'=>$request->adults,'child_num'=>$request->children,'child_cost'=>$children_cost,
    'adult_cost'=>$adult_cost,'total_cost'=>$total_cost,'booking_id'=>$booking_id,'programme_id'=>$request->programme]);
    session()->put('user_id',$user_id);
    session()->put('user',$request->gname);
    return redirect('/pay');
  }
}

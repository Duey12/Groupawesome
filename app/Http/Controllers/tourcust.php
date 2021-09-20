<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\programme;
use App\Models\cost;
use App\Models\guest;
use App\Models\excurison;
use App\Models\booking;
use App\Models\hotel_rese;
use App\Models\tour;

use Illuminate\Support\Facades\DB;
use App\Models\hotel;
use App\Models\tour_comp;
class tourcust extends Controller
{
    function maketour(Request $request){
      if($request->booking){
        $cost=cost::where('programme_id',$request->programme)->first();
        $adult_cost=$cost->adult_cost*$request->adults;
        $children_cost=$cost->children_cost*$request->children;
        $total_cost=$adult_cost+$children_cost;
        $excursion=excurison::insert(['date_booked'=>date('Y-m-d'),'exc_date'=>$request->date,
        'adults_num'=>$request->adults,'child_num'=>$request->children,'child_cost'=>$children_cost,
        'adult_cost'=>$adult_cost,'total_cost'=>$total_cost,'booking_id'=>$request->booking,'programme_id'=>$request->programme]);
        $updatebookingcost=booking::where('booking_id',$request->booking)->increment('total_cost',$total_cost);
        return redirect('/pay');
      }
      $cost=cost::where('programme_id',$request->programme)->first();
      $adult_cost=$cost->adult_cost*$request->adults;
      $children_cost=$cost->children_cost*$request->children;
      $total_cost=$adult_cost+$children_cost;
      $user_id=guest::insertGetId(['guest_name'=>$request->gname]);
      $tour_add=tour::insertGetId(['tour_comp_id'=>$request->tour,'guest_id'=>$user_id]);
      $hotel_add=hotel_rese::insertGetId(['hotel_id'=>$request->hotel,'guest_id'=>$user_id]);
      $booking_id=booking::insertGetId(['guest_id'=>$user_id,'guest_type'=>'Tour guest','total_cost'=>$total_cost,'booking_date'=>date('Y-m-d H:i:s')]);
      $excursion=excurison::insert(['date_booked'=>date('Y-m-d'),'exc_date'=>$request->date,
      'adults_num'=>$request->adults,'child_num'=>$request->children,'child_cost'=>$children_cost,
      'adult_cost'=>$adult_cost,'total_cost'=>$total_cost,'booking_id'=>$booking_id,'programme_id'=>$request->programme]);
      session()->put('user_id',$user_id);
      session()->put('user',$request->gname);
      session()->put('type','walkin');
      session()->put('booking_id',$booking_id);
      return redirect('/pay');
    }
}

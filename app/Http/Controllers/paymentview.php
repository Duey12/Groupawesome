<?php

namespace App\Http\Controllers;
use App\Models\programme;
use App\Models\cost;
use App\Models\guest;
use App\Models\excurison;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentview extends Controller
{
    function payment(){
      $user_id=session('user_id');
      $user=guest::where('guest_id',$user_id)->first();
      $booking=DB::table('bookings')->join('excurisons','excurisons.booking_id','=','bookings.booking_id')->
      join('programmes','programmes.programme_id','=','excurisons.programme_id')->
      where('bookings.guest_id',$user_id)->get();
      $booking_info=json_decode(json_encode($booking), true);
      return view('excursionbookingview',['user'=>$user,'booking'=>$booking_info]);
    }
}

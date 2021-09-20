<?php

namespace App\Http\Controllers;
use App\Models\programme;
use App\Models\cost;
use App\Models\guest;
use App\Models\excurison;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use session;
class paymentview extends Controller
{
    function payment(){
      if(session('type')){
        $user_id=session('user_id');
        $user=guest::where('guest_id',$user_id)->first();
        $booking=DB::table('bookings')->join('excurisons','excurisons.booking_id','=','bookings.booking_id')->
        join('programmes','programmes.programme_id','=','excurisons.programme_id')->
        where('bookings.guest_id',$user_id)->get();
        $booking_info=json_decode(json_encode($booking), true);
        if($booking_info==NULL){
          Session::flush();
          return redirect('/');
        }
        $userhotel=DB::table('hotels')->join('hotel_reservations','hotel_reservations.hotel_id','=','hotels.hotel_id')->
        where('hotel_reservations.guest_id',$user_id)->get();
        $hotel=json_decode(json_encode($userhotel), true);
        $usertour=DB::table('tours')->join('tour_companys','tour_companys.tour_comp_id','=','tours.tour_comp_id')->
        where('tours.guest_id',$user_id)->get();
        $tour=json_decode(json_encode($usertour), true);
        return view('pay',['user'=>$user,'hotel'=>$hotel,'booking'=>$booking_info,'tour'=>$tour]);
      }
      $user_id=session('user_id');
      $user=guest::where('guest_id',$user_id)->first();
      $booking=DB::table('bookings')->join('excurisons','excurisons.booking_id','=','bookings.booking_id')->
      join('programmes','programmes.programme_id','=','excurisons.programme_id')->
      where('bookings.guest_id',$user_id)->get();
      $booking_info=json_decode(json_encode($booking), true);
      if($booking_info==NULL){
        Session::flush();
        return redirect('/');
      }
      return view('pay',['user'=>$user,'booking'=>$booking_info]);
    }
}

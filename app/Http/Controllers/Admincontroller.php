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

class Admincontroller extends Controller
{
  function booking(){
    $booking=DB::table('bookings')->join('guests','bookings.guest_id','=','guests.guest_id')->get();
    $booking_info=json_decode(json_encode($booking), true);
    return view('Admin',['booking'=>$booking_info]);
  }
  function selectbooking(Request $request){
    $booking=DB::table('bookings')->join('excurisons','excurisons.booking_id','=','bookings.booking_id')
    ->join('programmes','programmes.programme_id','=','excurisons.programme_id')->
    join('guests','guests.guest_id','=','bookings.guest_id')->
    join('payments','payments.booking_id','=','bookings.booking_id')->where('bookings.guest_id',$request->booking)->get();
    $guest=DB::table('guests')->join('hotel_reservations','hotel_reservations.guest_id','=','guests.guest_id')->
    join('hotels','hotels.hotel_id','=','hotel_reservations.hotel_id')->
    join('tours','guests.guest_id','=','tours.guest_id')->join('tour_companys','tour_companys.tour_comp_id','=','tours.tour_comp_id')
    ->where('guests.guest_id',$request->guest_id)->get();
    $booking_info=json_decode(json_encode($booking), true);
    $guest_info=json_decode(json_encode($guest), true);
    return view('select_booking',['guest'=>$guest_info,'booking'=>$booking_info]);
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\programme;
use App\Models\cost;
use App\Models\guest;
use App\Models\excurison;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class make_payment extends Controller
{
  public function makepmnt(Request $req){
      $booking_id=session()->get('booking_id');
      $cnum=md5(uniqid());
      if($req->cash=='cash'){
          //Do validation requirements here them it will move unto inserting in DB

          DB::table('payments')->insert([
              'payment_type'=>$req->cash,
              'date_paid'=> date('Y-m-d H:i:s'),
              'amt_paid'=> $req->amnt_rec,
              'booking_id' => $booking_id,
              'confirm_num' => $cnum
              ]);
      }
      elseif($req->card=='card'){
          $amnt_paid=session()->get('tcost');

          //Do validation requirements here them it will move unto inserting in DB

          DB::table('payments')->insert([
          'payment_type'=>$req->card,
          'date_paid'=> date('Y-m-d H:i:s'),
          'amt_paid'=>$amnt_paid,
          'booking_id' => $booking_id,
              'confirm_num' => $cnum
//          You can create columns in paymnt table to accommodate these
//            $req->card_num,
//            $req->card_holder,
//            $req->exp_date,
//            $req->cvc,
          ]);
      }
      //session cleared to gain access to new guest
      session()->flush();
      session()->regenerateToken();
  return view('paymentconfirmed',['con_num'=>$cnum]);
  }
}

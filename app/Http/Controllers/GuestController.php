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
    //used to clear session when testing
    function clear(){
        session()->flush();
        session()->regenerateToken();
        return redirect('/walkin');
    }

    function  walkinview(Request $request){

        $programmes=programme::all();
        return view('create_walkin',['programmes'=>$programmes,'booking'=>$request->booking]);
    }

    function  walkin(Request $request){

        if($request->booking){

            $cost=cost::where('programme_id',$request->programme)->first();
            $adult_cost = $cost->adult_cost * $request->adults;

            $children_cost=$cost->children_cost * $request->children;
            $total_cost=$adult_cost+$children_cost;
//          dd($total_cost);
            $excursion=excurison::insert([
                'date_booked'=>date('Y-m-d'),
                'exc_date'=>$request->date,
                'adults_num'=>$request->adults,
                'child_num'=>$request->children,
                'child_cost'=>$children_cost,
                'adult_cost'=>$adult_cost,
                'total_cost'=>$total_cost,
                'booking_id'=>$request->booking,
                'programme_id'=>$request->programme]);
            return redirect('/pay');
        }

        $cost=cost::where('programme_id',$request->programme)->first();

        $adult_cost=$cost->adult_cost*$request->adults;
        $children_cost=$cost->children_cost*$request->children;
        $total_cost=$adult_cost+$children_cost;
        $user_id=guest::insertGetId(['guest_name'=>$request->gname]);

         //$tcost=session()->get('tcost');
         //dd($total_cost);
        $booking_id=booking::insertGetId([
            'guest_id'=>$user_id,
            'guest_type'=>'walk in',
            'total_cost'=>'0.00', //set total cost here from the session created
            'booking_date'=>date('Y-m-d H:i:s')
        ]);

        $excursion=excurison::insert([
            'date_booked'=>date('Y-m-d'),
            'exc_date'=>$request->date,
            'adults_num'=>$request->adults,
            'child_num'=>$request->children,
            'child_cost'=>$children_cost,
            'adult_cost'=>$adult_cost,
            'total_cost'=>$total_cost,
            'booking_id'=>$booking_id,
            'programme_id'=>$request->programme]);

            session()->put('booking_id',$booking_id);
            session()->put('user_id',$user_id);
            session()->put('user',$request->gname);
            return redirect('/pay');
    }

    function makepmntview(){
        //shows the payment view only
    return view('makepayment');
    }

    public function makepmnt(Request $req){
        $booking_id=session()->get('booking_id');
        $cnum= session()->get('cnum');
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
        $amnt_paid=session()->get('tcost');
        DB::table('bookings')->where('booking_id','=',$booking_id)->update([
            'total_cost'=>$amnt_paid
            ]);

        //session cleared to gain access to new guest
        session()->flush();
        session()->regenerateToken();
    return view('paymentconfirmed');
    }
}

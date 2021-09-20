<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class make_paymentview extends Controller
{
  function makepmntview(){
      //shows the payment view only
  return view('makepayment');
  }
}

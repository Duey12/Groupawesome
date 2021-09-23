<?php

namespace App\Http\Controllers;
use App\Models\programme;
use App\Models\cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class programmes extends Controller
{
  function programinfo(){
      $data=DB::table('programmes')->join('costs','costs.programme_id','=','programmes.programme_id')->get();
      $programmes=json_decode(json_encode($data), true);
       return view('dolphincoveprogrammes',['datastorage'=>$programmes]);
      }
}

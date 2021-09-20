<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\programme;
use App\Models\cost;
use Illuminate\Support\Facades\DB;

class ProgrammesController extends Controller
{
    //This method displays programme info table format
    // See programmes blade
    function programinfo(){
        $data=DB::table('programmes')->join('costs','costs.programme_id','=','programmes.programme_id')->get();
        $programmes=json_decode(json_encode($data), true);
         return view('programmes',['datastorage'=>$programmes]);
        }



        // This method stores new programe details inside the programme DB
        // See addprogramme blade
            function addprogramme(Request $request){
            $programme_id=programme::insertGetId(['programme_name'=>$request->pname]);
            $booking=cost::insert(['programme_id'=>$programme_id,'adult_cost'=>$request->adult_cost,'children_cost'=>$request->children_cost]);
            return redirect('/programmes');

        }

        // Method to display programe data
        // See updateprogrammeinfo blade
        function programmeshowdata(Request $id){
          $data=DB::table('programmes')->join('costs','costs.programme_id','=','programmes.programme_id')->
          where('programmes.programme_id',$id->id)->get();
          $programmes=json_decode(json_encode($data), true);
            return view('updateprograminfo',['datastorage'=>$programmes]);
        }

        //Method will save changes made to programme table
        // See updateprogrammeinfo blade

        function updateprogramdata(Request $req){
            // return $req->input();
            $data=programme::where('programme_id',$req->id)->update(['programme_name'=>$req->pname]);
            $cost=cost::where('programme_id',$req->id)->update(['adult_cost'=>$req->adult_cost,'children_cost'=>$req->children_cost]);
            return redirect('programmes');

        }

        //Method will delete programme form programe table
        // See programme blade
        function programdelete($id){
            $data=programme::where('programme_id',$id);
            $cost=cost::where('programme_id',$id)->delete();
            $data->delete();
            return redirect("programmes");

        }


            }

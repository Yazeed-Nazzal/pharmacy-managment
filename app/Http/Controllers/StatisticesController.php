<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Drug;
use Carbon\Carbon;
class StatisticesController extends Controller
{
    public function statistices(){
        $today = Carbon::today();
        $admin =count( User::role('admin')->get());
        $drugs = count( Drug::all() );
        $finish_drug = count( Drug::where('count',0)->get() );
        $expire_drug =count( Drug::where('expired_date','<',$today)->get() );
        $finish = Drug::where('count',0)->orderBy('id','desc')->limit(5)->get();
        $expired = Drug::where('expired_date','<',$today)->orderBy('id','desc')->limit(5)->get();
        return view('statistices.index',compact(['admin','drugs','finish_drug','expire_drug','finish','expired']));
    }


    public function all_drug_expired(){
        $today = Carbon::today();
        $expired = Drug::where('expired_date','<',$today)->get();
        return view('statistices.expired_drugs' , compact('expired'));
    }

    public function all_drug_finish(){
        $finish = Drug::where('count',0)->get();
        return view('statistices.finish_drugs',compact('finish'));
    }
}



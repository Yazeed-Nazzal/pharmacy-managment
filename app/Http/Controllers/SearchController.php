<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
class SearchController extends Controller
{
    public function search(Request $request){

        $name = $request->name;
        $s_name = $request->input('s_name');
        $price = $request->input('price');

        $drugs =  Drug::get();
       
        if($name){
            $drugs =  Drug::where('name','like','%'.$name.'%')->get();
        }

        if($s_name){
            $drugs = Drug::where('s_name','like','%'.$s_name.'%')->get();
        }

        if($price){
            $drugs = Drug::where('price',$price)->get();
        }

        return view('search.filter_drug',compact('drugs'));
    }
}

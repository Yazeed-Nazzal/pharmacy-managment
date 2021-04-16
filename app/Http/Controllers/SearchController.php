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
            $drugs =  $drugs->where('name',$name);
        }

        if($s_name){
            $drugs = $drugs->where('s_name','like',$s_name);
        }

        if($price){
            $drugs = $drugs->where('price',$price);
        }

        

        return view('search.filter_drug',compact('drugs'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::all();
        return view("drug.index",compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drugs = Drug::all();
        return view('drug.create',compact('drugs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            's_name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'count'=>'required',
            'expired_date'=>'required',
            'place'=>'required',
            'image_drug'=>'required',

        ]);

         $drug = Drug::create([
            'name'=>$data['name'],
            's_name'=>$data['s_name'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'count'=>$data['count'],
            'expired_date'=>$data['expired_date'],
            'place'=>$data['place'],
            'buying_count'=>0,
            'alternative_id'=>$request->alternative_drug,
        ]);

        if($request->hasFile('image_drug')){
            $image_name = rand(0,9999).'_'.$request->image_drug->getClientOriginalName();
            $request->image_drug->move(public_path('uploads'),$image_name);
            $drug->image()->create(array('name' => $image_name));
        }

        session()->flash('success','Add Drug Successfully');

        return redirect()->route('drug.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        if ($drug->alternative_id == null){
            $alternativeDrugs = Drug::where('alternative_id',$drug->id)->get();

        }
        else{
            $alternativeDrugs = Drug::where('id',$drug->alternative_id)->get();
        }
        return view('drug.show',compact('drug','alternativeDrugs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        $drugs = Drug::all();
        return view('drug.edit',compact('drug','drugs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drug $drug)
    {
        $data = $request->validate([
            'name'=>'required',
            's_name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'count'=>'required',
            'expired_date'=>'required',
            'place'=>'required',
        ]);

           $drug->update([
            'name'=>$data['name'],
            's_name'=>$data['s_name'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'count'=>$data['count'],
            'expired_date'=>$data['expired_date'],
            'place'=>$data['place'],
            'alternative_id'=>$request->alternative_drug,
        ]);

        if($request->hasFile('image_drug')){
            $image_drug = Image::where('imageable_id',$drug->id)->get();
            $image_path = public_path('uploads') .'\\'. $image_drug[0]->name;
            File::delete($image_path);
            $drug->image()->where('imageable_id',$drug->id)->delete();

        }

        if($request->hasFile('image_drug')){
            $image_name = rand(0,9999).'_'.$request->image_drug->getClientOriginalName();
            $request->image_drug->move(public_path('uploads'),$image_name);
            $drug->image()->create(array('name' => $image_name));
        }
        session()->flash('success','Update Drug Information Successfully');

        return redirect()->route('drug.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        $drug->delete();
        session()->flash('success','Delete Drug Successfully');
        return redirect()->route('drug.index');
    }
}

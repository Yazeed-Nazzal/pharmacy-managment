<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Image;
use Illuminate\Support\Facades\File;
class AlternativeDrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs =Drug::where('alternative_id','!=',null)->get();
        return view('alternative_drug.index',compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drugs = Drug::where('alternative_id',null)->get();

        return view('alternative_drug.create',compact('drugs'));
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
            'alternative_drug'=>'required'
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
            'alternative_id'=>$data['alternative_drug'],
        ]);

        if($request->hasFile('image_drug')){
            $image_name = rand(0,9999).'_'.$request->image_drug->getClientOriginalName();
            $request->image_drug->move(public_path('uploads'),$image_name);
            $drug->image()->create(array('name' => $image_name));   
        }
        
        session()->flash('success','Add  Alternative Drug Successfully');

        return redirect()->route('alternative_drug.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drug = Drug::find($id);
        return view('alternative_drug.show',compact('drug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drug = Drug::find($id);
        return view('alternative_drug.edit',compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $drug = Drug::where('id',$id)->first();
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
        ]);

        if($request->hasFile('image_drug')){
            $image_drug = Image::where('imageable_id',$drug->id)->get();
            $image_path = public_path('uploads') .'\\'. $image_drug[0]->name;
            File::delete($image_path);
        }
        $drug->image()->where('imageable_id',$drug->id)->delete();

        if($request->hasFile('image_drug')){
            $image_name = rand(0,9999).'_'.$request->image_drug->getClientOriginalName();
            $request->image_drug->move(public_path('uploads'),$image_name);
            $drug->image()->create(array('name' => $image_name));   
        }
        
        session()->flash('success','Update Alternative Drug Information Successfully');

        return redirect()->route('alternative_drug.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drug = Drug::find($id);
        $drug->delete();
        session()->flash('success','Delete Alternative Drug Successfully');
        return redirect()->route('alternative_drug.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Drug;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Cart::all();
        return view('cart.cart',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Drug $drug)
    {
        $record =Cart::where('drug_id',$drug->id)->first();
        $drug->count = $drug->count -1;
        $drug->save();
        if ($drug->count <- 0){
            abort('404');
        }
        else{
            if ($record){

                $record->count = $record->count +1;

                $record->save();


            }
            else{
                Cart::create([
                    'drug_id'=>$drug->id,
                    'admin_id'=>auth()->user()->id,
                    'count' => 1
                ]);

            }

        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
    public function receipt()
    {
        $records = Cart::all();
        Cart::truncate();
        foreach ($records as $record){
          $drug = Drug::find($record->drug_id);
          $drug->count = $drug->count - $record->count;
          $drug->buying_count = $drug->buying_count + 1;
          $drug->save();

        }
        return view('cart.receipt',compact('records'));
    }
    public function cancel (){
        $records = Cart::all();
        foreach ($records as $record){
            $drug = Drug::find($record->drug_id);
            $drug->count = $drug->count + $record->count;
            $drug->save();
        }
        Cart::truncate();
        return redirect(route('statistices'));

    }

}

@extends('layouts.dashbord')

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Show Drug Information</h2>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 mt-5">
            <img src="{{url('uploads/'.$drug->image->name)}}" style="border-radius: 10px;"  height="400" width="100%" alt="">
        </div>
        <div class="col-lg-8 mt-5">
            <p><strong>Name :</strong> {{$drug->name}}</p>
            <p><strong>Scienctic Name :</strong> {{$drug->s_name}}</p>
            <p><strong>Price :</strong> {{$drug->price}} JOD</p>
            <p><strong>Count :</strong> {{$drug->count}}</p>
            <p><strong>Plcae :</strong> {{$drug->place}}</p>
            <p><strong>Expired Date :</strong> {{$drug->expired_date}}</p>
            <p><strong>Description :</strong> {{$drug->description}}</p>
            @if (isset($alternativeDrugs))
                <h3 class="text-primary mb-3">alternative Drugs</h3>
                <div>
                    @foreach($alternativeDrugs as $alternativeDrug )
                        <form class="d-flex justify-content-between w-25 ml-5 " action="{{route('drug.show',$alternativeDrug->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <p ><strong>Name : </strong>{{$alternativeDrug->name}}</p>
                            <button  class="p-2 btn btn-primary"><i type="submit" class="fas fa-eye"></i></button>
                        </form>
                    @endforeach
                </div>

            @endif
            <p>
                    <form class="text-right" action="/cart/{{$drug->id}}" method="POST">
                        @csrf
                        <button class="btn btn-primary" @if ($drug->count<=0)disabled @endif @if ($drug->count<=5) onclick="alert('you have lack in this drug')"

                        @endif>Add To Cart  <i class="fas fa-cart-plus"></i></button>
                    </form>

            </p>
        </div>
    </div>
</div>

@endsection

@extends('layouts.dashbord')

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Show Alternative Drug Information</h2>
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
        </div>
    </div>
</div>

@endsection
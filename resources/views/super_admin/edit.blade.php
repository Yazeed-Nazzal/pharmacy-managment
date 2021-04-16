@extends('layouts.dashbord')

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Edit Super Admin</h2>
    </div>
</header>

<section class="forms"> 
<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-lg-8">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="col-lg-8">
        <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4"> Super Admin Information</h3>
        </div>
        <div class="card-body">
            <form action="{{route('super_admin.update',$super_admin->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label class="form-control-label">Name</label>
                <input type="text" name="name" value="{{$super_admin->name}}" placeholder="Name Admin" class="form-control">
                @error('name')
                    <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Email</label>
                <input type="email" name="email" value="{{$super_admin->email}}" placeholder="Email Address" class="form-control">
                @error('email')
                    <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">       
                <label class="form-control-label">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
                @error('password')
                    <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">       
                <label class="form-control-label">Confirm Password</label>
                <input type="password" name="password_confirmation"  placeholder="confirm Password" class="form-control">
                @error('confirm_password')
                    <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">       
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>

 

@endsection
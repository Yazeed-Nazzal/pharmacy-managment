@extends('layouts.dashbord')

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Add Admin</h2>
    </div>
</header>

<section class="forms"> 
<div class="container-fluid">
    <div class="row justify-content-center">
    
    <div class="col-lg-8">
        <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">Admin Information</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.store')}}" method="post">
                @csrf
            <div class="form-group">
                <label class="form-control-label">Name</label>
                <input type="text" name="name" placeholder="Name Admin" class="form-control">
                @error('name')
                    <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Email</label>
                <input type="email" name="email" placeholder="Email Address" class="form-control">
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
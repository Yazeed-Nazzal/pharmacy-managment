@extends('layouts.dashbord')

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Edit Drug</h2>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Edit Drug Information</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('drug.update',$drug->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Name</label>
                    <div class="col-sm-9">
                    <input type="text" name="name" value="{{$drug->name}}" placeholder="Enter Name Drug" class="form-control">
                    @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Scientific Name</label>
                    <div class="col-sm-9">
                    <input type="text" name="s_name" value="{{$drug->s_name}}" placeholder="Enter Scientific Name To Drug" class="form-control">
                    @error('s_name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Description</label>
                    <div class="col-sm-9">
                    <textarea type="text" name="description"  rows="5" placeholder="Enter description Drug" class="form-control">{{$drug->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Price</label>
                    <div class="col-sm-9">
                    <input type="number" name="price" value="{{$drug->price}}"  placeholder="Enter Price Drug" class="form-control">
                    @error('price')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Count</label>
                    <div class="col-sm-9">
                    <input type="number" name="count" value="{{$drug->count}}" placeholder="Enter Count number to Drug" class="form-control">
                    @error('count')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Expired Date</label>
                    <div class="col-sm-9">
                    <input type="date" name="expired_date" value="<?php  echo date('Y-m-d', strtotime($drug->expired_date)) ?>" placeholder="Select Expired Date" class="form-control">
                    @error('expired_date')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Place Drug In Pharmacy</label>
                    <div class="col-sm-9">
                    <input type="text" name="place" value="{{$drug->place}}"  placeholder="Enter Place Drug In Pharmacy" class="form-control">
                    @error('place')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Image</label>
                    <div class="col-sm-9">
                    <input type="file" name="image_drug" value="{{$drug->image_drug}}" placeholder="Select Image Drug" class="form-control">
                    </div>
                </div>
                  
                <div class="line"></div>
                <div class="form-group row">
                    <div class="col-sm-4 offset-sm-3">
                    <a  href="{{route('drug.index')}}" type="reset" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Drug</button>
                    </div>
                </div>
                
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
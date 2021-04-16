
@extends('layouts.dashbord')

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">All Admins</h2>
    </div>
</header>

<section class="tables">  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             @endif
            </div>
            <div class="col-lg-12">
            <a href="{{route('admin.create')}}" class="btn btn-primary mb-3 float-right">Add Admin</a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Admin Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">  
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php 
                            $number_admin = 1 ;
                        @endphp
                        @foreach($admins as $admin)
                        <tr>
                            <th>
                                <?php 
                                    echo $number_admin;
                                    $number_admin = $number_admin+1;
                                ?>
                            </th>
                            <th>{{$admin->name}}</th>
                            <th>{{$admin->email}}</th>
                            <th style="display:flex;justify-content:space-between">
                               
                             <form action="{{route('admin.destroy',$admin->id)}}" method="POST">
                                 @csrf 
                                 @method('delete')
                              <button type="submit" class="p-2 btn btn-primary"><i class="fas fa-trash-alt"></i></button>
                             </form>
                             <form action="{{route('admin.edit',$admin->id)}}" method="POST">
                                @csrf 
                                @method('GET')
                              <button type="submit" class="p-2 btn btn-primary"><i class="fas fa-edit"></i></button>  
                             </form>
                           </th>
                        </tr>
                        
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
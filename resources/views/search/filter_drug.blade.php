
@extends('layouts.dashbord')

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">All Drugs</h2>
    </div>
</header>

<section class="tables">
    <div class="container-fluid">
        <form action="{{route('filter')}}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-lg-3">
                        <input type="text" name="name" placeholder="Enter Name" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="s_name" placeholder="Enter sience Name" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <input type="number" name="price" placeholder="Enter Prcie" class="form-control">
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-primary mb-3 float-right">filter</button>
                    </div>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Drugs Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped">
                        @if(count($drugs) > 0 )
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Expired Date</th>
                            <th>Add To Cart</th>
                        </tr>
                        </thead>
                        @endif
                        <tbody>
                        @php
                            $number_drug = 1 ;
                        @endphp

                        @if(count($drugs) > 0 )
                            @foreach($drugs as $drug)
                            <tr>
                                <td>
                                    <?php
                                        echo $number_drug;
                                        $number_drug = $number_drug+1;
                                    ?>
                                </td>
                                <td><img src="{{url('uploads/'.$drug->image->name)}}" width="100" height="100" alt=""></td>
                                <td>{{$drug->name}}</td>
                                <td>{{$drug->price}}</td>
                                <td>{{$drug->count}}</td>
                                <td>{{$drug->expired_date}}</td>
                                <td>
                                <form action="/cart/{{$drug->id}}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary" @if ($drug->count<=0)disabled @endif @if ($drug->count<=5) onclick="alert('you have lack in this drug')"

                                        @endif><i class="fas fa-cart-plus"></i></button>
                                </form>
                                </td>
                            @endforeach
                        @else
                           <div class="alert alert-warning">Not Found Drag</div>
                        @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

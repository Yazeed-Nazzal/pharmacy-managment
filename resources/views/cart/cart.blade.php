@extends('layouts.dashbord')

@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row justify-content-center">
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
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Total Drug In Cart</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Count</th>
                                        <th>total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $number_drug = 1 ;
                                        $total = 0
                                    @endphp
                                        
                                        @for($i=0;$i<$records->count();$i++)
                                            @php($total += $records[$i]['price'] * $records[$i]['count']);
                                        <tr>
                                            <td>
                                                <?php
                                                echo $number_drug++;

                                                ?>
                                            </td>
                                            <td><img src="{{url('uploads/'.$records[$i]['image'])}}" width="100" height="100" alt=""></td>
                                            <td>{{$records[$i]['name']}}</td>
                                            <td>{{$records[$i]['price']}}</td>
                                            <td>{{$records[$i]['count']}}</td>
                                            <td>{{$records[$i]['price'] * $records[$i]['count']}}</td>
                                            <td style="display:flex;justify-content:space-between">

                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="p-2 btn btn-primary"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Total Price</h3>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p>{{$total}}$</p>
                            </div>
                            <div>
                                <button class="btn btn-primary"><a style="color: white" href="/receipt">CheckOut</a></button>
                                <button class="btn btn-primary"><a style="color: white" href="/receipt/cancel">Cancel</a></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

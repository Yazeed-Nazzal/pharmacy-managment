@extends('layouts.dashbord')


@section('content')

<!-- Page Header-->
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Drugs</h2>
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
            <a href="{{route('drug.create')}}" class="btn btn-primary mb-3 float-right">Add Drug</a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Drugs Table</h3>
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
                            <th>Expired Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $number_drug = 1 ;
                        @endphp
                        @foreach($drugs as $drug)
                        <tr>
                            <th>
                                <?php
                                    echo $number_drug;
                                    $number_drug = $number_drug+1;
                                ?>
                            </th>
                            <td><img src="{{url('uploads/'.$drug->image->name)}}" width="100" height="100" alt=""></td>
                            <td>{{$drug->name}}</td>
                            <td>{{$drug->price}}</td>
                            <td>{{$drug->count}}</td>
                            <td>{{$drug->expired_date}}</td>
                            <td style="display:flex;justify-content:space-between">

                             <form action="{{route('drug.destroy',$drug->id)}}" method="POST">
                                 @csrf
                                 @method('delete')
                              <button type="submit" class="p-2 btn btn-primary"><i class="fas fa-trash-alt"></i></button>
                             </form>
                             <form action="{{route('drug.edit',$drug->id)}}" method="POST">
                                @csrf
                                @method('GET')
                              <button type="submit" class="p-2 btn btn-primary"><i class="fas fa-edit"></i></button>
                             </form>
                             <form action="{{route('drug.show',$drug->id)}}" method="POST">
                                @csrf
                                @method('GET')
                              <button type="submit" class="p-2 btn btn-primary"><i class="fas fa-eye"></i></button>
                             </form>
                                <form action="/cart/{{$drug->id}}" method="POST">
                                    @csrf
                                   <button class="btn btn-primary" @if ($drug->count<=0)disabled @endif @if ($drug->count<=5) onclick="alert('you have lack in this drug')"

                                       @endif><i class="fas fa-cart-plus"></i></button>
                                </form>
                           </td>
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
</section>
@endsection

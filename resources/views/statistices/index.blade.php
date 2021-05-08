@extends("layouts.dashbord")


@section("content")
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Admins<br>Number</span>
                      <div class="progress">
                        <div role="progressbar" style="width: {{$admin*5}}%; height: 4px;" aria-valuenow="{{$admin}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>{{$admin}}</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Drugs<br>Number</span>
                      <div class="progress">
                        <div role="progressbar" style="width: {{$drugs*5}}%; height: 4px;" aria-valuenow="{{$drugs}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong>{{$drugs}}</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Expire<br>Drug</span>
                      <div class="progress">
                        <div role="progressbar" style="width: {{$expire_drug*5}}%; height: 4px;" aria-valuenow="{{$expire_drug}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong>{{$expire_drug}}</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>drug<br>finish</span>
                      <div class="progress">
                        <div role="progressbar" style="width: {{$finish_drug*5}}%; height: 4px;" aria-valuenow="{{$finish_drug}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong>{{$finish_drug}}</strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>



          <!-- Feeds Section-->
          <section class="feeds no-padding-top mt-5">
            <div class="container-fluid">
              <div class="row">
                <!-- Trending Articles-->
                <div class="col-lg-6">
                  <div class="articles card">
                    <div class="card-close">
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h2 class="h3">Drugs Finish</h2>
                      <div class="badge badge-rounded bg-green">{{$finish->count()}} New</div>
                      <a href="{{route('all_drug_finish')}}" class="btn btn-brimary  btn-sm">Show More</a>
                    </div>
                    <div class="card-body no-padding">
                    @foreach($finish as $drug)
                      <div class="item d-flex align-items-center">
                        <div class="text">
                           <h3 class="h5">{{$drug->name}}</h3>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="articles card">
                    <div class="card-close">
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h2 class="h3">Expired Drug</h2>
                      <div class="badge badge-rounded bg-green">{{$expired->count()}} New</div>
                      <a href="{{route('all_drug_expired')}}" class="btn btn-brimary  btn-sm">Show More</a>
                    </div>
                    <div class="card-body no-padding">
                    @foreach($expired as $drug)
                      <div class="item d-flex align-items-center">
                        <div class="text">
                           <h3 class="h5">{{$drug->name}}</h3>
                        </div>
                      </div>
                    @endforeach
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </section>


@endsection

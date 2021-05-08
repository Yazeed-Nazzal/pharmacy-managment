@extends("layouts.dashbord")


@section("content")
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Drugs Finish</h2>
            </div>
        </header>


          <!-- Feeds Section-->
          <section class="feeds no-padding-top mt-5">
            <div class="container-fluid">
              <div class="row justify-content-center">
              <div class="col-lg-6">
                  <div class="articles card">
                    <div class="card-close">
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h2 class="h3">Drugs Finish</h2>
                      <div class="badge badge-rounded bg-green">{{$finish->count()}} New</div>
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

              </div>
            </div>
          </section>


@endsection

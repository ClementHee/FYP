@extends('layouts.app')
<title>Dashboard</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="" id=" ">
                        bb
                    </div>
                    <br>

                    <div class="accordion" id="accordionDashboard">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Upcoming Events
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionDashboard">
                            <div class="accordion-body">
                              <h1>Upcoming Events to look out for</h1>

                                    <!-- offCanvas test -->
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNA" aria-controls="offcanvasNA">
                                        Click
                                    </button>

                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNA" aria-labelledby="offcanvasNALabel">
                                        <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasNALabel">Set test</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                        <div>
                                            bb
                                        </div>
                                        </div>
                                    </div>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Volunteer Now
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionDashboard">
                            <div class="accordion-body">
                              Put something to do with volunteering here
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Extra Number 3
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionDashboard">
                            <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
<title>Dashboard</title>

@section('content')
<div class="container">
        <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header"><h2>{{ __('Dashboard') }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="" id=" ">
                        Welcome to the Church Management System.
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
                               <p>Here are some upcoming events to look out for!</p>
                                @can('Show Event')
                                <a class="btn btn-primary" href="{{ route('event.index') }}" role="button">Events</a>
                                @endcan
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              My Profile
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionDashboard">
                            <div class="accordion-body">
                              <p>Interested in helping out and volunteering? Head on over to your profile and set your volunteering roles and not available dates!</p>
                              <a class="btn btn-primary" href="{{ route('showprofile',auth()->user()->email)}}" role="button">Profile</a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div> <br>

        </div>
    </div>
</div>


@endsection

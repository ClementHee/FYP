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
                               
                               <div id='full_calendar_events'></div>
                               <br>
                               <br> 
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

<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"
      integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>
    <div id="calendar"></div>

    <!-- ✅ load jQuery ✅ -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ✅ load moment.js ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
      integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- ✅ load FullCalendar ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"
      integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

<script>
    $(document).ready(function(){
        var calendar_events = @json($calendar_events);
        $('#full_calendar_events').fullCalendar({
            header:{
                left: ' prev next today',
                right: 'month, agendaWeek, agendaDay',
                center: 'title'
            },
            events: calendar_events
        })
    });
    
</script>

@endsection

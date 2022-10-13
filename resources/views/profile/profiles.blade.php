@extends('layouts.app')

<title> Profiles </title>

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <h1>
                Profiles
            </h1>
            <hr>
        </div>

        <div>
            <a href="{{route('profile.createprofile')}}">
                Create Profile
            </a>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="container">
            <div class = "invalid-feedback">
                Warning
            </div>
            <div class = "invalid-feedback">
                {{session()->get('message')}}
            </div>
        </div>
    @endif

    @foreach($profiles as $profile)
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>
                        <a class=""
                        href="{{route('profile.showprofile',$profile->profileId)}}">
                            {{ $profile->name }}
                        </a>
                    </h2>
                </div>

                <div>
                    <p>
                        {{ $profile->email }}
                    </p>

                    <p>
                        {{ $profile->handphoneNo }}
                    </p>
  
                </div>
            </div>
        </div>
        </div>
    @endforeach
</body>
@endsection
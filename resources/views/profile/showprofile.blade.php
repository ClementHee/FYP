@extends('layouts.app')

<title> {{ $profile->name }} </title>

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{URL::previous()}}">
                < Back to previous page
            </a>
        </div>

        <div class="card">
        <h4 class="card-header">
            {{ $profile->name }}
        </h4>

         <div>
            <p>
                {{ $profile->name }}
            </p>

            <p>
                {{ $profile->email }}
            </p>
         </div>
       </div>

        <a  href= "{{route('profile.editprofile',$profile->profileId)}} ">
            Edit Profile
        </a>
        <form action=" {{route ('profile.deleteprofile',$profile->profileId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>
                Delete
            </button>
        </form>
    </div>
    </body>
@endsection
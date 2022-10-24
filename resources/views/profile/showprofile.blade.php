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
          
          @if(!empty($allocatedtypes))
          @foreach($allocatedtypes as $v)
            <label class="label label-success">{{ $v->name }},</label>
          @endforeach
        @endif
         

         </div>
       </div>

        <a  href= "{{route('profile.edit',$profile->profileId)}} ">
            Edit Profile
        </a>
        <a  href= "{{route('vtypes.edit',$profile->profileId)}} ">
            Edit Roles
        </a>
        <form action=" {{route ('profile.destroy',$profile->profileId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>
                Delete
            </button>
        </form>    
    </div>
    <!-- Button trigger modal -->
  
</body>
@endsection
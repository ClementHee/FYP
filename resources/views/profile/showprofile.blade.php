@extends('layouts.app')

<title> {{ $profile->name }} </title>

@section('content')
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Profile Data</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $profile->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $profile->email }}
<<<<<<< HEAD
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
=======
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Home Number:</strong>
                {{ $profile->phone}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                {{ $profile->handphoneNo }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $profile->address }}
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('profile.index') }}"> Back</a>
        </div>

    </div>
    </body>
@endsection
>>>>>>> fbdbbe68f596037dbaebab6e032193c6e7ae08dd

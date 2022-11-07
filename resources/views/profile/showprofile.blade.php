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
            </div>
            <div class="form-group">
            <strong>Volunteer Types:</strong>
                @if(!empty($allocatedtypes))
                    @foreach($allocatedtypes as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <strong>Not Available Dates:</strong>
                    @if(!empty($not_availtime))
                        @foreach($not_availtime as $nat)
                            <label class="label label-success">{{ $nat->na_time }},</label>
                            <a class= "btn btn-primary my-4" href= "{{route('not_availabletime.editthis',['profile'=>$profile->profileId,'time'=>$nat->na_time])}} ">
                                Edit 
                            </a>
                        @endforeach
                        
                    @endif
            </div>
       </div>
    </div>
    <div>
        <a class= "btn btn-primary my-4" href= "{{route('profile.edit',$profile->profileId)}} ">
            Edit Profile
        </a>
        <a  class= "btn btn-primary" href= "{{route('vtypes.edit',$profile->profileId)}} ">
            Edit Roles
        </a>
        <a  class= "btn btn-primary" href= "{{route('create_na',$profile->profileId)}} ">
            Set Not Available Time
        </a>
        <form action=" {{route ('profile.destroy',$profile->profileId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button  class= "btn btn-danger" >
                Delete
            </button>
        </form>
    </div>
    <!-- Button trigger modal -->

</body>
@endsection

@extends('layouts.app')

<title> {{ $profile->name }} </title>

@section('content')
<body>
    <div class="card">
        <div class="card-header">
          <h2>Profile Data</h2>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $profile->name }}
                    </div>

                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $profile->email }}
                    </div>

                    <div class="list-group list-group-numbered">
                    <strong>Volunteer Types:</strong>
                        @if(!empty($allocatedtypes))
                            @foreach($allocatedtypes as $v)
                            <li class="list-group-item"> <label class="label label-success">{{ $v->name }}</label> </li>
                            @endforeach
                        @endif
                    </div>

                    <div class="list-group">
                        <strong>Not Available Dates:</strong>
                            @if(!empty($not_availtime))
                                @foreach($not_availtime as $nat)
                                <li class="list-group-item"> <label class="label label-success">{{ $nat->na_time }}</label>
                                    <a class= "btn btn-primary my-2 float-end" href= "{{route('not_availabletime.editthis',['profile'=>$profile->profileId,'time'=>$nat->na_time])}} ">
                                        Edit
                                    </a>
                                    <form action=" {{route ('not_availabletime.delete',['profile'=>$profile->profileId,'time'=>$nat->na_time])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class= "btn btn-danger my-2" >
                                            Delete Time
                                        </button>
                                    </form>
                                </li>
                                
                                
                                @endforeach

                            @endif
                    </div>

               </div>
            </div>

            <div class="button-group">
                <a class= "btn btn-primary my-2" href= "{{route('profile.edit',$profile->profileId)}} ">
                    Edit Profile
                </a>
                <a  class= "btn btn-primary my-2" href= "{{route('vtypes.edit',$profile->profileId)}} ">
                    Edit Roles
                </a>
                <a  class= "btn btn-primary my-2" href= "{{route('create_na',$profile->profileId)}} ">
                    Set Not Available Time
                </a>

                <form action=" {{route ('profile.destroy',$profile->profileId)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button  class= "btn btn-danger my-2" >
                        Delete Profile
                    </button>
                </form>
            </div>
            <!-- Button trigger modal -->

        </div>
      </div>
</body>
@endsection

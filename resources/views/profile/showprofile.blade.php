<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        {{ $profile->name }}
    </title>

</head>
<body>
    <div>
        <div>
            <a href="{{ URL::previous() }}">
                < Back to previous page
            </a>
        </div>

        <h4>
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
</html>
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
        Church Management System
    </title>
    

</head>
<body>
    <div>
        <div>
            <h1>
                Profiles
            </h1>
            <hr>
        </div>

        <div>
            <a
               href="{{route('profile.createprofile')}}">
                Create Profile
            </a>
        </div>
    </div>
    @if (session()->has('message'))
        <div>
            <div>
                Warning
            </div>
            <div>
                {{session()->get('message')}}
            </div>
        </div>
    @endif

    @foreach($profiles as $profile)
        <div>
            <div>
                <div>
                    <h2>
                        <a href="{{route('profile.showprofile',$profile->profileId)}}">
                            {{ $profile->name }}
                        </a>
                    </h2>

                    <p>
                        {{ $profile->email }}
                        {{ $profile->handphoneNo }}
                    </p>
                    
                   
                    
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>
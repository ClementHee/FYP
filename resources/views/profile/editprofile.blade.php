<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>

</head>
<body>
<div>
    <div>
        <h1>
            Edit Profile
        </h1>
        <hr>
    </div>

<div>
    <div>
        @if ($errors->any())
            <div>
                Something went wrong
            </div>
            <ul>
                @foreach ($errors->all() as $error )
                <li>
                    {{$error}}
                </li>    
                @endforeach
            </ul>
        @endif
    </div>
    <form
        action="{{route('profile.updateprofile', $edit_profile->profileId)}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input
        type="text"
        name="designation"
        value="{{$edit_profile->designation}}"
        >

        <input
            type="text"
            name="name"
            value="{{$edit_profile->name}}"
            >

        <input
            type="text"
            name="phone"
            value="{{$edit_profile->phone}}"
            >
       
        <input
            type="text"
            name="handphoneNo"
            value="{{$edit_profile->handphoneNo}}"
            >

        <input
            type="email"
            name="email"
            value="{{$edit_profile->email}}"
            >
        
       
        <textarea
            name="address"
            placeholder="Address"
            >{{$edit_profile->address}}</textarea>
        
    
            <select name = "gender">
                
                <option value = "Male" {{$edit_profile->gender == "Male" ? 'selected':''}}>Male</option>
                <option value = "Female">Female</option>
                
            </select>
       
      
        <select name = "congregation">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}" {{$edit_profile->congregation == $selection->name ? 'selected':''}}>
                    {{$selection->name}}
                </option>
            @endforeach
            
        </select>
        </br>
        
        <label for="is_volunteer">
            Is Volunteer
        </label>
    
        <input
            type="checkbox"
            {{$edit_profile->is_volunteer == true ? 'checked':''}}
            name="is_volunteer">
      
        
        <label for="is_staff" >
            Is Staff
        </label>
    
        <input
            type="checkbox"
            {{$edit_profile->is_staff == true ? 'checked':''}}
            name="is_staff">
        </br>
        
        <button
            type="submit">
            Save
        </button>
    </form>
</div>
</body>
</html>
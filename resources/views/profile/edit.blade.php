@extends('templates.default')

@section('content')

<div class="container">
    <div class="d-flex flex-md-row flex-column">
        <div style="width: 100%" class="p-4 row d-flex flex-column align-items-center">
            <div class="cover bg-fit {{ !Auth::user()->cover? 'bg-gradient' : '' }}" style="background-image: url({{ asset(Auth::user()->getCoverURL()) }}) !important"></div>

            <div class="avatar-container">
                <div class="avatar-icon"><i class="icofont-ui-camera"></i></div>
                <img 
                    src="{{ asset(Auth::user()->getAvatarURL()) }}"
                    id="avatar"
                    alt=""
                    class="bg-secondary rounded-circle"
                    style="width: 250px; height: 250px; margin: 0 auto; object-fit: cover"
                >
            </div>
        </div>

        <form style="width: 100%" class="form p-4" method="post" action="/profile/edit" name="edit" enctype="multipart/form-data">
            @csrf

            <h2>Edit profile</h2>
            
            <div class="form-group">
                <label 
                    class="form-label {{$errors->has('first_name')? 'text-danger' : ''}}" 
                    for="first_name"
                >
                    First name
                </label>
                <input 
                    class="form-control {{$errors->has('first_name')? 'is-invalid' : ''}}" 
                    type="text" 
                    id="first_name" 
                    name="first_name" 
                    placeholder="First name"
                    value="{{ Auth::user()->first_name ?? Request::old('first_name')}}"
                >
                @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label 
                    class="form-label {{$errors->has('last_name')? 'text-danger' : ''}}" 
                    for="last_name"
                >
                    Last name
                </label>
                <input 
                    class="form-control {{$errors->has('first_name')? 'is-invalid' : ''}}" 
                    type="text" 
                    id="last_name" 
                    name="last_name" 
                    placeholder="Last name"
                    value="{{ Auth::user()->last_name ?? Request::old('last_name')}}"
                >
                @if ($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label 
                    class="form-label {{$errors->has('location')? 'text-danger' : ''}}" 
                    for="location"
                >
                    Location
                </label>
                <input 
                    class="form-control {{$errors->has('location')? 'is-invalid' : ''}}" 
                    type="text" 
                    id="location" 
                    name="location" 
                    placeholder="Location"
                    value="{{ Auth::user()->location ?? Request::old('location')}}"
                >
                @if ($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
            </div>

            
            <input type="file" style="display: none" name="avatar" id="inputavatar">
            <input type="file" style="display: none" name="cover" id="inputcover">

            <button class="btn float-right btn-lg btn-success float-right">save</button>
            <div class="clearfix"></div>

        </form>
        
        <form style="width: 100%" class="form p-4" method="post" action="/profile/delete" name="delete">
                @csrf
                
                <h2>Delete account</h2>
                <div class="form-group">
                    <label class="form-label  {{$errors->has('password')? 'is-invalid' : ''}}" for="password">Password:</label>
                    <input 
                        class="form-control  {{$errors->has('password')? 'is-invalid' : ''}}" 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Enter your password"
                    >
                    @if ($errors->has('password'))
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label  {{$errors->has('password_confirm')? 'is-invalid' : ''}}" for="password_confirm">Confirm your password:</label>
                    <input 
                        class="form-control  {{$errors->has('password_confirm')? 'is-invalid' : ''}}" 
                        type="password" 
                        id="password_confirm" 
                        name="password_confirm"
                        placeholder="Enter your password again"
                    >
                    @if ($errors->has('password_confirm'))
                        <small class="text-danger">{{ $errors->first('password_confirm') }}</small>
                    @endif
                </div>
                
                <button class="btn float-right btn-lg btn-danger float-right">delete profile</button>
        </form>
    </div>
    
</div>

<script>

const fileInput = (inputf, image, click, bgimage = false) => {
    const input = document.querySelector(inputf)
    const avatar = document.querySelector(image)
    const clickable = document.querySelector(click)
    
    clickable.addEventListener('click', () => {
        input.click()
    })
    
    const loadFile = function(event) {

        if (bgimage) {
            console.log(avatar.style.backgroundImage)
            avatar.style.backgroundImage = `url(${URL.createObjectURL(event.target.files[0])})`
        } else {
            avatar.src = URL.createObjectURL(event.target.files[0])
        }

        input.onload = function() {
            URL.revokeObjectURL(input.src)
        }
    }
    input.addEventListener('change', loadFile)
}

fileInput('#inputavatar', '#avatar', '.avatar-container')
fileInput('#inputcover', '.cover', '.cover', true)

</script>

@stop

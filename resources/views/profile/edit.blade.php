@extends('templates.default')

@section('content')

<style>

.avatar-icon {
    display: none;
    transitio: 1s;
}
.avatar-container { 
    position: relative;
    transition: 1s;
    border-radius: 50%;
}

.avatar-container:hover {
    filter: grayscale();
}
.avatar-container:hover .avatar-icon {
    display: block;
    position: absolute;
    font-size: 120px;
    left: calc(50% - 60px);
    top: calc(35% - 60px);
    color: rgba(255, 255, 255, .9);
}

</style>

<div class="container">
    <div class="d-flex flex-md-row flex-column">
        <div style="width: 100%" class="p-4 row d-flex flex-column align-items-center">
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

            <button class="btn float-right btn-lg btn-success float-right">save</button>
            <div class="clearfix"></div>

        </form>
    </div>
</div>

@foreach($errors->all() as $error)

    <p>{{$error}}</p>

@endforeach

<script>

const input = document.querySelector('#inputavatar')
    const avatar = document.querySelector('#avatar')
    const clickable = document.querySelector('.avatar-container')

    clickable.addEventListener('click', () => {
        input.click()
    })
    
    const loadFile = function(event) {
        avatar.src = URL.createObjectURL(event.target.files[0])
        
        input.onload = function() {
            URL.revokeObjectURL(input.src)
        }
    }
    input.addEventListener('change', loadFile)

</script>

@stop

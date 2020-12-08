@extends('templates.default')

@section('content')

<div class="container">
    <div class="d-flex flex-md-row flex-column">
        <div style="width: 100%" class="p-4 row d-flex flex-column align-items-center">
            <img 
                src="{{ Auth::user()->getProfileAvatarURL(250) }}"
                id="avatar"
                alt=""
                class="bg-secondary rounded-circle"
                style="width: 250px; margin: 0 auto;"
            >
        </div>

        <form style="width: 100%" class="form p-4" method="post" action="/profile/edit" name="edit">
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

            <input type="hidden" name="avatar_seed" value="{{ Auth::user()->avatar_seed }}">
            <button class="btn float-right btn-lg btn-success float-right">save</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>

<script>
    const avatar = document.querySelector('#avatar');
    avatar.addEventListener('click', () => {
        const seed  = Date.now();
        avatar.src = `https://avatars.dicebear.com/api/human/${seed}.svg`
        document.edit.avatar_seed.value = seed;
    })
</script>

@stop

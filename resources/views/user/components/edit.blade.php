@extends('templates.default')

@section('content')
<style>
    .hero .profile-avatar img, .profile-avatar {
        width: 250px;
        height: 250px;
    }
    .profile-avatar {
        border-radius: 50%;
    }

    @media screen and (max-width: 756px) {
        .hero .profile-avatar img, .profile-avatar {
            width: 150px;
            height: 150px;
        }
    }
    
    .hero .profile-avatar img {
        border-radius: 50%;
    }

    .profile-index {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form {
        padding: 0 10vw;
    }

    </style>

<div class="hero container bg-primary">
    <h1 class="text-light text-center">Edit profile {{ Auth::user()->avatar_seed }}</h1>
    <form class="form" method="post" action="/profile/edit" name="edit">
        @csrf
        <div class="columns">
            <div class="col-6 col-sm-12">
                <div class="hero-body profile-index">
                    <figure 
                        class="profile-avatar" 
                        data-initial="{{ strtoupper(Auth::user()->username[0]) }}" 
                        style="background-color: #0004;"
                    >
                        <img 
                            src="{{ Auth::user()->getProfileAvatarURL(250) }}"
                            id="avatar"
                            alt=""
                        >
                    </figure>
                </div>
            </div>
            <div class="col-6 col-sm-12">
                <div class="form-group">
                    <label class="form-label {{$errors->has('first_name')? 'text-error' : ''}}" for="first_name">First name</label>
                    <input 
                        class="form-input" 
                        type="text" 
                        id="first_name" 
                        name="first_name" 
                        placeholder="First name"
                        value="{{ Auth::user()->first_name ?? Request::old('first_name')}}"
                    >
                    @if ($errors->has('first_name'))
                        <span class="text-error">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label {{$errors->has('last_name')? 'text-error' : ''}}" for="last_name">Last name</label>
                    <input 
                        class="form-input" 
                        type="text" 
                        id="last_name" 
                        name="last_name" 
                        placeholder="Last name"
                        value="{{ Auth::user()->last_name ?? Request::old('last_name')}}"
                    >
                    @if ($errors->has('last_name'))
                        <span class="text-error">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label {{$errors->has('location')? 'text-error' : ''}}" for="location">Location</label>
                    <input 
                        class="form-input" 
                        type="text" 
                        id="location" 
                        name="location" 
                        placeholder="Location"
                        value="{{ Auth::user()->location ?? Request::old('location')}}"
                    >
                    @if ($errors->has('location'))
                        <span class="text-error">{{ $errors->first('location') }}</span>
                    @endif
                </div>

                <input type="hidden" name="avatar_seed" value="{{ Auth::user()->avatar_seed }}">
                
                <button class="btn float-right btn-lg btn-success">save</button>
            </div>
        </div>
    </form>
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

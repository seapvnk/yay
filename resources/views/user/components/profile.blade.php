@extends('templates.default')

@section('content')
<style>
    .profile-avatar {
        width: 250px;
        height: 250px;
        border-radius: 50%;
    }
    
    .hero .profile-avatar img {
        width: 250px;
        height: 250px;
        border-radius: 50%;
    }

    .profile-index {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .rows p {
        margin: 0;
    }
    
</style>

<div class="hero container bg-primary">
    <div class="hero-body profile-index">
        <figure 
            class="profile-avatar" 
            data-initial="{{ strtoupper($user->username[0]) }}" 
            style="background-color: #5755d9;"
        >
            <img 
                src="{{ $user->getProfileAvatarURL(250) }}" 
                alt=""
            >
        </figure>

        <div class="rows">
            <h1 class="text-light">{{ "@" . $user->username }}</h1>
            <div class="columns">
                @if ($user->getFullName() ||  $user->location)
                    <div class="col-8">
                        <p class="text-light">{{ $user->getFullName() ?? '' }}</p>
                        <p class="text-gray">{{ $user->location ?? '' }}</p>
                    </div>
                @else
                    <div class="col-1"></div>
                
                @endif
                <div class="col-4">
                    <button class="my-2 btn btn-lg">+Add friend</button>
                </div>
            </div>
            
        </div>
    </div>
</div>
@stop

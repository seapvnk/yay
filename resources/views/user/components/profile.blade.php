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

    .profile-avatar {
        border-radius: 50%;
    }
    
    .hero .profile-avatar img {
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
            style="background-color: #0004;"
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
                    @if (Auth::user()->hasFriendRequestPending($user))
                        <p>Waiting for {{ $user->getNameOrUsername() }} to accept you...</p>
                    @elseif (Auth::user()->hasFriendRequestReceived($user))
                        <a href="/friends/accept/{{ $user->username }}" class="my-2 btn btn-lg">Accept friend request</a>
                    @elseif (Auth::user()->isFriendWith($user))
                        <p>You and {{ $user->getNameOrUsername() }} are friends.</p>
                    @else
                        @if ($user->username !== Auth::user()->username)
                            <a href="/friends/add/{{ $user->username }}" class="my-2 btn btn-lg">+Add friend</a>
                        @endif
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
@stop

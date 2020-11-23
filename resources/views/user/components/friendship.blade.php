@if (Auth::user()->hasFriendRequestPending($user))

    <span class="btn">Friend request sent</span>

@elseif (Auth::user()->hasFriendRequestReceived($user))

    <a href="/friends/accept/{{ $user->username }}" class="btn btn-info">Accept friend request</a>

@elseif (Auth::user()->isFriendWith($user))

    <span>You and {{ $user->getNameOrUsername() }} are friends.</span>
    <a href="/friends/remove/{{ $user->username }}" class="btn btn-danger">remove friend</a>

@else

    @if ($user->username !== Auth::user()->username)
        <a href="/friends/add/{{ $user->username }}" class="btn btn-success">+Add friend</a>
    @endif
    
@endif
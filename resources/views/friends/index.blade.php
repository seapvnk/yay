@extends('templates.default')

<style>

    .friends-container {
        width: 75% !important;
        margin: auto;
        display: flex;
        align-items: center;
        margin-top: 5vh;
        flex-flow: column;
    }

    .col {
        width: 100%;
    }

</style>

@section('content')
    
    <div class="container friends-container">
        <div class="col">
            <h4 class="text-center">Friend requests</h4>

            @if (!$requests->count())
            <div class="empty">
                <div class="empty-icon">
                    <i style="font-size: 16vh" class="icofont-users"></i>
                </div>
                <p class="empty-title h5">No friend requests</p>
                <p class="empty-subtitle">
                    You don't have any friend request
                </p>
            </div>
            @else
                @foreach ($requests as $user)
                    @include('user.components.request_block')
                @endforeach
            @endif
        </div>
        <div class="col">
            <h4 class="text-center">Your friends</h4>

            @if (!$friends->count())
            <div class="empty">
                <div class="empty-icon">
                    <i style="font-size: 16vh" class="icofont-users"></i>
                </div>
                <p class="empty-title h5">No friends</p>
                <p class="empty-subtitle">
                    You don't have any friend
                </p>
            </div>
            @else
                @foreach ($friends as $user)
                    @include('user.components.block')
                @endforeach
            @endif
        </div>
    </div>
    
@stop
@extends('templates.default')

@section('content')
    
    <div class="container pt-4">
        <div class="container">
            <h4 class="text-center">Friend requests</h4>

            @if (!$requests->count())
                @include('templates.components.empty', [
                    'title' => 'No friend requests!',
                    'message' => 'You have no friend requests'
                ])
            @else
                @foreach ($requests as $user)
                    @include('user.components.block')
                @endforeach
            @endif
        </div>

        <div class="container mt-4">
            <h4 class="text-center">Your friends</h4>

            @if (!$friends->count())
                @include('templates.components.empty', [
                    'title' => 'No friends!',
                    'message' => 'You have no friends'
                ])
            @else
                @foreach ($friends as $user)
                    @include('user.components.block')
                @endforeach
            @endif
        </div>
    </div>
    
@stop
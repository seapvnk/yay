@extends('templates.default')

@section('content')
    
    <div class="container pt-4">
        <div class="row p-4 d-flex align-items-center justify-content-center">
            <div class="col d-flex flex-column justify-content-center align-items-center">
                <h4 class="text-center">Friend requests</h4>

                @if (!$requests->count())
                    @include('templates.components.empty', [
                        'title' => 'No friend requests!',
                        'message' => 'You have no friend requests'
                    ])
                @else
                    @foreach ($requests as $user)
                        @include('user.components.request_block')
                    @endforeach
                @endif
            </div>
            <div class="col d-flex flex-column justify-content-center align-items-center">
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
    </div>
    
@stop
@extends('templates.default')

@section('content')

<div class="bg-primary">
    <div class="container p-4 d-flex flex-column align-items-center justify-content-center">
        <img 
            src="{{ asset($user->getAvatarURL()) }}" 
            alt=""
            class="rounded-circle bg-dark"
            width="200px"
            height="200px"
            style="object-fit: cover"
        >

        <h1 class="text-light">{{ "@" . $user->username }}</h1>
        
        <div class="row">

            @if ($user->getFullName() ||  $user->location)
                <div class="col row">
                    <span class="text-light">{{ $user->getFullName() ?? '' }}</span>
                    <span class="text-muted">{{ $user->location ?? '' }}</span>
                </div>
            @endif

            <div class="col">
                @include('user.components.friendship')
            </div>

        </div>
    
    </div>
</div>

<div class="container mt-4">
        @if (!$statuses->count())
            @include('templates.components.empty', [
                'title' => 'Nothing to see :p',
                'message' => "This user has no post..."
            ])
        @else
            @foreach ($statuses as $status)
                @include('timeline.components.status')
            @endforeach
        @endif

        {{ $statuses->render() }}
    </div>
</div>
@stop
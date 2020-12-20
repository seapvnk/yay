@extends('templates.default')

@section('content')

<div class="p-3 bg-primary d-flex align-items-center justify-content-center" style="margin-top: -2rem">

    <img 
        src="{{ asset($user->getAvatarURL()) }}" 
        alt=""
        class="rounded-circle bg-dark ml-4"
        width="250px"
        height="250px"
        style="object-fit: cover"
    >

    <div>
        <div class="container p-4 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-light display-3">{{ "@" . $user->username }}</h1>        

            @if ($user->getFullName() ||  $user->location)
                <p class="text-light p-0 mb-0" style="font-size: 22px">{{ $user->getFullName() ?? '' }}</p>
                <p class="text-light" style="font-size: 22px">{{ $user->location ?? '' }}</p>
            @endif

            @include('user.components.friendship')
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
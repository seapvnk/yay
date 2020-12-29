<div class="card row mb-4 bg-dark">

  <div class="p-1 pl-4 pb-2 card-header d-flex align-items-center">

    <div class="d-flex">
      <a href="/user/{{ $status->user->username }}">
          <img
            class="rounded-circle bg-primary"
            style="width: 75px"
            src="{{ asset($status->user->getAvatarURL()) }}" 
            alt=""
          >
      </a>

    </div>

    <div class="container">
      
      @if ($status->user->id == Auth::user()->id)
        <div class="float-right">
          <a href="/status/{{ $status->id }}/delete">x</a>
        </div>
      @endif

      <a href="/user/{{ $status->user->username }}" style="font-size: 1.4rem" class="mr-3 tile-title text-info">{{ "@" . $status->user->username }}</a>
      <br>
      <div class="mr-3">{{ $status->user->getFullName() }}</div>
      <div>{{ $status->created_at->diffForHumans() }}</div>
    </div>

  </div>

  <div class="card-body">

    <a href="/status/{{ $status->id }}/like" 
      class="{{ Auth::user()->hasLikedStatus($status) ? 'text-muted' : 'text-info' }}">
      Like <i class="icofont-thumbs-up"></i>
    </a>
    <span class="text-gray">
      {{ $status->likes->count() }} {{Str::plural('like', $status->likes->count() )}}
    </span>   
    <p style="font-size: 1.5rem">{{ $status->body }}</p>
    <hr>
      
    @if ($status->replies->count() > 0)
      @foreach($status->replies as $reply)
        @include('timeline.components.reply')
      @endforeach
    @endif

    <div class="container">
      @include('timeline.components.form')
    </div>
    
  </div>

</div>


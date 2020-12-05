<div class="card row mb-4">
  
  <div class="card-header d-flex align-items-center">
  
    <div class="d-flex">
      <a href="/user/{{ $status->user->username }}">
          <img
            class="rounded-circle bg-primary"
            style="width: 75px"
            src="{{ $status->user->getAvatarURL() }}" 
            alt=""
          >
      </a>
    </div>

    <div class="container">

      <a href="/user/{{ $status->user->username }}" style="font-size: 1.4rem" class="mr-3 tile-title text-info">{{ "@" . $status->user->username }}</a>
    
      <br>

      <div class="mr-3">{{ $status->user->getFullName() }}</div>

      <div>{{ $status->created_at->diffForHumans() }}</div>
    
    </div>

  </div>


  <div class="card-body">
    
    <a 
      href="/status/{{ $status->id }}/like" 
      class="text-info"
    >
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


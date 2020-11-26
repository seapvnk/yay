<div class="card m-4">
  <div class="card-header">
      <a href="/user/{{ $reply->user->username }}">
          <img 
            src="{{ $reply->user->getAvatarURL() }}" 
            alt=""
            class="rounded-circle bg-primary"
            style="width: 50px"
          >
      </a>
      
      <a 
          href="/user/{{ $reply->user->username }}" 
          class="text-info mr-1"
      >
          {{ "@" . $reply->user->username }}
      </a>
      -
      <span class="ml-1"> {{ $reply->created_at->diffForHumans() }} </span>
  </div>

  <div class="card-body">
    
    <div class="reply">
        {{ $reply->body }}
    </div>
    
    <a href="/status/{{ $reply->id }}/like" class="text-info">Like <i class="icofont-thumbs-up"></i></a>
    <span class="text-gray">{{ $reply->likes->count() }} {{Str::plural('like', $reply->likes->count() )}}</span>
  
  </div>
</div>

<hr>
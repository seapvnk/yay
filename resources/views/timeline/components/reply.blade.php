<div class="d-flex">

    <a href="/user/{{ $reply->user->username }}">
        <img 
          src="{{ asset($reply->user->getAvatarURL()) }}" 
          alt=""
          class="rounded-circle bg-secondary mr-3"
          style="width: 55px"
        >
    </a>
    
    <div>
      <p>

        <a href="/user/{{ $reply->user->username }}" class="text-info mr-1">
          {{ "@" . $reply->user->username }}
        </a>
        -
        <span class="ml-1"> {{ $reply->created_at->diffForHumans() }} </span>
        <br>

        <span>{{ $reply->body }}</span>
        <br>

        <a href="/status/{{ $reply->id }}/like"
          class="{{ Auth::user()->hasLikedStatus($reply) ? 'text-muted' : 'text-info' }}">
          Like <i class="icofont-thumbs-up"></i>
        </a>
        
        <span class="text-gray">
          {{ $reply->likes->count() }} {{Str::plural('like', $reply->likes->count() )}}
        </span>

      </p>
    </div>
    
    @if ($reply->user->id == Auth::user()->id)
      <span class="float-right ml-4">
        <a href="/status/{{ $reply->id }}/delete">x</a>
      </span>
    @endif
</div>
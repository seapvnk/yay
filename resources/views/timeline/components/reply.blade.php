<style>
  .reply-tile {
    display: flex;
    align-items: flex-start;
    padding: .8rem;
    margin: 1rem 0;
    
  }

  .reply-tile .reply-tile-subtitle {
    margin: 0;
  }

  .reply-tile .reply-tile-title {
    margin: 0;
    font-size: 1rem;
  }

  .reply-tile figure {
      margin-right: 10px;
  }
</style>

<div class="reply-tile">
  <div class="reply-tile-icon">
    <a href="/user/{{ $reply->user->username }}">
      <figure 
        class="avatar avatar-lg" 
        data-initial="{{ strtoupper($reply->user->username[0]) }}" 
        style="background-color: #0004;"
      >
        <img 
          src="{{ $reply->user->getAvatarURL() }}" 
          alt=""
        >
      </figure>
    </a>
  </div>
  <div class="reply-tile-content">
    <a 
        href="/user/{{ $reply->user->username }}" 
        class="reply-tile-title text-primary"
    >
        {{ "@" . $reply->user->username }}
    </a>
    <br>
    <span 
        class="text-gray"
    >
        {{ $reply->created_at->diffForHumans() }}
    </span>
    <div class="reply">
        {{ $reply->body }}
    </div>
  </div>
</div>

<div class="divider"></div>
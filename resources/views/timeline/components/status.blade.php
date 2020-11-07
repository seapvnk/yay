<style>
  .tile {
    align-items: flex-start;
    align-content: flex-start;
    justify-content: flex-start;
    padding: .6rem;
    margin: 0;
  }

  .tile .tile-subtitle {
    margin: 0;
  }

  .tile .tile-title {
    font-size: 1rem;
    margin: 0;
  }

  .tile .tile-body {
      flex: 1;
      width: 100%;
      margin: 0;
      text-align: left;
  }

  .status-content {
      font-size: .8rem;
      padding: .3rem 1rem;
  }

  .status {
    margin: 1rem 0;
  }

  .like-section a {
      margin-right: 10px;
  }

  .reply {
      width: 100%;
  }
</style>

<div class="status bg-gray">
<div class="tile">
  <div class="tile-icon">
    <a href="/user/{{ $status->user->username }}">
      <figure 
        class="avatar avatar-xl" 
        data-initial="{{ strtoupper($status->user->username[0]) }}" 
        style="background-color: #0004;"
      >
        <img 
          src="{{ $status->user->getAvatarURL() }}" 
          alt=""
        >
      </figure>
    </a>
  </div>
  <div class="tile-content">
    <a href="/user/{{ $status->user->username }}" class="tile-title text-primary">{{ "@" . $status->user->username }}</a>
    <p class="tile-subtitle text-gray" href="/user/{{ $status->user->username }}" class="tile-title text-primary">{{ $status->user->getFullName() }}</p>
    <p class="tile-subtitle text-gray">{{ $status->created_at->diffForHumans() }}</p>
  </div>
</div>
<div class="status-content">
    <p>{{ $status->body }}</p>
    <div class="like-section">
        <a href="#" class="text-primary">Like <i class="icofont-thumbs-up"></i></a>
        <span class="text-gray">10 likes</span>
    </div>
    
    <div class="reply">
            <form action="#" method="post">
                <div class="form-group">
                    <textarea class="form-input" style="resize: none" name="status" id="status" rows="3"></textarea>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                @if ($errors->has('status'))
                    <div>
                        <span class="text-error">
                            {{ $errors->first('reply') }}
                        </span>
                    </div>
                @endif
                <button
                    role="submit" 
                    class="btn btn-lg {{ $errors->has('reply')? 'btn-error' : '' }}"
                >
                    Reply
                </button>
            </form>
    </div>
</div>
</div>
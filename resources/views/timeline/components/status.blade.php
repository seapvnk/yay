<div class="card row mb-4">
  <div class="card-header  d-flex align-items-center">
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
    <div>
        <a href="/status/{{ $status->id }}/like" class="text-info">Like <i class="icofont-thumbs-up"></i></a>
        <span class="text-gray">{{ $status->likes->count() }} {{Str::plural('like', $status->likes->count() )}}</span>   
    </div>
    <p style="font-size: 2rem">{{ $status->body }}</p>
  </div>

  <div class="container">
    <hr>
    <div class="container mb-3">
        <form action="/status/{{ $status->id}}/reply" method="post">
            @csrf
            <div class="form-group">
                <textarea 
                  class="form-control {{ $errors->has("reply-{$status->id}")? 'is-error' : '' }}" 
                  style="resize: none" 
                  name="reply-{{ $status->id }}" 
                  id="status" 
                  rows="3"></textarea>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            @if ($errors->has("reply-{$status->id}"))
                <div>
                    <span class="text-error">
                        {{ $errors->first("reply-{$status->id}") }}
                    </span>
                </div>
            @endif
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button
                role="submit" 
                class="btn btn-lg {{ $errors->has('reply')? 'btn-error' : '' }}"
            >
                Reply
            </button>
        </form>
        @if ($status->replies->count() > 0)
          @foreach($status->replies as $reply)
            @include('timeline.components.reply')
          @endforeach
        @endif
    </div>
  </div>
</div>


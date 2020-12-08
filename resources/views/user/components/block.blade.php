<div class="card mb-2">

  <div class="card-header">

    <div class="float-left">
      <a href="/user/{{ $user->username }}">
          <img 
            src="{{ $user->getAvatarURL() }}" 
            alt=""
            class="bg-primary rounded-circle"
            width="55px"
          >
      </a>
      
      <a style="font-size: 2rem" href="/user/{{ $user->username }}" class="text-info">
        {{ "@" . $user->username }}
      </a>
      <br>
    </div>

    <div class="float-right">
      @include('user.components.friendship')
    </div>
    
    <div class="clearfix"></div>

  </div>

  <div class="card-body">
    
    <div>
      <a href="/user/{{ $user->username }}" class="text-secondary">{{ $user->getFullName() }}</a>
      <br>
      <a class="text-secondary" href="">{{ $user->location?? '' }}</a>
    </div>
    
  </div>

</div>
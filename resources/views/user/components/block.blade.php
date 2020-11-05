<style>
  .tile {
    align-items: center;
    padding: .6rem;
    margin: 1rem 0;
  }

  .tile .tile-title {
    font-size: 1.1rem;
    margin: 0;
  }
</style>

<div class="tile bg-gray">
  <div class="tile-icon">
    <a href="/user/{{ $user->username }}">
      <figure 
        class="avatar avatar-xl" 
        data-initial="{{ strtoupper($user->username[0]) }}" 
        style="background-color: #5755d9;"
      >
        <img 
          src="{{ $user->getAvatarURL() }}" 
          alt=""
        >
      </figure>
    </a>
  </div>
  <div class="tile-content">
    <a href="/user/{{ $user->username }}" class="tile-title text-primary">{{ "@" . $user->username }}</a>
    <p class="tile-subtitle text-gray">{{ $user->location?? '' }}</p>
  </div>
  <div>
    <button class="btn btn-lg">add friend</button>
  </div>
</div>
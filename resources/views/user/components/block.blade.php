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
  </div>
  <div class="tile-content">
    <a href="#" class="tile-title text-primary">{{ "@" . $user->username }}</p>
    <p class="tile-subtitle text-gray">{{ $user->location?? '' }}</p>
  </div>
  <div>
    <button class="btn btn-lg">add friend</button>
  </div>
</div>
<header class="navbar bg-primary container" style="padding: .5rem">
  <section class="navbar-section">
    <a href="/" class="navbar-brand mr-2 text-light text-bold">yay!</a>
    
    @if (Auth::check())
      <div style="margin-left: 2rem">
        <a href="#" class="mx-1 text-light">Timeline</a>
        <a href="#" class="mx-2 text-light">Friends</a>
      </div>

      <div 
        class="input-group input-inline mx-2"
      >
        <input class="form-input" type="text" placeholder="search">
        <button
          class="mx-1 btn input-group-btn" 
        >
          Search <i class="icofont-search"></i>
        </button>
      </div>
    @endif
  </section>

  @if (!Auth::check())
    <section class="navbar-section">
        <a href="/signup" class="mx-1 text-light">Sign up</a>
        <a href="/signin" class="mx-1 text-light">Sign in</a>
    </section>
  @else
      <section class="navbar-section">
        <a 
          href="#" 
          class="btn btn-link text-light btn-lg"
        >
          {{ "@" . Auth::user()->getNameOrUsername() }}
        </a>

        <a href="#" class="mx-1 text-light">Update profile</a>
        <a href="/signout" class="mx-1 text-light">Sign out</a>
        
      </section>
      
  @endif
</header>

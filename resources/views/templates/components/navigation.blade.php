<header class="navbar bg-primary container" style="padding: .5rem">
  <section class="navbar-section">
    <a href="/" class="navbar-brand mr-2 text-light text-bold">yay!</a>
  </section>

  <section class="navbar-section">
    @if (true)
        <a href="/signup" class="btn btn-link text-light">Sign up</a>
        <a href="/alert" class="btn btn-link text-light">Sign in</a>
    @else
        <div class="input-group input-inline">
        <input class="form-input" type="text" placeholder="search">
        <button class="btn btn-primary input-group-btn">Search <i class="icofont-search"></i></button>
        </div>
    @endif
  </section>
</header>

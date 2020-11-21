<header>
  <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon d-inline-flex justify-content-center align-items-center">
        <i class="text-light icofont-navigation-menu"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li>
          <a class="navbar-brand" href="/">yay!</a>
        </li>
        @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="/home">Timeline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/friends">Friends</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile/edit">Edit profile</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/signup">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/signin">Sign in</a>
          </li>
        @endif
      </ul>
      @if (Auth::check())
        <form action="/search" class="form-inline my-2 my-lg-0" >
          @csrf
          <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search <i class="icofont-search"></i></button>
        </form>
        <a 
          href="/user/{{ Auth::user()->username }}" 
          class="btn btn-link text-light text-bold btn-lg">
          <img class="rounded-circle" style="background-color: #0004; width: 38px" src="{{ Auth::user()->getAvatarURL() }}" alt="">
        </a>
        <a href="/signout" class="text-danger">Sign out</a>
      @endif
    </div>
  </nav>
</header>

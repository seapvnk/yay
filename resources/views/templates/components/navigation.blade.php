<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <button class="navbar-toggler" 
            type="button" data-toggle="collapse" 
            data-target="#navbarTogglerDemo03" 
            aria-controls="navbarTogglerDemo03" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon d-inline-flex justify-content-center align-items-center">
        <i class="text-light icofont-navigation-menu"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li>
          <a class="navbar-brand" href="{{ route('home') }}">yay!</a>
        </li>
        @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Timeline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('friends.index') }}">Friends</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.get.edit') }}">Edit profile</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signup.get') }}">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signin.get') }}">Sign in</a>
          </li>
        @endif
      </ul>
      @if (Auth::check())
        <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0" >
          @csrf
          <input 
            class="form-control mr-sm-2" 
            name="query" 
            type="search" 
            placeholder="Search" 
            aria-label="Search"
          >
          <button 
            class="btn btn-light my-2 my-sm-0" 
            type="submit"
          >
            Search <i class="icofont-search"></i>
          </button>
        </form>

        <a 
          href="{{ route('user', ['username' => Auth::user()->username]) }}" 
          class="btn btn-link text-light text-bold btn-lg"
        >
          <img 
            class="rounded-circle" 
            src="{{ asset(Auth::user()->getAvatarURL()) }}" 
            alt=""
          >
        </a>

        <a href="{{ route('signout') }}" class="text-light">Sign out</a>
      @endif
    </div>
  </nav>
</header>

<div class="p-4"></div>
<div class="p-4"></div>

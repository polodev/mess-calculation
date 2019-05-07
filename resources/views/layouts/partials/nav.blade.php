<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class='navbar-nav'>
      	<li class='nav-item {{ request()->is( 'bazar' ) ? "active" : "" }}'>
      		<a href="{{ route('bazar.index') }}" class="nav-link">Bazar</a>
      	</li>
      	<li class='nav-item {{ request()->is( 'meal' )  ? "active" : "" }}  '>
      		<a href="{{ route('meal.index') }}" class="nav-link">Meal</a>
      	</li>

        <li class='nav-item {{ request()->is( 'debit-credit' ) ? "active" : "" }} '>
          <a href="{{ route('debit-credit.index') }}" class="nav-link">My Debit Credit</a>
        </li>
        <li class='nav-item {{ request()->is( 'debit-credit-all' ) ? "active" : "" }} '>
          <a href="{{ route('debit-credit.index_all') }}" class="nav-link">All Debit Credit</a>
        </li>
        <li class='nav-item {{ request()->is( 'about' ) ? "active" : "" }} '>
          <a href="{{ route('about') }}" class="nav-link">About</a>
        </li>

      	<!-- /.nav-item -->
      </ul>
      <!-- /.navbar-nav -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @endguest
    </ul>
  </div>
</div>
</nav>

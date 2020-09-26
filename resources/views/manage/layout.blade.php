<!DOCTYPE html>
<html lang="ja">

@yield('link')

<body>
  <header>
    Headerです


      <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
      </a> -->

      <div class="">
          <a class="" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </header>

  @yield('content')

  <footer>
    Footerです
  </footer>    
</body>
</html>
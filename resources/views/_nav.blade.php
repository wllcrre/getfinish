    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">GetFinish</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
            <a class="nav-link" href="/">首頁 <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item {{ Request::is('getfinish') ? "active" : "" }}"><a class="nav-link"  href="/getfinish">最新項目</a></li>

          <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
            <a class="nav-link" href="/about">關於我們</a>
          </li>
          <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
            <a class="nav-link" href="/contact">連絡我們</a>
          </li> 


          @auth
            <li class="nav-item {{ Request::is('categories/create') ? "active" : "" }}">
              <a class="nav-link" href="{{ route('categories.create') }}">分類管理</a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? "active" : "" }}">
              <a class="nav-link" href="{{ route('categories.index') }}">待辦事項</a>
            </li>

          @endauth   


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Laravel
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" target="_blank" href="https://www.youtube.com/channel/UC6kwT7-jjZHHF1s7vCfg2CA/playlists">Alex channel</a>
              <a class="dropdown-item" target="_blank" href="https://laravel.tw">Laravel TW</a>
              <a class="dropdown-item" target="_blank" href="/welcome">Welcome</a>              
            </div>
          </li>

                   
        </ul>

        <ul class="navbar-nav navbar-right">
          @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">登入</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">註冊</a>
              </li>              
          @else

              <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>                 

                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                  </div>
              </li>
          @endguest
        </ul>      



      </div>
    </nav>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="z-index: 1;box-shadow: 0px 4px 18px 3px rgba(238, 85, 85, 0.21) !important;  position: sticky;top: 0;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div style="display:flex;align-items: center;gap: 14px;" >
                        <a class="logoa" href="{{ route('home') }}"><img src="{{asset('storage\images\Foodies.png')}}" style="width:100px;height:30px;"/></a>
                            <div class="titles">
                                <a href="{{ route('home') }}" class="homeheader" >Home</a>
                                <a href="{{ route('searchFood') }}" class="foodheader" >Food</a>
                                <a href="{{ route('Allcusisnes') }}" class="cuisineheader" >Cuisines</a>
                            </div>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('login') }}" style="color: #e55;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #e55;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #e55;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                      Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
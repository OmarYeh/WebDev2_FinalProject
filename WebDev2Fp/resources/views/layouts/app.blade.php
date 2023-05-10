<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/recoleta" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body{
            /*font-family: 'Gilroy','Helvetica','Arial','sans-serif';*/
            font-family: Satoshi;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color:#fdfdf7;
        }
        input, button, select, textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            margin: 0;
            font: inherit;
            font-weight: inherit;
            font-family: inherit;
            color: inherit;
        }
        /*HOME AND FOOD STYLES*/
       
    </style>
    @yield('css')

    <script type="text/javascript">


        //for first dishes row.
        document.addEventListener("DOMContentLoaded", function (event) {
            const btnleft = document.querySelectorAll(".left-button");
            if (btnleft) {
                btnleft.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow");
                        const scrollPosition = container[index].scrollLeft - 200;
                        console.log(scrollPosition);
                        container[index].scroll({ left: scrollPosition , behavior: "smooth" });
                        //container[index].scrollLeft = scrollPosition;
                    });
                });
            }
            const btnRigth = document.querySelectorAll(".right-button");
            if (btnRigth) {
                btnRigth.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow");
                        console.log(index, container, container[index]);
                        const scrollPosition = container[index].scrollLeft + 200;

                        container[index].scroll({ left: scrollPosition, behavior: "smooth" });

                    });
                });
            }
        });

        function scrollRight() {
            var container = document.getElementsByClassName(".dishesrow");
            container[0].scroll({ left: 200, behavior: "smooth" });
        }
    //for second dishes row
        document.addEventListener("DOMContentLoaded", function (event) {
            const btnleft = document.querySelectorAll(".left-button2");
            if (btnleft) {
                btnleft.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow2");
                        const scrollPosition = container[index].scrollLeft - 200;
                        console.log(scrollPosition);
                        container[index].scroll({ left: scrollPosition , behavior: "smooth" });
                        //container[index].scrollLeft = scrollPosition;
                    });
                });
            }
            const btnRigth = document.querySelectorAll(".right-button2");
            if (btnRigth) {
                btnRigth.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow2");
                        console.log(index, container, container[index]);
                        const scrollPosition = container[index].scrollLeft + 200;

                        container[index].scroll({ left: scrollPosition, behavior: "smooth" });

                    });
                });
            }
        });

        function scrollRight() {
            var container = document.getElementsByClassName(".dishesrow2");
            container[0].scroll({ left: 200, behavior: "smooth" });
        }
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                    <p class="col-md-4 mb-0 text-body-secondary">© 2023 Company, Inc</p>
                    <img src="https://img.icons8.com/ios/50/null/kawaii-sushi.png" style="height:50px; width:50px;"/>
                    <ul class="nav col-md-4 justify-content-end">
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary" style="color:black;">Home</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary" style="color:black;">Features</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary" style="color:black;">Pricing</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary" style="color:black;">FAQs</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary" style="color:black;">About</a></li>
                    </ul>
                </footer>
            </div>
        </footer>
    </div>
</body>
@yield('js')
</html>

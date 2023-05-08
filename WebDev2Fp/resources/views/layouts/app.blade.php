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
        .homeimage{
            background: url("https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?cs=srgb&dl=pexels-ella-olsson-1640774.jpg&fm=jpg") center center / cover;
            height:600px;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            -moz-box-pack: center;
            justify-content: center;
        }
        .py-4{
            padding-top:0px !important;
        }
        .imagebox{
            height: 327px;
            width:576px;
            border-radius: 8px;
            max-width: 576px;
            margin: 32px 16px;
            background-color: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            -moz-box-align: center;
            align-items: center;
            box-shadow: rgba(0, 0, 0, 0.04) 1px 8px 15px;
            border: 1px solid rgb(235, 235, 236);
            justify-content: center;
        }
        .titleimagebox{
            text-align: center;
            width: 450px;
            font-size: 48px;
            line-height: 58px;
            font-weight: 700;
            color: rgb(56, 56, 56);
            margin: 0px 0px 23px;
        }
        .textimagebox{
            text-align: center;
            width: 100%;
            padding: 0px 4px;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: rgb(92, 92, 92);
            margin: 0px 0px 43px;
        }
        .searchbox{
            -moz-box-align: center;
            align-items: center;
            border-radius: 8px;
            border: 1px solid rgb(184, 184, 184);
            cursor: text;
            display: flex;
            gap: 8px;
            padding: 4px;
            width: 501px;
            height: 50px;
        }
        .input{
            font-family: "Gilroy", "Helvetica", "Arial", "sans-serif";
            font-weight: 500;
            font-size: 16px;
            line-height: 18px;
            border-style: hidden;
            width: 100%;
        }
        .input:focus{
            outline:none;
        }
        .input::placeholder{
            color: rgb(149, 149, 149);
        }
        .buttoninput{
            border-radius: 8px;
            height: 40px;
            font-weight: 600;
            padding: 0px 16px;
            flex-shrink: 0;
            transition: background 0.22s ease 0s;
            position: relative;
            color: rgb(255, 255, 255);
            background: #e55;
            cursor: pointer;
            margin: 0px;
            display: flex;
            flex-direction: row;
            -moz-box-pack: center;
            justify-content: center;
            -moz-box-align: center;
            align-items: center;
            border: medium none;
            font-family: "Gilroy", "Helvetica", "Arial", "sans-serif" !important;
            font-style: normal;
            line-height: 16px;
            font-weight: normal;
            cursor: pointer;
            font-size: 16px;
            height: 42px;
        }
        .buttoninput:hover{
            background: #c83535;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.5);
        }
        .fjClFW{
            height: 33px;
            width: 33px;
            font-size: 24px;
            color: rgb(149, 149, 149);
            padding-left: 4px;
            flex-shrink: 0;
        }

        .cuisinecat {
            display: grid;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 76%;
            margin-left: calc((100% - 76%)/2);
        }
        .buttonrow {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .buttonforcat {
            flex-basis: calc(100% - 89%);
            flex-grow: 1;
            background: unset;
            border: 1px solid rgb(202, 202, 202);
            padding: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: box-shadow 0.11s ease-in-out 0s;
            font-size: 18px;
            background: #e55;
            color: white;
        }

        .buttonforcat:hover {
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.25);
            background:#c73535;
        }
        .productshowcard{
            display: grid;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 95%;
            margin-left: calc((100% - 95%)/2);
            margin-top: 100px;
        }

        .dishesrow{
            display:flex;
            gap:16px;
            overflow-x: hidden;


        }
        #left-button,
        #right-button {
            background-color: #ffffff;
            border: none;
            color: #000000;
            font-size: 30px;
            padding: 10px 20px;
            margin: 0 10px;
        }

        #left-button:hover,
        #right-button:hover {
            background-color: #000000;
            color: #ffffff;
            cursor: pointer;
        }
        .productinfo{
            display: -webkit-inline-box;
            gap: 100px;
            margin-top:10px;
            font-size: 21px;
        }
        .imagedish:hover{
            cursor:pointer;
        }
        .imagedishimg:hover{
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.25);
        }
        .advert{
            margin-top: 150px;
            display: flex;
            gap: 70px;
        }
        .advertttext{
            max-width: 600px;
        }
        .storeinfo{
            display: flex;
            gap: 12px;
            margin-top:10px;
            font-size: 21px;
            margin-left: 24px;
        }

    </style>
    @yield('css')

    <script type="text/javascript">
        const dishesRow = document.querySelector('.dishesrow');
        const leftButton = document.querySelector('#left-button');
        const rightButton = document.querySelector('#right-button');
        const scrollStep = 300;

        leftButton.addEventListener('click', () => {
            dishesRow.scrollBy({ left: -scrollStep, behavior: 'smooth' });
        });

        rightButton.addEventListener('click', () => {
            dishesRow.scrollBy({ left: scrollStep, behavior: 'smooth' });
        });
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

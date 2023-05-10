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
            text-decoration: none;
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
            color:white;
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
        .dishesrow2{
            display:flex;
            gap:16px;
            overflow-x: hidden;
        }
        .left-button,
        .right-button {
            background-color: #ffffff;
            border: none;
            color: #000000;
            font-size: 30px;
            padding: 10px 20px;
            margin: 0 10px;
        }

        .left-button:hover,
        .right-button:hover {
            background-color: #000000;
            color: #ffffff;
            cursor: pointer;
        }
        .left-button2,
        .right-button2 {
            background-color: #ffffff;
            border: none;
            color: #000000;
            font-size: 30px;
            padding: 10px 20px;
            margin: 0 10px;
        }

        .left-button2:hover,
        .right-button2:hover {
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
            gap: 67px;
            margin-top:10px;
            font-size: 21px;
            margin-left: 24px;
        }
        .main-card {
            margin-bottom: 50px;
        }
        /*this is for going back pages*/
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .breadcrumb-chevron {
            --bs-breadcrumb-divider: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d'%3E%3Cpath fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            gap: .5rem;
        }

        .breadcrumb-chevron .breadcrumb-item {
            display: flex;
            gap: inherit;
            align-items: center;
            padding-left: 0;
            line-height: 1;
        }

        .breadcrumb-chevron .breadcrumb-item::before {
            gap: inherit;
            float: none;
            width: 1rem;
            height: 1rem;
        }

        .breadcrumb-custom .breadcrumb-item {
            position: relative;
            flex-grow: 1;
            padding: .75rem 3rem;
        }

        .breadcrumb-custom .breadcrumb-item::before {
            display: none;
        }

        .breadcrumb-custom .breadcrumb-item::after {
            position: absolute;
            top: 50%;
            right: -25px;
            z-index: 1;
            display: inline-block;
            width: 50px;
            height: 50px;
            margin-top: -25px;
            content: "";
            background-color: var(--bs-tertiary-bg);
            border-top-right-radius: .5rem;
            box-shadow: 1px -1px var(--bs-border-color);
            transform: scale(.707) rotate(45deg);
        }

        .breadcrumb-custom .breadcrumb-item:first-child {
            padding-left: 1.5rem;
        }

        .breadcrumb-custom .breadcrumb-item:last-child {
            padding-right: 1.5rem;
        }

        .breadcrumb-custom .breadcrumb-item:last-child::after {
            display: none;
        }

        /*this is for img and texts*/
        img {
            transition: transform .5s ease;
        }

        img:hover {
            transform: scale(1.1);
        }

        .main-card {
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .side-card {
            flex: 1;
            margin-left: 20px;
        }

        .title {
            font-size: 30px;
            color: #005500;
            font-weight: bold;
        }

        .price {
            font-size: 25px;
            color: #005500;
        }

        .extras {
            display: flex;
            flex-direction: row;
        }
        /*this is for quantity*/
        .quantity p {
            font-size: 25px;
            color: #005500;
        }

        .quantity {
            display: flex;
        }

        .counter {
            width: 144px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            margin-bottom: 10px;
            border: 1px solid #005500;
            margin-left: 20px;
            border-radius: 21px;
        }

        .counter input {
            width: 50px;
            border: 0;
            line-height: 40px;
            font-size: 20px;
            text-align: center;
            background: #005500;
            color: #fff;
            appearance: none;
            outline: 0;
        }

        .counter span {
            display: block;
            font-size: 25px;
            padding: 0 15px;
            cursor: pointer;
            color: #005500;
            user-select: none;
        }

        /*this is for cart*/
        .fa-cart-plus {
            background: #0652DD;
        }

        .addtocart {
            display: block;
            padding: 0.5em 1em 0.5em 1em;
            border-radius: 100px;
            border: none;
            font-size: 2em;
            position: relative;
            background: #0652DD;
            cursor: pointer;
            height: 51px;
            width: 263px;
            overflow: hidden;
            transition: transform 0.1s;
            z-index: 1;
            margin-top: 20px;
        }

        .addtocart:hover {
            transform: scale(1.1);
        }

        .pretext {
            color: #fff;
            background: #0652DD;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Quicksand', sans-serif;
            font-size: 25px;
        }

        i {
            margin-right: 10px;
        }

        .done {
            background: #005500;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            transition: transform 0.3s ease;
            transform: translate(-110%) skew(-40deg);
        }

        .posttext {
            background: #005500;
        }

        .fa-check {
            background: #005500;
        }

        /*this is for suggested list*/
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .list-group {
            width: 100%;
            max-width: 460px;
            margin-inline: 1.5rem;
        }

        .form-check-input:checked + .form-checked-content {
            opacity: .5;
        }

        .form-check-input-placeholder {
            border-style: dashed;
        }

        [contenteditable]:focus {
            outline: 0;
        }

        .list-group-checkable .list-group-item {
            cursor: pointer;
        }

        .list-group-item-check {
            position: absolute;
            clip: rect(0, 0, 0, 0);
        }

        .list-group-item-check:hover + .list-group-item {
            background-color: var(--bs-secondary-bg);
        }

        .list-group-item-check:checked + .list-group-item {
            color: #fff;
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
        }

        .list-group-item-check[disabled] + .list-group-item,
        .list-group-item-check:disabled + .list-group-item {
            pointer-events: none;
            filter: none;
            opacity: .5;
        }

        .list-group-radio .list-group-item {
            cursor: pointer;
            border-radius: .5rem;
        }

        .list-group-radio .form-check-input {
            z-index: 2;
            margin-top: -.5em;
        }

        .list-group-radio .list-group-item:hover,
        .list-group-radio .list-group-item:focus {
            background-color: var(--bs-secondary-bg);
        }

        .list-group-radio .form-check-input:checked + .list-group-item {
            background-color: var(--bs-body);
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 2px var(--bs-primary);
        }

        .list-group-radio .form-check-input[disabled] + .list-group-item,
        .list-group-radio .form-check-input:disabled + .list-group-item {
            pointer-events: none;
            filter: none;
            opacity: .5;
        }

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

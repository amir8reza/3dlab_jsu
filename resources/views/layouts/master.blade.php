<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{asset('styles/index-styles.css')}}">
    <link rel="stylesheet" href="{{asset('styles/fontawsome.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/all.min.css')}}">

</head>
@yield('styles')
<body>

<header>
    <nav>
        <div class="top">
            @auth
                <form method="post" action="/logout"> @csrf
                    <button type="submit" id="signup-btn"> <a> <i class="fa fa-solid fa-sign-out"></i> خارج شدن </a> </button>
                </form>
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                    <button id="profile-btn"> <a href="/admin"> پنل مدیریت </a></button>
                @endif
                <img class="price-icon" src="{{ asset('images/icons/coin.png') }}" alt="price-icon.png">
                <span class="price-number"> {{ \Illuminate\Support\Facades\Auth::user()->wallet }} </span>
            @endauth
            @guest
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                <button id="signup-btn"> <a href="/register"> عضویت  </a> </button>
            @endguest
            <a href="{{route('index')}}" id="logo"> 3DLAB </a>
        </div>
        <div class="bot">
            <ul>
                @auth
                    <li><a href="{{route('userCart')}}"> <i class="fa fa-solid fa-shopping-cart"></i> سبد خرید </a></li>
                    <li><a href="/profile/edit"> ویرایش پروفایل </a></li>
                    <li><a href="{{route('buyCoin')}}"> <i class="fa fa-solid fa-coin"></i> افزایش اعتبار </a></li>
                @endauth
                <li><a href="{{route('categories')}}"> دسته بندی </a></li>
                <li><a href="{{route('aboutUs')}}">درباره ما</a></li>
                <li><a href="{{route('index')}}"> <i class="fa fa-solid fa-home-lg"></i> </a></li>
            </ul>
        </div>
    </nav>
   @yield('header')
</header>

@yield('main-section')

<footer>
    <ul>
        <li><a href="#"> درباره </a></li>
        <li><a href="#"> حمایت </a></li>
        <li><a href="#"> تماس با ما </a></li>
    </ul>

</footer>

</body>

</html>

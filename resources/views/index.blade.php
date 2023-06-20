<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home </title>
</head>
<link rel="stylesheet" href="styles/index-styles.css">

<body>

    <header>
        <nav>
            <div class="top">
                @auth
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                    <form method="post" action="/logout"> @csrf
                        <button type="submit" id="signup-btn"> <a> خارج شدن </a> </button>
                    </form>
                @endauth
                    @guest
                        <button id="profile-btn"> <a href="login"> پنل کاربری </a></button>
                        <button id="signup-btn"> <a href="register"> عضویت  </a> </button>
                    @endguest

                <a href="{{route('index')}}" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="/about-us">درباره ما</a></li>
                    <li><a href="/categories"> دسته بندی </a></li>
                </ul>
            </div>
        </nav>
        <div class="header-title">
            <div class="background-overlay">
                <div class="container">
                    <div class="header-text">
                        <h1> 3DLAB </h1>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <h1> جدیدترین ها </h1>
            <div class="row">

                @isset($new_models)
                    @foreach($new_models as $new_model)
                        <div class="card">
                            <div class="card-image">
                                <a href="models/{{$new_model->slug}}"> <img src="{{asset('storage/'.$new_model->images['image'])}}"> </a>
                            </div>
                            <div class="card-text">
                                <p>  {{$new_model->title}} </p>
                                <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                                <span class="like-number"> 5 </span>
                                <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                                <span class="price-number"> 350 </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    مدلی در دیتابیس نیست
                @endisset

            </div>

        </div>
    </section>

    <footer>
        <ul>
            <li><a href="#"> درباره </a></li>
            <li><a href="#"> حمایت </a></li>
            <li><a href="#"> تماس با ما </a></li>
        </ul>

    </footer>

</body>

</html>

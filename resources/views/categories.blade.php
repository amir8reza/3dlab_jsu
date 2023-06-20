<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home </title>
</head>
<link rel="stylesheet" href="styles/index-styles.css">
<link rel="stylesheet" href="styles/categories-styles.css">

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
                    <li><a href="{{route('categories')}}"> دسته بندی </a></li>
                </ul>
            </div>
        </nav>
        <div class="header-title">
            <div class="background-overlay">
                <div class="container">
                    <div class="header-text">
                        <h1> 3DLAB </h1>
                        <p> دسته بندی ها </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <form class="search-bar-form" action="/categories" method="post"> @csrf
                    <h1> جستجو </h1>
                    <input type="text" name="search_bar_text" id="search-bar">
                    <button type="submit"> جستجو </button>
                </form>
            </div>

            @isset($models)
                <div class="row">
                @foreach($models as $model)
                    <div class="card">
                        <div class="card-image">
                            <a href="/models/{{$model->slug}}"> <img src="{{asset('storage/'.$model->images['image'])}}"> </a>
                        </div>
                        <div class="card-text">
                            <p>  {{$model->title}} </p>
                            <img class="like-icon" src="../images/icons/heart.png" alt="like-icon.png">
                            <span class="like-number"> 5 </span>
                            <img class="price-icon" src="../images/icons/coin.png" alt="price-icon.png">
                            <span class="price-number"> 350 </span>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="row">
                <div class="category-card">

                    <div class="category-image">
                        <a href="/categories/1">
                            <img src="\images\cars.jpg" alt="cars.jpg">
                        </a>
                    </div>
                    <div class="category-desc">
                        <h3> وسیله نقلیه </h3>
                    </div>
                </div>

                <div class="category-card">

                    <div class="category-image">
                        <a href="#">
                            <img src="\images\weapons.jpg" alt="weapons.jpg">
                        </a>
                    </div>
                    <div class="category-desc">
                        <h3> اسلحه و نظامی </h3>
                    </div>
                </div>

                <div class="category-card">

                    <div class="category-image">
                        <a href="#">
                            <img src="\images\character.jpg" alt="character.jpg">
                        </a>
                    </div>
                    <div class="category-desc">
                        <h3>  کاراکتر </h3>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="category-card">

                    <div class="category-image">
                        <a href="#">
                            <img src="\images\robot.jpg" alt="robot.jpg">
                        </a>
                    </div>
                    <div class="category-desc">
                        <h3> ربات  </h3>
                    </div>
                </div>

                <div class="category-card">

                    <div class="category-image">
                        <a href="#">
                            <img src="\images\pbr.jpg" alt="pbr.jpg">
                        </a>
                    </div>
                    <div class="category-desc">
                        <h3> PBR  </h3>
                    </div>
                </div>

                <div class="category-card">

                    <div class="category-image">
                        <a href="#">
                            <img src="\images\electronic.jpg" alt="electronics.jpg">
                        </a>
                    </div>
                    <div class="category-desc">
                        <h3>  دستگاه الترونیک </h3>
                    </div>
                </div>

            </div>
            @endisset
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

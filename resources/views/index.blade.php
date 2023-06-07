<!DOCTYPE html>
<html lang="en">

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
                <button id="profile-btn"> <a href="profile"> پنل کاربری </a></button>
                    <form method="post" action="/logout"> @csrf
                        <button type="submit" id="signup-btn"> <a> خارج شدن </a> </button>
                    </form>

                @endauth
                    @guest
                        <button id="profile-btn"> <a href="login"> پنل کاربری </a></button>
                        <button id="signup-btn"> <a href="register"> عضویت  </a> </button>
                    @endguest

                <a href="#" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="">درباره ما</a></li>
                    <li><a href=""> سفارش </a></li>
                    <li><a href=""> دسته بندی </a></li>
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
                                <a href="models/{{$new_model->slug}}"> <img src="images/card-image/Lowpoly1.png"> </a>
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

            <h1> محبوب ترین ها </h1>
            <div class="row">
                <div class="card">
                    <div class="card-image">
                        <a href="#"> <img src="images/card-image/Lowpoly1.png"> </a>
                    </div>
                    <div class="card-text">
                        <p> لورم ایپسوم </p>
                        <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                        <span class="like-number"> 5 </span>
                        <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                        <span class="price-number"> 350 </span>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <a href="#"> <img src="images/card-image/katana2.png"> </a>
                    </div>
                    <div class="card-text">
                        <p> لورم ایپسوم </p>
                        <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                        <span class="like-number"> 5 </span>
                        <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                        <span class="price-number"> 350 </span>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <a href="#"> <img src="images/card-image/car1.png"> </a>
                    </div>
                    <div class="card-text">
                        <p> لورم ایپسوم </p>
                        <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                        <span class="like-number"> 5 </span>
                        <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                        <span class="price-number"> 350 </span>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <a href="#"> <img src="images/card-image/Sci-fi Gun2.png"> </a>
                    </div>
                    <div class="card-text">
                        <p> لورم ایپسوم </p>
                        <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                        <span class="like-number"> 5 </span>
                        <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                        <span class="price-number"> 350 </span>
                    </div>
                </div>

            </div>

            <h1>جدیدترین سفارشات </h1>

            <div class="row">
                <div class="order-card">
                    <span class="order-status"> موجود </span>
                    <span class="order-submit-date"> 3 روز پیش </span>
                    <h3 class="order-title"> ساخت کاراکتر سه بعدی </h3>
                    <p class="order-desc"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                    </p>
                    <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                    <span class="price-number"> 350 </span>
                    <a href="#" class="order-link"> مشاهده </a>
                </div>

                <div class="order-card">
                    <span class="order-status"> موجود </span>
                    <span class="order-submit-date"> 3 روز پیش </span>
                    <h3 class="order-title"> ساخت کاراکتر سه بعدی </h3>
                    <p class="order-desc"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                    </p>
                    <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                    <span class="price-number"> 350 </span>
                    <a href="#" class="order-link"> مشاهده </a>
                </div>

                <div class="order-card">
                    <span class="order-status"> موجود </span>
                    <span class="order-submit-date"> 3 روز پیش </span>
                    <h3 class="order-title"> ساخت کاراکتر سه بعدی </h3>
                    <p class="order-desc"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                    </p>
                    <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                    <span class="price-number"> 350 </span>
                    <a href="#" class="order-link"> مشاهده </a>
                </div>

                <div class="order-card">
                    <span class="order-status"> موجود </span>
                    <span class="order-submit-date"> 3 روز پیش </span>
                    <h3 class="order-title"> ساخت کاراکتر سه بعدی </h3>
                    <p class="order-desc"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                    </p>
                    <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                    <span class="price-number"> 350 </span>
                    <a href="#" class="order-link"> مشاهده </a>
                </div>

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
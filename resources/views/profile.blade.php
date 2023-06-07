<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
</head>
<link rel="stylesheet" href="styles/profile-styles.css">

<body>

    <header>
        <nav>
            <div class="top">
                <button id="profile-btn"> <a href="sign_in.html"> پنل کاربری </a></button>
                <button id="signup-btn"> <a href="sign_up.html"> عضویت </a> </button>
                <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                <span class="price-number"> {{ $user['wallet'] }} </span>
                <span></span>
                <a href="#" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="">درباره ما</a></li>
                    <li><a href=""> سفارش </a></li>
                    <li><a href=""> دسته بندی </a></li>
                    <li><a href="profile/edit"> ویرایش پروفایل </a></li>
                    <li><a href=""> افزایش اعتبار </a></li>
                </ul>
            </div>
        </nav>
        <div class="header-profile">
            <div class="background-overlay">
                <div class="container">
                    <img id="profile-pic" src="images/profile-pics/profile1.png" alt="profile-pic.png">
                    <h1 id="username">  {{ $user['username']  }} </h1>
                    <p id="user-description">
                        @isset($user['user_description'])
                            {{$user['user_description']}}
                        @else
                        توضیحاتی وارد نشده است
                        @endisset
                    </p>
                    <button id="add-model-btn"> <a href="{{ route('newModel') }}"> آپلود مدل </a></button>
                    <button id="add-order-btn"> <a href="add-order.html"> سفارش جدید </a></button>

                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <h1> آپلودها </h1>
            <div class="row">

            @foreach($models as $model)
                    <div class="card">
                        <div class="card-image">
                            <a href="models/{{$model['slug']}}"> <img src="images/card-image/Sci-fi Gun2.png"> </a>
                        </div>
                        <div class="card-text">
                            <p> {{$model['title']}}  </p>
                            <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                            <span class="like-number"> 5 </span>
                            <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                            <span class="price-number"> {{ $model['price']  }} </span>
                            <a href="models/{{$model['slug']}}" class="card-link"> مشاهده </a>
                        </div>
                    </div>
            @endforeach


            </div>



            <h1> سفارشات </h1>

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

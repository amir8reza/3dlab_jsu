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
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                <form method="post" action="{{ route('logout')  }}"> @csrf
                    <button type="submit" id="signup-btn"> <a> خارج شدن </a> </button>
                </form>
                <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                <span class="price-number"> {{ $user['wallet'] }} </span>
                <a href="/index" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="{{route('aboutUs')}}">درباره ما</a></li>
                    <li><a href=""> دسته بندی </a></li>
                    <li><a href="/profile/edit"> ویرایش پروفایل </a></li>
                    <li><a href="{{route('buyCoin')}}"> افزایش اعتبار </a></li>
                    <li><a href="{{route('index')}}"> خانه </a></li>
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
                    <button id="add-order-btn"> <a href="{{ route('userCart')  }}"> سبد خرید  </a></button>
                    <button id="add-order-btn"> <a href="{{ route('conversations')  }}"> پیام ها  </a></button>

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
                            <a href="models/{{$model['slug']}}"> <img src="{{asset('storage/'.$model->images['image'])}}"> </a>
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



            <h1> خرید ها </h1>

            <div class="row">
                @foreach($sales as $sale)
                    <div class="card">
                        <div class="card-image">
                            <a href="models/{{$sale->model3ds->slug}}"> <img src="{{asset('storage/'.$sale->model3ds->images->image)}}"> </a>
                        </div>
                        <div class="card-text">
                            <p> {{$sale->model3ds->title}}  </p>
                            <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                            <span class="like-number"> 5 </span>
                            <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                            <span class="price-number"> {{ $sale->price  }} </span>
                            <a href="models/{{$sale->model3ds->slug}}" class="card-link"> مشاهده </a>
                        </div>
                    </div>
                @endforeach

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

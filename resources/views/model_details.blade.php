<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$model->slug}} </title>
</head>
<link rel="stylesheet" href="../styles/index-styles.css">
<link rel="stylesheet" href="../styles/model-details-styles.css">
<link rel="stylesheet" href="../styles/fontawsome.min.css">
<link rel="stylesheet" href="../styles/all.min.css">


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
                    <button id="profile-btn"> <a href="/login"> پنل کاربری </a></button>
                    <button id="signup-btn"> <a href="/register"> عضویت  </a> </button>
                @endguest
                    <a href="{{route('index')}}" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="/about-us">درباره ما</a></li>
                    <li><a href=""> دسته بندی </a></li>
                    <li><a href="{{route('index')}}"> خانه </a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="model-detail">
                <div class="user-detail">
                    <img id="avatar" src="../images/profile-pics/profile1.png" alt="avatar.png">
                    <h2 id="username"> {{ $user['username']  }}  </h2>
                    <span id="model-name"> نام مدل :  {{ $model->title  }} </span> <br>
                    <span>
                        <p> توضیحات : {{$model->description}} </p>
                    </span>
                    <span id="model-date"> آخرین تغییر : {{ $model->updated_at  }}</span> <br>
                    <span id="model-price"> قیمت : {{ $model->price  }}</span>
                    <img class="price-icon" src="../images/icons/coin.png" alt="price-icon.png"> <br>
                    @if($user['id'] != \Illuminate\Support\Facades\Auth::id())
                        @if($owned)
                            <button class="model-buy"> <i class="fa fa-solid fa-download"></i> <a href="/models/download/{{$model->slug}}"> دانلود فایل   </a> </button>
                        @else
                            <button class="model-buy"> <i class="fa fa-solid fa-shopping-cart"></i> <a href="/models/buy/add/{{$model->id}}"> افزودن به سبد </a> </button>
                        @endif
                        <button class="model-chat"> <i class="fa fa-solid fa-message"></i> <a href="/chat/{{$user['id']}}"> پیام به {{$user['username']}} </a> </button>
                    @else
                        <button class="model-buy"> <i class="fa fa-solid fa-edit"></i> <a href="/models/edit/{{$model->id}}"> ویرایش محصول </a> </button>
                    @endif
                    <div class="reviews">
                        <h3 id="comment-title"> نظرات </h3>

                        @isset($comments)
                            @foreach($comments as $comment)
                            <div class="comment">
                                <img class="comment-img" src="../images/profile-pics/profile1.png" alt="aa.png">
                                <h4 class="comment-name"> {{ $comment->user->username }} </h4>
                                <p class="comment-text">
                                    {{$comment->comment_text}}
                                </p>
                                <p class="comment-rate"> امتیاز داده شده : {{ $comment->rate  }} </p>
                            </div>
                            @endforeach
                        @else
                            نظری داده نشده است .

                        @endisset




                        <form class="user-comment" action="/models/{{$model->slug}}" method="post"> @csrf
                            <textarea name="user-comment-text" id="user-comment-text" cols="20" rows="2"></textarea>

                            <button id="comment-submit" type="submit"><i class="fa fa-solid fa-comment"></i> ثبت نظر  </button>
                            <select name="rate" id="rate">
                                <option value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5" selected> 5 </option>
                            </select>
                            <label for="rate"> امتیاز شما </label>

                        </form>

                    </div>
                </div>
            </div>
            <div class="model-image">
                <img src="{{ $image_url }}" alt="model_image" >
            </div>
        </div>
    </section>



</body>

</html>

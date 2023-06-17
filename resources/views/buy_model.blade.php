<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home </title>
</head>
<link rel="stylesheet" href="../../styles/index-styles.css">
<link rel="stylesheet" href="../../styles/model-buy-styles.css">

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
                    <li><a href="">درباره ما</a></li>
                    <li><a href=""> سفارش </a></li>
                    <li><a href=""> دسته بندی </a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="model-detail">
                <div class="user-detail">
                    <h1> سبد خرید </h1>

                    @foreach($sales as $sale)
                        <div class="row">
                            <p> نام مدل : {{$sale->model3ds->title}}
                                <br> قیمت : {{$sale->price}}
                                <br> تاریخ ثبت : {{$sale->created_at}}
                            </p>
                            <form action="/models/buy/delete/{{$sale->id}}" method="post"> @csrf
                                @method('delete')
                            <button> حذف از سبد </button>
                            </form>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="model-image">
                <form action="{{ route('buyCart')  }}" method="post"> @csrf
                    <button> خرید مدل ها </button>
                </form>
            </div>
        </div>
    </section>



</body>

</html>

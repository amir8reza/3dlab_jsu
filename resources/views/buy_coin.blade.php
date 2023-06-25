<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> خرید سکه </title>
</head>
<link rel="stylesheet" href="../styles/index-styles.css">
<link rel="stylesheet" href="../styles/buy-coin-styles.css">

<body>

    <header>
        <nav>
            <div class="top">
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                <form method="post" action="/logout"> @csrf
                    <button type="submit" id="signup-btn"> <a> خارج شدن </a> </button>
                </form>
                <img class="price-icon" src="../images/icons/coin.png" alt="price-icon.png">
                <span class="price-number"> {{ $user['wallet'] }} </span>
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
    </header>

    <section>
        <div class="container">

            <div class="buy-coin">
                <h2> خرید سکه </h2>
                <form action="{{route('buyCoin')}}" method="post"> @csrf @method('put')
                    <input type="number" name="amount">
                    <button type="submit"> خرید </button>
                </form>
                @if($errors->any())
                    <ul class="errors_ul">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>



</body>

</html>

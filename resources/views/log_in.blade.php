<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ورود به سایت </title>

    <link rel="stylesheet" href="{{asset('styles/sign_in-styles.css')}}">
</head>

<body>

    <div class="background-overlay">

        <div class="container">
            <div class="panel">
                <h2> ورود </h2>
                <form action="login" method="post"> @csrf

                    <input name="username" type="text" placeholder="نام کاربری">
                    <input name="password" type="password" placeholder="کلمه عبور">

                    <button type="submit"> ورود </button>
                </form>
                @if($errors->any())
                    <ul class="errors_ul">
                        @foreach ($errors->all() as $error)
                            <li style="color:red;font-size:12px;list-style:none;margin-bottom:5px"> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif
                <a href="/forgot-password"> بازیابی کلمه عبور </a>
                <a href="register"> ساخت اکانت جدید </a>

            </div>
        </div>

    </div>

</body>

</html>

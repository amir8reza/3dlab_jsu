<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ایجاد حساب کاربری </title>

    <link rel="stylesheet" href="{{asset('styles/sign_up-styles.css')}}">
</head>

<body>

    <div class="background-overlay">

        <div class="container">
            <div class="panel">
                <h2> ثبت نام </h2>
                <form action="/register" method="post">
                    @csrf

                    <input name="username" type="text" placeholder="نام کاربری">
                    <input name="email" type="text" placeholder="پست الکترونیک">
                    <input name="password" type="password" placeholder="کلمه عبور">
                    <input name="password_confirmation" type="password" placeholder="تکرار کلمه عبور">
                    <input name="phone_number" type="text" placeholder=" شماره تلفن ">

                    <button type="submit"> ایجاد حساب کاربری </button>
                    @if($errors->any())
                        <ul class="errors_ul">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                        </ul>
                    @endif
                </form>
            </div>
        </div>

    </div>

</body>

</html>

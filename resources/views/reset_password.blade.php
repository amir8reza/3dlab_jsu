<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> بازیابی کلمه عبور </title>

    <link rel="stylesheet" href="{{asset('styles/sign_in-styles.css')}}">
</head>

<body>

    <div class="background-overlay">

        <div class="container">
            <div class="panel">
                <h2> بازیابی کلمه عبور </h2>
                <form method="POST" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <input id="email" type="email" name="email" placeholder="ایمیل" required>
                    <input id="pass" type="password" name="password" placeholder="کلمه عبور" required>
                    <input id="pass_con" type="password" name="password_confirmation" placeholder="تکرار کلمه عبور" required>
                    <button type="submit">
                        تایید
                    </button>

                </form>
                @if($errors->any())
                    <ul class="errors_ul">
                        @foreach ($errors->all() as $error)
                            <li style="color:red;font-size:12px;list-style:none;margin-bottom:5px"> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

    </div>

</body>

</html>

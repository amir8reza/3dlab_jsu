<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
</head>
<link rel="stylesheet" href="../styles/profile-styles.css">
<link rel="stylesheet" href="../styles/profile-edit-styles.css">

<body>

    <header>
        <nav>
            <div class="top">
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                <form method="post" action="/logout"> @csrf
                    <button type="submit" id="signup-btn"> <a> خارج شدن </a> </button>
                </form>
                <img class="price-icon" src="../images/icons/coin.png" alt="price-icon.png">
                <span class="price-number"> {{ auth()->user()->wallet  }} </span>
                <a href="/index" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="/about-us">درباره ما</a></li>
                    <li><a href=""> سفارش </a></li>
                    <li><a href=""> دسته بندی </a></li>
                    <li><a href="#"> ویرایش پروفایل </a></li>
                    <li><a href=""> افزایش اعتبار </a></li>
                </ul>
            </div>
        </nav>
        <div class="header-profile">
            <div class="background-overlay">
                <div class="container">
                    <img id="profile-pic" src="../images/profile-pics/profile1.png" alt="profile-pic.png">
                    <h1 id="username"> {{ auth()->user()->username  }}  </h1>
                    <p id="user-description">
                        @isset(auth()->user()->user_description)
                            {{ auth()->user()->user_description  }}
                        @else
                            توضیحاتی وارد نشده است
                        @endisset
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <h1> ویرایش اطلاعات </h1>
            <form action="/profile/edit" class="information-form" method="post"> @csrf @method('put')
                <input name="username" type="text" placeholder="نام کاربری" value="{{ auth()->user()->username  }}">
                <input name="email" type="email" placeholder="پست الکترونیک" value="{{ auth()->user()->email  }}">
                <input name="phone_number" type="text" placeholder=" شماره تلفن " value="{{auth()->user()->phone_number}}">
               <!-- <label for="avatar"> عکس پروفایل </label> -->
                <!-- <input type="file" name="avatar" accept="image/jpeg, image/png"> <br /> -->
                <label  for="profile-desc"> توضیحات </label>
                <textarea name="user-description" id="profile-desc" cols="80" rows="10">
                    {{auth()->user()->user_description}}
                </textarea>
                <button type="submit" name="information_change" > ذخیره تغییرات </button>

                @if($errors->any())
                    <ul class="errors_ul">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif

            </form>

            <form action="/profile/edit" class="password-form" method="post"> @csrf @method('put')
                <input type="password" placeholder="کلمه عبور فعلی" required>
                <input type="password" placeholder="کلمه عبور جدید" required>
                <input type="password" placeholder="تکرار کلمه عبور جدید" required>
                <button type="submit" name="password_change"> تغییر کلمه عبور </button>

            </form>
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

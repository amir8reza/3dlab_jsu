<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
</head>
<link rel="stylesheet" href="../../styles/profile-styles.css">
<link rel="stylesheet" href="../../styles/add-model-styles.css">
<link rel="stylesheet" href="../../styles/fontawsome.min.css">
<link rel="stylesheet" href="../../styles/all.min.css">

<body>

    <header>
        <nav>
            <div class="top">
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                <form method="post" action="/logout"> @csrf
                    <button type="submit" id="signup-btn"> <a> خارج شدن </a> </button>
                </form>
                <img class="price-icon" src="../../images/icons/coin.png" alt="price-icon.png">
                <span class="price-number"> 350 </span>
                <a href="/index" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="{{route('aboutUs')}}">درباره ما</a></li>
                    <li><a href=""> دسته بندی </a></li>
                    <li><a href="{{route('profilePanel')}}">  پروفایل </a></li>
                    <li><a href=""> افزایش اعتبار </a></li>
                    <li><a href="{{route('index')}}"> خانه </a></li>
                </ul>
            </div>
        </nav>
        <div class="header-profile">
            <div class="background-overlay">
                <div class="container">
                    <img id="profile-pic" src="../../images/profile-pics/profile1.png" alt="profile-pic.png">
                    <h1 id="username"> {{ $user['username'] }}  </h1>
                    <p id="user-description">
                        @isset($user['user_description'])
                            {{$user['user_description']}}
                        @else
                            توضیحاتی وارد نشده است
                        @endisset
                    </p>
                    <button id="add-model-btn"> <a href="{{ route('newModel') }}"> آپلود مدل </a></button>
                    <button id="add-order-btn"> <a href="{{ route('userCart')  }}"> سبد خرید  </a></button>

                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <h1> ویرایش مدل </h1>
            <form action="/models/edit/{{$model['id']}}" class="add-model-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input name="title" type="text" placeholder="نام مدل" value="{{$model['title']}}">
                <label for="image"> عکس مدل </label>
                <input type="file" name="image" accept="image/jpeg, image/png"> <br />
                <label for="model_file"> فایل مدل </label>
                <input type="file" name="model_file" accept=".obj,.fbx"> <br />
				<label for="profile-desc"> توضیحات مدل</label>
                <textarea name="description" id="profile-desc" cols="80" rows="10">{{$model['description']}}</textarea>
                <input type="number" name="price" id="price" placeholder="قیمت" value="{{$model['price']}}">
                <button name="edit-form" type="submit"><i class="fa fa-solid fa-save"></i> ذخیره تغییرات </button>
            </form>
            <form class="delete-model-form" action="/models/delete/{{$model['id']}}" method="post">
                @csrf
                @method('delete')
                <button name="delete-form" type="submit"><i class="fa fa-solid fa-delete-left"></i> حذف مدل </button>
            </form>
        </div>
        @if($errors->any())
            <ul class="errors_ul">
                @foreach ($errors->all() as $error)
                    <li style="color:red"> {{$error}} </li>
                @endforeach
            </ul>
        @endif
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

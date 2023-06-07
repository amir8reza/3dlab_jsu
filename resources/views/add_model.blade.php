<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
</head>
<link rel="stylesheet" href="../styles/profile-styles.css">
<link rel="stylesheet" href="../styles/add-model-styles.css">

<body>

    <header>
        <nav>
            <div class="top">
                <button id="profile-btn"> <a href="sign_in.html"> پنل کاربری </a></button>
                <button id="signup-btn"> <a href="sign_up.html"> عضویت </a> </button>
                <img class="price-icon" src="../images/icons/coin.png" alt="price-icon.png">
                <span class="price-number"> 350 </span>
                <span></span>
                <a href="#" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="">درباره ما</a></li>
                    <li><a href=""> سفارش </a></li>
                    <li><a href=""> دسته بندی </a></li>
                    <li><a href=""> ویرایش پروفایل </a></li>
                    <li><a href=""> افزایش اعتبار </a></li>
                </ul>
            </div>
        </nav>
        <div class="header-profile">
            <div class="background-overlay">
                <div class="container">
                    <img id="profile-pic" src="../images/profile-pics/profile1.png" alt="profile-pic.png">
                    <h1 id="username"> {{ $user['username'] }}  </h1>
                    <p id="user-description">
                        @isset($user['user_description'])
                            {{$user['user_description']}}
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
            <h1> آپلود مدل جدید </h1>
            <form action="{{ route('newModelForm') }}" class="add-model-form" method="post" enctype="multipart/form-data"> @csrf
                <input name="title" type="text" placeholder="نام مدل">
                <label for="categories[]"> دسته بندی ها </label>
                <select name="categories[]" id="category" multiple>

                    @foreach($categories as $category)
                        <option value="{{ $category['id']  }}"> {{ $category['title']  }} </option>
                    @endforeach

                </select>
                <label for="image"> عکس مدل </label>
                <input type="file" name="image" accept="image/jpeg, image/png"> <br />
                <label for="model_file"> فایل مدل </label>
                <input type="file" name="model_file" accept=".obj,.fbx"> <br />
				<label for="profile-desc"> توضیحات مدل</label>
                <textarea name="description" id="profile-desc" cols="80" rows="10"></textarea>
                <input type="number" name="price" id="price" placeholder="قیمت">
                <button type="submit"> ذخیره تغییرات </button>
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

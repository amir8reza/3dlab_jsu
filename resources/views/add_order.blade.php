<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
</head>
<link rel="stylesheet" href="styles/profile-styles.css">
<link rel="stylesheet" href="styles/add-model-styles.css">

<body>

    <header>
        <nav>
            <div class="top">
                <button id="profile-btn"> <a href="sign_in.html"> پنل کاربری </a></button>
                <button id="signup-btn"> <a href="sign_up.html"> عضویت </a> </button>
                <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
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
                    <img id="profile-pic" src="images/profile-pics/profile1.png" alt="profile-pic.png">
                    <h1 id="username"> نام کاربر </h1>
                    <h1 id="bio"> طراح گرافیک </h1>
                    <p id="user-description"> توضیحاتی وارد نشده است </p>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <h1> سفارش مدل </h1>
            <form action="post" class="add-model-form">
                <input type="text" placeholder="عنوان ">
                <label for="date"> مهلت زمانی </label>
                <input type="date" name="date">
                <label for="profile-desc"> توضیحات سفارش</label>
                <textarea name="profile-desc" id="profile-desc" cols="80" rows="10"></textarea>
                <input type="number" name="price" id="price" placeholder="دستمزد">
                <button type="submit"> ذخیره تغییرات </button>
            </form>
        </div>
    </section>

    <footer>
        <ul>
            <li><a href="#"> درباره </a></li> تحلیل روش چیه
            <li><a href="#"> حمایت </a></li>
            <li><a href="#"> تماس با ما </a></li>
        </ul>

    </footer>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> گفتگوها </title>
</head>
<link rel="stylesheet" href="styles/index-styles.css">
<link rel="stylesheet" href="styles/conversation-styles.css">
<link rel="stylesheet" href="../styles/fontawsome.min.css">
<link rel="stylesheet" href="../styles/all.min.css">

<body>

    <header>
        <nav>
            <div class="top">
                <button id="profile-btn"> <a href="/profile"> پنل کاربری </a></button>
                <form method="post" action="/logout"> @csrf
                    <button type="submit" id="signup-btn"> <a> خارج شدن </a> </button>
                </form>
                <a href="{{route('index')}}" id="logo"> 3DLAB </a>
            </div>
            <div class="bot">
                <ul>
                    <li><a href="{{route('aboutUs')}}">درباره ما</a></li>
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
                    <h1> لیست پیام ها </h1>

                    @foreach($conversations as $conversation)
                        <div class="row">
                            <p> از طرف : {{$conversation['username']}}
                            </p>
                            <button><a href="/chat/@if($user['id']==$conversation['first_user']){{$conversation['second_user']}}@else{{$conversation['first_user']}}
                            @endif"> نمایش </a> </button>
                        </div>

                    @endforeach

                </div>
            </div>
            <div class="model-image">
                <i class="fa fa-message fa-5x"></i>
            </div>
        </div>
    </section>



</body>

</html>

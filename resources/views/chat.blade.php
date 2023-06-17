<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home </title>
</head>
<link rel="stylesheet" href="../styles/index-styles.css">
<link rel="stylesheet" href="../styles/chat-styles.css">
<link rel="stylesheet" href="../styles/fontawsome.min.css">
<link rel="stylesheet" href="../styles/all.min.css">

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
                    <button id="profile-btn"> <a href="login"> پنل کاربری </a></button>
                    <button id="signup-btn"> <a href="register"> عضویت  </a> </button>
                @endguest
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
            <div class="chat-section">
                <div class="chat-header">
                    <img src="../images/profile-pics/profile1.png" alt="img.png">
                    <h4 id="username"> {{$to_user['username']}} </h4>
                </div>
                <div class="chat-body">

                    @isset($messages)
                        @foreach($messages as $message)
                            @if ($message->from == $from_user['id'])
                                <div class="from-chats">
                                    <img src="../images/profile-pics/profile1.png" alt="from-image">
                                    <div class="from-text">
                                        <p> {{$message->text}} </p>
                                    </div>
                                </div>
                                <h5 class="from-timestamp"> 09:47 PM </h5>
                            @else
                                <div class="to-chats">

                                    <div class="to-text">
                                        <p> {{$message->text}} </p>
                                    </div>
                                    <img src="../images/profile-pics/profile1.png" alt="to-image">
                                </div>
                                <h5 class="to-timestamp"> 09:47 PM </h5>
                            @endif
                        @endforeach
                    @else
                        پیامی وجود ندارد
                    @endisset





                </div>
                <div class="new-chat">
                    <form action="/chat/{{$to_user['id']}}" method="post"> @csrf
                        <button type="confirm"><i class="fa fa-send fa-2x"></i> </button>
                        <textarea name="new_text" id="chat-textarea" row="1"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </section>



</body>

</html>

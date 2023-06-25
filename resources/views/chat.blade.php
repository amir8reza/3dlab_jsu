@extends('layouts.master')

@section('title', 'چت')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/chat-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="chat-section">
                <div class="chat-header">
                    <img src="{{asset('images/profile-pics/profile1.png')}}" alt="img.png">
                    <h4 id="username"> {{$to_user['username']}} </h4>
                </div>
                <div class="chat-body">

                    @isset($messages)
                        @foreach($messages as $message)
                            @if ($message->from == $from_user['id'])
                                <div class="from-chats">
                                    <img src="asset('images/profile-pics/profile1.png')}}" alt="from-image">
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
                                    <img src="asset('images/profile-pics/profile1.png')}}" alt="to-image">
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
@endsection

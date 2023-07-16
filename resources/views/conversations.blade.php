@extends('layouts.master')

@section('title', 'گفتگوها')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/conversation-styles.css')}}">
@endsection

@section('main-section')
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
                            @endif" style="color:white;text-decoration:none;font-size:18px"> نمایش </a> </button>
                        </div>

                    @endforeach

                </div>
            </div>
            <div class="model-image">
                <i class="fa fa-message fa-5x"></i>
            </div>
        </div>
    </section>
@endsection

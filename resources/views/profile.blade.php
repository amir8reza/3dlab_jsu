@extends('layouts.master')

@section('title', 'پنل کاربری')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/profile-styles.css')}}">
@endsection

@section('header')
    <div class="header-profile">
        <div class="background-overlay">
            <div class="container">
                <img id="profile-pic" src="{{asset('images/profile-pics/profile1.png')}}" alt="profile-pic.png">
                <h1 id="username">  {{ $user['username']  }} </h1>
                <p id="user-description">
                    @isset($user['user_description'])
                        {{$user['user_description']}}
                    @else
                        توضیحاتی وارد نشده است
                    @endisset
                </p>
                <button id="add-model-btn"> <a href="{{ route('newModel') }}"> آپلود مدل </a></button>
                <button id="add-order-btn"> <a href="{{ route('userCart')  }}"> سبد خرید  </a></button>
                <button id="add-order-btn"> <a href="{{ route('conversations')  }}"> پیام ها  </a></button>

            </div>
        </div>
    </div>
@endsection

@section('main-section')
    <section>
        <div class="container">
            <h1> آپلودها </h1>
            <div class="row">

                @foreach($models as $model)
                    <div class="card">
                        <div class="card-image">
                            <a href="models/{{$model['slug']}}"> <img src="{{asset('storage/'.$model->images['image'])}}"> </a>
                        </div>
                        <div class="card-text">
                            <p> {{$model['title']}}  </p>
                            <img class="like-icon" src="{{asset('images/icons/heart.png')}}" alt="like-icon.png">
                            <span class="like-number"> 5 </span>
                            <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                            <span class="price-number"> {{ $model['price']  }} </span>
                            <a href="models/{{$model['slug']}}" class="card-link"> مشاهده </a>
                        </div>
                    </div>
                @endforeach


            </div>



            <h1> خرید ها </h1>

            <div class="row">
                @foreach($sales as $sale)
                    <div class="card">
                        <div class="card-image">
                            <a href="models/{{$sale->model3ds->slug}}"> <img src="{{asset('storage/'.$sale->model3ds->images->image)}}"> </a>
                        </div>
                        <div class="card-text">
                            <p> {{$sale->model3ds->title}}  </p>
                            <img class="like-icon" src="images/icons/heart.png" alt="like-icon.png">
                            <span class="like-number"> 5 </span>
                            <img class="price-icon" src="images/icons/coin.png" alt="price-icon.png">
                            <span class="price-number"> {{ $sale->price  }} </span>
                            <a href="models/{{$sale->model3ds->slug}}" class="card-link"> مشاهده </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

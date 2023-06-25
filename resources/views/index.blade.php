@extends('layouts.master')

@section('title', '3DLAB')

@section('header')
    <div class="header-title">
        <div class="background-overlay">
            <div class="container">
                <div class="header-text">
                    <h1> 3DLAB </h1>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-section')
    <section>
        <div class="container">
            <h1> جدیدترین ها </h1>
            <div class="row">
                @isset($new_models)
                    @foreach($new_models as $new_model)
                        <div class="card">
                            <div class="card-image">
                                <a href="models/{{$new_model->slug}}"> <img src="{{asset('storage/'.$new_model->images['image'])}}" alt="model.png"> </a>
                            </div>
                            <div class="card-text">
                                <p>  {{$new_model->title}} </p>
                                <img class="like-icon" src="{{asset('images/icons/heart.png')}}" alt="like-icon.png">
                                <span class="like-number"> 5 </span>
                                <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                                <span class="price-number"> 350 </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    مدلی در دیتابیس نیست
                @endisset
            </div>
        </div>
    </section>
@endsection

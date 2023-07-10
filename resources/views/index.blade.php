@extends('layouts.master')

@section('title', '3DLAB - خانه')

@section('header')
    <div class="header-title">
        <div class="background-overlay">
            <div class="container">
                <div class="header-text">
                    <h1> 3DLAB </h1>
                    <p> وبسایت خرید و فروش مدل های سه بعدی مخصوص بازی و انیمیشن سازی </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-section')
    <section>
        <div class="container">

                @isset($new_models)
                <h1> جدیدترین ها </h1>
                <div class="row">
                    @foreach($new_models as $new_model)
                    <div class="card">
                            <div class="card-image">
                                <a href="models/{{$new_model->slug}}"> <img src="{{asset('storage/'.$new_model->images['image'])}}" alt="model.png"> </a>
                            </div>
                            <div class="card-text">
                                <p>  {{$new_model->title}} </p>
                                <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                                <span class="price-number"> {{$new_model->price}} </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h1> پایین ترین قیمت </h1>
                    <div class="row">
                        @foreach($lowest_prices as $lowest_price)
                            <div class="card">
                                <div class="card-image">
                                    <a href="models/{{$lowest_price->slug}}"> <img src="{{asset('storage/'.$lowest_price->images['image'])}}" alt="model.png"> </a>
                                </div>
                                <div class="card-text">
                                    <p>  {{$lowest_price->title}} </p>
                                    <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                                    <span class="price-number"> {{$lowest_price->price}} </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                <h1> بالاترین ترین قیمت </h1>
                <div class="row">
                    @foreach($highest_prices as $highest_price)
                        <div class="card">
                            <div class="card-image">
                                <a href="models/{{$highest_price->slug}}"> <img src="{{asset('storage/'.$highest_price->images['image'])}}" alt="model.png"> </a>
                            </div>
                            <div class="card-text">
                                <p>  {{$highest_price->title}} </p>
                                <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                                <span class="price-number"> {{$highest_price->price}} </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    مدلی در دیتابیس نیست
                @endisset

        </div>
    </section>
@endsection

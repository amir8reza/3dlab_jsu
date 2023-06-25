@extends('layouts.master')

@section('title', 'دسته بندی ها')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/categories-styles.css')}}">
@endsection

@section('header')
    <div class="header-title">
        <div class="background-overlay">
            <div class="container">
                <div class="header-text">
                    <h1> 3DLAB </h1>
                    <p> دسته بندی ها </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="row">
                <form class="search-bar-form" action="/categories" method="post"> @csrf
                    <h1> جستجو </h1>
                    <input type="text" name="search_bar_text" id="search-bar">
                    <button type="submit"> جستجو </button>
                </form>
            </div>

            @isset($models)
                <div class="row">
                    @foreach($models as $model)
                        <div class="card">
                            <div class="card-image">
                                <a href="/models/{{$model->slug}}"> <img src="{{asset('storage/'.$model->images['image'])}}"> </a>
                            </div>
                            <div class="card-text">
                                <p>  {{$model->title}} </p>
                                <img class="like-icon" src="{{asset('images/icons/heart.png')}}" alt="like-icon.png">
                                <span class="like-number"> 5 </span>
                                <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                                <span class="price-number"> 350 </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="category-card">

                        <div class="category-image">
                            <a href="/categories/1">
                                <img src="{{asset('images/cars.jpg')}}" alt="cars.jpg">
                            </a>
                        </div>
                        <div class="category-desc">
                            <h3> وسیله نقلیه </h3>
                        </div>
                    </div>

                    <div class="category-card">

                        <div class="category-image">
                            <a href="/categories/2">
                                <img src="{{asset('images/weapons.jpg')}}" alt="weapons.jpg">
                            </a>
                        </div>
                        <div class="category-desc">
                            <h3> اسلحه و نظامی </h3>
                        </div>
                    </div>

                    <div class="category-card">

                        <div class="category-image">
                            <a href="/categories/3">
                                <img src="{{asset('images/character.jpg')}}" alt="character.jpg">
                            </a>
                        </div>
                        <div class="category-desc">
                            <h3>  کاراکتر و حیوانات </h3>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="category-card">

                        <div class="category-image">
                            <a href="/categories/4">
                                <img src="{{asset('images/robot.jpg')}}" alt="robot.jpg">
                            </a>
                        </div>
                        <div class="category-desc">
                            <h3> ربات  </h3>
                        </div>
                    </div>

                    <div class="category-card">

                        <div class="category-image">
                            <a href="/categories/5">
                                <img src="{{asset('images/pbr.jpg')}}" alt="pbr.jpg">
                            </a>
                        </div>
                        <div class="category-desc">
                            <h3> PBR  </h3>
                        </div>
                    </div>

                    <div class="category-card">

                        <div class="category-image">
                            <a href="/categories/6">
                                <img src="{{asset('images/electronic.jpg')}}" alt="electronics.jpg">
                            </a>
                        </div>
                        <div class="category-desc">
                            <h3>  دستگاه الترونیک </h3>
                        </div>
                    </div>

                </div>
            @endisset
        </div>
    </section>
@endsection


@extends('layouts.master')

@section('title', 'پنل کاربری')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/profile-styles.css')}}">
@endsection

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
            <h1> دسته بندی ها </h1>
            <div class="sub_cat">
                @isset($main_category->children)
                    @foreach($main_category->children as $sub_category)
                        <div class="sub_cat_title">
                            <a href="/categories/{{$sub_category->parent_id.'/'.$sub_category->id}}"> {{$sub_category->title}} </a>
                        </div>
                    @endforeach
                @endisset
            </div>


            <div class="row">

                @isset($main_category)
                    @foreach($main_category->children as $child)
                        @foreach($child->model3ds as $new_model)
                            @if($new_model->is_active)
                            <div class="card">
                                <div class="card-image">
                                    <a href="/models/{{$new_model->slug}}"> <img src="{{asset('storage/'.$new_model->images['image'])}}"> </a>
                                </div>
                                <div class="card-text">
                                    <p>  {{$new_model->title}} </p>
                                    <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                                    <span class="price-number"> 350 </span>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endforeach
                @else
                    @isset($sub_category)
                        @foreach($sub_category->model3ds as $new_model)
                            @if($new_model->is_active)
                            <div class="card">
                                <div class="card-image">
                                    <a href="models/{{$new_model->slug}}"> <img src="{{asset('storage/'.$new_model->images['image'])}}"> </a>
                                </div>
                                <div class="card-text">
                                    <p>  {{$new_model->title}} </p>
                                    <img class="price-icon" src="{{asset('images/icons/coin.png')}}" alt="price-icon.png">
                                    <span class="price-number"> 350 </span>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endisset
                @endisset
            </div>

        </div>
    </section>
@endsection

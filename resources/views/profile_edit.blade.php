@extends('layouts.master')

@section('title', 'ویرایش کاربر')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/profile-styles.css')}}">
    <link rel="stylesheet" href="{{asset('styles/profile-edit-styles.css')}}">
@endsection

@section('header')
    <div class="header-profile">
        <div class="background-overlay">
            <div class="container">
                <img id="profile-pic" src="{{asset('images/profile-pics/profile1.png')}}" alt="profile-pic.png">
                <h1 id="username"> {{ auth()->user()->username  }}  </h1>
                <p id="user-description">
                    @isset(auth()->user()->user_description)
                        {{ auth()->user()->user_description  }}
                    @else
                        توضیحاتی وارد نشده است
                    @endisset
                </p>
                <button id="add-model-btn"> <a href="{{ route('newModel') }}"> آپلود مدل </a></button>
                <button id="add-order-btn"> <a href="{{ route('userCart')  }}"> سبد خرید  </a></button>
                <button id="add-model-btn"> <a href="{{ route('conversations')  }}"> پیام ها  </a></button>

            </div>
        </div>
    </div>


@endsection

@section('main-section')
    <section>
        <div class="container">
            <h1> ویرایش اطلاعات </h1>
            <form action="/profile/edit" class="information-form" method="post"> @csrf @method('put')
                <input name="username" type="text" placeholder="نام کاربری" value="{{ auth()->user()->username  }}">
                <input name="email" type="email" placeholder="پست الکترونیک" value="{{ auth()->user()->email  }}">
                <input name="phone_number" type="text" placeholder=" شماره تلفن " value="{{auth()->user()->phone_number}}">
                <!-- <label for="avatar"> عکس پروفایل </label> -->
                <!-- <input type="file" name="avatar" accept="image/jpeg, image/png"> <br /> -->
                <label  for="profile-desc"> توضیحات </label>
                <textarea name="user-description" id="profile-desc" cols="80" rows="10">{{auth()->user()->user_description}}</textarea>
                <button type="submit" name="information_change" > ذخیره تغییرات </button>

                @if($errors->any())
                    <ul class="errors_ul">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif


            </form>

            <form action="/profile/edit" class="password-form" method="post"> @csrf @method('put')
                <input name="old_password" type="password" placeholder="کلمه عبور فعلی" required>
                <input name="new_password" type="password" placeholder="کلمه عبور جدید" required>
                <input name="new_password_confirmation" type="password" placeholder="تکرار کلمه عبور جدید" required>
                <button type="submit" name="password_change"> تغییر کلمه عبور </button>

            </form>
        </div>
    </section>
@endsection

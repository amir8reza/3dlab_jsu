@extends('layouts.master')

@section('title', 'ویرایش مدل')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/profile-styles.css')}}">
    <link rel="stylesheet" href="{{asset('styles/add-model-styles.css')}}">
@endsection

@section('header')
    <div class="header-profile">
        <div class="background-overlay">
            <div class="container">
                <img id="profile-pic" src="{{asset('images/profile-pics/profile1.png')}}" alt="profile-pic.png">
                <h1 id="username"> {{ $user['username'] }}  </h1>
                <p id="user-description">
                    @isset($user['user_description'])
                        {{$user['user_description']}}
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
            <h1> ویرایش مدل </h1>
            <form action="/models/edit/{{$model['id']}}" class="add-model-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input name="title" type="text" placeholder="نام مدل" value="{{$model['title']}}">
                <label for="image"> عکس مدل </label>
                <input type="file" name="image" accept="image/jpeg, image/png"> <br />
                <label for="model_file"> فایل مدل </label>
                <input type="file" name="model_file" accept=".obj,.fbx,.rar,.zip"> <br />
                <label for="profile-desc"> توضیحات مدل</label>
                <textarea name="description" id="profile-desc" cols="80" rows="10">{{$model['description']}}</textarea>
                <input type="number" name="price" id="price" placeholder="قیمت" value="{{$model['price']}}">
                <button name="edit-form" type="submit"><i class="fa fa-solid fa-save"></i> ذخیره تغییرات </button>
            </form>
            <form class="delete-model-form" action="/models/delete/{{$model['id']}}" method="post">
                @csrf
                @method('delete')
                <button name="delete-form" type="submit"><i class="fa fa-solid fa-delete-left"></i> حذف مدل </button>
            </form>
        </div>
        @if($errors->any())
            <ul class="errors_ul">
                @foreach ($errors->all() as $error)
                    <li style="color:red"> {{$error}} </li>
                @endforeach
            </ul>
        @endif
    </section>
@endsection

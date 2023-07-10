@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست کاربران')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-edit-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <h2> اطلاعات مدل </h2>
        <form action="/admin/categories/{{$category->id}}" method="post">
            @csrf
            @method('put')
            <input type="text" name="title" value="{{$category->title}}">

            <button type="submit"> ثبت اطلاعات </button>
            @if($errors->any())
                <ul class="errors_ul">
                    @foreach ($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            @endif
        </form>
    </section>
@endsection

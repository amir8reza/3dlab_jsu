@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست کاربران')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="row header-row">
                <p> ID </p>
                <p> عنوان  </p>
                <p> parent </p>
                <p> ویرایش </p>
            </div>

            @isset($categories)
                @foreach($categories as $category)
                    <div class="row">
                        <p>{{$category->id}}</p>
                        <p> {{$category->title}} </p>
                        @if($category->parent)
                        <p> {{$category->parent->title}} </p>
                        @else
                            <p> ندارد </p>
                        @endif
                        <p><a href="/admin/categories/{{$category->id}}"><i class="fa fa-edit"></i></a> </p>
                    </div>
                @endforeach
            @endisset
        </div>
    </section>
    <button id="new"> <a href="/admin/category/new"> دسته بندی جدید </a> </button>
@endsection

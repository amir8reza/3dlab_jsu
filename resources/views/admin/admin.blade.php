@extends('layouts.master')

@section('title', '3DLAB - پنل مدیریت')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="row">
                <div class="card">
                    <a href="/admin/users">
                    <i class="fa fa-user fa-5x"></i>
                    <h2> کاربرها </h2>
                    </a>
                </div>

                <div class="card">
                    <a href="/admin/models">
                    <i class="fa fa-file fa-5x"></i>
                    <h2> فایل ها </h2>
                    </a>
                </div>

                <div class="card">
                    <a href="/admin/sales">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                    <h2> خریدها </h2>
                    </a>
                </div>

                <div class="card">
                    <a href="/admin/categories">
                    <i class="fa fa-gallery-thumbnails fa-5x"></i>
                    <h2> دسته بندی ها </h2>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

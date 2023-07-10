@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست کاربران')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="row header-row">
                <p> نام کاربری </p>
                <p> ایمیل </p>
                <p> شماره تلفن </p>
                <p> فعال/غیرفعال </p>
                <p> ویرایش </p>
            </div>

            @isset($users)
                @foreach($users as $user)
                    <div class="row">
                        <p> {{$user->username}} </p>
                        <p> {{$user->email}} </p>
                        <p> {{$user->phone_number}} </p>
                        <p> {{$user->is_active}} </p>
                        <p><a href="/admin/user/{{$user->id}}"><i class="fa fa-edit"></i></a> </p>
                    </div>
                @endforeach
            @endisset
        </div>
    </section>
@endsection

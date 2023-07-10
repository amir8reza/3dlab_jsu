@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست کاربران')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-edit-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <h2> اطلاعات کاربر </h2>
        <form action="/admin/user/{{$user->id}}" method="post">
            @csrf
            @method('put')
            <input type="text" name="username" value="{{$user->username}}">
            <input type="email" name="email" value="{{$user->email}}">
            <input type="text" name="phone_number" value="{{$user->phone_number}}">
            <input type="text" name="role" value="{{$user->role}}">
            <input type="text" name="wallet" value="{{$user->wallet}}">
            <textarea name="user_description">{{$user->user_description}}</textarea> <br>
            <select name="is_active">
                <option value="true" @if($user->is_active) selected @endif> فعال </option>
                <option value="false" @if(!$user->is_active) selected @endif> غیرفعال </option>
            </select>

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

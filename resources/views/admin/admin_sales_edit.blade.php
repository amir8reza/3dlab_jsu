@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست کاربران')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-edit-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <h2> اطلاعات کاربر </h2>
        <form action="/admin/sale/{{$sale->id}}" method="post">
            @csrf
            @method('put')
            <input type="text" name="username" value="{{$sale->user->username}}" readonly>
            <input type="text" name="model" value="{{$sale->model3ds->title}}" readonly>
            <input type="text" name="price" value="{{$sale->price}}" readonly> <br   >

            <select name="status">
                <option value="true" @if($sale->status == 'true') selected @endif> پرداخت شده </option>
                <option value="false" @if($sale->status == 'false') selected @endif> پرداخت نشده </option>
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

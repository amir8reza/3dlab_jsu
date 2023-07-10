@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست کاربران')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-edit-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <h2> اطلاعات مدل </h2>
        <form action="/admin/model/{{$model->id}}" method="post">
            @csrf
            @method('put')
            <input type="text" name="title" value="{{$model->title}}">
            <input type="text" name="price" value="{{$model->price}}">
            <textarea name="description">{{$model->description}}</textarea> <br>
             <select name="is_active">
                 <option value="true" @if($model->is_active) selected @endif> فعال </option>
                 <option value="false" @if(!$model->is_active) selected @endif> غیرفعال </option>
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

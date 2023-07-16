@extends('layouts.master')

@section('title', 'پنل مدیریت -  دسته بندی جدید')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-edit-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <h2> اطلاعات مدل </h2>
        <form method="POST" action="/admin/category/new" >
            @csrf
            <input type="text" name="title" placeholder="عنوان دسته بندی">
            <br>
            <label for="parent"> parent </label>
            <select name="parent">
                <option value=""> ندارد </option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->title}} </option>
                @endforeach
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

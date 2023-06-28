@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست آپلودها')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="row header-row">
                <p> ID </p>
                <p> عنوان </p>
                <p> slug </p>
                <p> طراح </p>
                <p> آخرین ویرایش </p>
                <p> ویرایش </p>
            </div>

            @isset($models)
                @foreach($models as $model)
                    <div class="row">
                        <p>{{$model->id}}</p>
                        <p> {{$model->title}} </p>
                        <p> {{$model->slug}} </p>
                        <p> {{$model->user->username}} </p>
                        <p> {{$model->updated_at}} </p>
                        <p><a href="admin/models/{{$model->id}}"><i class="fa fa-edit"></i></a> </p>
                    </div>
                @endforeach
            @endisset
        </div>
    </section>
@endsection

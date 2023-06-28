@extends('layouts.master')

@section('title', 'پنل مدیریت - لیست خریدها')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/admin-users-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="row header-row">
                <p> ID </p>
                <p> نام کاربری </p>
                <p> مدل </p>
                <p>  قیمت  </p>
                <p> وضعیت </p>
                <p> ویرایش </p>
            </div>

            @isset($sales)
                @foreach($sales as $sale)
                    <div class="row">
                        <p>{{$sale->id}}</p>
                        <p> {{$sale->user->username}} </p>
                        <p> {{$sale->model3ds->title}} </p>
                        <p> {{$sale->price}} </p>
                        @if($sale->status=='true')
                            <p> پرداخت شده </p>
                        @else
                            <p> در انتظار </p>
                        @endif
                        <p><a href="admin/users/{{$sale->id}}"><i class="fa fa-edit"></i></a> </p>
                    </div>
                @endforeach
            @endisset
        </div>
    </section>
@endsection

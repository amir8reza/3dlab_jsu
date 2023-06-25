@extends('layouts.master')

@section('title', 'سبدخرید')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/model-buy-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">
            <div class="model-detail">
                <div class="user-detail">
                    <h1> سبد خرید </h1>

                    @foreach($sales as $sale)
                        <div class="row">
                            <p> نام مدل : {{$sale->model3ds->title}}
                                <br> قیمت : {{$sale->price}}
                                <br> تاریخ ثبت : {{$sale->created_at}}
                            </p>
                            <form action="/models/buy/delete/{{$sale->id}}" method="post"> @csrf
                                @method('delete')
                                <button> حذف از سبد </button>
                            </form>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="model-image">
                <form action="{{ route('buyCart')  }}" method="post"> @csrf
                    <button> خرید مدل ها </button>
                </form>
            </div>
        </div>
    </section>
@endsection






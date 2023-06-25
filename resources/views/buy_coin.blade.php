@extends('layouts.master')

@section('title', 'افزایش اعتبار')

@section('styles')
    <link rel="stylesheet" href="{{asset('styles/buy-coin-styles.css')}}">
@endsection

@section('main-section')
    <section>
        <div class="container">

            <div class="buy-coin">
                <h2> خرید سکه </h2>
                <form action="{{route('buyCoin')}}" method="post"> @csrf @method('put')
                    <input type="number" name="amount">
                    <button type="submit"> خرید </button>
                </form>
                @if($errors->any())
                    <ul class="errors_ul">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>
@endsection

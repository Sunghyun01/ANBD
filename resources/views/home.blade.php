@extends('layouts.app')

@section('style')
<style>
    .jumbotron{
        padding: 57px 17px 5px 17px !important;
        margin-bottom: 15px;
    }
</style>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>
            @if(isset($_COOKIE['user_idx']))
            <p>등록유도</p>
            <p>
                <button type="button" name="button" class="btn btn-primary" onclick="location.href='/goodsinsert'">등록하기 »</button>
            </p>
            @else
            <p>가입유도</p>
            <p>
                <button type="button" name="button" class="btn btn-primary" onclick="location.href='/login'">가입하기 »</button>
            </p>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                최근 등록된 책들
            </div>
            @foreach($data as $value)
            <div class="col-xs-6">
                <h4>{{ $value['goods_name'] }}</h4>
                <p>위치</p>
                <button type="button" class="btn btn-info btn-xs">#1gd</button>
            </div>
            @endforeach
        </div>
    </div>
@endsection

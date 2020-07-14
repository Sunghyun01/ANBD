@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-user"></i>
            </div>
            <div class="col-xs-9">
                <div class="col-xs-12">
                    userName
                </div>
                <div class="col-xs-12">
                    asdf
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" onclick="location.href='/goodsinsert'">
                상품 등록하기
            </div>
            <div class="col-12">
                등록된상품 보기
            </div>
            <div class="col-12">
                로그아웃
            </div>
        </div>
    </div>
@endsection

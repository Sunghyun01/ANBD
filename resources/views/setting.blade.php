@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:50px">
        @if(isset($data))
        <div class="row">
            <div class="col-xs-2 text-center">
                <i class="fa fa-user" style="font-size:30px"></i>
            </div>
            <div class="col-xs-10">
                <div class="col-xs-12">
                    {{ $data['name'] }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12" onclick="location.href='/goodsinsert'" style="border-bottom: 1px solid #d2d2d7;box-sizing:border-box;">
                <p><i class="fa fa-plus"></i> 상품 등록하기</p>
            </div>
            <div class="col-xs-12" style="border-bottom: 1px solid #d2d2d7;box-sizing:border-box;" onclick="location.href='/goods?u={{$data['name']}}'">
                <p><i class="fa fa-eye"></i> 등록된상품 보기</p>
            </div>
            <div class="col-xs-12" style="border-bottom: 1px solid #d2d2d7;box-sizing:border-box;" onclick="logout()">
                <p><i class="fa fa-sign-out"></i> 로그아웃</p>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="col-xs-12 mb-3">
                    <h4 class="text-center">로그인 후 이용할수있습니다</h4>
                </div>
                <div class="col-xs-6" onclick="location.href='/login'">
                    <p class="text-center border border-successr">로그인</p>
                </div>
                <div class="col-xs-6" onclick="location.href='/register'">
                    <p class="text-center border border-success">회원가입</p>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
@section('script')
@endsection

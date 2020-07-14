@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:50px">
        @if(isset($_COOKIE['user_idx']))
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
            <div class="col-12 logout">
                <p>로그아웃</p>
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
<script>
    $('.logout').click(function(){
        $.ajax({
            method	: 'POST',
            url		: '/logout',
        }).done(function(data){
            if(data['status']){
                alert('로그아웃되었습니다');
                location.reload();
            }else{
                alert('Error');
            }
        })
    })
</script>
@endsection

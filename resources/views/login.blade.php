@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:50px">
    <div class="row">
        <div class="form-group">
            <input class="form-control" placeholder="아이디" name="id" type="text"  required>
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="비밀번호" name="password" type="password"  required>
        </div>
        <div class="col-12">
            <input type="button" value="로그인" class="btn btn-lg btn-success btn-block login"/>
        </div>
        <div class="col-12 text-center">
            <a href="#">회원가입</a>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.login').click(function(){
            $.ajax({
                method	: 'POST',
                url		: location.href,
                data	:  {
                    id : $('[name="id"]').val(),
                    password : $('[name="password"]').val(),
                },
            }).done(function(data){
                if(data['status']){
                    location.href="/home";
                }else{
                    alert(data['msg']);
                }
            })
        })
    </script>
@endsection

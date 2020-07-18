@extends('layouts.app')

@section('style')
<style>
    .vertical-center {
      min-height: 100%;
      min-height: 100vh;
      display: flex;
      align-items: center;
    }
</style>
@endsection

@section('content')
<div class="jumbotron vertical-center bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h4>회원가입</h4>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <input class="form-control" placeholder="아이디" name="id" type="text"  required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="비밀번호" name="password" type="password"  required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="비밀번호 확인" name="password" type="password"  required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="이름" name="name" type="text"  required>
                </div>
                <div class="col-12">
                    <input type="button" value="회원가입" class="btn btn-lg btn-block login" style="background: #B5B2FF;border: 0;"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.login').click(function(){
            $.ajax({
                method	: 'POST',
                url		: '/register',
                data	:  {
                    id : $('[name="id"]').val(),
                    password : $('[name="password"]').val(),
                    name : $('[name="name"]').val(),
                },
            }).done(function(data){
                if(data['status']){
                    alert('가입되었습니다');
                    location.href="/login";
                }else{
                    alert(data['msg']);
                }
            })
        })
    </script>
@endsection

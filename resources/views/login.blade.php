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
                <h4>로그인</h4>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" placeholder="아이디" name="id" type="text"  required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="비밀번호" name="password" type="password"  required>
                </div>
                <div class="col-12">
                    <input type="button" value="로그인" class="btn btn-lg btn-block login" style="background:#B5B2FF"/>
                </div>
                <div class="col-12 text-center">
                    <a href="/register">회원가입</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.navpusher').css('height','0');
        $('.login').click(function(){
            if(!$('[name="id"]').val() && $.trim($('[name="id"]').val()) == ''){
                Command: toastr["error"]('ID를 확인해주세요');
                return false;
            }else if (!$('[name="password"]').val() && $.trim($('[name="password"]').val()) == '') {
                Command: toastr["error"]('비밀번호를 확인해주세요');
                return false;
            }else{
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
                        Command: toastr["error"](data['msg'])
                    }
                })
            }
        })
    </script>
@endsection

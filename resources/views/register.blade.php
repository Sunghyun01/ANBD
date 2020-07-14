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
        <div class="form-group">
            <input class="form-control" placeholder="이름" name="name" type="text"  required>
        </div>
        <div class="col-12">
            <input type="button" value="회원가입" class="btn btn-lg btn-success btn-block login"/>
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

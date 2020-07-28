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
            <div class="col-12 text-center">
                <h4>회원가입</h4>
            </div>
            <div class="col-12">
                <form action="/register" method="post" onsubmit="return chk()">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" placeholder="아이디" name="id" type="text"  required>
                        <input type="button" value="중복체크" class="btn btn-xs btn-primary btn-rounded id_chk">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="비밀번호" name="password" type="password"  required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="비밀번호 확인" name="passwordChk" type="password"  required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="이름" name="name" type="text"  required>
                    </div>
                    <div class="col-12">
                        <input type="button" value="회원가입" class="btn btn-lg btn-block login" style="background: #B5B2FF;border: 0;"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.navpusher').css('height','0');
        var idChk = false;

        function chk(){
            if($("[name='password']").val() != $("[name='password']").val()){
                Command: toastr["error"]('비밀번호 확인이 올바르지 않습니다')
                return false;
            }else if (idChk) {
                Command: toastr["error"]('아이디체크를 진행해주세요')
                return false;
            }else{
                Command: toastr["success"]('가입되었습니다')
                return true;
            }
        }
        $(document).ready(function () {
            $('.id_chk').click(function(){
                $.ajax({
                    method	: 'POST',
                    url		: '/idchk',
                    data : {
                        id : $("[name='id']").val()
                    }
                }).done(function(data){
                    if(data['status']){
                        idChk = true;
                        $("[name='id']").attr('readonly','readonly');
                        Command: toastr["success"](data['msg'])
                    }else{
                        Command: toastr["error"](data['msg'])
                    }
                })
            })
        })
    </script>
@endsection

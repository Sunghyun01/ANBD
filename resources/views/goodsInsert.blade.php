@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:70px">
        <div class="row">
            <form method="post">
                @csrf
                <div class="col-xs-12">
                    <span>제목</span>
                    <input type="text" name="goods_name" class="form-control input-sm">
                </div>
                <div class="col-xs-12">
                    <span>태그</span>
                    <input type="text" name="hash" placeholder=", 를 사용하여 최대 3개를 저장할수있습니다" class="form-control input-sm">
                </div>
                <div class="col-xs-12">
                    <span>장소</span>
                    <input type="text" name="place" placeholder=", 를 사용하여 최대 3개를 저장할수있습니다" class="form-control input-sm">
                </div>
                <div class="col-xs-12">
                    <div class="col-12">
                        <span>추가설명</span>
                    </div>
                    <div class="col-12">
                        <textarea name="comment" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 mt-3">
                    <div class="f-r">
                        <input type="submit" value="등록하기" class="btn btn-primary">
                        <input type="button" value="취소" onclick="history.back()" class="btn btn-secondery">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

    })
</script>
@endsection

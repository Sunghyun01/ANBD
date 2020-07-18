@extends('layouts.app')
<?
$department = [
    '국어국문학과','영어영문학과','중어중문학과','프랑스언어문하학과','일본학과','법학과','행정학과','경제학과'
    ,'경영학과','무역학과','미디어영상학과','관광학과','사회복지학과','농학과','생활과학부','컴퓨터과학과','정보통계학과'
    ,'보건환경학과','간호학과','교육학과','청소년교육과','유아교육과','문화교양학과'
];
$day=[
    'mon'=>'월',
    'tue'=>'화',
    'wed'=>'수',
    'thu'=>'목',
    'fri'=>'금',
    'sat'=>'토',
    'sun'=>'일'
];
?>
@section('content')
    <div class="container" style="padding-top:70px">
        <div class="row">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-12">
                    <span>제목</span>
                    <input type="text" name="goods_name" class="form-control input-sm">
                </div>
                <div class="col-xs-12">
                    <span>학과</span>
                    <select class="form-control" name="department">
                        <option value="">학과를 선택해주세요</option>
                        <?for($i=0; $i<count($department); $i++){?>
                            <option value="{{$i}}">{{ $department[$i] }}</option>
                        <?}?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <span>구분</span>
                    <select class="form-control" name="gubun">
                        <option value="">구분을 선택해주세요</option>
                        <option value="0">전공</option>
                        <option value="1">교양</option>
                        <option value="2">일반</option>
                    </select>
                </div>
                <div class="col-xs-6">
                    <span>학년</span>
                    <select class="form-control" name="grade">
                        <option value="">학년을 선택해주세요</option>
                        <option value="1">1학년</option>
                        <option value="2">2학년</option>
                        <option value="3">3학년</option>
                        <option value="4">4학년</option>
                    </select>
                </div>
                <div class="col-xs-12">
                    <span>거래 선호요일</span>
                    <div class="col-xs-12 p-0">
                        @foreach ($day as $key => $value)
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="{{$key}}" name="day[]">{{ $value }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12 p-0">
                        <span>거래 선호시간</span>
                    </div>
                    <div class="col-xs-5">
                        <select class="form-control" name="start_time">
                            <option value="0">상관없음</option>
                            @for($i=1; $i<25; $i++)
                            <option value="{{$i}}">{{$i}}시</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-xs-2 text-center">
                        <span> ~ </span>
                    </div>
                    <div class="col-xs-5">
                        <select class="form-control" name="end_time">
                            <option value="0">상관없음</option>
                            @for($i=1; $i<25; $i++)
                            <option value="{{$i}}">{{$i}}시</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <!-- <div class="col-xs-12">
                    <span>태그</span>
                    <input type="text" name="hash" placeholder=", 를 사용하여 최대 3개를 저장할수있습니다" class="form-control input-sm">
                </div>
                <div class="col-xs-12">
                    <span>장소</span>
                    <input type="text" name="place" placeholder=", 를 사용하여 최대 3개를 저장할수있습니다" class="form-control input-sm">
                </div> -->
                <div class="col-xs-12">
                    <div class="col-12">
                        <span>추가설명</span>
                    </div>
                    <div class="col-12">
                        <textarea name="comment" class="form-control" rows="7"></textarea>
                    </div>
                </div>
                <div class="col-xs-12">
                    <span>첨부파일</span>
                    <input type="file" name="goods_photo">
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

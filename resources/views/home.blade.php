@extends('layouts.app')
<?
$department = [
    '국어국문학과','영어영문학과','중어중문학과','프랑스언어문화학과','일본학과','법학과','행정학과','경제학과'
    ,'경영학과','무역학과','미디어영상학과','관광학과','사회복지학과','농학과','생활과학부','컴퓨터과학과','정보통계학과'
    ,'보건환경학과','간호학과','교육학과','청소년교육과','유아교육과','문화교양학과'
];
$gubun = [
    '전공','교양','일반'
];
?>
@section('content')
        <div class="row">
            <div class="col-12 p-0">
                <img src="{{ asset('/images/main.jpg') }}" alt="소개" style="width:100%;" class="mainImg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12 mt-2" style="cursor:pointer">
                <img src="{{ asset('/images/dash_1.jpg') }}" alt="학과별" style="width:100%" onclick="location.href='/category?tab=department'">
            </div>
            <div class="col-md-6 col-12 mt-2" style="cursor:pointer">
                <img src="{{ asset('/images/dash_2.jpg') }}" alt="" style="width:100%" onclick="location.href='/category?tab=grade'">
            </div>
            <div class="col-md-6 col-12 mt-2" style="cursor:pointer">
                <img src="{{ asset('/images/dash_3.jpg') }}" alt="" style="width:100%" onclick="location.href='/goods?post_type=0'">
            </div>
            <div class="col-md-6 col-12 mt-2" style="cursor:pointer">
                <img src="{{ asset('/images/dash_4.jpg') }}" alt="" style="width:100%" onclick="location.href='/goods?post_type=1'">
            </div>
        </div>
@endsection
@section('script')
    <script>
        $('.imgBox').height($('.imgBox').parents('.col-xs-12').children('.col-xs-9').height()-20+'px');
    </script>
@endsection

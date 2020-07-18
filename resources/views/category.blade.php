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
@section('style')
<style>
    ul,li{
        list-style: none;
    }
    ul>li>ul>li{
        padding-left: 20px;
    }
</style>
@endsection
@section('content')
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-xs-12 text-right tab">
                <span tab="department" style="color:blue">학과별</span> / <span tab="gubun">구분별</span>
            </div>
            <div class="col-xs-12 department-menu">
                <ul>
                    <?for($i=0; $i<count($department); $i++){?>
                    <li style="height:30px" >{{ $department[$i] }}</li>
                    <li class="d-none" menu="{{$i}}">
                        <ul>
                            <?for($j=1; $j<5; $j++){?>
                            <li grade="{{$j}}">ㄴ {{ $j }}학년</li>
                            <?}?>
                        </ul>
                    </li>
                    <?}?>
                </ul>
            </div>
            <div class="col-xs-12 gubun-menu">
                <ul>
                    <?for($i=0; $i<count($gubun); $i++){?>
                        <li style="height:30px" gubun='{{ $i }}'>{{ $gubun[$i] }}</li>
                    <?}?>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('.tab span').click(function(){
            $('.gubun-menu,.department-menu').hide();
            $('.tab span').css('color','black');

            var menu = '.'+$(this).attr('tab')+'-menu';
            $(this).css('color','blue')
            $(menu).show();
        })
        $('ul>li>ul>li').click(function(){
            var menu = $(this).parents('.d-none').attr('menu');
            var grade = $(this).attr('grade');

            location.href="/goods?department="+menu+'&grade='+grade;
        })
        $('.gubun-menu li').click(function(){
            location.href = '/goods?gubun='+$(this).attr('gubun');
        })
        $('.department-menu>ul>li').click(function(){
            $('.d-none').hide();
            $('.col-xs-12>ul>li').eq($(this).index()+1).show();
        })
    })
</script>
@endsection

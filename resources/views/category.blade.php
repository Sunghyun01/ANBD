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
        cursor: pointer;
    }
    ul>li>ul>li{
        cursor: pointer;
        padding-left: 20px;
    }
    .tab span{
        cursor: pointer;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-right tab">
                <span tab="department" style="color:blue">학과별</span> / <span tab="gubun">구분별</span> / <span tab="grade">학년별</span>
            </div>
            <div class="col-12 department-menu">
                <ul>
                    <?for($i=0; $i<count($department); $i++){?>
                    <li style="height:30px" >{{ $department[$i] }}</li>
                    <li class="dis-none" menu="{{$i}}">
                        <ul>
                            <?for($j=1; $j<5; $j++){?>
                            <li grade="{{$j}}">ㄴ {{ $j }}학년</li>
                            <?}?>
                        </ul>
                    </li>
                    <?}?>
                </ul>
            </div>
            <div class="col-12 gubun-menu">
                <ul>
                    <?for($i=0; $i<count($gubun); $i++){?>
                        <li style="height:30px" gubun='{{ $i }}'>{{ $gubun[$i] }}</li>
                    <?}?>
                </ul>
            </div>
            <div class="col-12 grade-menu">
                <ul>
                    <?for($i=1; $i<5; $i++){?>
                        <li style="height:30px" grade='{{ $i }}'>{{ $i }}학년</li>
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
            $('.gubun-menu,.department-menu, .grade-menu').hide();
            $('.tab span').css('color','black');

            var menu = '.'+$(this).attr('tab')+'-menu';
            $(this).css('color','blue')
            $(menu).show();
        })
        $('ul>li>ul>li').click(function(){
            var menu = $(this).parents('.dis-none').attr('menu');
            var grade = $(this).attr('grade');

            location.href="/goods?department="+menu+'&grade='+grade;
        })
        $('.gubun-menu li').click(function(){
            location.href = '/goods?gubun='+$(this).attr('gubun');
        })
        $('.grade-menu li').click(function(){
            location.href = '/goods?grade='+$(this).attr('grade');
        })
        $('.department-menu>ul>li').click(function(){
            $('.dis-none').hide();
            console.log($(this).index()+1);
            $('.department-menu>ul>li').eq($(this).index()+1).show();
        })
        @if(isset(request()->tab) && request()->tab != '')
            $('.grade-menu, .gubun-menu, .department-menu').hide();
            var tab = '{{ request()->tab }}';
            $('.tab span').css('color','black');

            $(`[tab="${tab}"]`).trigger('click')
            $(`[tab="${tab}"]`).css('color','blue');
        @else
            $('.gubun-menu,.grade-menu').hide();
        @endif
    })
</script>
@endsection

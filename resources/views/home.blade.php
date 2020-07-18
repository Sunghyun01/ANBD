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
    .jumbotron{
        padding: 57px 17px 5px 17px !important;
        margin-bottom: 15px;
    }
</style>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>AㅏNㅏBㅏDㅏ</h1>
            @if(isset($_COOKIE['user_idx']))
            <p onclick="getLocation()">책을 등록해주세요!</p>
            <p>
                <button type="button" name="button" class="btn btn-primary" onclick="location.href='/goodsinsert'">등록하기 »</button>
            </p>
            @else
            <p>회원가입하고 책을 받아봐요!</p>
            <p>
                <button type="button" name="button" class="btn btn-primary" onclick="location.href='/login'">로그인 »</button>
            </p>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12" style="border-bottom: 1px solid #d2d2d7;">
                <h4>최근 등록된 책들</h4>
            </div>
            @foreach($data as $val)
            <?$noImg = isset($val['img']) && $val['img'] != '';?>
            <div class="col-xs-12" onclick="location.href='/goodsdetail/{{$val['idx']}}'" style="border-bottom: 1px solid #d2d2d7; padding-top: 20px;">
                <div class="col-xs-12 p-0">
                    <div class="col-xs-12 p-0">
                        <span style="color:#86868b">{{ date('Y년 m월 d일',$val['reg_time']) }}</span>
                    </div>
                    @if($noImg)
                    <div class="col-xs-2 p-0 imgBox">
                        <img src="{{ $val['img'] }}" style="width:120%;height:100%;" class="rounded">
                    </div>
                    @endif
                    <div class="{{$noImg ? 'col-xs-9' : 'col-xs-12' }} p-0 f-r">
                        <h3 style="margin:0">{{ $val['goods_name'] }}</h3>
                        <p>
                            @if(isset($val['department']) && $val['department'] != '')
                                [{{$department[$val['department']]}}]
                            @endif
                            @if(isset($val['gubun']) && $val['gubun'] != '')
                                [{{$gubun[$val['gubun']]}}]
                            @endif
                            @if(isset($val['grade']) && $val['grade'] != '')
                                [{{$val['grade']}} 학년]
                            @endif
                        </p>
                        <p style="margin: 0 0 20px;">
                        @if(isset($val['place']) && $val['place'] != '')
                        <? $exp = explode(',',$val['place']);?>
                                @for($i=0; $i < count($exp); $i++)
                                    <i class="fa fa-map-marker"></i> {{ $exp[$i] }}
                                @endfor
                        @endif
                        @if(isset($val['hash']) && $val['hash'] != '')
                        <? $exp = explode(',',$val['hash']);?>
                            @for($i=0; $i < count($exp); $i++)
                                <button class="btn btn-xs">{{ $exp[$i] }}</button>
                            @endfor
                        @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
@section('script')
    <script>
        $('.imgBox').height($('.imgBox').parents('.col-xs-12').children('.col-xs-9').height()-20+'px');
    </script>
@endsection

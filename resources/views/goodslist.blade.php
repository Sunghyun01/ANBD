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
<style media="screen">
    .imgBox img{
        width: 180px;
        height: 180px;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                검색결과 {{ count($data)??'' }}건
            </div>
        </div>
        <div class="row">
            @foreach($data as $val)
            <?$noImg = isset($val['img']) && $val['img'] != '';?>
            <div class="col-12" onclick="location.href='/goodsdetail/{{$val['idx']}}'" style="border-bottom: 1px solid #d2d2d7; padding-top: 20px;">
                <div class="col-12 p-0">
                    <div class="col-12 p-0">
                        <span style="color:#86868b">{{ date('Y년 m월 d일',$val['reg_time']) }}</span>
                    </div>

                    <div class="col-2 p-0 imgBox float-left">
                        @if($noImg)
                        <img src="{{$val['img']}}" style="width:100%;height:100%;" class="rounded">
                        @else
                        <img src="{{ asset('/images/default.png' )}}" style="width:100%;height:100%;" class="rounded">
                        @endif
                    </div>

                    <div class="col-9 p-0 float-left">
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
                        <p>
                            @if($val['post_type'] == 0)
                                택배거래
                            @elseif($val['post_type'] == 1)
                                직거래
                            @else
                                택배거래 & 직거래
                            @endif
                        </p>
                        <p style="margin: 0 0 20px;">
                        @if(isset($val['place']) && $val['place'] != '')
                        <? $exp = explode(',',$val['place']);?>
                                @for($i=0; $i < count($exp); $i++)
                                    <i class="fa fa-map-marker"></i> {{ $exp[$i] }}
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

@endsection

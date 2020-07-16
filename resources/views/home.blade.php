@extends('layouts.app')

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
            <p>책을 등록해주세요!</p>
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
                        <p style="margin: 0 0 20px;">
                        <? $exp = explode(',',$val['place']);?>
                        @isset($exp)
                                @for($i=0; $i < count($exp); $i++)
                                    <i class="fa fa-map-marker"></i> {{ $exp[$i] }}
                                @endfor
                        @endisset
                        <? $exp = explode(',',$val['hash']);?>
                        @isset($exp)
                            @for($i=0; $i < count($exp); $i++)
                                <button class="btn btn-xs">{{ $exp[$i] }}</button>
                            @endfor
                        @endisset
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

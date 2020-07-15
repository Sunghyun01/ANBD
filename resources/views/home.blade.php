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
            <div class="col-xs-12">
                최근 등록된 책들
            </div>
            @foreach($data as $val)
            <div class="col-xs-6" onclick="location.href='/goodsdetail/{{$val['idx']}}'">
                <h4>{{ $val['goods_name'] }}</h4>
                <? $exp = explode(',',$val['place']);?>
                @isset($exp)
                    <p>
                        @for($i=0; $i < count($exp); $i++)
                            <i class="fa fa-map-marker"></i> {{ $exp[$i] }}
                        @endfor
                    </p>
                @endisset
                <? $exp = explode(',',$val['hash']);?>
                @isset($exp)
                    @for($i=0; $i < count($exp); $i++)
                        <button class="btn btn-xs">{{ $exp[$i] }}</button>
                    @endfor
                @endisset
            </div>
            @endforeach
        </div>
    </div>
@endsection

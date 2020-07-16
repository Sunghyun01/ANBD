@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-12">
                검색결과 {{ count($data)??'' }}건
            </div>
        </div>
        <div class="row">
            @foreach($data as $val)
            <div class="col-xs-12" onclick="location.href='/goodsdetail/{{$val['idx']}}'" style="border-bottom: 1px solid #d2d2d7; padding-top: 20px;">
                <span>{{ date('Y년 m월 d일',$val['reg_time']) }}</span>
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
            @endforeach
        </div>
    </div>
@endsection

@section('script')

@endsection

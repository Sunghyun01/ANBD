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
        <div class="col-xs-6">
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

@section('script')

@endsection

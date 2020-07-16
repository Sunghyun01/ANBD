@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-xs-12" style="border-bottom: 1px solid black;">
                <h4>메시지함</h4>
            </div>
            @if(isset($data))
                @foreach ($data as $key => $value)
                <div class="col-xs-12" onclick="location.href='/messagedetail/{{$value[0]['post_id']}}'" style="border-bottom: 1px solid #d2d2d7; padding-top: 20px;">
                    <h4>{{ $key }}</h4>
                    <p>{{ $value[0]['message'] }}</p>
                </div>
                @endforeach
            @else
            <div class="col-12">
                <div class="col-xs-12 mb-3">
                    <h4 class="text-center">로그인 후 이용할수있습니다</h4>
                </div>
                <div class="col-xs-6" onclick="location.href='/login'">
                    <p class="text-center border border-successr">로그인</p>
                </div>
                <div class="col-xs-6" onclick="location.href='/register'">
                    <p class="text-center border border-success">회원가입</p>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

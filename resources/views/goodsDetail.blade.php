@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-xs-12">
                <h2>{{ $data['goods_name'] }}</h2>
            </div>
            <div class="col-xs-12">
                {{ $data['department'] }}
                {{ $data['grade'] }}학년
                {{ $data['gubun'] }}
            </div>
            <div class="col-xs-12 mb-2">
                <img src="{{ $data['img'] }}" class="w-100" style="width:100%">
            </div>
            @if(isset($data['day']) && $data['day'] != '')
            <div class="col-xs-6 p-0">
                <div class="col-xs-12">
                    <span>거래 선호요일</span>
                </div>
                <div class="col-xs-12">
                    {{ $data['day']}}
                </div>
            </div>
            @endif
            <div class="col-xs-6 p-0">
                <div class="col-xs-12">
                    <span>거래 선호시간</span>
                </div>
                <div class="col-xs-12">
                    {{ $data['start_time']}}시 ~ {{ $data['end_time'] }}시
                </div>
            </div>
            @if(isset($data['hash']) && $data['hash'] != '')
            <div class="col-xs-6 p-0">
                <div class="col-xs-12">
                    <i class="fa fa-hashtag"></i> 해시태그
                </div>
                <div class="col-xs-12">
                    <? $exp = explode(',',$data['hash']);?>
                    @for($i=0; $i < count($exp); $i++)
                        <button class="btn btn-xs">{{ $exp[$i] }}</button>
                    @endfor
                </div>
            </div>
            @endif
            @if(isset($data['place']) && $data['place'] != '')
            <div class="col-xs-6 p-0">
                <div class="col-xs-12 ">
                    <i class="fa fa-map-marker"></i> 거래장소
                </div>
                <div class="col-xs-12">
                    <? $exp = explode(',',$data['place']);?>
                    @for($i=0; $i < count($exp); $i++)
                        <button class="btn btn-xs">{{ $exp[$i] }}</button>
                    @endfor
                </div>
            </div>
            @endif
            <div class="col-xs-12 mt-2">
                <p readonly>{{$data['comment']}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h5>댓글 <span class="commentCount">{{ count($comment)??'0' }}</span>개</h5>
            </div>
            <div class="col-xs-12 commentBox p-0">
                @isset($comment)
                    @foreach($comment as $value)
                        <div class="col-xs-12">
                            <div class="col-xs-12 ">
                                <span>{{ $value['writer'] }}</span>
                            </div>
                            <div class="col-xs-12 ">
                                <p>{{$value['comment']}}</p>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="col-xs-12">
                <div class="col-xs-10 p-0">
                    <input class="form-control commentVal" placeholder="댓글입력...">
                </div>
                <div class="col-xs-2 p-0">
                    <input type="button" value="댓글" class="btn btn-primary comment w-100">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('.comment').click(function(){
            $.ajax({
				method	: 'POST',
				url		: location.href+'/comment',
				data	:  {
                    comment : $('.commentVal').val()
                },
			}).done(function(data){
                $('.commentBox').append(`
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <span>${data['writer']}</span>
                        </div>
                        <div class="col-xs-12">
                            <p>${$('.commentVal').val()}</p>
                        </div>
                    </div>
                `);
                $('.commentCount').text($('.commentCount').text()*1+1);
                $('.commentVal').val('');
            })
        })
    })
</script>
@endsection

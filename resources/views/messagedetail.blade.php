@extends('layouts.app')

@section('style')
    <style>
        .get{
            border-radius: 10px;
            padding-left: 15px;
            background: #e8e8e8;
        }
        .post{
            border-radius: 10px;
            padding-right: 15px;
            background: #fbfbe3;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-12" style="border-bottom: 1px solid black;">
                <h4>{{ $postName }}</h4>
            </div>
            <div class="col-12 msgBox">
                @foreach ($data as $key => $value)
                    <div class="col-12 ">
                        <div class="{{ $pid == $value['post_id'] ? 'text-left' : 'text-right' }}">
                            <p>{{ $pid == $value['post_id'] ? $postName : $getName }}</p>
                            <p class="{{ $pid == $value['post_id'] ? 'get' : 'post' }}">{{ $value['message'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-12" style="bottom: 0">
                <div class="col-10 p-0 float-left">
                    <input type="text" class="msgText form-control">
                </div>
                <div class="col-2 p-0 float-left">
                    <input type="button" value="전송" class="form-control msgSend btn btn-info">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.msgSend').click(function () {
            $.ajax({
                method	: 'POST',
                url		: '/msg',
                data	:  {
                    msg : $('.msgText').val(),
                    post_id :'{{ $gid }}',
                    get_id : '{{ $pid }}',
                },
            }).done(function(data){
                if(data['status']){
                    $('.msgBox').append(`
                        <div class="col-12 ">
                            <div class="text-right">
                                <p>{{ $getName }}</p>
                                <p style='border-radius: 10px;padding-right: 15px;background: #fbfbe3;'>${$('.msgText').val()}</p>
                            </div>
                        </div>
                    `)
                    $('.msgText').val('');
                }else{
                    Command: toastr["error"]('ServerError');
                }
            })
        })
    </script>
@endsection

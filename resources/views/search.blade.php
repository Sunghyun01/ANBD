@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 55px;">
        <div class="row">
            <form class="form-inline">
                <input class="form-control search" type="text" placeholder="Search" style="width:80%;float:left">
                <button class="btn btn-info submit" type="button">Search</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.submit').click(function(){
                location.href = '/goods?q='+$('.search').val();
            })
        })
    </script>
@endsection

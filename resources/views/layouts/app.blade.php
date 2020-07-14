<!DOCTYPE html>
<html>
    <head lang="ko">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Home</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
        @yield('style')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </head>
    <body style="height: 100%; padding:0;overflow-x:hidden" >
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home">Project name</a>
                </div>
            </div>
        </nav>
        @yield('content')
        <div style="position:fixed;bottom:0;background:#fff;width:100%;height:50px">
            <div style="width:20%; text-align:center;line-height:50px;float:left" onclick="location.href='/home'">
                <i class="fa fa-home"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left" onclick="location.href='/category'">
                <i class="fa fa-bars"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left" onclick="location.href='/search'">
                <i class="fa fa-search"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left" onclick="location.href='/message'">
                <i class="fa fa-comment"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left" onclick="location.href='/setting'">
                <i class="fa fa-cogs"></i>
            </div>
        </div>
    </body>
    @yield('script')
</html>

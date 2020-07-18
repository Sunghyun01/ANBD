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
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
        <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type="module" src="{{ secure_asset('/js/app.js') }}"></script>
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
                    <img src="https://jsh2.innoi.kr/images/logo.png" alt="" height="50" onclick="location.href='/home'">
                </div>
            </div>
        </nav>
        @yield('content')
        <div style="margin-bottom:50px"></div>
        <div style="position:fixed;bottom:0;background:#fff;width:100%;height:50px;box-shadow: 0 -2px 2px -2px #333;" class="tabMenu">
            <div style="width:20%; text-align:center;line-height:50px;float:left;box-sizing: border-box;" onclick="location.href='/home'" class="home">
                <i class="fa fa-home"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left;box-sizing: border-box;" onclick="location.href='/category'" class="category">
                <i class="fa fa-bars"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left;box-sizing: border-box;" onclick="location.href='/search'" class="search">
                <i class="fa fa-search"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left;box-sizing: border-box;" onclick="location.href='/message'" class="message">
                <i class="fa fa-comment"></i>
            </div>
            <div style="width:20%; text-align:center;line-height:50px;float:left;box-sizing: border-box;" onclick="location.href='/setting'" class="setting">
                <i class="fa fa-cogs"></i>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        var menu = localStorage.getItem('menu') ? localStorage.getItem('menu') : localStorage.setItem('menu', 'home');
        $(`.${menu}`).css({'border-bottom':'2px solid violet','line-height':'48px'})

        $('.tabMenu>div').click(function(){
            localStorage.setItem('menu', $(this).attr('class'));
        })
    </script>
    @yield('script')
</html>

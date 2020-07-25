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
        <style media="screen">
          .popup ul,li{
              list-style: none;
              color: white
          }
           .popup ul>li>ul>li{
              padding-left: 20px;
              color: white
          }
        </style>
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
            <div class="row">
                <div class="col-xs-12 p-0">
                    <div class="col-md-3 col-xs-3  p-0 open_menu text-center" style="float:left">
                      <i class="fa fa-bars" style="color:white;font-size:30px;text-align:right;padding:10px"></i>
                    </div>
                    <div class="col-md-6 col-xs-6 p-0 text-center">
                      <img src="https://jsh2.innoi.kr/images/logo.png" alt="" height="50" onclick="location.href='/home'">
                    </div>
                    <div class="col-md-3 col-xs-3  p-0 text-center" style="float:left">
                      <i class="fa fa-comment" style="color:white;font-size:30px;text-align:right;padding:10px"></i>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
        <div style="margin-bottom:50px"></div>
        <!-- <div style="position:fixed;bottom:0;background:#fff;width:100%;height:50px;box-shadow: 0 -2px 2px -2px #333;" class="tabMenu">
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
        </div> -->
        <div class="shadow" style="display:none;background:gray;width:100%; left:0;height:100%;top:0;position:absolute;z-index:10;overflow:hidden">
            <div class="popup" style="display:none;background:black;width:90%; left:0;height:100%;top:0;position:absolute;overflow:hidden">
              <?
              $department = [
                  '국어국문학과','영어영문학과','중어중문학과','프랑스언어문화학과','일본학과','법학과','행정학과','경제학과'
                  ,'경영학과','무역학과','미디어영상학과','관광학과','사회복지학과','농학과','생활과학부','컴퓨터과학과','정보통계학과'
                  ,'보건환경학과','간호학과','교육학과','청소년교육과','유아교육과','문화교양학과'
              ];
              $gubun = [
                  '전공','교양','일반'
              ];
              ?>
              <div class="container" style="padding-top:50px">
                  <div class="row">
                      <form class="form-inline">
                          <input class="form-control" type="text" placeholder="Search" style="width:75%;float:left">
                          <button class="btn btn-info submit" type="button" style="width:25%;">Search</button>
                      </form>
                  </div>
                  <div class="row">
                      <div class="col-xs-12 text-right tab">
                          <span tab="department" style="color:blue">학과별</span> / <span tab="gubun">구분별</span>
                      </div>
                      <div class="col-xs-12 department-menu">
                          <ul>
                              <?for($i=0; $i<count($department); $i++){?>
                              <li style="height:30px" >{{ $department[$i] }}</li>
                              <li class="d-none" menu="{{$i}}">
                                  <ul>
                                      <?for($j=1; $j<5; $j++){?>
                                      <li grade="{{$j}}">ㄴ {{ $j }}학년</li>
                                      <?}?>
                                  </ul>
                              </li>
                              <?}?>
                          </ul>
                      </div>
                      <div class="col-xs-12 gubun-menu d-none">
                          <ul>
                              <?for($i=0; $i<count($gubun); $i++){?>
                                  <li style="height:30px" gubun='{{ $i }}'>{{ $gubun[$i] }}</li>
                              <?}?>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center m-0">
                <h3>Hanwoori ⓒ</h3>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $('.open_menu').click(function(){
            if ($('.popup').css('display') == 'block') {
                $('.open_menu > i').removeClass('fa fa-times');
                $('.open_menu > i').addClass('fa fa-bars');
                $('.shadow').hide();
                $('.popup').hide();
                $('body').css('overflow','auto');
            }else {
                $('.open_menu > i').removeClass('fa fa-bars');
                $('.open_menu > i').addClass('fa fa-times');
                $('.shadow').show();
                $('.popup').show()
                $('body').css('overflow','hidden');
            }
        })
        var menu = localStorage.getItem('menu') ? localStorage.getItem('menu') : localStorage.setItem('menu', 'home');
        $(`.${menu}`).css({'border-bottom':'2px solid violet','line-height':'48px'})

        $('.tabMenu>div').click(function(){
            localStorage.setItem('menu', $(this).attr('class'));
        })
        function logout(){
            $.ajax({
                method	: 'POST',
                url		: '/logout',
            }).done(function(data){
                if(data['status']){
                    alert('로그아웃되었습니다');
                    location.reload();
                }else{
                    alert('Error');
                }
            })
        }
        $('.submit').click(function(){
            location.href = '/goods?q='+$('.search').val();
        })
        $('.tab span').click(function(){
            $('.gubun-menu,.department-menu').hide();
            $('.tab span').css('color','black');

            var menu = '.'+$(this).attr('tab')+'-menu';
            $(this).css('color','blue')
            $(menu).show();
        })
        $('ul>li>ul>li').click(function(){
            var menu = $(this).parents('.d-none').attr('menu');
            var grade = $(this).attr('grade');

            location.href="/goods?department="+menu+'&grade='+grade;
        })
        $('.gubun-menu li').click(function(){
            location.href = '/goods?gubun='+$(this).attr('gubun');
        })
        $('.department-menu>ul>li').click(function(){
            $('.d-none').hide();
            $('.col-xs-12>ul>li').eq($(this).index()+1).show();
        })
    </script>
    @yield('script')
</html>

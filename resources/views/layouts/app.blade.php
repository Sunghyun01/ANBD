<!DOCTYPE html>
<html>
    <head lang="ko">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Home</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
        <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script type="module" src="{{ secure_asset('/js/app.js') }}"></script>
        <style>
          .row{
              margin-right: 0;
              margin-left: 0;
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
    <body>
        <div class="container p-0 bb">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand logo-font logo" href="#">
                        <img src="{{ secure_asset('/images/logo.png') }}" alt="" style="width:100%">
                    </a>
                    <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#links" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                        <span class="messageCnt"></span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-user"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="links">
                        <ul class="navbar-nav mr-auto menu">
                            <li class="nav-item active">
                                <a class="nav-link" href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/goods">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/category">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/message">Message <i class="fa fa-bell" style="color: white;"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" id="account">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                @if(isset($_COOKIE['user_idx']) && $_COOKIE['user_idx'] != '')
                                    <a class="nav-link" href="/setting">{{ App\User::where('idx',$_COOKIE['user_idx'])->first()->name }}</a>
                                @else
                                    <a class="nav-link" href="/register">Register</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if(isset($_COOKIE['user_idx']) && $_COOKIE['user_idx'] != '')
                                    <a class="nav-link" href="/logout">Log out</a>
                                @else
                                    <a class="nav-link" href="/login">Log in</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="navpusher"></div>
            <!-- <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <div class="col-xs-12 p-0">
                            <div class="col-md-3 col-xs-3  p-0 open_menu text-center" style="float:left">
                              <i class="fa fa-bars" style="color:white;font-size:30px;text-align:right;padding:10px"></i>
                            </div>
                            <div class="col-md-6 col-xs-6 p-0 text-center">
                              <img src="https://jsh2.innoi.kr/images/logo.png" alt="" height="50" onclick="location.href='/home'">
                            </div>
                            <div class="col-md-3 col-xs-3  p-0 text-center" style="float:left" onclick="location.href='/message'">
                              <i class="fa fa-comment" style="color:white;font-size:30px;text-align:right;padding:10px"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav> -->
            @yield('content')
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
                              <input class="form-control inp" type="text" placeholder="Search" style="width:75%;float:left">
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
        </div>
        <div class="row footer">
            <div class="col-12 text-center m-0">
                <h4>Hanwoori ⓒ</h4>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('.navpusher').css('height',$('.navbar').outerHeight()+25+'px');
        $(window).resize(function(){
            $('.navpusher').css('height',$('.navbar').outerHeight()+25+'px');
        })
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
        $('.menu>li>a').click(function(){
            sessionStorage.setItem('menu', $(this).attr('href'));
        })
        $('.logo').click(function(){
            sessionStorage.setItem('menu', '/home');
            location.href='/home';
        })
        if(sessionStorage.getItem('menu')){
            $(`.menu>li`).removeClass('active')
            $(`.menu>li>a[href="${sessionStorage.getItem('menu')}"]`).parents('li').addClass('active');
        }
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
        $(".inp").keyup(function(e){
            if(e.keyCode == 13)
                $('.submit').trigger('click')
        });

        $('.submit').click(function(){
            location.href = '/goods?q='+$('.inp').val();
        })
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        $('.bb').css('min-height',$(window).height()-$('.footer').height()+'px');
        @if(isset($_COOKIE['user_idx']) && $_COOKIE['user_idx'] != '')
        $.ajax({
            method	: 'POST',
            url		: '/chkMsg',
        }).done(function(data){
            if(data['status']){
                $('.messageCnt').text(data['msg']);
                setInterval(function() {
                    $('.fa-bell').css('color','white');
                    setTimeout(function() {
                        $('.fa-bell').css('color','red');
                    }, 1000);
                }, 3000);
            }else{

            }
        },10000)
        @endif
    </script>
    @yield('script')
</html>

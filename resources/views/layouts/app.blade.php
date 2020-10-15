<!DOCTYPE html>
<html>
    <head lang="ko">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>KNOU - 아나바다</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script type="module" src="{{ asset('/js/app.js') }}"></script>
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
                        <img src="{{ asset('/images/logo.png') }}" alt="" style="width:100%">
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
                                    <a class="nav-link" href="/setting">{{ App\User::where('idx',Illuminate\Support\Facades\Crypt::decryptString($_COOKIE['user_idx']))->first()->name }}</a>
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
            @yield('content')
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
                    }, 1500);
                }, 1500);
            }
        })
        @endif
    </script>
    @yield('script')
</html>

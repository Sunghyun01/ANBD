<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links {
                width: 80%;
				margin: 0 auto;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			.page-item{
				width:10%;
				float: left;
				list-style: none;
			}
        </style>
    </head>
    <body>
		<div id="example"></div>
        <div class="">
            @if (Auth::id())
            	<div class="">
                	<a href="{{ url('/logout') }}">logout</a>
				</div>
			@else
				<div>
					<a href="{{ url('/login') }}">login</a>
	                <a href="{{ url('/register') }}">Register</a>
	            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
				@if(isset($users))
					@foreach ($users as $user)
	    				<p>{{ $user }}</p>
					@endforeach
				@elseif(isset($aList))
					@foreach ($aList as $as)
						<p>{{ $as->a3 }}</p>
					@endforeach
					<div class="links">
	                    {{ $aList->links() }}
	                </div>
				@endif

            </div>
        </div>
    </body>
</html>

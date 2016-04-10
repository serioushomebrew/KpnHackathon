<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KpnHackathon DWE">
    <meta name="author" content="Koen Hendriks">

    <title>KPN Digital Work Environment</title>

    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/paper/bootstrap.min.css')  !!}
    {!! Html::style('css/custom.css')  !!}

    {{-- Font Awesome --}}
    {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta charset="UTF-8">
    <title>DWE</title>

    <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="images/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand hidden-xs hidden-sm" href="/">KPN - Digital Work Environment</a>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('chats.index') }}">Chatruimtes<i class="fa fa-btn fa-comment pull-right" style="margin-top: 5px;"></i></a></li>
                            <li><a href="{{ url('/logout') }}">Logout<i class="fa fa-btn fa-sign-out pull-right" style="margin-top: 5px;"></i></a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li>--}}
                        {{--<a href="#">About</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Services</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Contact</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="containter">
        <div class="row">
            <div class="col-xs-12">
                <h2></h2>
            </div>
        </div>
    </div>
    @yield('content')

<!-- jQuery and Bootstrap JS -->
{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('js/scripts.js') !!}

</body>

</html>



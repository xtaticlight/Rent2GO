<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Log In</title>

    <!-- Bootstrap -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/jasny-bootstrap.min.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{URL::asset('js/html5shiv.min.js')}}"></script>
    <script src="{{URL::asset('js/respond.min.js')}}"></script>
    <![endif]-->
    <STYLE>
        .catalog-list .product {
            border-bottom: 1px solid #B0A060;
            display: inline-block;
            vertical-align: top;
            white-space: normal;
            position: relative;
            overflow: hidden;
            margin: 1em 0;
            width: 240px;
        }
    </STYLE>
</head>
<body class="master_style">
<!--Navbar-->
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
    <div id="switcher" class="col-xs-12">
        <img src="{{URL::asset('img/nook.png')}}" style="width: 120px">
        <div id="loginform1" class="col-xs-12">
            <h2 style="font-weight: bold">Login</h2>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="loginform2" class="form-group" style="margin-bottom: 0px;">
                <div class="col-xs-12">
                    <!--- Username Field --->
                    {!! Form::label('email', 'Username:', ['class' => 'sr-only']) !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'style' => 'margin-bottom: 6px', 'placeholder' => 'Username']) !!}
                </div>
                <div class="col-xs-12">
                    <!--- Password Field --->
                    {!! Form::label('password', 'Password:', ['class' => 'sr-only']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'style' => 'margin-bottom: 6px', 'placeholder' => 'Password']) !!}
                </div>
                <div class="col-xs-6">
                    <div class="label" style="color: gray;">
                        <label>
                            {!! Form::checkbox('remember', '1', null,  ['id' => 'keeplogged']) !!}
                            Keep me logged in
                        </label>
                    </div>
                    <input type="hidden" name="default_keeplogged" value="0">
                </div>
                <div class="col-xs-6" style="margin-top: 3px;">
                    <a class="label" style="color: gray;" href="/recover">Forgot your password?</a>
                </div>
            </div>
            <div id="loginform3" class="col-xs-6" style="margin-top: 6px;">
                {!! Form::submit('Sign in', ['class' => 'btn btn-info']) !!}
            </div>
            <div id="loginform4" class="col-xs-6" style="margin-top: 6px;">
                <div class="pull-right">
                    {!! Form::button('Sign up', ['class' => 'btn btn-info', 'id' => 'signingup']) !!}
                </div>
            </div>
        </form>

    </div>
</div>

<div class="navbar navbar-default navbar-fixed-top hidden-sm hidden-md hidden-lg">
    <div class="col-xs-5 col-md-5 col-sm-5" style="padding-left: 10px;"><img src="{{URL::asset('img/nook.png')}}"
                                                                             style="width: 120px"></div>
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>

<nav class="navbar navbar-inverse navbar-stati-top hidden-xs" style="margin-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="navbar-collapse collapse">
                <div class="col-md-1 col-lg-1 col-xs-1 col-sm-1 " style="padding-left: 0px;">
                    <img src="{{URL::asset('img/nook.png')}}" height="35px" width="80px">
                </div>
                <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                    <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9" style="padding-right: 5px;padding-left: 0px;">
                        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search Material...']) !!}
                    </div>
                    <div class="col-md-2 col-lg-2 col-xs-2 col-sm-2" style="padding-left: 0px;">
                        {!! Form::button('', ['class' => 'btn glyphicon glyphicon-search']) !!}
                    </div>
                </div>
                <div class="col-md-5 col-lg-6 col-xs-4 col-sm-4">

                </div>
                <div class="col-md-3 col-lg-3 col-xs-4 col-sm-4 pull-right">
                    <!--<a class="btn1" type="button" href="#signInCollapse"> Sign In |</a>
                     <a class="btn2" type="button" href="#signUpCollapse"> |Sign Up </a>-->
                    {!! Form::button('Sign In', ['class' => 'btn btn-info', 'data-toggle' => 'modal', 'data-target' => '#signIn']) !!}
                    <a role="button" class="btn btn-info" href="{{ url('/auth/register') }}"> Sign Me Up</a>
                </div>
            </div>
            <!--Sign In modal-->
        @include('modal_login')
        <!--Sign In modal-->
        </div>
    </div>
</nav>
<!-- Navbar -->

<!--Image Carousel-->
<div class="container" style="background-color: #dddddd">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> No Results, Try another keyword<br><br>
            <ul>
            </ul>
        </div>
    @endif
    <label class="label label-success" style="font-size:large"> Search Result</label>
    <div class="container col-lg-12">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-1" style="size: auto;">
            <a href="/detail">
                <img src="{{URL::asset('img/nook.png')}}" alt="{{URL::asset('img/1.jpg')}} ">
                <br>
                <h4 style="margin-left: 100px;">GDFHFHDH</h4>
            </a>
        </div>
    </div>
</div>
<footer style="position: fixed;bottom:0;left:0;right:0;height:70px">
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="col-sm-6">
                <div class="navbar-text pull-left">
                    <p>Copy Right &copy; 2016</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="navbar-text pull-right">
                    <a href="#"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/jasny-bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/mobilesigning.js')}}"></script>
</html>
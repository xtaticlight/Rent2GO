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
                <div class="pull-right padding:">
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/search_results') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="padding-right: 5px;padding-left: 0px;">
                            <select name="category" id="" class="form-control">
                                <option value="">Select Category</option>
                                <option value="Rooms">Houses</option>
                                <option value="Cars">Cars</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="padding-right: 5px;padding-left: 0px;">
                            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search Material...']) !!}
                        </div>
                        <div class="col-md-2 col-lg-2 col-xs-2 col-sm-2" style="padding-left: 0px;">
                            <button type="submit" class="btn glyphicon glyphicon-search"></button>
                        </div>
                    </form>
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
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="infoCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#infoCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#infoCarousel" data-slide-to="1"></li>
            <li data-target="#infoCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/rsz_rent-a-car-3.jpg" width="150%" height="auto">
            </div>
            <div class="item">
                <img src="img/rsz_rent-a-house.jpg" width="150%" height="auto">
            </div>
            <div class="item">
                <img src="img/rsz_rental-classified-india-rental-2.jpg" width="150%" height="auto">
            </div>

        </div>

        <a class="left carousel-control" href="#infoCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="right carousel-control" href="#infoCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <!--Image Carousel-->
    <!--Steps-->
    <div class="container">
        <div class="row">
            <h1> Steps: </h1>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="img/1.png" class="img-responsive" width="50%" height="auto" align="center" hspace="80">
                <p class="text-justify"><br>Doing Things For You Only #1 Can Do! Rent2GO makes rent transactions easy.
                    Anything has a value.
                </p>
            </div>
            <div class="col-sm-4">
                <img src="img/2.png" class="img-responsive" width="50%" height="auto" align="center" hspace="80">
                <p class="text-justify"><br>Service You Deserve. People You Trust. Rent2GO provides user verifications to
                    prevent scams. We are responsible for fail online transactions.
                </p>
            </div>
            <div class="col-sm-4">
                <img src="img/3.png" class="img-responsive" width="50%" height="auto" align="center" hspace="80">
                <p id="copyRight"  class="text-justify" ><style> .text-justify {margin-right:20px;}</style> <br>When you're ready, we're ready. As soon as you decided, we
                    will make things happen.
                </p>
            </div>
        </div>

    </div>
    <!--Steps-->
    <div class="container">
        <div class="row">
            <h1>Programmers: </h1>
        </div>
        <div class="col-sm-4">
            <img src="img/rsz_kim.jpg" class="img-responsive img-circle" width="50%" height="auto" align="center"
                 hspace="80">
            <p class="text-center"><br>I am The Flash. No reactions accepted</p>
        </div>
        <div class="col-sm-4">
            <img src="img/rsz_1eman.JPG" class="img-responsive img-circle" width="50%" height="auto" align="center"
                 hspace="80">
            <p class="text-center">Winners never Quit, Quitters never Win</p>
        </div>
        <div class="col-sm-4">
            <img src="img/ogs.png" class="img-responsive img-circle" width="50%" height="auto" align="center"
                 hspace="80">
            <p class="text-center"><br>Just make things happen. Be positive</p>
        </div>
        <div class="col-sm-4" id="marg"><style> #marg{ margin-left:180px;}</style>
            <img src="img/rsz_kimo.JPG" class="img-responsive img-circle" width="50%" height="auto" align="center"
                 hspace="80">
            <p class="text-center"><br>Success is not final, failure is not fatal: it is the courage to continue that counts</p>
        </div>
        <div class="col-sm-4">
            <img src="img/rsz_andrew.JPG" class="img-responsive img-circle" width="50%" height="auto" align="center"
                 hspace="80">
            <p class="text-center"><br>Mistakes won't kill us. Just behave and correct it</p>
        </div>
    </div>

</div>
<br>
<br><br>
<footer style="position: fixed;bottom:0;left:0;right:0;height:70px">
    <div class="navbar navbar-inverse">
        <div class="container"></div> <style> .container{padding-top:10px;}</style>
            <div class="col-sm-6">
                <div class="navbar-text pull-left">
                    <p>Copy Right &copy; 2016</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="navbar-text pull-right ">
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
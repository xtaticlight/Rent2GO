<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Rent2GO</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <!--	<li><a href="{{ url('/') }}">Home</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="#" data-toggle="modal" data-target="#signIn">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Sign Me Up</a></li>
                @else
                    <li><a href="#"> ID No: <strong>{{ Auth::user()->id }} </strong> </a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" data-toggle="modal" data-target="#MyModal"><img src="assets/img/kim.jpg"
                                                                                            class="img-responsive img-circle"
                                                                                            style="width: 80px; height: 80px"></a>
                            </li>
                            <li><a href="./myRental"> <span class="glyphicon glyphicon-folder-close"></span> My
                                    Rental/s</a></li>
                            <li><a href="./MyRent"> <span class="glyphicon glyphicon-shopping-cart
"></span> My Rent/s</a></li>
                            <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out
"></span> Logout</a></li>
                        </ul>
                    </li>
                    <div id="MyModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Profile</h4>
                                </div>
                                <div class="modal-body">
                                    <img src="img/kim.jpg" class="img-responsive img-circle"
                                         style="with: 200px; height: 200px; margin-left: 30%"/>

                                    <ul style="list-style-type: none; margin-top: 10px">
                                        <li><label style="margin-left: 40px">Name:</label><input id="name" type="text"
                                                                                                 placeholder="Kim Ting"
                                                                                                 style="margin-left: 62px">
                                        </li>
                                        <li><label style="margin-left: 40px">Email:</label><input id="email"
                                                                                                  type="email"
                                                                                                  placeholder="kimting@gmail.com"
                                                                                                  style="margin-left: 65px">
                                        </li>
                                        <li><label style="margin-left: 40px">Contac Number:</label><input id="contact"
                                                                                                          type="text"
                                                                                                          placeholder="09999999999"
                                                                                                          style="margin-left: 3px">
                                        </li>
                                        <li><label style="margin-left: 40px">Address:</label><input id="address"
                                                                                                    type="text"
                                                                                                    placeholder="Kim Ting"
                                                                                                    style="margin-left: 49px">
                                        </li>
                                        <li><label style="margin-left: 40px">Age:</label><input id="age" type="text"
                                                                                                placeholder="Kim Ting"
                                                                                                style="margin-left: 76px">
                                        </li>
                                        <li><label style="margin-left: 40px">Birthday:</label><input id="birthday"
                                                                                                     type="text"
                                                                                                     placeholder="Kim Ting"
                                                                                                     style="margin-left: 49px">
                                        </li>
                                        <li><label style="margin-left: 40px">Gender:</label><input id="gender"
                                                                                                   type="text"
                                                                                                   placeholder="Kim Ting"
                                                                                                   style="margin-left: 55.5px">
                                        </li>
                                    </ul>
                                    <li>
                                        <div id="Password" class="collapse">
                                            <ul style="list-style-type: none; margin-top: 10px">
                                                <li><label style="margin-left: 40px">Old password:</label><input
                                                            id="old_password" type="password" style="margin-left: 17px">
                                                </li>
                                                <li><label style="margin-left: 40px">New password:</label><input
                                                            id="new_password" type="password"
                                                            style="margin-left: 9.5px"></li>
                                                <li><label style="margin-left: 40px">New password:</label><input
                                                            id="repassword" type="password" style="margin-left: 9.5px">
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#" data-toggle="collapse" data-target="#Password">Reset Password</a>
                                    </li>

                                    <button type="submit" style="margin-left: 53%">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
@include('modal_login')
@yield('content')

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

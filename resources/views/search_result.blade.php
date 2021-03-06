@extends('app')

@section('content')
    <style>
        search:-webkit-input-placeholder {
            color: #b5b5b5;
        }

        search-moz-placeholder {
            color: #b5b5b5;
        }

        .search {
            background: #f5f5f5;
            font-size: 14px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            padding: 13px 10px;
            width: 270px;
            margin-bottom: 20px;
            box-shadow: inset 0 2px 3px rgba(0, 0, 0, 0.1);
            clear: both;
        }

        .search:focus {
            background: #fff;
            box-shadow: 0 0 0 3px #fff38e, inset 0 2px 3px rgba(0, 0, 0, 0.2), 0px 5px 5px rgba(0, 0, 0, 0.15);
            outline: none;
        }
        #arror{
            font-weight: normal;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <h3>Categories</h3>
                <ul style="list-style: none">
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">houses</a></li>
                    <li><a href="#">Lands</a></li>
                    <li><a href="#">cars</a></li>
                    <li><a href="#">clothes</a></li>
                    <li><a href="#">equipments</a></li>
                    <li><a href="#">others</a></li>
                </ul>
            </div>
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/search_results') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="search" type="search" placeholder="Search here" style="margin-left: 20px"/>
                    <button type="submit" class="glyphicon glyphicon-search"
                            style="width: 50px; height: 45px;"></button>
                </form>
                <br>
                <label style="font-size: larger;font-weight: bold;"> Available For Rent :</label>
                <div class="row">
                    @if($materials=='')
                        <br><br>
                        <alert class="warning">
                            <label for="" class="label label-default" style="font-size: medium;">No result-found :D Try
                                Another Keyword.</label>
                        </alert>
                    @else

                            <div class="container1">
                                @foreach($materials as $data)
                                <div class="col-sm-3" style="align-items: center">
                                    <a href="#" data-toggle="modal" data-target="#{{$data['id']}}"><img
                                                class="img-responsive" src="./assets/img/{{$data['pictures'][0]}}.jpg"
                                                style="width: 150px;height: 150px; padding-left: 20px"></a>
                                    <label style="margin-left: 80px;">{{$data['name']}}</label>
                                </div>
                                <div class="modal fade modal-info" id="{{$data['id']}}" role="dialog">
                                        <!-- Modal content-->
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Item Info</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form type="hidden" method="post" action="./rentItem{{$data['id']}}"
                                                          id="form1"></form>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}}"/>
                                                    <div class="col-lg-12">
                                                        <div class="container col-lg-7" style="height: 300px;">
                                                            <label for="" class="label label-primary"> Pictures</label>
                                                            <div id="infoCarousel" class="carousel slide"
                                                                 data-ride="carousel"
                                                                 data-interval="1500">
                                                                <ol class="carousel-indicators">
                                                                    <li data-target="#infoCarousel" data-slide-to="0"
                                                                        class="active"></li>
                                                                    <li data-target="#infoCarousel"
                                                                        data-slide-to="1"></li>
                                                                    <li data-target="#infoCarousel"
                                                                        data-slide-to="2"></li>
                                                                </ol>
                                                                <div class="carousel-inner">
                                                                    <div class="item active">
                                                                        <img src="./assets/img/{{$data['pictures'][0]}}.jpg"
                                                                             width="auto" height="auto;">
                                                                    </div>
                                                                    @foreach($data['pictures'] as $pictures)

                                                                        <div class="item">
                                                                            <img src="./assets/img/{{$pictures}}.jpg"
                                                                                 width="auto"
                                                                                 height="auto;">
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                                <a class="left carousel-control" href="#infoCarousel"
                                                                   role="button"
                                                                   data-slide="prev">
                                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                                </a>

                                                                <a class="right carousel-control" href="#infoCarousel"
                                                                   role="button"
                                                                   data-slide="next">
                                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                                </a>
                                                            </div>
                                                            <!--Image Carousel-->
                                                        </div>
                                                        <div class="container col-lg-5">
                                                            <label for="" class="label label-primary">Descriptions
                                                                :</label>
                                                            <ul>
                                                                <li>{{$data['description']}}</li>
                                                            </ul>
                                                            <label for="" class="label label-primary">Package Qty
                                                                :</label>
                                                            <ul>
                                                                <li>{{$data['available_qty']}}</li>
                                                            </ul>
                                                            <label for="" class="label label-primary">Negotiable Price
                                                                :</label>
                                                            <ul>
                                                                <li>{{$data['total_due']}}</li>
                                                            </ul>
                                                            <label for="" class="label label-primary">Way To
                                                                Rent</label>
                                                            <ul>
                                                                <li><Strong>Login first to View the contacts</strong>
                                                                </li>

                                                                <a role="button" class="btn btn-info"
                                                                   href="{{ url('/auth/login') }}"> Sign Me In</a>
                                                                <a role="button" class="btn btn-info"
                                                                   href="{{ url('/auth/register') }}"> Sign Me Up</a>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button data-dismiss="modal"
                                                            class="btn btn-info"><span
                                                                class="glyphicon glyphicon-ok"></span>
                                                        Ok
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                @endforeach
                                </div>

                            </div>

                </div>
                @endif


            </div>
        </div>
    </div>
    <script>
        document.getElementById("arrow1").innerHTML = " Search Results";
    </script>
@endsection

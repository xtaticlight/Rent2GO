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
    </style>

    <div class="container col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/search_results') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="search" type="search" placeholder="Search here" style="margin-left: 20px"/>
                    <button type="submit" class="glyphicon glyphicon-search"
                            style="width: 50px; height: 45px;"></button>
                    &nbsp;&nbsp;
                    <a data-toggle="tool-tip" Title="Add Item" href="./add_item" role="button"
                       class=" btn btn-default btn-lg"> <span class="glyphicon glyphicon-plus"></span> </a>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-2">
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
                @if($materials=='')
                    <br><br>
                    <alert class="warning">
                        <label for="" class="label label-default" style="font-size: medium;">No Available properties
                            for
                            rent :D</label>
                    </alert>
                @else
                    <div class="panel-body">
                        <div class="table-responsive">
                            @include('main_myrentals')
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        document.getElementById("arrow1").innerHTML = "  Rentals Properties";
    </script>
@endsection


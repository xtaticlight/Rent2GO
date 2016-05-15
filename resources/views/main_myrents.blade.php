<table class="table table-hover col-lg-12 col-md-12 col-xs-12">
    <thead>
    <!-- <th>Date</th>--->
    <th>Name</th>
    <th>Status</th>
    <th>Qty</th>
    <th>Amount</th>
    </thead>
    <tbody>
    @foreach($materials as $data)
        <tr>
            <td>{{$data['name']}}</td>
            <td><a href="#" data-toggle="modal" data-target="#view{{$data['id']}}">{{$data['status']}}</a></td>
            <td>{{$data['available_qty']}}</td>
            <td>{{$data['total_due']}}</td>
        </tr>
        <div class="modal fade modal-info" id="view{{$data['id']}}" role="dialog">
            <div class="modal-dialog modal-lg">

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

                            <div class="col-lg-12">
                                <div class="container col-lg-7">
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
                                    <label for=""
                                           class="label label-primary">Availability:</label>
                                    <ul>
                                        @if($data['status']=='Available')
                                            <li>Item On hand</li>
                                        @else
                                            <li> Rented By : {{$data['RentBy']}}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button data-dismiss = "modal" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-ok"></span>OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </tbody>
</table>
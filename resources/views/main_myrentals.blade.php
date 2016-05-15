<table class="table table-hover col-lg-12 col-md-12 col-xs-12">
    <thead>
    <!-- <th>Date</th>--->
    <th>Name</th>
    <th>Status</th>
    <th>Qty</th>
    <th>Amount</th>
    <th>Action</th>
    </thead>
    <tbody>
    @foreach($materials as $data)
        <tr>
            <td>{{$data['name']}}</td>
            <td><a href="#" data-toggle="modal" data-target="#view{{$data['id']}}">{{$data['status']}}</a></td>
            <td>{{$data['available_qty']}}</td>
            <td>{{$data['total_due']}}</td>
            <td><a href="#" data-toggle="modal" data-target="#edit{{$data['id']}}"><span
                            class="glyphicon glyphicon-edit"></span></a> | <a href="#" data-toggle="modal"
                                                                              data-target="#delete{{$data['id']}}"><span
                            class="glyphicon glyphicon-remove"></span></a></td>
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
                            <button type="submit" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-ok"></span>OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-info" id="edit{{$data['id']}}" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                    data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> Edit Item</h4>
                        </div>
                        <div class="modal-body">
                            <form type="hidden" method="post" action="edit_item"
                                  id="form1"/>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                            <input type="hidden" name="id" value="{{$data['id']}}"/>
                            <div class="container col-lg-12">
                                <div class="form-group col-lg-6">
                                    <label for="">Name : </label>
                                    <input name="name" value="{{$data['name']}}" type="text" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Category : </label>
                                    <select name="category" id="" class="form-control">
                                        <option value="{{$data['category']}}">{{$data['category']}}</option>
                                        <option value="Appliance">Appliance
                                            <e
                                            /option>
                                        <option value="Shoes">Shoes</option>
                                        <option value="House">House</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Status : </label>
                                    <select name="status" id="" class="form-control">
                                        <option value="{{$data['status']}}">{{$data['status']}}</option>
                                        <option value="Rented">Rented</option>
                                        <option value="Available">Available</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Description : </label>
                                    <textarea name="description" type="text" value="{{$data['description']}}"
                                              class="form-control">{{$data['description']}}</textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Rented By : </label>
                                    <input type="text" name="rentBy" value="{{$data['RentBy']}}" class="form-control">
                                </div>


                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit " class="btn btn-success"><span
                                        class="glyphicon glyphicon-save"></span>Save
                            </button>


                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="modal fade modal-info" id="delete{{$data['id']}}" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                    data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> Delete Item</h4>
                        </div>
                        <div class="modal-body">
                            <form type="hidden" method="post" action="delete_item"
                                  id="form1"/>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                            <input type="hidden" name="id" value="{{$data['id']}}"/>
                            <div class="container col-lg-12">
                                <p><strong>Are You Sure you want to delete this item?</strong></p>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit " class="btn btn-danger"><span
                                        class="glyphicon glyphicon-remove"></span>Delete
                            </button>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

    @endforeach
    </tbody>
</table>
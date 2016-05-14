@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10  col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading "><h4>ADD ITEM</h4></div>
                    <div class="panel-body">
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/add') }} " enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul style="list-style-type: none">
                                            <li><label style="font-size: 20px;">Name of the item:</label></li>
                                            <li><input name = "name" type="text" placeholder="Input Name Here"
                                                       style="margin-left: 100px"/></li>
                                            <li><label style="font-size: 20px;">Category</label></li>
                                            <li><select name = "cat"
                                                       style="margin-left: 100px"/>
                                                <option value="Appliances">Appliances</option>
                                                <option value="Houses">Houses</option>
                                                <option value="Cars">Cars</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            </li>
                                            <li><label style="font-size: 20px;">Negotiable Price:</label></li>
                                            <li><input name = "price" type="text" placeholder="Input Price here"
                                                       style="margin-left: 100px"/></li>
                                            <li><label style="font-size: 20px;">Quantity  of the item:</label></li>
                                            <li><input name = "qty" type="text" placeholder="Input Quantity here"
                                                       style="margin-left: 100px"/></li>
                                            <li><label style="font-size: 20px">Description of the item:</label></li>
                                            <li><textarea name = "description" rows="4" cols="50" placeholder="Type Description here"
                                                          style="margin-left: 100px"></textarea></li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul style="list-style-type: none">
                                            <div class="form-group col-lg-10">
                                                <div class="secure">Upload Picture</div>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        {!! Form::file('image1') !!}
                                                        <p class="errors">{!!$errors->first('image')!!}</p>
                                                        @if(Session::has('error'))
                                                            <p class="errors">{!! Session::get('error') !!}</p>
                                                        @endif
                                                    </div>
                                                    <div id="success"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-10">
                                                <div class="secure">Upload Picture</div>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        {!! Form::file('image2') !!}
                                                        <p class="errors">{!!$errors->first('image')!!}</p>
                                                        @if(Session::has('error'))
                                                            <p class="errors">{!! Session::get('error') !!}</p>
                                                        @endif
                                                    </div>
                                                    <div id="success"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-10">
                                                <div class="secure">Upload Picture</div>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        {!! Form::file('image3') !!}
                                                        <p class="errors">{!!$errors->first('image')!!}</p>
                                                        @if(Session::has('error'))
                                                            <p class="errors">{!! Session::get('error') !!}</p>
                                                        @endif
                                                    </div>
                                                    <div id="success"></div>
                                                </div>
                                            </div>
                                        </ul>
                                        <button type="submit"
                                                style="margin-left: 290px; margin-top: 80px; height: 50px; width: 80px">
                                            POST
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
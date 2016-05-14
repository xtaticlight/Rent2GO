<div id="signIn" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Login</h2>
            </div>
            <div class="modal-body">
                <div class="container" style="padding-top: 0px;">
                    <div class="row">
                        <form role="form" method="POST"
                              action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-4 col-lg-3 col-sm-5">
                                {!! Form::text('email', null, ['class' => 'form-control', 'style' => 'margin-bottom: 6px', 'placeholder' => 'Email']) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                                <div class="col-xs-6" style="padding-left: 0px;">
                                    <div class="label" style="color: gray;">
                                        <label style="margin-bottom: 7px;">
                                            {!! Form::checkbox('remember', '1', null,  ['id' => 'keeplogged']) !!}
                                            Keep me logged in
                                        </label>
                                    </div>
                                    <input type="hidden" name="default_keeplogged" value="0">
                                </div>
                                <div class="col-xs-6" style="margin-top: 2px;">
                                    <a class="label" style="color: gray;"
                                       href="{{ url('/password/email') }}">Forgot your
                                        password?</a>
                                </div>
                                <br>
                                {!! Form::submit('Log Me Up', ['class' => 'form-control btn-info', 'style' => 'margin-top: 6px']) !!}
                            </div>
                        </form>
                        <div class="col-md-3 hidden-lg col-sm-4">
                            {!! Form::textarea('body', 'Not yet a member? Sign up for free! Earn Money with school stuff you don\'t use anymore.', ['class' => 'form-control', 'style' => 'height: 94px', 'readonly']) !!}
                            {!! Form::button('Signup', ['class' => 'form-control btn-info', 'style' => 'margin-top: 6px']) !!}
                        </div>
                        <div class="hidden-md col-lg-3 hidden-sm">
                                            <textarea readonly name="body" id="body" cols="50" rows="50"
                                                      class="form-control" style="height: 94px">Not yet a member?&#13;&#10;Sign up for free!&#13;&#10;Earn Money with school stuff you don't use anymore.</textarea>

                            <a class="btn btn-info" href="{{ url('/auth/register') }}" style="margin-top: 7px;"> Sign Me Up</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
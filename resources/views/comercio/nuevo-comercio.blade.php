@extends('layouts.app')

@section('title')
    <title>Alta Comercios </title>
@endsection

@section('content')
<div class="content">
    <h1>Registro Comercio</h1>

    <div class="panel panel-default col-md-8 col-md-offset-2">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('last') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Last Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="last" required>

                        @if ($errors->has('last'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Dni</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="dni" required>

                        @if ($errors->has('dni'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dni') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Adress</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="adress" required>

                        @if ($errors->has('adress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('adress') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Postal Code</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cp" required>

                        @if ($errors->has('cp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group"><label for="image" class="control-label col-md-4" style="display: inline-block;">Imagen</label><input type="file" id="image" name="image" style="display: inline-block; padding-left: 15px; vertical-align: -webkit-baseline-middle;" required></div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="text-center"><input type="checkbox" required><label for="">Acepto Terminos</label></div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
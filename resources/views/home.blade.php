@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome {{ auth()->user()->position->name }} {{ auth()->user()->full_name }}!
                    <br><br>
                    @if(auth()->user()->isHrHead)
                    @else
                    Click this <a href="#">link</a> to access Electronic Quality Management System.
                    @endif

                    @if(\Illuminate\Support\Facades\Hash::check(auth()->user()->username, auth()->user()->password))
                    <br><br><br>
                    <hr>
                    <form action="{{ route('change-password') }}" method="post">
                        {{ csrf_field() }} {{ method_field('put') }}
                        <div class="form-group text-center">
                            <label class="col-md-12 control-label">You haven't changed your password yet! Please consider doing it for your account's security.</label>
                        </div>
                        <br><br><br>
                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="old_password" required autofocus>

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="password" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="password_confirmation" required autofocus>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <button class="form-control">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

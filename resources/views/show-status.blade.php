@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Employee Status</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" id="status_form">
                            {{ csrf_field() }} {{ method_field('put') }}
                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Employee List</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="form-control user">
                                        <option value="" hidden>Click to select</option>
                                        @foreach($employees as $employee)
                                            @if($employee->id == auth()->user()->id) @continue @endif
                                            <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <br>
                            @if(! is_null($user))
                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">{{ $user->full_name }}</label>

                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ ! $user->status ? '' : 'selected' }}>Activate</option>
                                        <option value="0" {{ $user->status ? 'selected' : '' }}>De-Activate</option>
                                    </select>

                                    @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @else
                                    <span class="help-block">
                                        <strong>{{ $user->first_name }}'s account is currently {{ $user->status ? 'ACTIVE' : 'INACTIVE' }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <br>
                            <hr>
                            <br>

                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Confirm Action</label>

                                <div class="col-md-6">
                                    <button class="form-control" data-user-id="{{ $user->id }}">ACTIVATE/DEACTIVE EMPLOYEE</button>
                                </div>
                            </div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.user').on('change', function(e) {
            var select = $(e.currentTarget)
            window.location.href = "{{ url('/show-status') }}?employee_id=" + select.val()
        })

        $('button').on('click', function(e) {
            var button = $(e.currentTarget)
            var status_form = $('#status_form')

            status_form.attr('action', "{{ url('/change-status') }}/" + button.attr('data-user-id'))
            status_form.submit()
        })
    </script>
@stop

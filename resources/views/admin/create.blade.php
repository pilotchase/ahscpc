@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(session()->get('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @elseif(session()->get('warning'))
                    <div class="alert alert-warning">{{ session()->get('warning') }}</div>
                @elseif(session()->get('danger'))
                    <div class="alert alert-danger">{{ session()->get('danger') }}</div>
                @elseif(session()->get('info'))
                    <div class="alert alert-info">{{ session()->get('info') }}</div>
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">Create</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/create') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('sid') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Student ID (200XXXX)</label>

                                <div class="col-md-6">
                                    <input id="sid" type="text" class="form-control" name="sid" value="{{ old('sid') }}" required autofocus>

                                    @if ($errors->has('sid'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sid') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required>

                                    @if ($errors->has('fname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required>

                                    @if ($errors->has('lname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Membership
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

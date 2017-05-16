@extends('template')

@section('title', 'Change Password')

@section('content')
    <div class="row">
        <div class="col-md-12">
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
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('dashboard/password/' . Auth::user()->id) }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <label>New Password:</label>
                                <input type="password" name="password1" class="form-control" required>
                                <br/>
                                <label>Repeat Password</label>
                                <input type="password" name="password2" class="form-control" required>
                                <hr>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

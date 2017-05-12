@extends('template')

@section('title', 'Change Password')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @if(session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @elseif(session()->get('warning'))
                <div class="alert alert-warning">{{ session()->get('warning') }}</div>
            @elseif(session()->get('danger'))
                <div class="alert alert-danger">{{ session()->get('danger') }}</div>
            @elseif(session()->get('info'))
                <div class="alert alert-info">{{ session()->get('info') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ url('avatars/' . Auth::user()->avatar) }}" class="img-thumbnail img-responsive"><br/><br/>
                            <form action="{{ url('dashboard/edit/' . Auth::user()->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label>Change Avatar:</label>
                                <input type="file" name="avatar">
                                <br/>
                        </div>
                        <div class="col-md-6">
                            <textarea name="biography" class="form-control" placeholder="Biography" rows="6">{{ Auth::user()->biography }}</textarea><br/>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

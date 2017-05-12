@extends('template')

@section('title', 'Dashboard')

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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8" style="font-size: 16pt;">Member Management</div>
                            <form action="{{ url('admin/member') }}" method="post" class="form-inline">
                                {{ csrf_field() }}
                                <div class="col-md-4 text-right form-group">
                                    <input type="text" name="sid" class="form-control" style="width: 50%; margin-right: 5px;" placeholder="200XXXX">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

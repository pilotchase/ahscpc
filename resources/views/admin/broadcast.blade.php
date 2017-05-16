@extends('template')

@section('title', 'Email Broadcast')

@section('content')
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
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Email Broadcast</strong></h3>
        </div>
        <div class="panel-body">
            <form action="{{ url('admin/broadcast') }}" method="post">
                <div class="form-group">
                    <label>Recipient</label>
                    <select name="recipient" id="recipient" class="form-control">
                        <option value="">Select Recipient</option>
                        <option value="staff">All Staff</option>
                        <option value="all">All Members &amp; Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" id="message" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('template')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-8">
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
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <strong>Name:</strong> {{ Auth::user()->name }}<br/>
                        <strong>Email Address:</strong> {{ Auth::user()->email }}<br/>
                        <strong>Member Since:</strong>
                        @php
                            $member_since = explode(' ', Auth::user()->created_at);
                            $member_since = implode('-', $member_since);
                            $member_since = explode('-', $member_since);
                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                        @endphp
                        <br/>
                        @if(Auth::user()->role)
                            Role: <span class="label" style="padding: 5px; background: @if(Auth::user()->role == 'President') rebeccapurple @elseif(Auth::user()->role == 'Vice President') green @elseif(Auth::user()->role == 'Treasurer') #1c3f95 @elseif(Auth::user()->role == 'Secretary') red @endif">{{ Auth::user()->role }}</span><br/>
                        @endif
                        <br/><br/>
                        @if(Auth::user()->biography)
                            <div class="well">
                                {{ Auth::user()->biography }}
                            </div>
                        @endif
                    </div>
                        <img src="{{ url('avatars/' . Auth::user()->avatar) }}" class="img-thumbnail img-responsive pull-right" style="margin-right: 15px;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

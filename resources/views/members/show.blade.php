@extends('template')

@section('title', $user->name)

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>{{ $user->name }}</strong></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-8">
                    <strong>Member Since: </strong>
                    @php
                        $member_since = explode(' ', $user->created_at);
                        $member_since = implode('-', $member_since);
                        $member_since = explode('-', $member_since);
                        echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                    @endphp
                    <br>
                    @if($user->role)
                        <strong>Role:</strong> <span class="label" style="padding: 5px; background: @if($user->role == 'President') rebeccapurple @elseif($user->role == 'Advisor') black @elseif($user->role == 'Vice President') green @elseif($user->role == 'Treasurer') #1c3f95 @elseif($user->role == 'Secretary') red @endif">{{ $user->role }}</span><br/>
                    @endif
                    @if($user->biography)
                        <div class="well" style="margin-top: 20px;">
                            <p>{{ $user->biography }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-xs-4">
                    <img src="{{ url('avatars/' . $user->avatar) }}" class="img-circle img-responsive pull-right">
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check())
        @if(Auth::user()->isDirectorAdmin())
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
                                <div class="col-md-8" style="font-size: 16pt;">{{ $user->name }}</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#summarry" aria-controls="home" role="tab" data-toggle="tab">Summarry</a></li>
                                <li role="presentation"><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab">Roles</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                            </ul>
        
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="summarry">
                                    <br/>
                                    <img src="{{ url('avatars/' . $user->avatar) }}" class="img-thumbnail">
                                    <br/>
                                    {{ $user->name }}<br/>
                                    @if($user->role)
                                        {{ $user->role }}
                                    @else
                                        Member
                                    @endif
                                </div>
                                <div role="tabpanel" class="tab-pane" id="roles">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form action="{{ url('admin/member/' . $user->id . '/roles') }}" method="post" class="form-horizontal">
                                                {{ csrf_field() }}
                                                <select name="admin" class="form-control">
                                                    <option value="0" @if($user->admin == 0) selected="selected" @endif>No Admin</option>
                                                    <option value="1" @if($user->admin == 1) selected="selected" @endif>Club Admin</option>
                                                    <option value="2" @if($user->admin == 2) selected="selected" @endif>Director Admin</option>
                                                </select>
                                                <br/>
                                                <select name="role" class="form-control">
                                                    <option value="" @if(!$user->role) selected="selected" @endif>No Management Role</option>
                                                    <option value="Advisor" @if($user->role == 'Advisor') selected="selected" @endif>Advisor</option>
                                                    <option value="President" @if($user->role == 'President') selected="selected" @endif>President</option>
                                                    <option value="Vice President" @if($user->role == 'Vice President') selected="selected" @endif>Vice President</option>
                                                    <option value="Treasurer" @if($user->role == 'Treasurer') selected="selected" @endif>Treasurer</option>
                                                    <option value="Secretary" @if($user->role == 'Secretary') selected="selected" @endif>Secretary</option>
                                                </select>
                                                <br/>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">...</div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <br/>
                                    <button onclick="location.href='{{ url('admin/member/' . $user->id . '/passwordreset') }}';"  class="btn btn-primary">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
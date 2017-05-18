@extends('template')

@section('title', $user->name)

@section('content')
    @if(Auth::check() && !Auth::user()->isClubAdmin() || !Auth::check())
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
                            <strong>Role:</strong> <span class="label" style="padding: 5px; background: @if($user->role == 'President') rebeccapurple @elseif($user->role == 'Advisor') black @elseif($user->role == 'Vice President') green @elseif($user->role == 'Chief Financial Officer') #1c3f95 @elseif($user->role == 'Chief Compliance Officer') red @elseif($user->role == 'Webmaster') orange @endif">{{ $user->role }}</span><br/>
                        @else
                            <strong>Role:</strong> <span class="label label-warning" style="padding: 5px;">Member</span><br/>
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
    @endif
    @if(Auth::check())
        @if(Auth::user()->isClubAdmin())
            @if(session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @elseif(session()->get('warning'))
                <div class="alert alert-warning">{{ session()->get('warning') }}</div>
            @elseif(session()->get('danger'))
                <div class="alert alert-danger">{{ session()->get('danger') }}</div>
            @elseif(session()->get('info'))
                <div class="alert alert-info">{{ session()->get('info') }}</div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Demographics</strong></h3>
                        </div>
                        <table class="table table-condensed table-bordered table-responsive" id="roster">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background:#EEEEEE;">Name:</td>
                                    <td style="text-align: center;">{{ $user->name }}</td>
                                </tr>

                                <tr>
                                    <td style="text-align:center;background:#EEEEEE;">Role:</td>
                                    <td style="text-align: center;">@if($user->role){{ $user->role }}@else Member @endif</td>
                                </tr>
    
                                <tr>
                                    <td style="text-align:center;background:#EEEEEE;">Email Address:</td>
                                    <td style="text-align: center;">{{ $user->email }}</td>
                                </tr>
    
                                <tr>
                                    <td style="text-align:center;background:#EEEEEE;">Member Since:</td>
                                    <td style="text-align: center;">
                                        @php
                                            $member_since = explode(' ', $user->created_at);
                                            $member_since = implode('-', $member_since);
                                            $member_since = explode('-', $member_since);
                                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                                        @endphp
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center;background:#EEEEEE;">Last IP:</td>
                                    <td style="text-align: center;">{{ $user->ip }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-8" style="font-size: 16pt;">Administration</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#profile" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                                @if(Auth::user()->isDirectorAdmin())
                                    <li role="presentation"><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab">Roles</a></li>
                                @endif
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="profile">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{ url('members/' . $user->id . '/edit') }}" class="form-horizontal">
                                                <label>First Name:</label>
                                                <input type="text" name="fname" class="form-control" value="{{ $user->fname }}" required>
                                                <br/>
                                                <label>Last Name:</label>
                                                <input type="text" name="lname" class="form-control" value="{{ $user->lname }}" required>
                                                <br/>
                                                <label>Email Address:</label>
                                                <input type="text" name="email" class="form-control" value="{{ $user->email }}" readonly>
                                                <br/>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="roles">
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
                                                    <option value="Chief Financial Officer" @if($user->role == 'Chief Financial Officer') selected="selected" @endif>Chief Financial Officer</option>
                                                    <option value="Chief Compliance Officer" @if($user->role == 'Chief Compliance Officer') selected="selected" @endif>Chief Compliance Officer</option>
                                                    <option value="Webmaster" @if($user->role == 'Webmaster') selected="selected" @endif>Webmaster</option>
                                                </select>
                                                <br/>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">...</div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">
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
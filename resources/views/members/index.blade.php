@extends('template')

@section('title', 'Club Roster')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Club Roster</strong></h3>
        </div>
        <table class="table table-condensed" id="roster">
            <thead>
            <tr>
                <th width="20%" style="text-align:center;background:#EEEEEE;">Avatar</th>
                <th width="20%" style="text-align:center;background:#EEEEEE;">Name</th>
                <th width="20%" style="text-align:center;background:#EEEEEE;">Role</th>
                <th width="40%" style="text-align:center;background:#EEEEEE;">Member Since</th>
            </tr>
            </thead>
            <tbody>
            @foreach($advisors as $user)
                <tr>
                    <td style="text-align: center; vertical-align: middle"><img src="{{ url('avatars/' . $user->avatar) }}" width="30%" class="img-circle"></td>
                    <td style="text-align: center; vertical-align: middle"><a href="{{ url('members/' . $user->id) }}">{{ $user->name }}</a></td>
                    <td style="text-align: center; vertical-align: middle"><span style="background: black" class="label">{{ $user->role }}</span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @php
                            $member_since = explode(' ', $user->created_at);
                            $member_since = implode('-', $member_since);
                            $member_since = explode('-', $member_since);
                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                        @endphp
                    </td>
                </tr>
            @endforeach
            @foreach($presidents as $user)
                <tr>
                    <td style="text-align: center; vertical-align: middle"><img src="{{ url('avatars/' . $user->avatar) }}" width="30%" class="img-circle"></td>
                    <td style="text-align: center; vertical-align: middle"><a href="{{ url('members/' . $user->id) }}">{{ $user->name }}</a></td>
                    <td style="text-align: center; vertical-align: middle"><span style="background: rebeccapurple" class="label">{{ $user->role }}</span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @php
                            $member_since = explode(' ', $user->created_at);
                            $member_since = implode('-', $member_since);
                            $member_since = explode('-', $member_since);
                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                        @endphp
                    </td>
                </tr>
            @endforeach
            @foreach($vice_presidents as $user)
                <tr>
                    <td style="text-align: center; vertical-align: middle"><img src="{{ url('avatars/' . $user->avatar) }}" width="30%" class="img-circle"></td>
                    <td style="text-align: center; vertical-align: middle"><a href="{{ url('members/' . $user->id) }}">{{ $user->name }}</a></td>
                    <td style="text-align: center; vertical-align: middle"><span style="background: green" class="label">{{ $user->role }}</span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @php
                            $member_since = explode(' ', $user->created_at);
                            $member_since = implode('-', $member_since);
                            $member_since = explode('-', $member_since);
                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                        @endphp
                    </td>
                </tr>
            @endforeach
            @foreach($treasurers as $user)
                <tr>
                    <td style="text-align: center; vertical-align: middle"><img src="{{ url('avatars/' . $user->avatar) }}" width="30%" class="img-circle"></td>
                    <td style="text-align: center; vertical-align: middle"><a href="{{ url('members/' . $user->id) }}">{{ $user->name }}</a></td>
                    <td style="text-align: center; vertical-align: middle"><span style="background: #1c3f95" class="label">{{ $user->role }}</span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @php
                            $member_since = explode(' ', $user->created_at);
                            $member_since = implode('-', $member_since);
                            $member_since = explode('-', $member_since);
                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                        @endphp
                    </td>
                </tr>
            @endforeach
            @foreach($secretaries as $user)
                <tr>
                    <td style="text-align: center; vertical-align: middle"><img src="{{ url('avatars/' . $user->avatar) }}" width="30%" class="img-circle"></td>
                    <td style="text-align: center; vertical-align: middle"><a href="{{ url('members/' . $user->id) }}">{{ $user->name }}</a></td>
                    <td style="text-align: center; vertical-align: middle"><span style="background: red" class="label">{{ $user->role }}</span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @php
                            $member_since = explode(' ', $user->created_at);
                            $member_since = implode('-', $member_since);
                            $member_since = explode('-', $member_since);
                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                        @endphp
                    </td>
                </tr>
            @endforeach
            @foreach($members as $user)
                <tr>
                    <td style="text-align: center; vertical-align: middle"><img src="{{ url('avatars/' . $user->avatar) }}" width="30%" class="img-circle"></td>
                    <td style="text-align: center; vertical-align: middle"><a href="{{ url('members/' . $user->id) }}">{{ $user->name }}</a></td>
                    <td style="text-align: center; vertical-align: middle"><span class="label label-warning"> Member </span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @php
                            $member_since = explode(' ', $user->created_at);
                            $member_since = implode('-', $member_since);
                            $member_since = explode('-', $member_since);
                            echo $member_since[1] . '-' . $member_since[2] . '-' . $member_since[0];
                        @endphp
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
@endsection

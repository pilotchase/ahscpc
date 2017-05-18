@extends('template')

@section('title', 'Club Management')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Club Management</strong></h3>
        </div>
        <div class="panel-body">
            <img src="{{ url('img/hierarchy-render.png') }}" style="margin: auto" class="img-responsive">
            <div class="row">
                @foreach($adv as $user)
                    <div class="col-lg-4" style="margin-bottom: 20px;">
                        <center>
                            <img src="{{ asset('avatars/'.$user->avatar) }}" alt="Avatar" class="img-circle">
                            <h3 style="margin: 5px;"><strong>{{ $user->name }}</strong></h3>
                            <p><strong>{{ $user->role }}</strong></p>
                            <hr style="margin: 5px;">
                            <p>Responsible for advising AHSCPC Student Management and auditing compliance with AHS Club Policy.</p>
                            <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope"></i></a>
                        </center>
                    </div>
                @endforeach
                
                @foreach($pres as $user)
                    <div class="col-lg-4" style="margin-bottom: 20px;">
                        <center>
                            <img src="{{ asset('avatars/'.$user->avatar) }}" alt="Avatar" class="img-circle">
                            <h3 style="margin: 5px;"><strong>{{ $user->name }}</strong></h3>
                            <p><strong>{{ $user->role }}</strong></p>
                            <hr style="margin: 5px;">
                            <p>Responsible for all operations associated with AHSCPC, and oversees long-term goals and developments. Reports to the AHSCPC Advisor.</p>
                            <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope"></i></a>
                        </center>
                    </div>
                @endforeach
                    @foreach($vp as $user)
                        <div class="col-lg-4" style="margin-bottom: 20px;">
                            <center>
                                <img src="{{ asset('avatars/'.$user->avatar) }}" alt="Avatar" class="img-circle">
                                <h3 style="margin: 5px;"><strong>{{ $user->name }}</strong></h3>
                                <p><strong>{{ $user->role }}</strong></p>
                                <hr style="margin: 5px;">
                                <p>Responsible for member operations associated with AHSCPC, and oversees short-term goals and day-to-day developments. Reports to the AHSCPC President.</p>
                                <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope"></i></a>
                            </center>
                        </div>
                    @endforeach
                
            </div>
            <div class="row">
                    @foreach($cfo as $user)
                        <div class="col-lg-4" style="margin-bottom: 20px;">
                            <center>
                                <img src="{{ asset('avatars/'.$user->avatar) }}" alt="Avatar" class="img-circle">
                                <h3 style="margin: 5px;"><strong>{{ $user->name }}</strong></h3>
                                <p><strong>{{ $user->role }}</strong></p>
                                <hr style="margin: 5px;">
                                <p>Responsible for the management of club grants, and auditing expense reports. Reports to the AHSCPC Vice President.</p>
                                <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope"></i></a>
                            </center>
                        </div>
                    @endforeach
                

                    @foreach($cco as $user)
                        <div class="col-lg-4" style="margin-bottom: 20px;">
                            <center>
                                <img src="{{ asset('avatars/'.$user->avatar) }}" alt="Avatar" class="img-circle">
                                <h3 style="margin: 5px;"><strong>{{ $user->name }}</strong></h3>
                                <p><strong>{{ $user->role }}</strong></p>
                                <hr style="margin: 5px;">
                                <p>Responsible for tracking and reporting club minutes at all meetings. Reports to the AHSCPC Vice President.</p>
                                <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope"></i></a>
                            </center>
                        </div>
                    @endforeach
                        @foreach($wm as $user)
                            <div class="col-lg-4" style="margin-bottom: 20px;">
                                <center>
                                    <img src="{{ asset('avatars/'.$user->avatar) }}" alt="Avatar" class="img-circle">
                                    <h3 style="margin: 5px;"><strong>{{ $user->name }}</strong></h3>
                                    <p><strong>{{ $user->role }}</strong></p>
                                    <hr style="margin: 5px;">
                                    <p>Responsible for developing the club website, and maintaining the authenticity and security of all computer networks related to AHSCPC. Reports to the AHSCPC Vice President.</p>
                                    <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope"></i></a>
                                </center>
                            </div>
                        @endforeach
                
            </div>
        </div>
    </div>
@endsection
@extends('template')

@section('title', 'Club Management')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Club Management</strong></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                @foreach($advisors as $user)
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
                @if(!count($advisors))
                    <div class="col-lg-4" style="margin-bottom: 20px;">
                        <center>
                            <img src="{{ asset('avatars/avatar.jpg') }}" alt="Avatar" class="img-circle">
                            <h3 style="margin: 5px;"><strong>Vacant</strong></h3>
                            <p><strong>Advisor</strong></p>
                            <hr style="margin: 5px;">
                            <p>Responsible for advising AHSCPC Student Management and auditing compliance with AHS Club Policy.</p>
                        </center>
                    </div>
                @endif
                
                @foreach($presidents as $user)
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
                @if(!count($presidents))
                    <div class="col-lg-4" style="margin-bottom: 20px;">
                        <center>
                            <img src="{{ asset('avatars/avatar.jpg') }}" alt="Avatar" class="img-circle">
                            <h3 style="margin: 5px;"><strong>Vacant</strong></h3>
                            <p><strong>President</strong></p>
                            <hr style="margin: 5px;">
                            <p>Responsible for all operations associated with AHSCPC, and oversees long-term goals and developments. Reports to the AHSCPC Advisor.</p>
                        </center>
                    </div>
                @endif

                    @foreach($vice_presidents as $user)
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
                    @if(!count($vice_presidents))
                        <div class="col-lg-4" style="margin-bottom: 20px;">
                            <center>
                                <img src="{{ asset('avatars/avatar.jpg') }}" alt="Avatar" class="img-circle">
                                <h3 style="margin: 5px;"><strong>Vacant</strong></h3>
                                <p><strong>Vice President</strong></p>
                                <hr style="margin: 5px;">
                                <p>Responsible for member operations associated with AHSCPC, and oversees short-term goals and day-to-day developments. Reports to the AHSCPC President.</p>
                            </center>
                        </div>
                    @endif
            </div>
            <div class="row">
                    @foreach($treasurers as $user)
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
                    @if(!count($treasurers))
                        <div class="col-lg-4" style="margin-bottom: 20px;">
                            <center>
                                <img src="{{ asset('avatars/avatar.jpg') }}" alt="Avatar" class="img-circle">
                                <h3 style="margin: 5px;"><strong>Vacant</strong></h3>
                                <p><strong>Treasurer</strong></p>
                                <hr style="margin: 5px;">
                                <p>Responsible for the management of club grants, and auditing expense reports. Reports to the AHSCPC Vice President.</p>
                            </center>
                        </div>
                    @endif

                    @foreach($secretaries as $user)
                        <div class="col-lg-4" style="margin-bottom: 20px;">
                            <center>
                                <img src="{{ asset('avatars/'.$user->avatar) }}" alt="Avatar" class="img-circle">
                                <h3 style="margin: 5px;"><strong>{{ $user->name }}</strong></h3>
                                <p><strong>{{ $user->role }}</strong></p>
                                <hr style="margin: 5px;">
                                <p>Responsible for tracking and reporting club minutes at all meetings. Reports to the Vice President.</p>
                                <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope"></i></a>
                            </center>
                        </div>
                    @endforeach
                    @if(!count($secretaries))
                        <div class="col-lg-4" style="margin-bottom: 20px;">
                            <center>
                                <img src="{{ asset('avatars/avatar.jpg') }}" alt="Avatar" class="img-circle">
                                <h3 style="margin: 5px;"><strong>Vacant</strong></h3>
                                <p><strong>Secretary</strong></p>
                                <hr style="margin: 5px;">
                                <p>Responsible for tracking and reporting club minutes at all meetings. Reports to the Vice President.</p>
                            </center>
                        </div>
                    @endif
            </div>
        </div>
        </div>
    </div>
@endsection
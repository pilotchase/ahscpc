<!doctype html>
<html lang="us">
<head>
    <meta charset="utf-8">
    <title>AHS Computer Programing Club - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/2d6fb1cf74.js"></script>
    <link rel="icon" href="images/favicon.ico">
</head>
<body>

<!-- JS Scripts for Boostrap Plugins -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ url('css/style.css') }}">

<!-- navbar -->
<img src="{{ url('img/ahscpc-logo.png') }}" width="20%" class="img-responsive">
<nav class="navbar navbar-default" style="margin-top: 20px;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle flag-text" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-target="navbar-collapse">Information<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('about') }}">About</a></li>
                        <li><a href="{{ url('management') }}">Club Management</a></li>
                        <li><a href="{{ url('members') }}">Club Roster</a></li>
                    </ul>
                </li>
                <li><a href="https://talk.ahscpc.org" target="_blank">Discussions</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle flag-text" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-target="navbar-collapse">My Profile<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('dashboard') }}">View</a></li>
                            <li><a href="{{ url('dashboard/edit') }}">Edit</a></li>
                            <li><a href="{{ url('dashboard/password') }}">Change Password</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->isClubAdmin())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle flag-text" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-target="navbar-collapse">Admin<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->isDirectorAdmin())
                                    <li><a href="{{ url('admin/create') }}">Create Membership</a></li>
                                    <div class="divider"></div>
                                    <li><a href="{{ url('admin/broadcast') }}">Broadcast</a></li>
                                @endif
                            </ul>
                        </li>   
                    @endif
                    <li><a href="{{ url('logout') }}">Logout</a></li>
                @elseif(!Auth::check())
                    <li><a href="{{ url('login') }}">Login</a></li>
                    <li><a href="{{ url('join') }}"><span class="label label-primary">Signup</span></a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="row">
    <div class="col-md-9">
        @yield('content')
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Upcoming Events</strong></h3>
            </div>
            <table class="table table-condensed table-bordered" id="roster">
                <thead>
                <tr>
                    <th width="20%" style="text-align:center;background:#EEEEEE;">Date</th>
                    <th width="20%" style="text-align:center;background:#EEEEEE;">Name</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="text-align: center; vertical-align: middle;">08/21/2017</td>
                    <td style="text-align: center; vertical-align: middle;">Website Launch</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br><br>
<div class="panel panel-default">
    <div class="panel-body">
        The mission of Acalanes High School is to develop responsible, productive, informed citizens who appreciate and respect their own and others' uniqueness and worth. &copy; {{ date('Y') }} <a href="https://chaseamorgan.com" target="_blank">Chase Morgan</a>. Some Rights Reserved.
    </div>
</div>

</body>
</html>

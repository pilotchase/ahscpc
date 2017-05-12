@extends('template')

@section('content')
    <img src="{{ url('img/banner1.png') }}" width="100%"><br><br>
    
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
                <div class="panel-heading">
                   President's Message 
                </div>
                <div class="panel-body">
                   <!-- <p>Howdy,
                    
                    <br/><br/>
                    
                        For those of you who don't know me, I'm Chase, your club president. I am extremely optimistic about the possibilities for our club this year, and look forward to seeing familiar faces, and seeing some new ones as well.
                        Since AHSCPC's inception, we have prided ourselves on being an inclusive community.
                        
                        <br/><br/>
                        
                        I plan to drive the club in a new direction during the 2017 - 2018 school year. A few ideas I have are as follows:
                        
                        <ul>
                            <li>Annual Club Project</li>
                            <li>Coding Quests... Essentially, the club will decide on a challenge, maybe monthly, and people can work in groups to complete and submit the challenge. Club management will vote on the best project and the winning team will receive a prize. </li>
                        </ul>
                        
                        <br/><br/>
                        --
                        <br/>
                        Chase Morgan
                        <br/>
                        President-->
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if(!Auth::check())
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Login
                    </div>
                    <div class="panel-body">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <form action="{{ url('login') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <label>Email Address</label>
                            <input name="email" type="email" class="form-control" placeholder="@auhsdschools.org" required>
    
                            <br/>
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="xxxxxx" required>
                            
                            <div class="divider"></div>
                            
                            <br/>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
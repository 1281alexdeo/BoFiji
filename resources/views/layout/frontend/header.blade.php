<nav class="navbar nav navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Bank of Fiji</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cc-visa" aria-hidden="true"></i> Payments<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.profile',['id' => Session::has('id') ? Session::get('id') : null]) }}"><i class="fa fa-history pull-right" aria-hidden="true"></i>History</a></li>
                            <li><a href="{{ route('pay.now') }}"><i class="fa fa-credit-card pull-right" aria-hidden="true"></i>Send</a></li>
                            <li><a href="{{ route('schedule.pay') }}"><i class="fa fa-calendar pull-right" aria-hidden="true"></i>Schedule</a></li>
                        </ul>
                    </li>
                @endif

                <li class="dropdown">
                    @if(Auth::check())
                        @if($user)
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                                {{ $user->first_name }}  {{ $user->last_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                        @endif
                     @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-universal-access" aria-hidden="true"></i> Customer Portal <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                     @endif

                        @if(Auth::check())
                            <li><a href="{{ route('user.profile',['id' => Session::has('id') ? Session::get('id') : null]) }}"><i class="fa fa-user pull-right" aria-hidden="true"></i> Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('user.signout') }}"><i class="fa fa-power-off pull-right" aria-hidden="true"></i> Sign out</a></li>
                        @else
                            <li><a href="{{ route('user.register') }}"><i class="fa fa-user-plus pull-right" aria-hidden="true"></i> Register</a></li>
                            <li><a href="{{ route('user.signin') }}"><i class="fa fa-sign-in pull-right" aria-hidden="true"></i> Sign in</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
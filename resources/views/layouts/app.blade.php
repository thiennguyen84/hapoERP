<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hapo ERP</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/gg.css') }}"/>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" id="logo">
                    <img src="{{ asset('img/hapoERP.png') }}">
                </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#" class="glyphicon glyphicon-home"></a></li>
            <li>
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">Statistics
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Attendsion</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">OverTime</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Report</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Vacation FullTime</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Vacation PartTime</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{  route('employs.index') }}">Employee</a></li>
                </ul>
            </li>
            
            <li><a href="#">Attendsion</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vacation
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('vacationfulltime.create') }}">FullTime</a></li>
                    <li><a href="{{ route('vacationparttime.create') }}">PartTime</a></li>
                </ul>
            </li>
            <li><a href="#">OverTime</a></li>
            <li><a href="#">Report</a></li>
        </ul>
        <div class="sidebar-wrapper nav navbar-nav navbar-right">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
            <li class="photo text-center">
                <img width="40px" style="border-radius: 50%" src="{{ asset('img/'.Auth::user()->avatar) }}"/>
            </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('profile.index') }}">My Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest 
        </div>
    </nav>
    <div class="main-panel">
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid navbar-fixed-bottom">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Overtime
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Report
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="/">Hapo ERP</a>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
<!-- Scripts -->
    <script src="{{ asset('/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-notify.js') }}"></script>
    @yield('script')
<script type="text/javascript">
    $(document).ready(function () {
         @if(Session::has('success'))
            $.notify(
            {
                icon: "notifications",
                message: '{{ Session('success') }}',
            }, {
                type: 'success',
                timer: 1000,
                placement: {
                    from: 'bottom',
                    align: 'right'
                }
            });
        @endif
    });
</script>
</html>
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
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('attendsion.statistic') }}">Attendsion</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('overtime.statistic') }}">OverTime</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('report.index') }}">Report</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
                </ul>
            </li>
            
            <li><a href="{{ route('attendsion.index') }}">Attendsion</a></li>
            <li><a href="{{ route('overtime.index') }}">OverTime</a></li>
            <li><a href="{{ route('report.index') }}">Report</a></li>
        </ul>
        <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
          </div>
        </form>
        <div class="sidebar-wrapper nav navbar-nav navbar-right">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <div class="photo text-center">
                        <img width="50" style="border-radius: 100px;" src="{{ asset('img/'.Auth::user()->avatar) }}"/>
                    </div>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="/profile">My Profile</a>
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

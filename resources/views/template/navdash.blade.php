
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport" />
    <title>Dashboard</title>

    <!-- General CSS Files -->
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous" />

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('navdash/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('navdash/css/components.css')}}" />
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a
                            href="#"
                            data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img
                                alt="image"
                                src="{{asset('navdash/images/user.png')}}"
                                class="rounded-circle mr-1" />
                            <div class="d-sm-none d-lg-inline-block">{{Auth::User()->name}}</div>
                        </a>
                        <a href="{{ route('logout')}}" class="dropdown-menu dropdown-menu-right">
                            <p
                                class="dropdown-item has-icon text-danger">
                                <span class="fas fa-sign-out-alt"></span> Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Pengelola Surat</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">Pt</a>
        </div>
                    <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fire"></i> <span>Dashboard</span>
        </a>
    </li>
        <li
        class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="far fa-user"></i> <span>Data User</span>
        </a>
        <ul class="dropdown-menu">
            <li class="">
                <a class="nav-link" href="{{route('staff.home')}}">
                    Data Staff TU
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="{{route('guru.home')}}">
                    Data Guru
                </a>
            </li>
        </ul>
    </li>
        <li
        class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="far fa-file-alt"></i> <span>Data Surat</span>
        </a>
        <ul class="dropdown-menu">
            <li class="">
                <a class="nav-link" href="{{route('klasifikasi')}}">
                    Data Klarifikasi Surat
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="{{ route('datasurat') }}">
                    Data Surat
                </a>
            </li>
        </ul>
    </li>

</ul>
                </aside>
</div>

            <!-- Main Content -->
       @yield('dashboard')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{asset('navdash/js/stisla.js')}}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{asset('navdash/js/scripts.js')}}"></script>
    <script src="{{asset('navdash/js/custom.js')}}"></script>

    <script>
        function check(e,value)
        {
            //Check Charater
            var unicode=e.charCode? e.charCode : e.keyCode;
            if (value.indexOf(".") != -1)if( unicode == 46 )return false;
            if (unicode!=8)if((unicode<48||unicode>57)&&unicode!=46)return false;
        }
        function checkLength(e)
        {
            var fieldLength = document.getElementById(e.target.id).value.length;
            //Suppose u want 4 number of character
            if(fieldLength <= 16){
                return true;
            }
            else
            {
                var str = document.getElementById(e.target.id).value;
                str = str.substring(0, str.length - 1);
                document.getElementById(e.target.id).value = str;
            }
        }
    </script>
    <!-- Page Specific JS File -->
</body>

</html>

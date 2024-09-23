<nav class="navbar navbar-expand-lg navbar-color">
    <div class="container p-3">
        <span><img src="assets/img/mubas-logo.png" class="w-25 h-25 rounded-circle"></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="nav-link "
                       aria-current="page" href="{{route('user.dashboard')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "
                       href="{{route('profile.edit')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        {{Auth::User()->name}}
                    </a>
                </li>
                <!--                <li class="nav-item">-->
                <!--                    <span id="current-time" class="navbar-text font-weight-bold mr-2"></span>-->
                <!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link "
                       href="#">

                        <!--                        <i class="fa fa-bell-o" aria-hidden="true"></i>-->
                        <i class="fa-regular fa-bell"></i>

                    </a>
                </li>
                <li class="nav-item">

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
{{--                        <span class="font-weight-bold">--}}
{{--                                <i class="fa fa-power-off text-white" aria-hidden="true"></i>--}}
{{--                            </span>--}}
                                                <button type="submit" class="block text-white font-bold hover:bg-blue-700 px-3 py-2 rounded"><i class="fa fa-power-off"></i></button>
                    </form>
                    {{--                    <a href="{{route('logout')}}" class="nav-link">--}}
                    {{--                            <span class="font-weight-bold">--}}
                    {{--                                <i class="fa fa-power-off text-white" aria-hidden="true"></i>--}}
                    {{--                            </span>--}}
                    {{--                    </a>--}}
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link.active {
        color: #dc3545 !important;
        /* Bootstrap danger color */
        font-weight: bold;
    }

    .navbar-color {
        background-color: #074173;
    }

    .nav-item:hover .nav-link {
        color: navajowhite;
    }

    .navbar-text {
        color: yellow;
        margin-left: 20px;
    }
</style>

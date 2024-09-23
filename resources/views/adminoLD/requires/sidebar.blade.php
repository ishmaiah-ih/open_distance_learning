
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <h4 class="text-white opacity-25">E-LEARNING</h4>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                {{--                    <div class="badge badge-info badge-pill">2</div>--}}
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <h4 class="text-white opacity-25">Pages</h4>
            <span></span>
        </li>

        <li class="nav-item mb-3">
            <a class="nav-link" href="#">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Courses</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Resources</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link" href="{{route('students')}}">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Students</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Submissions</span>
            </a>
        </li>


        <li class="nav-item mt-4 text-center">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf

{{--                <button type="submit"--}}
{{--                        class="block text-danger font-bold hover:bg-blue-700 px-3 py-2 rounded w-full">--}}
{{--                    Logout--}}
{{--                </button>--}}

                <button type="submit" class="btn bg-danger btn-sm menu-title">Logout</button>

                {{--                                <i class="mdi mdi-logout text-primary"></i>--}}
                {{--                                Logout--}}
            </form>
{{--            <a class="nav-link" href="https://www.bootstrapdash.com/product/spica-admin/">--}}
{{--                <button type="submit" class="btn bg-danger btn-sm menu-title">Logout</button>--}}
{{--            </a>--}}
        </li>
    </ul>
</nav>

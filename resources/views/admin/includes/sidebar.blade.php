<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.index') }}">
            <h4>E-HUB</h4>
        </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
{{--                <a class="nav-link {{ request()->routeIs('admin.index') ? 'active text-white bg-gradient-primary' : '' }}" href="{{ route('admin.index') }}">--}}
                <a class="nav-link"  href="{{ route('admin.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-home text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route('students_all')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-list text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Students</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link " href="{{route('resources.all')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-list text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Resources</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('courses.index')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-list text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Courses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('student.courses')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-list text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Courses-Student</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manage</h6>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="{{ route('admin.assignments.view') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-concierge-bell text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Assignments</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-hashtag text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Social Media</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('profile.edit') ? 'active text-white bg-gradient-primary' : '' }}" href="{{route('profile.edit')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-edit text-lg "></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn bg-primary mt-5 w-70 text-white">
                Logout
            </button>
        </form>
    </div>

</aside>

<nav class="navbar navbar-expand-lg navbar-color">
    <div class="container p-3">
        <span class="d-block mx-auto mx-lg-0">
            <img src="assets/img/mubas-logo.png" class="w-25 h-25 rounded-circle">
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center justify-content-lg-end" id="navbarNav">
            <ul class="navbar-nav text-center text-lg-end">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('user.dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">{{ Auth::User()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-white font-bold px-3 py-2">
                            <i class="fa fa-power-off"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<style>
    .navbar-color {
        background-color: #074173;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    .nav-link.active {
        color: #dc3545 !important;
        font-weight: bold;
    }

    .nav-item:hover .nav-link {
        color: navajowhite !important;
    }
</style>

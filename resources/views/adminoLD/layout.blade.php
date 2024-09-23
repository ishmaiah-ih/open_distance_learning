
@include('admin.requires.header')

<!-- partial:./partials/_sidebar.html -->
@include('admin.requires.sidebar')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:./partials/_navbar.html -->
    @include('admin.requires.navbar')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            @yield('content')

            <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->


        @include('admin.requires.footer')


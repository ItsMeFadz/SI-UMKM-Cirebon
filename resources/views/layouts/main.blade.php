@include('layouts.head')

<body>
    <!-- loader starts-->
    @include('layouts.partials.loader')
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start   -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('layouts.partials.navbar')
        <!-- Page Header Ends                              -->
        <!-- Page body Start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('layouts.partials.sidebar')
            <!-- Page Sidebar Ends-->
            @include('component.SweetAlert')
            <div class="page-body">
                <!-- Container-fluid starts-->
                @yield('content')
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            @include('layouts.partials.footer')
        </div>
    </div>
    @include('layouts.script')
</body>

</html>

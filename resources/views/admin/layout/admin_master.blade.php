<!DOCTYPE html>
<html>
<head>
    @include('admin.layout.admin_head')
</head>
<body>
<header class="header">
    @include('admin.layout.admin_header')
</header>
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.layout.admin_sidebar')

    <!-- Admin Dashboard -->

    <div class="page-content">
        <!-- Page Header-->
        <div class="bg-dash-dark-2 py-4">
            <div class="container-fluid">
                <h2 class="h5 mb-0">Dashboard</h2>
            </div>
        </div>
        <section>
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
            <div class="container-fluid text-center">
                <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                <p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a href="https://bootstrapious.com">Bootstrapious</a>.
                </p>
            </div>
        </footer>
    </div>
</div>
<!-- Toaster Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}", 'Success', {timeOut: 3000});

    @endif

    @if(Session::has('error'))
    toastr.error('{{Session::get('error')}}', 'Error', {timeOut: 3000});
    @endif
</script>
<!-- JavaScript files-->
@include('admin.layout.admin_scripts')
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.7.1/css/all.css')}}"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>
</html>

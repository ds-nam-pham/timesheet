<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        
        <!-- Custom styles for this template-->
        <link href="{{ asset('bootstrap5/css/bootstrap.css') }}" rel="stylesheet">
        <script src="{{ asset('bootstrap5/js/bootstrap.js') }}" crossorigin="anonymous"></script>
        <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <!-- fullcalendar-->
        <link rel="stylesheet" href="{{ asset('fullcalendar/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('fullcalendar/fullcalendar.3.9.0.css') }}" />
        {{-- <link rel="stylesheet" href="{{ asset('fullcalendar/fullcalendar.css') }}" /> --}}
        @yield('css')
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <script src="{{ asset('fullcalendar/jquery.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('fullcalendar/moment.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('validate/validate.min.js') }}" crossorigin="anonymous"></script>
    
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.nav_left')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        @include('layouts.content')
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    @yield('javascript')
</body>

</html>
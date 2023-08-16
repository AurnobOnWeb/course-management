<!doctype html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @foreach ($settings as $setting)
    @if($setting->fav == !null)
    <link rel="icon" href="{{ asset('backend/assets') }}/images/{{ $setting->fav }}" type="image/x-icon">
    @else
    <img src=" {{ asset('backend/assets') }}/images/add.png" alt="" class="user-avatar-md rounded-circle">
    @endif
    @endforeach
    
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
         <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap-select/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <!-- not working logout dropdown <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href=" {{ asset('backend/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('backend/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendor/vector-map/jqvmap.css') }}">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css') }}">
    <link rel="stylesheet" href=" {{ asset('backend/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/datatables/css/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/datatables/css/select.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">
   
    <title>@yield('title')</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        @include('admin.layouts.navbar')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include('admin.layouts.aside')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper fixed">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                @yield('content')


            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <div class="footer ">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            @foreach ($settings as $setting)
                             {{ $setting->footer }}   Dashboard by <a href="">Abir Hossen Aurnob</a>.
                        @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->

    </div>


    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 js-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src=" {{ asset('backend/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstrap bundle js-->
    <script src=" {{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js-->
    <script src=" {{ asset('backend/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- chartjs js-->
    <script src=" {{ asset('backend/assets/vendor/charts/charts-bundle/Chart.bundle.js') }}"></script>
    <script src=" {{ asset('backend/assets/vendor/charts/charts-bundle/chartjs.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend/assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend/assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/datatables/js/data-table.js') }}"></script>
    <!-- main js-->
    <script src=" {{ asset('backend/assets/libs/js/main-js.js') }}"></script>
    <!-- jvactormap js-->
    <script src=" {{ asset('backend/assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src=" {{ asset('backend/assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- sparkline js-->
    <script src=" {{ asset('backend/assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <script src=" {{ asset('backend/assets/vendor/charts/sparkline/spark-js.js') }}"></script>
    <!-- dashboard sales js-->
    <script src=" {{ asset('backend/assets/libs/js/dashboard-sales.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
    <script src="{{ asset('backend/assets/vendor/bootstrap-select/js/bootstrap-select.js') }}"></script>
</body>
</html>

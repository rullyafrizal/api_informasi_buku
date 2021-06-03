<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.partials.head')
    @stack('head')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include('admin.partials.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('admin.partials.navbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('admin.partials.script')
@stack('scripts')

</body>

</html>

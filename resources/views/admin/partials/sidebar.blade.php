
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('books') }}">
        <div class="sidebar-brand-text mx-3 my-3">Books Information System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('books') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Books</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('authors') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Authors</span></a>
    </li>

{{--    <!-- Nav Item - Tables -->--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="tables.html">--}}
{{--            <i class="fas fa-fw fa-table"></i>--}}
{{--            <span>Tables</span></a>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->


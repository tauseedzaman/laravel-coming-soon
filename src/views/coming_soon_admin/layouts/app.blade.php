<!DOCTYPE html>
<!-- Breadcrumb-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') {{ config('app.name') }} Coming Soon Settings</title>
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('admin/css/vendors/simplebar.css') }}">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <h3>{{ config('app.name') }} </h3>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
            <li class="nav-group"><a class="nav-link" href="{{ '#' }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-task') }}"></use>
                    </svg>Manage Coming Soons</a>
            </li>
            <li class="nav-group"><a class="nav-link" href="{{ '#' }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-task') }}"></use>
                    </svg>Subscribers</a>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="mb-4 header header-sticky">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-menu') }}">
                        </use>
                    </svg>
                </button><a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="{{ config('app.name') }} Logo">
                        <use xlink:href="{{ asset('admin/assets/brand/coreui.svg#full') }}">
                        </use>
                    </svg>
                </a>
                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item"><a class="nav-link" href="#">{{ config('app.name') }} Coming Soon Pages
                            Settings</a></li>
                </ul>
            </div>
        </header>
        @yield('content')
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="{{ asset('admin/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all elements with the "delete-user" class
            const deleteButtons = document.querySelectorAll('.delete-user');

            // Add a click event listener to each delete button
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default link behavior

                    // Show a SweetAlert confirmation
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If the user confirms, redirect to the delete route
                            window.location.href = button.getAttribute('href');
                        }
                    });
                });
            });
        });
    </script>
    @if (session()->has('success'))
        <script>
            Swal.fire(
                "{{ session('success') }}",
                '',
                'success'
            )
        </script>
    @elseif (session()->has('error'))
        <script>
            Swal.fire(
                "{{ session('error') }}",
                '',
                'error'
            )
        </script>
    @endif

</body>

</html>

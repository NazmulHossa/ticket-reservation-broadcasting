<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Laravel CSRF Token Meta Tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Your custom CSS will be added here -->
    @yield('css')
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left Side Vertical Navigation -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse vh-100" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white px-3">
                        <i class="fas fa-cube fa-2x me-2"></i>
                        <span class="fs-4">Admin Panel</span>
                    </div>

                    <hr class="text-white">

                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin-dashboard') }}" class="nav-link text-white">
                                <i class="fas fa-home me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.list') }}" class="nav-link text-white">
                                <i class="fas fa-box me-2"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.list') }}" class="nav-link text-white">
                                <i class="fas fa-tags me-2"></i>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-users me-2"></i>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-chart-bar me-2"></i>
                                Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-cog me-2"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 h-100 d-flex flex-column">
                <!-- Top Horizontal Menu & Notification Section -->
                <header class="navbar navbar-expand-md navbar-light bg-white border-bottom py-3">
                    <div class="container-fluid">
                        <!-- Mobile Toggle Button for Sidebar -->
                        <button class="navbar-toggler d-md-none me-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Page Title -->
                        <div class="navbar-nav">
                            <span class="navbar-brand mb-0 h1">@yield('page-title', 'Dashboard')</span>
                        </div>

                        <!-- Right Notification Area -->
                        <div class="navbar-nav ms-auto">
                            <!-- Notification Dropdown -->
                            <div class="nav-item dropdown me-3">
                                <a class="nav-link position-relative" href="#" id="notificationDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-bell"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        3
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                                    <li>
                                        <h6 class="dropdown-header">Notifications</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="fas fa-user-check text-success me-2"></i>New user registered</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="fas fa-shopping-cart text-primary me-2"></i>New order
                                            received</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-center" href="#">View all</a></li>
                                </ul>
                            </div>

                            <!-- User Dropdown -->
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff"
                                        alt="" width="32" height="32" class="rounded-circle me-2">
                                    Admin User
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="#"><i
                                                class="fas fa-user me-2"></i>Profile</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="fas fa-cog me-2"></i>Settings</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <button type="submit" class="dropdown-item"><i
                                                class="fas fa-sign-out-alt me-2"></i>Logout</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Main Dynamic Content Section -->
                <div class="container-fluid py-4 flex-grow-1 overflow-auto">
                    <!-- Session Messages Component -->
                    @include('backend.components.session-messages')

                    <!-- Page Content -->
                    @yield('content')
                </div>

                <!-- Footer Section -->
                <footer class="footer mt-auto py-3 bg-light border-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start">
                                <span class="text-muted">&copy; {{ date('Y') }} Admin Dashboard. All rights
                                    reserved.</span>
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <a href="#" class="text-muted me-3">Privacy Policy</a>
                                <a href="#" class="text-muted">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Your custom JS will be added here -->
    @yield('js')


    <!-- Basic sidebar functionality -->
    <script>
       let csrfToken=document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        document.addEventListener('DOMContentLoaded', function() {
            // Close sidebar on mobile when clicking a link
            const mobileScreen = window.matchMedia("(max-width: 768px)");
            const sidebar = document.getElementById('sidebarMenu');
            const sidebarLinks = document.querySelectorAll('#sidebarMenu .nav-link');

            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (mobileScreen.matches && sidebar.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(sidebar);
                        bsCollapse.hide();
                    }
                });
            });
        });
    </script>
  <script>
function sweetAlert2(categoryId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("{{ url('/admin/category/') }}/" + categoryId, {
               method: 'DELETE',
               headers: {
                  'X-CSRF-TOKEN': csrfToken,
                  'Accept': 'application/json',
                  'Content-Type': 'application/json'
               }
            })
            document.getElementById('category_id_'+categoryId).style.display='none'
            .then(() => {
                Swal.fire({
                    title: categoryId + " Deleted!",
                    text: "Your category has been deleted.",
                    icon: "success"
                });
            });
        }
    });
}
</script>






</body>

</html>

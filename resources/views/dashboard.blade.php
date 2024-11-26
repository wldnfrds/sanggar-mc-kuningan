<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sb-admin-2@4.0.3/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('wil/css/style.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            font-weight: bold;
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #4e73df;
            padding-top: 20px;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar-collapsed {
            left: -250px;
        }

        .sidebar-heading {
            font-size: 1.5rem;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 1rem;
        }

        .sidebar .nav-link {
            color: white;
            font-size: 1.1rem;
            padding: 12px 20px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #2e59d9;
            border-radius: 5px;
            padding-left: 25px;
        }

        .sidebar .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .content-expanded {
            margin-left: 0;
        }

        /* Navbar Styling */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }

        .navbar-toggler {
            padding: 0.5rem;
        }

        .navbar-brand {
            font-weight: 600;
            color: #4e73df;
        }

        /* Toggle Button */
        #sidebarToggle {
            background: none;
            border: none;
            color: #4e73df;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            display: none;
        }

        /* Welcome Section */
        .welcome-header {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .welcome-header h1 {
            color: #4e73df;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
            }
        }

        @media (max-width: 768px) {
            #sidebarToggle {
                display: block;
            }

            .sidebar {
                left: -250px;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.active {
                left: 0;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            .welcome-header {
                padding: 1.5rem;
            }

            .welcome-header h1 {
                font-size: 1.5rem;
            }

            .navbar {
                padding: 0.5rem;
            }
        }
    </style>
</head>

<body id="page-top">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-heading">
            <a href="/dashboard" class="nav-link">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/kontak">
                    <i class="fa-solid fa-address-book"></i> Kontak
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('galeri.index') }}">
                    <i class="fas fa-image"></i> Galeri
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.show') }}">
                    <i class="fa-solid fa-newspaper"></i> Artikel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mc.index') }}">
                    <i class="fas fa-user-circle me-2"></i> Profile MC
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.index') }}">
                    <i class="fas fa-user-circle me-2"></i> Berita
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button id="sidebarToggle" class="me-2">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">My Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (Auth::user()->role === 'admin')
                                    <img src="{{ asset('avatar/avatar.png') }}" alt="Avatar Admin"
                                        class="rounded-circle" width="40" height="40">
                                @else
                                    <img src="{{ asset('wil/n3yJn1ur6Co1ki7RBeIH6Tu9SsB2qMjIcf85GL80.webp') }}"
                                        alt="Avatar User" class="rounded-circle" width="40" height="40">
                                @endif
                                <span>{{ Auth::user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.settings') }}">
                                        <i class="fas fa-user-circle me-2"></i> Profile Settings
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Content -->
        <div class="container-fluid">
            <div class="welcome-header">
                <h1>Welcome {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>


    {{-- footer --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');

            // Toggle sidebar
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickInsideToggle = sidebarToggle.contains(event.target);

                if (!isClickInsideSidebar && !isClickInsideToggle && window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>

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
    <link rel="shortcut icon" href="{{ asset('assets/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('wil/css/style.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #f8f9fc;
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
            margin-bottom: 2rem;
        }

        /* Form Styling */
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-container h1 {
            color: #4e73df;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .form-control {
            border-radius: 5px;
            padding: 0.75rem;
            border: 1px solid #e3e6f0;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
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

        /* Alert Styling */
        .alert {
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1.5rem;
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

            .form-container {
                padding: 1.5rem;
            }

            .form-container h1 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 1rem;
            }

            .form-container h1 {
                font-size: 1.5rem;
            }

            .navbar {
                padding: 0.5rem;
            }

            .btn-primary {
                width: 100%;
            }

        }

        .break-on-number {
            display: block;
            word-break: break-word;
            white-space: pre-line;
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
                                <img src="{{ asset('avatar/avatar.png') }}" alt="Avatar" class="rounded-circle"
                                    width="40" height="40">
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




        <!-- Dashboard Content -->
        <div class="container">
            <div class="form-container">
                <h1>Daftar Artikel</h1>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show p-2 small" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('articles.create') }}"
                    class="btn btn-primary btn-sm mb-3 d-inline-flex align-items-center gap-2 justify-content-center"
                    style="border-radius: 6px; font-size: 0.85rem; padding: 0.4rem 0.8rem; transition: all 0.2s ease;">
                    <i class="fas fa-plus" style="font-size: 0.8rem;"></i>
                    <span>Tambah Artikel</span>
                </a>
                <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                    <table class="table table-striped table-hover table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Deskripsi</th>
                                <th>Ringkasan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $art)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <!-- Judul Artikel -->
                                    <td title="{{ $art->title }}">
                                        {{ Str::limit($art->title, 10, '...') }}
                                    </td>
                                    <!-- Penulis -->
                                    <td>
                                        {{ Str::limit($art->author, 10, '...') }}
                                    </td>
                                    <!-- Konten -->
                                    <td>
                                        {{ Str::limit($art->content, 10, '...') }}
                                    </td>
                                    <!-- Ringkasan -->
                                    <td>
                                        {{ Str::limit($art->summary, 10, '...') }}
                                    </td>
                                    <!-- Gambar -->
                                    <td style="text-align: center;">
                                        @if ($art->img_url)
                                            <img src="{{ asset('storage/' . $art->img_url) }}" alt="Image"
                                                class="img-fluid rounded" style="width: 100px; height: auto;">
                                        @else
                                            <span class="text-muted">Tidak Ada Gambar</span>
                                        @endif
                                    </td>
                                    <!-- Aksi -->
                                    <td>
                                        <!-- Tombol Lihat -->
                                        <div class="d-flex flex-column gap-2" style="min-width: 100px;">
                                            <button type="button" class="btn btn-sm btn-info fw-bold w-100"
                                                data-bs-toggle="modal"
                                                data-bs-target="#viewModal{{ $art->id }}">
                                                <i class="fas fa-eye"></i> Lihat
                                            </button>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('articles.edit', $art->id) }}"
                                                class="btn btn-sm btn-warning fw-bold">
                                                <i class="fas fa-edit"></i> Edit</a>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('articles.destroy', $art->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger fw-bold w-100">
                                                    <i class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <!-- Modal Detail Artikel -->
                        @foreach ($articles as $art)
                            <div class="modal fade" id="viewModal{{ $art->id }}" tabindex="-1"
                                aria-labelledby="viewModalLabel{{ $art->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel{{ $art->id }}">Detail
                                                Artikel</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($art->img_url)
                                                <div class="text-center mb-4">
                                                    <img src="{{ asset('storage/' . $art->img_url) }}" alt="Image"
                                                        class="img-fluid mt-3" style="max-width: 100%; height: auto;">
                                                </div>
                                            @else
                                                <p><strong>Gambar:</strong> <span class="text-muted">No Image</span>
                                                </p>
                                            @endif
                                            <h5 class="mb-4"><strong>Judul:</strong> {{ $art->title }}</h5>
                                            <h5 class="mb-4"><strong>Penulis:</strong> {{ $art->author }}</h5>
                                            <h5 class="mb-4 break-on-number"><strong>Konten:</strong>
                                                {{ $art->content }}</h5>
                                            <h5><strong>Ringkasan:</strong> {{ $art->summary }}</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const elements = document.querySelectorAll(".break-on-number");
                elements.forEach(el => {
                    el.innerHTML = el.innerHTML.replace(/(\d+)/g, '<br>$1');
                });
            });
        </script>

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
            document.addEventListener('DOMContentLoaded', function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    setTimeout(function() {
                        alert.classList.remove('show');
                    }, 5000); // Dismiss after 5 seconds
                });
            });
        </script>
</body>

</html>

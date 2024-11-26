<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sanggar MC Kuningan</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/icon.png') }}" type="image/x-icon">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .break-on-number {
            display: block;
            word-break: break-word;
            white-space: pre-line;
        }

        .section-heading {
            color: #FFC107;
            /* Kuning emas */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Bayangan teks */
        }

        .carousel-caption h5 {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .img-fluid:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }

        footer .social-links a {
            color: #FFC107;
            font-size: 1.5rem;
            margin: 0 10px;
        }

        footer .social-links a:hover {
            color: #fff;
            transition: color 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        /* Navbar Customizations */
        #mainNav {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Shadow Effect on Scroll */
        .navbar-dark.bg-dark {
            background-color: rgba(0, 0, 0, 0.8) !important;
            /* Transparan */
            backdrop-filter: blur(10px);
            /* Efek blur */
        }

        .navbar-dark.bg-dark.scrolled {
            background-color: #000 !important;
            /* Warna solid saat scroll */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            /* Tambahkan shadow */
        }

        /* Active Link Highlight */
        .nav-link.active {
            color: #FFC107 !important;
            /* Kuning emas */
            font-weight: bold;
            border-bottom: 2px solid #FFC107;
            /* Garis bawah */
        }

        /* Hover Effect */
        .nav-link:hover {
            color: #FFC107 !important;
            /* Kuning emas */
        }

        /* Brand Logo Adjustments */
        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.1);
            /* Zoom efek */
        }

        /* Brand Text Styling */
        .brand-text {
            font-family: 'Montserrat', sans-serif;
            /* Font modern */
            font-weight: 700;
            /* Tebal */
            font-size: 1.5rem;
            /* Ukuran font */
            color: #FFC107;
            /* Kuning emas */
            text-transform: uppercase;
            /* Huruf kapital */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            /* Efek bayangan */
            transition: transform 0.3s ease, color 0.3s ease;
        }

        /* Hover Effect for Brand Text */
        .brand-text:hover {
            color: #fff;
            /* Putih saat hover */
            transform: scale(1.1);
            /* Zoom efek */
        }
    </style>

</head>

<body id="page-top bg-dark">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-lg" id="mainNav">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#page-top">
                <img src="{{ asset('assets/img/navbar-brand (1).png') }}" alt="Brand Logo 1" class="me-2"
                    style="height: 40px;" />
                <span class="brand-text ms-2 mt-2">Sanggar MC</span>
            </a>

            <!-- Hamburger Menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                            href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('profile') ? 'active' : '' }}"
                            href="{{ route('profile') }}">Profil MC</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('articles*') ? 'active' : '' }}"
                            href="{{ route('articles.index') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('gal') ? 'active' : '' }}"
                            href="{{ route('gal') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('berita') ? 'active' : '' }}"
                            href="{{ route('berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('kon') ? 'active' : '' }}"
                            href="{{ route('kon') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Optional: Additional content -->

    <script>
        // Menambahkan efek shadow pada navbar ketika di-scroll
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

</body>

</html>

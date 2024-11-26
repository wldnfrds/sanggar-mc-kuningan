@extends('layouts.navbar')

<!-- Header Galeri dengan Animasi -->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase text-warning mb-3">Galeri Karya</h2>
            <p class="text-muted mb-4">Kumpulan momen dan karya terbaik kami</p>
            <hr class="divider-custom">
        </div>
    </div>
</section>

<!-- Galeri dengan Efek Hover -->
<section class="page-section">
    <div class="container">
        <div class="row g-4">
            @foreach ($galeris as $galeri)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <div class="card shadow-sm h-100 border-0 overflow-hidden">
                            <!-- Gambar dengan Efek Hover -->
                            <div class="image-wrapper position-relative">
                                <img src="{{ asset('storage/' . $galeri->image_path) }}" class="card-img-top"
                                    alt="{{ $galeri->title }}" style="object-fit: cover; height: 250px;">
                            </div>
                            <!-- Judul dengan Styling -->
                            <div class="card-body text-center">
                                <h5 class="card-title mb-0">{{ $galeri->title }}</h5>
                                <div class="card-meta">
                                    <span class="text-muted small">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal untuk Setiap Gambar -->
                    <div class="modal fade" id="galleryModal{{ $galeri->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content border-0">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close position-absolute end-0 top-0 m-3"
                                        data-bs-dismiss="modal"></button>
                                    <img src="{{ asset('storage/' . $galeri->image_path) }}" class="img-fluid"
                                        alt="{{ $galeri->title }}">
                                </div>
                                <div class="modal-footer">
                                    <h5 class="w-100 text-center mb-0">{{ $galeri->title }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Subscribe Section yang Ditingkatkan -->
<section class="page-section bg-dark py-5" id="subscribe">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-4">
                    <h3 class="text-warning mb-3">Berlangganan Buletin Kami</h3>
                    <p class="text-light mb-4">Dapatkan update terbaru dan penawaran khusus langsung di inbox Anda</p>
                    <hr class="border-light w-25 mx-auto">
                </div>
                <form action="simpan-newsletter.php" method="POST" class="subscribe-form">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Masukkan alamat email Anda"
                            name="email" required>
                        <button type="submit" class="btn btn-warning px-4">
                            Subscribe <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@extends('layouts.footer')

<style>
    /* Custom Divider */
    .divider-custom {
        width: 50px;
        height: 3px;
        background-color: var(--bs-warning);
        margin: 1.5rem auto;
        border-radius: 3px;
    }

    /* Gallery Item Styling */
    .gallery-item {
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
    }

    .image-wrapper {
        overflow: hidden;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .overlay {
        opacity: 1;
    }

    /* Subscribe Form Styling */
    .subscribe-form .form-control {
        height: 50px;
        border-radius: 25px 0 0 25px;
    }

    .subscribe-form .btn {
        border-radius: 0 25px 25px 0;
        padding-left: 30px;
        padding-right: 30px;
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 15px;
        overflow: hidden;
    }

    .btn-close {
        background-color: white;
        padding: 8px;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
</style>

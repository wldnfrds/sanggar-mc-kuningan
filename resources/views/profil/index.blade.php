@extends('layouts.navbar')

<!-- Profil MC -->
<section class="page-section" id="profile">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase text-warning">Profil MC</h2>
            <hr class="border-light mb-5">
        </div>
        <div class="row">
            @foreach ($mc as $ms)
                <div class="col-lg-3 col-md-4 col-sm-6 text-center mb-4">
                    <!-- Gambar dan Nama -->
                    <div>
                        <img src="{{ asset('storage/' . $ms->foto) }}" alt="{{ $ms->nama }}"
                            class=" img-fluid shadow mb-2"
                            style="max-width: 150px; max-height: 150px; min-height: 150px; cursor: pointer; "
                            data-bs-toggle="modal" data-bs-target="#mcDetailModal{{ $ms->id }}">
                        <h5 class="text-warning" style="cursor: pointer;" data-bs-toggle="modal"
                            data-bs-target="#mcDetailModal{{ $ms->id }}">
                            {{ $ms->nama }}
                        </h5>
                    </div>
                </div>

                <!-- Modal Detail MC -->
                <div class="modal fade" id="mcDetailModal{{ $ms->id }}" tabindex="-1"
                    aria-labelledby="mcDetailModalLabel{{ $ms->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                                <h5 class="modal-title text-warning" id="mcDetailModalLabel{{ $ms->id }}">Detail
                                    MC : {{ $ms->nama }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Gambar Profil -->
                                    <div class="col-lg-4 text-center">
                                        <img src="{{ asset('storage/' . $ms->foto) }}" alt="{{ $ms->nama }}"
                                            class=" img-fluid shadow" style="max-width: 200px; max-height: 200px; ">
                                    </div>
                                    <!-- Detail Profil -->
                                    <div class="col-lg-8">
                                        <p>{{ $ms->deskripsi }}</p>
                                        <ul class="list-unstyled">
                                            <li><strong>Kategori:</strong> {{ $ms->kategori }}</li>
                                            <li><strong>Kota:</strong> {{ $ms->kota }}</li>
                                            <li><strong>Pengalaman:</strong> {{ $ms->pengalaman }}</li>
                                        </ul>
                                        <!-- Media Sosial -->
                                        <div class="mt-3">
                                            <h6>Ikuti di Media Sosial</h6>
                                            <a href="{{ $ms->media_sosial }}" class="btn btn-outline-warning btn-sm"
                                                target="__blank"><i class="fab fa-instagram"></i> Instagram</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light"
                                    data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Subscribe Section -->
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

<!-- Clients-->

<!-- Contact-->

@extends('layouts.footer')

<style>
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

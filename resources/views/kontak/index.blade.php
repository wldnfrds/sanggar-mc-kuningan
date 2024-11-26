@extends('layouts.navbar')

<section class="page-section bg-dark py-5" id="contact">
    <div class="container">
        <!-- Bagian Header Kontak -->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center" style="padding-top: 70px;">
                    <h2 class="section-heading text-uppercase text-warning mb-3">Hubungi Kami</h2>
                    <p class="text-muted mb-4">Silahkan hubungi kami untuk informasi lebih lanjut</p>
                    <hr class="divider-custom">
                </div>
            </div>
        </section>

        <!-- Bagian Lokasi -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card bg-dark border border-warning">
                    <div class="card-body">
                        <h5 class="text-warning mb-4">
                            <i class="fas fa-map-marker-alt me-2"></i>Lokasi
                        </h5>
                        <div class="map-container rounded overflow-hidden shadow-lg" style="height: 500px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.26534865361!2d108.4762541740365!3d-6.977985868328565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f15866913ae17%3A0x6f899fe47f454b58!2sPondok%20Quran%20%26%20Yatim%20Daarul%20Adzkar%20Kuningan!5e0!3m2!1sen!2sid!4v1730953719073!5m2!1sen!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Informasi Kontak -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card bg-dark border border-warning">
                    <div class="card-body">
                        <h2 class="text-warning text-center mb-4">
                            <i class="fas fa-address-book me-2"></i>Kontak
                        </h2>
                        <div class="contact-info p-4 text-center">
                            <div class="mb-4">
                                <i class="fas fa-map-marked-alt fa-2x text-warning mb-3"></i>
                                <h6 class="text-white">{{ $kontak->address ?? 'Alamat belum tersedia' }}</h6>
                            </div>
                            <div class="mb-4">
                                <i class="fas fa-phone fa-2x text-warning mb-3"></i>
                                <p class="text-white mb-0">{{ $kontak->phone ?? 'Telepon belum tersedia' }}</p>
                            </div>
                            <div class="mb-3">
                                <i class="fas fa-envelope fa-2x text-warning mb-3"></i>
                                <p class="mb-0">
                                    <a href="mailto:{{ $kontak->email ?? '' }}"
                                        class="text-white text-decoration-none hover-warning">
                                        {{ $kontak->email ?? 'Email belum tersedia' }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@extends('layouts.footer')

<style>
    .hover-warning:hover {
        color: #ffc107 !important;
        transition: color 0.3s ease;
    }

    .divider-custom {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 1.25rem 0;
    }

    .divider-custom-line {
        width: 100%;
        max-width: 7rem;
        height: 0.25rem;
        border-radius: 1rem;
        margin: 0 1rem;
    }

    .divider-custom-icon {
        font-size: 1.5rem;
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .map-container {
        box-shadow: 0 0 15px rgba(255, 193, 7, 0.2);
    }
</style>

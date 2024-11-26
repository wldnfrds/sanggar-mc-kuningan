@extends('layouts.navbar')

<!-- Tambahkan custom CSS -->


<!-- Masthead-->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/img/header/WhatsApp Image 2023-11-03 at 20.31.47.jpeg') }}" class="d-block w-100"
                alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Selamat Datang di Sanggar MC Kuningan</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/img/header/WhatsApp Image 2023-11-03 at 20.31.48.jpeg') }}" class="d-block w-100"
                alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Kreativitas dan Profesionalisme</h5>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Services -->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center fade-in">
            <h2 class="section-heading text-uppercase text-warning">Selamat Datang di Website Official Sanggar MC
                Kuningan</h2>
        </div>
        <div class="row align-items-center mt-4">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('assets/img/item/item.png') }}" alt="Item Image" class="img-fluid">
            </div>
            <div class="col-md-8">
                <p class="py-4 text-white">
                    Sanggar MC Kuningan merupakan wadah kreasi MC untuk berkarya dan mengisi acara-acara sehingga
                    berkesan dan menyenangkan. Sanggar MC Kuningan hadir sebagai penyedia layanan MC untuk berbagai
                    macam acara.

                    MC adalah profesi yang masih jarang ditekuni oleh orang-orang, sedangkan kebutuhan MC untuk setiap
                    acara selalu banyak. Padahal kita ketahui bersama bahwa MC memiliki peranan penting dalam
                    mensukseskan jalannya sebuah acara.

                    Untuk itu, kami menginisiasi untuk membuat sebuah jembatan yang menghubungkan rekan-rekan MC dengan
                    para klien yang membutuhkan jasa MC.

                    Selain menyediakan layanan jasa MC professional, Sanggar MC Kuningan pun menjadi wadah bagi
                    kawan-kawan yang ingin berlatih menjadi MC..
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center fade-in">
            <h2 class="section-heading text-uppercase text-warning">Testimoni Klien</h2>
            <hr class="border-light">
        </div>
        <div class="row align-items-center mt-4">
            <div class="col-md-8">
                <p class="py-4 text-white">
                    Setiap kegiatan pertemuan KBK jadi lebih seru dan berkualitas karena dipandu oleh MC yang
                    profesional dari Sanggar MC Kuningan.</p>
                <h6 class="text-warning">
                    <a href="https://komunitasbisniskuningan.com/" class="nav-link" target="__blank">KOMUNITAS BISNIS
                        Kuningan</a>
                </h6>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('assets/img/uploads/unnamed (63).jpg') }}" alt="Testimonial Image"
                    class="img-fluid rounded-circle mx-auto">
            </div>
        </div>
    </div>
</section>

<!-- Clients -->
<section class="page-section" id="team">
    <div class="container">
        <div class="text-center fade-in">
            <h2 class="section-heading text-warning">KLIEN KAMI</h2>
            <hr class="border-light">
        </div>
        <div class="row mt-4">
            <div class="col-lg-4 text-center team-member">
                <img class="mx-auto rounded-circle img-fluid" src="{{ asset('assets/img/klien/klien.png') }}"
                    alt="Kementerian Perindustrian">
                <h4 class="text-light mt-3">Kementerian Perindustrian</h4>
                <div class="social-links">
                    <a href="https://x.com/Kemenperin_RI" target="_blank" rel="noopener noreferrer"><i
                            class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/kemenperin/" target="_blank" rel="noopener noreferrer"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.linkedin.com/company/kementerian-perindustrian-republik-indonesia"
                        target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@extends('layouts.footer')

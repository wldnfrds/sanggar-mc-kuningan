@extends('layouts.navbar')

<!-- Header Artikel -->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase text-warning mb-3">Artikel Terbaru</h2>
            <p class="text-muted">Temukan informasi menarik dan bermanfaat</p>
            <div class="divider-custom"></div>
        </div>
    </div>
</section>

<!-- Articles Section -->
<section class="page-section articles-section">
    <div class="container">
        <div class="row g-4">
            @foreach ($articles as $art)
                <div class="col-12 col-md-4">
                    <article class="article-card">
                        <div class="card h-100 border-0 shadow-sm">
                            <!-- Article Image -->
                            <div class="article-image-wrapper">
                                <img src="{{ asset('storage/' . $art->img_url) }}" alt="{{ $art->title }}"
                                    class="article-image">
                                <div class="article-category">
                                    <span>{{ $art->category ?? 'Artikel' }}</span>
                                </div>
                            </div>

                            <!-- Article Content -->
                            <div class="card-body p-4">
                                <div class="article-meta mb-2">
                                    <span class="text-muted">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($art->created_at)->locale('id')->isoFormat('D MMMM Y') }}
                                    </span>
                                    {{-- <span class="text-muted ms-3">
                                        <i class="far fa-clock me-1"></i>
                                        {{ $art->reading_time ?? '5' }} menit baca
                                    </span> --}}
                                </div>

                                <h3 class="article-title">{{ $art->title }}</h3>

                                <p class="article-excerpt text-muted">
                                    {{ \Str::limit($art->excerpt ?? strip_tags($art->content), 100) }}
                                </p>

                                <a href="{{ route('articles.detail', ['id' => $art->id]) }}"
                                    class="btn btn-link text-warning p-0">
                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </article>
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

    /* Article Card Styling */
    .article-card {
        transition: transform 0.3s ease;
    }

    .article-card:hover {
        transform: translateY(-5px);
    }

    .article-image-wrapper {
        position: relative;
        padding-top: 66.67%;
        /* 3:2 Aspect Ratio */
        overflow: hidden;
    }

    .article-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .article-card:hover .article-image {
        transform: scale(1.1);
    }

    .article-category {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--bs-warning);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        z-index: 1;
    }

    .article-meta {
        font-size: 0.85rem;
    }

    .article-title {
        font-size: 1.25rem;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 0.75rem;
        color: #2c3e50;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .article-excerpt {
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
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

    /* Hover Effects */
    .btn-link {
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-link:hover {
        transform: translateX(5px);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .article-title {
            font-size: 1.1rem;
        }

        .article-image-wrapper {
            padding-top: 60%;
            /* Slightly shorter on mobile */
        }
    }
</style>

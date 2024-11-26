@extends('layouts.navbar')

<!-- Hero Section -->
<div class="article-hero"
    style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url({{ asset('storage/' . $article->img_url) }})">
    <div class="container">
        <div class="hero-content text-center">
            <div class="article-meta mb-3">
                <span class="meta-item">
                    <i class="far fa-calendar-alt"></i>
                    {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('D MMMM Y') }}
                </span>
                <span class="meta-item">
                    <i class="far fa-user"></i>
                    {{ $article->author }}
                </span>
            </div>
            <h1 class="article-title">{{ $article->title }}</h1>
        </div>
    </div>
</div>

<!-- Article Content -->
<section class="article-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Featured Image -->
                <div class="featured-image-container">
                    <img src="{{ asset('storage/' . $article->img_url) }}" alt="{{ $article->title }}"
                        class="featured-image">
                    @if ($article->image_caption)
                        <div class="image-caption text-center mt-2">
                            <small class="text-muted">{{ $article->image_caption }}</small>
                        </div>
                    @endif
                </div>

                <!-- Summary -->
                <div class="article-summary">
                    <blockquote class="summary-text">
                        {{ $article->summary }}
                    </blockquote>
                </div>

                <!-- Main Content -->
                <div class="article-body">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <!-- Author Bio -->
                <div class="author-box">
                    <div class="author-avatar">
                        <img src="{{ asset('wil/1664024731850.jpeg') }}" alt="{{ $article->author }}">
                    </div>
                    <div class="author-info">
                        <h5>{{ $article->author }}</h5>
                        <p class="text-muted">Penulis</p>
                        <div class="social-links">
                            <a href="https://x.com/fauzinoerwenda" class="social-link"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/in/fauzi-noerwenda-9204b65a/?originalSubdomain=id"
                                class="social-link"><i class="fab fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/fauzinoerwenda_/" class="social-link"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="container mt-5">
                    <div class="share-buttons">
                        <h6>Bagikan Artikel</h6>
                        <div class="d-flex gap-2">
                            <!-- Facebook Share -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://wldnfrds.github.io/"
                                class="btn btn-outline-primary" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <!-- Twitter Share -->
                            <a href="https://twitter.com/intent/tweet?url=https://wldnfrds.github.io/"
                                class="btn btn-outline-info" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <!-- WhatsApp Share -->
                            <a href="https://wa.me/?text=Check+out+this+awesome+article!%20https://wldnfrds.github.io/"
                                class="btn btn-outline-success" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <!-- Email Share -->
                            <a href="mailto:?subject=Interesting%20Article&body=Check%20out%20this%20article:%20https://wldnfrds.github.io/"
                                class="btn btn-outline-secondary">
                                <i class="far fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subscribe Section -->
<section class="subscribe-section">
    <div class="container">
        <div class="subscribe-box">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3 class="text-warning mb-4">Berlangganan Update Terbaru</h3>
                    <p class="text-white mb-4">Dapatkan artikel menarik langsung di inbox Anda</p>
                    <form action="simpan-newsletter.php" method="POST" class="subscribe-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Masukkan alamat email Anda"
                                required>
                            <button type="submit" class="btn btn-warning">
                                Subscribe <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@extends('layouts.footer')

<style>
    /* Hero Section */
    .article-hero {
        padding: 120px 0;
        background-size: cover;
        background-position: center;
        color: white;
        margin-bottom: 2rem;
    }

    .hero-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .article-meta {
        font-size: 0.9rem;
    }

    .meta-item {
        margin-right: 20px;
    }

    .meta-item i {
        margin-right: 5px;
        color: var(--bs-warning);
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.3;
    }

    /* Article Content */
    .article-content {
        padding: 3rem 0;
        background-color: #fff;
    }

    .featured-image-container {
        margin-bottom: 2rem;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .featured-image {
        width: 100%;
        height: auto;
        display: block;
    }

    .article-summary {
        margin: 2rem 0;
        padding: 2rem;
        background-color: #f8f9fa;
        border-left: 4px solid var(--bs-warning);
        border-radius: 4px;
    }

    .summary-text {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #495057;
        margin: 0;
    }

    .article-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #343a40;
        margin-bottom: 3rem;
    }

    /* Author Box */
    .author-box {
        display: flex;
        align-items: center;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 10px;
        margin: 3rem 0;
    }

    .author-avatar {
        width: 80px;
        height: 80px;
        margin-right: 20px;
    }

    .author-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .author-info h5 {
        margin: 0;
        color: #343a40;
    }

    .social-links {
        margin-top: 10px;
    }

    .social-link {
        color: #6c757d;
        margin-right: 15px;
        font-size: 1.1rem;
        transition: color 0.3s;
    }

    .social-link:hover {
        color: var(--bs-warning);
    }

    /* Share Buttons */
    .share-buttons {
        padding: 2rem 0;
        border-top: 1px solid #dee2e6;
        text-align: center;
    }

    .share-buttons h6 {
        margin-bottom: 1rem;
        color: #495057;
    }

    /* Subscribe Section */
    .subscribe-section {
        background-color: #343a40;
        padding: 5rem 0;
    }

    .subscribe-box {
        max-width: 800px;
        margin: 0 auto;
    }

    .subscribe-form .form-control {
        height: 50px;
        border-radius: 25px 0 0 25px;
        border: none;
        padding-left: 25px;
    }

    .subscribe-form .btn {
        border-radius: 0 25px 25px 0;
        padding: 0 30px;
        height: 50px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .article-hero {
            padding: 80px 0;
        }

        .article-title {
            font-size: 2rem;
        }

        .article-meta {
            flex-wrap: wrap;
        }

        .meta-item {
            margin-bottom: 10px;
        }

        .article-body {
            font-size: 1rem;
        }
    }
</style>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #4f46e5;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--dark);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .hero-section {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            padding: 100px 0;
            color: white;
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .btn-premium {
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-light-custom {
            background: white;
            color: var(--primary);
        }

        .btn-light-custom:hover {
            background: var(--light);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .book-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .book-img-wrapper {
            height: 300px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .book-img-wrapper img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .book-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255,255,255,0.9);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
        }

        .footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 20px;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="fas fa-book-open me-2"></i>E-Perpus
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-collapse navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#buku">Katalog</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-primary btn-premium me-2" href="<?= base_url('auth/login') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-premium" href="<?= base_url('auth/register') ?>">Daftar Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="hero-title">Jelajahi Dunia Lewat Jendela Buku</h1>
                    <p class="hero-subtitle">Akses ribuan koleksi buku digital secara mudah, cepat, dan kapan saja. Mulailah petualangan literasi Anda bersama kami.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#buku" class="btn btn-light-custom btn-premium">Lihat Katalog</a>
                        <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-light btn-premium">Mulai Pinjam</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Books -->
    <section id="buku" class="py-5 mt-5">
        <div class="container text-center">
            <h2 class="section-title">Koleksi Terbaru</h2>
            <div class="row mt-4">
                <?php if(!empty($buku)): ?>
                    <?php foreach($buku as $b): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="book-card h-100">
                                <div class="book-img-wrapper">
                                    <?php if($b->cover): ?>
                                        <img src="<?= base_url('assets/uploads/covers/'.$b->cover) ?>" alt="<?= $b->judul ?>">
                                    <?php else: ?>
                                        <div class="text-muted">
                                            <i class="fas fa-book fa-4x mb-3"></i>
                                            <p>No Cover</p>
                                        </div>
                                    <?php endif; ?>
                                    <span class="book-badge"><?= $b->tahun ?></span>
                                </div>
                                <div class="card-body text-start p-4">
                                    <h5 class="card-title fw-bold mb-1"><?= $b->judul ?></h5>
                                    <p class="text-muted mb-3 small">Oleh: <?= $b->penulis ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge <?= $b->stok > 0 ? 'bg-success' : 'bg-danger' ?>">
                                            <?= $b->stok > 0 ? 'Tersedia' : 'Habis' ?>
                                        </span>
                                        <a href="<?= base_url('auth/login') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">Pinjam</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p class="text-muted">Belum ada koleksi buku.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3"><i class="fas fa-book-open me-2"></i>E-Perpus</h5>
                    <p class="text-muted small">Platform perpustakaan digital modern untuk memudahkan akses pengetahuan bagi semua orang.</p>
                </div>
                <div class="col-lg-4 mb-4 text-lg-center">
                    <h5 class="fw-bold mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-muted text-decoration-none mb-2 d-block">Beranda</a></li>
                        <li><a href="#buku" class="text-muted text-decoration-none mb-2 d-block">Katalog Buku</a></li>
                        <li><a href="<?= base_url('auth/login') ?>" class="text-muted text-decoration-none mb-2 d-block">Masuk</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4 text-lg-end">
                    <h5 class="fw-bold mb-3">Hubungi Kami</h5>
                    <div class="d-flex justify-content-lg-end gap-3">
                        <a href="#" class="text-muted"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="opacity-25">
            <div class="text-center small text-muted">
                <p class="mb-0">© 2026 E-Perpus Digital. Dibuat dengan <i class="fas fa-heart text-danger"></i> untuk Literasi Indonesia.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

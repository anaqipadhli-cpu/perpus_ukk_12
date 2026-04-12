<?php $this->load->view('templates/header'); ?>

<div class="container-fluid py-4">
    <!-- Greeting Section -->
    <div class="mb-5">
        <h1 class="fw-bold">Selamat Datang, <?= $nama_user ?>! 👋</h1>
        <p class="text-muted">Jelajahi dan pinjam buku favorit Anda</p>
    </div>

    <!-- Menu Actions -->
    <div class="row">
        <div class="col-12">
            <h5 class="fw-bold mb-3">Menu Utama</h5>
        </div>
    </div>

    <div class="row">
        <!-- Menu Lihat Buku -->
        <div class="col-md-4 mb-3">
            <a href="<?= base_url('user/buku') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="card-body text-center text-white">
                        <div style="font-size: 3em; margin-bottom: 15px;">📚</div>
                        <h5 class="card-title text-white">Lihat Buku</h5>
                        <p class="card-text" style="color: rgba(255, 255, 255, 0.9);">Jelajahi daftar buku dan pinjam</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Menu Riwayat -->
        <div class="col-md-4 mb-3">
            <a href="<?= base_url('user/riwayat') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="card-body text-center text-white">
                        <div style="font-size: 3em; margin-bottom: 15px;">📖</div>
                        <h5 class="card-title text-white">Riwayat Peminjaman</h5>
                        <p class="card-text" style="color: rgba(255, 255, 255, 0.9);">Lihat riwayat peminjaman Anda</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Menu Logout -->
        <div class="col-md-4 mb-3">
            <a href="<?= base_url('auth/logout') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <div class="card-body text-center text-white">
                        <div style="font-size: 3em; margin-bottom: 15px;">🚪</div>
                        <h5 class="card-title text-white">Logout</h5>
                        <p class="card-text" style="color: rgba(255, 255, 255, 0.9);">Keluar dari aplikasi</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2) !important;
    }
</style>

<?php $this->load->view('templates/footer'); ?>

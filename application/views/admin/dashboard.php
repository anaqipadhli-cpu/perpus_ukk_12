<?php $this->load->view('templates/header'); ?>

<div class="container-fluid py-4">
    <!-- Greeting Section -->
    <div class="mb-5">
        <h1 class="fw-bold">Selamat Datang, <?= $nama_admin ?>! 👋</h1>
        <p class="text-muted">Kelola perpustakaan Anda dengan mudah</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-5">
        <!-- Total Buku -->
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Buku</h6>
                            <h2 class="fw-bold mt-2"><?= $total_buku ?></h2>
                        </div>
                        <div style="font-size: 3em; opacity: 0.3;">📚</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Anggota -->
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Anggota</h6>
                            <h2 class="fw-bold mt-2"><?= $total_anggota ?></h2>
                        </div>
                        <div style="font-size: 3em; opacity: 0.3;">👥</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peminjaman Aktif -->
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Peminjaman Aktif</h6>
                            <h2 class="fw-bold mt-2"><?= $peminjaman_aktif ?></h2>
                        </div>
                        <div style="font-size: 3em; opacity: 0.3;">📖</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Denda Belum Bayar -->
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Denda Belum Bayar</h6>
                            <h2 class="fw-bold mt-2"><?= $denda_belum_bayar ?></h2>
                        </div>
                        <div style="font-size: 3em; opacity: 0.3;">💰</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Actions -->
    <div class="row">
        <div class="col-12">
            <h5 class="fw-bold mb-3">Menu Utama</h5>
        </div>
    </div>

    <div class="row">
        <!-- Menu Buku -->
        <div class="col-md-3 mb-3">
            <a href="<?= base_url('buku') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                    <div class="card-body text-center">
                        <div style="font-size: 2.5em; margin-bottom: 10px;">📚</div>
                        <h5 class="card-title">Kelola Buku</h5>
                        <p class="card-text text-muted small">Tambah, edit, hapus buku</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Menu Anggota -->
        <div class="col-md-3 mb-3">
            <a href="<?= base_url('anggota') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                    <div class="card-body text-center">
                        <div style="font-size: 2.5em; margin-bottom: 10px;">👥</div>
                        <h5 class="card-title">Kelola Anggota</h5>
                        <p class="card-text text-muted small">Tambah, hapus anggota</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Menu Peminjaman -->
        <div class="col-md-3 mb-3">
            <a href="<?= base_url('peminjaman') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                    <div class="card-body text-center">
                        <div style="font-size: 2.5em; margin-bottom: 10px;">📖</div>
                        <h5 class="card-title">Data Peminjaman</h5>
                        <p class="card-text text-muted small">Lihat semua peminjaman</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Menu Denda -->
        <div class="col-md-3 mb-3">
            <a href="<?= base_url('denda') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                    <div class="card-body text-center">
                        <div style="font-size: 2.5em; margin-bottom: 10px;">💳</div>
                        <h5 class="card-title">Kelola Denda</h5>
                        <p class="card-text text-muted small">Lihat dan proses denda</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="row mt-5">
        <div class="col-12 text-end">
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-lg">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>

<style>
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15) !important;
    }
</style>

<?php $this->load->view('templates/footer'); ?>

<?php $this->load->view('templates/header'); ?>

<div class="container-fluid py-4">
    <!-- Greeting Section -->
    <div class="mb-5">
        <h1 class="fw-bold">Selamat Datang, <?= $nama_admin ?>! </h1>
        <p class="text-muted">Kelola perpustakaan Anda dengan mudah</p>
    </div>

    <!-- Menu Actions -->
    <div class="row mb-5">
        <div class="col-12">
            <h5 class="fw-bold mb-3">Menu Utama</h5>
        </div>
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
                    <div class="mt-3 text-end">
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-light btn-sm text-dark">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Statistik -->
    <div class="row mb-5">
        <div class="col-lg-8 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Grafik Ringkasan Perpustakaan</h5>
                    <canvas id="overviewChart" height="150"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Status Peminjaman</h5>
                    <canvas id="statusChart" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const overviewCtx = document.getElementById('overviewChart').getContext('2d');
        new Chart(overviewCtx, {
            type: 'bar',
            data: {
                labels: ['Total Buku', 'Total Anggota', 'Total Peminjaman', 'Denda Belum Bayar'],
                datasets: [{
                    label: 'Jumlah',
                    data: [<?= $total_buku ?>, <?= $total_anggota ?>, <?= $total_peminjaman ?>, <?= $denda_belum_bayar ?>],
                    backgroundColor: [
                        'rgba(102, 126, 234, 0.8)',
                        'rgba(240, 147, 251, 0.8)',
                        'rgba(79, 172, 254, 0.8)',
                        'rgba(250, 112, 154, 0.8)'
                    ],
                    borderColor: [
                        'rgba(102, 126, 234, 1)',
                        'rgba(240, 147, 251, 1)',
                        'rgba(79, 172, 254, 1)',
                        'rgba(250, 112, 154, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { display: true }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Dipinjam', 'Dikembalikan'],
                datasets: [{
                    data: [<?= $peminjaman_aktif ?>, <?= $peminjaman_kembali ?>],
                    backgroundColor: ['rgba(79, 172, 254, 0.8)', 'rgba(102, 126, 234, 0.8)'],
                    borderColor: ['rgba(79, 172, 254, 1)', 'rgba(102, 126, 234, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>

<style>
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15) !important;
    }
</style>

<?php $this->load->view('templates/footer'); ?>

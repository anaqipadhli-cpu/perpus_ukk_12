<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-1"><i class="fas fa-book-open"></i> Katalog Buku</h2>
        <small class="text-muted">Jelajahi koleksi buku perpustakaan kami</small>
    </div>
</div>

<!-- Alert Messages -->
<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> <strong>Berhasil!</strong> <?= $_SESSION['success'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> <strong>Error!</strong> <?= $_SESSION['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-header bg-light border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0"><i class="fas fa-list"></i> Koleksi Buku</h6>
            <span class="badge bg-primary"><?= count($buku) ?> Buku</span>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th style="width: 8%">Tahun</th>
                    <th style="width: 12%">Ketersediaan</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($buku) > 0): ?>
                    <?php $no = 1; foreach($buku as $b): ?>
                    <tr>
                        <td class="fw-bold text-muted"><?= $no++ ?></td>
                        <td>
                            <strong class="text-dark"><?= $b->judul ?></strong>
                        </td>
                        <td><?= $b->penulis ?: '<em class="text-muted">Tidak diketahui</em>' ?></td>
                        <td><em><?= $b->penerbit ?: '<em class="text-muted">Tidak diketahui</em>' ?></em></td>
                        <td class="text-center"><?= $b->tahun ?: '-' ?></td>
                        <td>
                            <?php if($b->stok == 0): ?>
                                <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Kosong</span>
                            <?php elseif($b->stok <= 5): ?>
                                <span class="badge bg-warning"><i class="fas fa-exclamation-triangle"></i> <?= $b->stok ?> Tersedia</span>
                            <?php else: ?>
                                <span class="badge bg-success"><i class="fas fa-check-circle"></i> <?= $b->stok ?> Tersedia</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($b->stok > 0): ?>
                                <a href="<?= base_url('peminjaman/pinjam_single/'.$b->id) ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-book"></i> Pinjam Buku
                                </a>
                            <?php else: ?>
                                <span class="text-muted small"><i class="fas fa-clock"></i> Tidak tersedia</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="fas fa-inbox" style="font-size: 2.5rem; color: #e0e0e0; margin-bottom: 1rem; display: block;"></i>
                            <strong class="text-muted">Tidak ada buku tersedia</strong>
                            <p class="text-muted small mt-2">Koleksi buku sedang diperbarui</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
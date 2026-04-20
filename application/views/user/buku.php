<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><i class="fas fa-book"></i> Katalog Buku</h3>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['success'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th style="width: 8%">Tahun</th>
                    <th style="width: 8%">Stok</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($buku) > 0): ?>
                    <?php $no = 1; foreach($buku as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <?php if($b->cover): ?>
                                    <img src="<?= base_url('assets/uploads/covers/'.$b->cover) ?>" width="40" height="60" class="me-2 rounded shadow-sm" style="object-fit: cover;">
                                <?php else: ?>
                                    <div class="me-2 rounded bg-light d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 60px;">
                                        <i class="fas fa-book text-muted" style="font-size: 0.8rem;"></i>
                                    </div>
                                <?php endif; ?>
                                <strong><?= $b->judul ?></strong>
                            </div>
                        </td>
                        <td><?= $b->penulis ?></td>
                        <td><?= $b->penerbit ?></td>
                        <td><?= $b->tahun ?></td>
                        <td>
                            <?php if($b->stok == 0): ?>
                                <span class="badge bg-danger">Kosong</span>
                            <?php elseif($b->stok <= 5): ?>
                                <span class="badge bg-warning"><?= $b->stok ?> Stok</span>
                            <?php else: ?>
                                <span class="badge bg-success"><?= $b->stok ?> Stok</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($b->stok > 0): ?>
                                <a href="<?= site_url('peminjaman/pinjam_single/'.$b->id) ?>" class="btn btn-primary btn-sm" title="Pinjam buku ini">
                                    <i class="fas fa-check"></i> Pinjam
                                </a>
                            <?php else: ?>
                                <span class="text-muted small">Tidak tersedia</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e0;"></i>
                            <p class="text-muted mt-2">Tidak ada data buku</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="alert alert-info mt-3">
    <i class="fas fa-info-circle"></i> <strong>Cara Meminjam:</strong> Klik tombol "Pinjam" pada buku yang ingin Anda pinjam, kemudian pilih buku-buku lain dan tentukan tanggal pengembalian.
</div>

<?php $this->load->view('templates/footer'); ?>

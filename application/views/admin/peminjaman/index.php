<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title"><i class="fas fa-book-reader"></i> Data Peminjaman</h2>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

<!-- Alert Messages -->
<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> <?= $_SESSION['success'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> <?= $_SESSION['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- Form Filter -->
<div class="card mb-3">
    <div class="card-body">
        <form method="post" action="<?= base_url('peminjaman') ?>" class="row gx-2 gy-2 align-items-end">
            <div class="col-auto flex-fill">
                <input type="text" name="cari" class="form-control" placeholder="Cari nama atau email..." value="<?= isset($cari) ? $cari : '' ?>">
            </div>
            <div class="col-auto" style="min-width: 220px;">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="dipinjam" <?= isset($filter_status) && $filter_status == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                    <option value="menunggu_konfirmasi" <?= isset($filter_status) && $filter_status == 'menunggu_konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                    <option value="dikembalikan" <?= isset($filter_status) && $filter_status == 'dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
                </select>
            </div>
            <div class="col-auto d-flex gap-2">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">
                    <i class="fas fa-redo"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Denda</th>
                    <th>Status</th>
                    <th style="width: 12%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($pinjam) > 0): ?>
                    <?php $no = 1; foreach($pinjam as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><strong><?= $p->nama ?></strong></td>
                        <td><?= $p->email ?></td>
                        <td><?= $p->buku_judul ?></td>
                        <td><?= $p->tanggal_pinjam ?></td>
                        <td><?= $p->tanggal_kembali ?></td>
                        <td>
                            <?php if($p->denda > 0): ?>
                                <span class="badge bg-danger">Rp <?= number_format($p->denda, 0, ',', '.') ?></span>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php 
                                if($p->status == 'dipinjam') {
                                    echo '<span class="badge bg-warning">Dipinjam</span>';
                                } elseif($p->status == 'dikembalikan') {
                                    echo '<span class="badge bg-success">Dikembalikan</span>';
                                } elseif($p->status == 'menunggu_konfirmasi') {
                                    echo '<span class="badge bg-info">Menunggu Konfirmasi</span>';
                                } else {
                                    echo '<span class="badge bg-secondary">'.$p->status.'</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php if ($p->status == 'menunggu_konfirmasi'): ?>
                                <a href="<?= base_url('pengembalian/konfirmasi/'.$p->id) ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-check"></i> Konfirmasi
                                </a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e0;"></i>
                            <p class="text-muted mt-2">Tidak ada data peminjaman</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

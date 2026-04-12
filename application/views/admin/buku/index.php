<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title"><i class="fas fa-book"></i> Kelola Buku</h2>
    <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Buku
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
                        <td><strong><?= $b->judul ?></strong></td>
                        <td><?= $b->penulis ?></td>
                        <td><?= $b->penerbit ?></td>
                        <td><?= $b->tahun ?></td>
                        <td><span class="badge bg-info"><?= $b->stok ?></span></td>
                        <td>
                            <a href="<?= base_url('buku/edit/'.$b->id) ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('buku/hapus/'.$b->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
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

<?php $this->load->view('templates/footer'); ?>

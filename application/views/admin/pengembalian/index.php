<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title mb-0"><i class="fas fa-undo"></i> Data Pengembalian</h2>
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

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Peminjaman ID</th>
                    <th>Tanggal Kembali Real</th>
                    <th>Status</th>
                    <th style="width: 12%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($pengembalian) && count($pengembalian) > 0): ?>
                    <?php $no = 1; foreach($pengembalian as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->peminjaman_id ?></td>
                        <td><?= $p->tanggal_kembali_real ?></td>
                        <td>
                            <?php 
                                if($p->status == 'menunggu') {
                                    echo '<span class="badge bg-warning">Menunggu Konfirmasi</span>';
                                } elseif($p->status == 'dikonfirmasi') {
                                    echo '<span class="badge bg-success">Dikonfirmasi</span>';
                                } else {
                                    echo '<span class="badge bg-secondary">'.$p->status.'</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php if ($p->status == 'menunggu'): ?>
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
                        <td colspan="4" class="text-center py-4">
                            <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e0;"></i>
                            <p class="text-muted mt-2">Tidak ada data pengembalian</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

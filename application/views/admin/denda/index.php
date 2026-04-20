<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title mb-0"><i class="fas fa-receipt"></i> Kelola Denda</h2>
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
                    <th>Jumlah Denda</th>
                    <th>Status</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($denda) > 0): ?>
                    <?php $no = 1; foreach($denda as $d): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->peminjaman_id ?></td>
                        <td>
                            <strong>Rp <?= number_format($d->jumlah_denda, 0, ',', '.') ?></strong>
                        </td>
                        <td>
                            <?php 
                                if($d->status == 'belum_bayar') {
                                    echo '<span class="badge bg-danger">Belum Bayar</span>';
                                } elseif($d->status == 'sudah_bayar') {
                                    echo '<span class="badge bg-success">Sudah Bayar</span>';
                                } else {
                                    echo '<span class="badge bg-secondary">'.$d->status.'</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php if($d->status == 'belum_bayar'): ?>
                                <a href="<?= base_url('denda/bayar/'.$d->id) ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i> Bayar
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e0;"></i>
                            <p class="text-muted mt-2">Tidak ada data denda</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

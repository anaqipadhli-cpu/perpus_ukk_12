<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title"><i class="fas fa-users"></i> Kelola Anggota</h2>
    <a href="<?= base_url('anggota/tambah') ?>" class="btn btn-primary">
        <i class="fas fa-user-plus"></i> Tambah Anggota
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
        <form method="post" action="<?= base_url('anggota') ?>" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="cari" class="form-control" placeholder="Cari nama atau email..." value="<?= isset($cari) ? $cari : '' ?>">
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <a href="<?= base_url('anggota') ?>" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th style="width: 10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($anggota) > 0): ?>
                    <?php $no = 1; foreach($anggota as $a): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><strong><?= $a->nama ?></strong></td>
                        <td><?= $a->email ?></td>
                        <td><?= $a->alamat ?></td>
                        <td><?= $a->no_hp ?></td>
                        <td>
                            <a href="<?= base_url('anggota/hapus/'.$a->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e0;"></i>
                            <p class="text-muted mt-2">Tidak ada data anggota</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

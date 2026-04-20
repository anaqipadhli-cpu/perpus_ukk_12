<?php $this->load->view('templates/header'); ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="card-title mb-0"><i class="fas fa-user-circle me-2"></i>Profil Saya</h5>
            </div>
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                        <i class="fas fa-user fa-4x text-primary"></i>
                    </div>
                    <h3 class="fw-bold mb-1"><?= $user->nama ?></h3>
                    <span class="badge bg-info"><?= ucfirst($user->role) ?> Perpustakaan</span>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small text-uppercase fw-bold mb-1">Email</label>
                        <p class="fs-5 border-bottom pb-2"><?= $user->email ?></p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small text-uppercase fw-bold mb-1">No. HP</label>
                        <p class="fs-5 border-bottom pb-2"><?= $user->no_hp ? $user->no_hp : '-' ?></p>
                    </div>
                    <div class="col-12 mb-4">
                        <label class="text-muted small text-uppercase fw-bold mb-1">Alamat</label>
                        <p class="fs-5 border-bottom pb-2"><?= $user->alamat ? $user->alamat : '-' ?></p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small text-uppercase fw-bold mb-1">Akun Dibuat</label>
                        <p class="fs-5 border-bottom pb-2"><?= date('d M Y', strtotime($user->created_at)) ?></p>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary px-4">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

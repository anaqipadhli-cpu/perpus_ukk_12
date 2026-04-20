<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title mb-0"><i class="fas fa-edit"></i> Edit Buku</h2>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

<div class="row" style="margin-top: 1rem;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Cover Buku</label>
                        <?php if($buku->cover): ?>
                            <div class="mb-2">
                                <img src="<?= base_url('assets/uploads/covers/'.$buku->cover) ?>" width="100" class="img-thumbnail">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="cover" class="form-control" accept="image/*">
                        <div class="form-text text-muted small">Biarkan kosong jika tidak ingin mengubah cover.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Buku</label>
                        <input type="text" name="judul" value="<?= $buku->judul ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penulis</label>
                        <input type="text" name="penulis" value="<?= $buku->penulis ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penerbit</label>
                        <input type="text" name="penerbit" value="<?= $buku->penerbit ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Terbit</label>
                        <input type="number" name="tahun" value="<?= $buku->tahun ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stok</label>
                        <input type="number" name="stok" value="<?= $buku->stok ?>" class="form-control" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?= base_url('buku') ?>" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

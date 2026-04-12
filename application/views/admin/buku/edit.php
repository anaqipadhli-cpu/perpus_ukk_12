<?php $this->load->view('templates/header'); ?>

<div class="row">
    <div class="col-md-6">
        <h2 class="page-title mb-4"><i class="fas fa-edit"></i> Edit Buku</h2>

        <div class="card">
            <div class="card-body">
                <form method="post">
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

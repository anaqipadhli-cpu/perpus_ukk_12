<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title mb-0"><i class="fas fa-plus-circle"></i> Tambah Buku Baru</h2>
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
                        <input type="file" name="cover" class="form-control" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, GIF. Max: 2MB.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul buku" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penulis</label>
                        <input type="text" name="penulis" class="form-control" placeholder="Masukkan nama penulis" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" placeholder="Masukkan nama penerbit" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Terbit</label>
                        <input type="number" name="tahun" class="form-control" placeholder="2024" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="Jumlah stok" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?= base_url('buku') ?>" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
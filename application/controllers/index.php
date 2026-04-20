<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">

    <h3>📚 Kelola Buku</h3>

    <!-- TOMBOL -->
    <div class="mb-3">
        <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">← Kembali ke Dashboard</a>
        <a href="<?= base_url('buku/cetak') ?>" target="_blank" class="btn btn-success">🖨️ Cetak</a>
    </div>

    <!-- FILTER -->
    <form method="post" class="mb-3">
        <div class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari judul / penulis..." value="<?= $cari ?>">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <p>Total Buku: <b><?= $total ?></b></p>

    <!-- TABEL -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($buku)): ?>
            <?php $no=1; foreach ($buku as $b): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b->judul ?></td>
                    <td><?= $b->penulis ?></td>
                    <td><?= $b->penerbit ?></td>
                    <td><?= $b->tahun ?></td>
                    <td><?= $b->stok ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Data tidak ada</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>

<?php $this->load->view('templates/footer'); ?>
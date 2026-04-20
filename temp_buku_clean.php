<?php $this->load->view('templates/header'); ?>

<h3>Daftar Buku</h3>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Tahun</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php $no=1; foreach($buku as $b): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><strong><?= $b->judul ?></strong></td>
    <td><?= $b->penulis ?></td>
    <td><?= $b->penerbit ?></td>
    <td><?= $b->tahun ?></td>
    <td>
        <?php if($b->stok == 0): ?>
            <span class="badge bg-danger">Kosong</span>
        <?php elseif($b->stok <= 5): ?>
            <span class="badge bg-warning"><?= $b->stok ?> Stok</span>
        <?php else: ?>
            <span class="badge bg-success"><?= $b->stok ?> Stok</span>
        <?php endif; ?>
    </td>
    <td>
        <?php if($b->stok > 0): ?>
            <a href="<?= base_url('peminjaman/pinjam_single/'.$b->id) ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-book"></i> Pinjam
            </a>
        <?php else: ?>
            <span class="text-muted">Tidak tersedia</span>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php $this->load->view('templates/footer'); ?>
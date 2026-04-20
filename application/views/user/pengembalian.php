<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Pengembalian Buku</h3>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php $no=1; foreach($peminjaman as $p): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $p->tanggal_pinjam ?></td>
    <td><?= $p->tanggal_kembali ?></td>
    <td><?= $p->status ?></td>
    <td>
        <?php if($p->status == 'dipinjam'): ?>
            <a href="<?= base_url('pengembalian/kembalikan/'.$p->id) ?>" class="btn btn-warning btn-sm">
                Kembalikan
            </a>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php $this->load->view('templates/footer'); ?>
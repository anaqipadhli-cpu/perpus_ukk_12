<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Riwayat Denda</h3>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>ID Peminjaman</th>
    <th>Jumlah Denda</th>
    <th>Status</th>
</tr>

<?php $no=1; foreach($denda as $d): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d->peminjaman_id ?></td>
    <td>Rp <?= number_format($d->jumlah_denda) ?></td>
    <td><?= $d->status ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php $this->load->view('templates/footer'); ?> 
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<h3>Riwayat Denda</h3>

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
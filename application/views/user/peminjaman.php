<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<h3>Peminjaman Saya</h3>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
</tr>

<?php $no=1; foreach($peminjaman as $p): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $p->tanggal_pinjam ?></td>
    <td><?= $p->tanggal_kembali ?></td>
    <td><?= $p->status ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php $this->load->view('templates/footer'); ?>
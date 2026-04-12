<?php $this->load->view('templates/header'); ?>

<h3>Daftar Buku</h3>

<form method="post" action="<?= base_url('peminjaman/pinjam') ?>">
<table class="table">
<tr>
    <th>Pilih</th>
    <th>Judul</th>
    <th>Stok</th>
</tr>

<?php foreach($buku as $b): ?>
<tr>
    <td><input type="checkbox" name="buku_id[]" value="<?= $b->id ?>"></td>
    <td><?= $b->judul ?></td>
    <td><?= $b->stok ?></td>
</tr>
<?php endforeach; ?>
</table>

<input type="date" name="tanggal_kembali" class="form-control mb-2">
<button class="btn btn-success">Pinjam</button>
</form>

<?php $this->load->view('templates/footer'); ?>
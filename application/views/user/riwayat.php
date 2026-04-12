<?php $this->load->view('templates/header'); ?>

<h3>Riwayat Peminjaman</h3>

<table class="table">
<tr>
    <th>Tanggal</th>
    <th>Kembali</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php foreach($riwayat as $r): ?>
<tr>
    <td><?= $r->tanggal_pinjam ?></td>
    <td><?= $r->tanggal_kembali ?></td>
    <td><?= $r->status ?></td>
    <td>
        <?php if($r->status == 'dipinjam'): ?>
            <a href="<?= base_url('pengembalian/kembalikan/'.$r->id) ?>" class="btn btn-warning btn-sm">Kembalikan</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php $this->load->view('templates/footer'); ?>
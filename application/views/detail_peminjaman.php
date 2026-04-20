<h3>Detail Peminjaman</h3>

<table border="1" cellpadding="10">
<tr>
    <th>Nama User</th>
    <td><?= $detail->nama_user; ?></td>
</tr>

<tr>
    <th>Email</th>
    <td><?= $detail->email; ?></td>
</tr>

<tr>
    <th>Judul Buku</th>
    <td><?= $detail->judul; ?></td>
</tr>

<tr>
    <th>Penulis</th>
    <td><?= $detail->penulis; ?></td>
</tr>

<tr>
    <th>Penerbit</th>
    <td><?= $detail->penerbit; ?></td>
</tr>

<tr>
    <th>Tanggal Pinjam</th>
    <td><?= $detail->tanggal_pinjam; ?></td>
</tr>

<tr>
    <th>Tanggal Kembali</th>
    <td><?= $detail->tanggal_kembali; ?></td>
</tr>
</table>

<br>
<a href="<?= base_url('admin/peminjaman'); ?>">Kembali</a>
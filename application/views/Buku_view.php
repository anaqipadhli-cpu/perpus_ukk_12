<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h3>Data Buku</h3>

<!-- SEARCH -->
<form method="get">
    <input type="text" name="keyword" placeholder="Cari buku..." class="form-control mb-2">
    <button class="btn btn-primary">Cari</button>
</form>

<!-- JUMLAH -->
<h5>Total Buku: <?= $total_buku ?></h5>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Aksi</th>
</tr>

<?php $no=1; foreach($buku as $row){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row->judul ?></td>
    <td><?= $row->penulis ?></td>
    <td>
        <a href="<?= base_url('buku/cetak_kartu/'.$row->id) ?>" 
           class="btn btn-success btn-sm">Cetak Kartu</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
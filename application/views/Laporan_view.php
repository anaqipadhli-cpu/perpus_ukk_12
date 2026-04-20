<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="container mt-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Laporan</h1>
    <a href="<?= base_url('laporan/pdf') ?>" class="btn btn-primary">
        <i class="fas fa-file-pdf"></i> Export PDF
    </a>
</div>

<h3>Laporan Harian</h3>
<table class="table table-bordered">
<tr><th>No</th><th>Nama</th><th>Tanggal</th></tr>
<?php $no=1; foreach($harian as $row){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row->nama ?></td>
    <td><?= $row->tanggal ?></td>
</tr>
<?php } ?>
</table>

<h3>Laporan Mingguan</h3>
<table class="table table-bordered">
<tr><th>No</th><th>Nama</th><th>Tanggal</th></tr>
<?php $no=1; foreach($mingguan as $row){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row->nama ?></td>
    <td><?= $row->tanggal ?></td>
</tr>
<?php } ?>
</table>

<h3>Laporan Bulanan</h3>
<table class="table table-bordered">
<tr><th>No</th><th>Nama</th><th>Tanggal</th></tr>
<?php $no=1; foreach($bulanan as $row){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row->nama ?></td>
    <td><?= $row->tanggal ?></td>
</tr>
<?php } ?>
</table>

<h3>Laporan Tahunan</h3>
<table class="table table-bordered">
<tr><th>No</th><th>Nama</th><th>Tanggal</th></tr>
<?php $no=1; foreach($tahunan as $row){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row->nama ?></td>
    <td><?= $row->tanggal ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>
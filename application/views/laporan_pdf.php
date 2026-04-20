<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        h1, h3 { margin-top: 0; }
        .table { margin-bottom: 1.5rem; }
        @media print {
            .no-print { display: none !important; }
            .table { page-break-inside: avoid; }
        }
    </style>
</head>
<body onload="window.print()">
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h1 class="h4">Laporan Perpustakaan</h1>
        <span class="badge badge-secondary">PDF Ready</span>
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
</div>
</body>
</html>
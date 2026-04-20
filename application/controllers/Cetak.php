<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Buku</title>
    <style>
        body { font-family: Arial; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
    </style>
</head>
<body onload="window.print()">

<h3 style="text-align:center;">LAPORAN DATA BUKU</h3>

<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Stok</th>
    </tr>

    <?php $no=1; foreach ($buku as $b): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $b->judul ?></td>
        <td><?= $b->penulis ?></td>
        <td><?= $b->penerbit ?></td>
        <td><?= $b->tahun ?></td>
        <td><?= $b->stok ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
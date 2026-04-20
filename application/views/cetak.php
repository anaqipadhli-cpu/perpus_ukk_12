<!DOCTYPE html>
<html>
<head>
    <title>Kartu Siswa</title>
</head>
<body onload="window.print()">

<div style="width:350px; border:2px solid black; padding:15px;">

    <h3 style="text-align:center;">KARTU PERPUSTAKAAN</h3>

    <hr>

    <p>Nama: <?= $user->nama ?></p>
    <p>Email: <?= $user->email ?></p>
    <p>ID: <?= $user->id ?></p>

</div>

</body>
</html>
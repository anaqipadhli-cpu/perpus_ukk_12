<!DOCTYPE html>
<html>
<head>
    <title>Kartu Siswa</title>
    <style>
        body {
            font-family: Arial;
        }
        .card {
            width: 350px;
            border: 2px solid black;
            padding: 15px;
            text-align: center;
            margin: auto;
        }
        .judul {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .isi {
            text-align: left;
            margin-top: 10px;
        }
        .footer {
            margin-top: 15px;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="judul">KARTU SISWA</div>

    <div class="isi">
        <p><b>Nama:</b> <?= $user->nama; ?></p>
        <p><b>Email:</b> <?= $user->email; ?></p>
        <p><b>ID:</b> <?= $user->id; ?></p>
    </div>

    <div class="footer">
        Dicetak pada: <?= $tanggal; ?>
    </div>
</div>

</body>
</html>
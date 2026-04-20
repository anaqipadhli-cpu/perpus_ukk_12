<!DOCTYPE html>
<html>
<head>
    <title>Kartu Siswa</title>

    <style>
        body {
            font-family: Arial;
            background: hsl(0, 54%, 37%);
        }

        .card {
            width: 340px;
            height: 200px;
            border-radius: 15px;
            padding: 15px;
            color: white;
            margin: 40px auto;
            background: linear-gradient(135deg, #667eea, #764ba2);
            position: relative;
        }

        .foto {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            position: absolute;
            right: 15px;
            top: 15px;
            border: 2px solid white;
        }

        .nama {
            margin-top: 30px;
            font-size: 16px;
            font-weight: bold;
        }

        .id {
            font-size: 14px;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            font-size: 12px;
        }

        .btn {
            text-align: center;
            margin-top: 20px;
        }

        @media print {
            .btn {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="card">

    <h4>KARTU SISWA</h4>

    <img src="<?= base_url('assets/foto/'.$siswa->foto) ?>" class="foto">

    <div class="nama"><?= $siswa->nama ?></div>
    <div>Email: <?= $siswa->email ?></div>
    <div class="id">ID: <?= $siswa->id ?></div>

    <div class="footer">
        Dicetak: <?= date('d-m-Y') ?>
    </div>

</div>

<div class="btn">
    <button onclick="window.print()">Cetak / Save PDF</button>
</div>

</body>
</html>
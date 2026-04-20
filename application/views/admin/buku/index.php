<!DOCTYPE html>
<html>
<head>
<title>Kelola Buku Admin</title>

<style>
body{
font-family:Arial;
background:#f4f6f9;
padding:30px;
}

.container{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px #ddd;
}

h2{
margin-bottom:20px;
}

.dashboard{
display:flex;
gap:20px;
margin-bottom:30px;
}

.card{
background:#007bff;
color:white;
padding:20px;
width:220px;
border-radius:10px;
text-align:center;
}

.btn{
padding:8px 14px;
color:white;
text-decoration:none;
border-radius:5px;
}

.tambah{
background:green;
}

.edit{
background:orange;
}

.hapus{
background:red;
}

.filterbtn{
background:blue;
border:none;
cursor:pointer;
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

th{
background:#343a40;
color:white;
padding:12px;
}

td{
padding:10px;
border-bottom:1px solid #ddd;
}

input{
padding:10px;
width:250px;
}
</style>

</head>
<body>

<div class="container">

<h2>Dashboard Admin Perpustakaan</h2>

<div class="dashboard">
<div class="card">
<h3><?= isset($buku) ? count($buku) : 0; ?></h3>
<p>Total Buku</p>
</div>
</div>

<hr>

<h2>Kelola Buku</h2>

<a href="<?= base_url('buku/tambah'); ?>" class="btn tambah">
+ Tambah Buku
</a>

<br><br>

<form method="get" action="<?= base_url('buku'); ?>">
<input
type="text"
name="keyword"
placeholder="Cari judul buku..."
value="<?= $this->input->get('keyword'); ?>"
>

<button type="submit" class="btn filterbtn">
Filter
</button>

</form>

<table>

<tr>
<th>No</th>
<th>Cover</th>
<th>Judul</th>
<th>Penulis</th>
<th>Penerbit</th>
<th>Tahun</th>
<th>Aksi</th>
</tr>

<?php if(!empty($buku)){ ?>

<?php
$no=1;
foreach($buku as $row){
?>

<tr>

<td><?= $no++; ?></td>

<td>
    <?php if($row->cover): ?>
        <img src="<?= base_url('assets/uploads/covers/'.$row->cover) ?>" width="50" class="img-thumbnail">
    <?php else: ?>
        <span class="text-muted small">No Cover</span>
    <?php endif; ?>
</td>

<td><?= $row->judul; ?></td>

<td><?= $row->penulis; ?></td>

<td><?= $row->penerbit; ?></td>

<td><?= $row->tahun; ?></td>

<td>

<a href="<?= base_url('buku/edit/'.$row->id); ?>"
class="btn edit">
Edit
</a>

<a href="<?= base_url('buku/hapus/'.$row->id); ?>"
class="btn hapus"
onclick="return confirm('Yakin hapus data?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

<?php } else { ?>

<tr>
<td colspan="7" align="center">
Data buku belum ada
</td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
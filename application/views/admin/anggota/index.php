<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Kelola Anggota Admin</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f4f6f9;
}

.wrapper{
width:90%;
margin:30px auto;
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 0 15px rgba(0,0,0,0.1);
}

h2{
margin-bottom:20px;
color:#2c3e50;
}

.dashboard{
display:flex;
gap:20px;
margin-bottom:30px;
}

.card{
flex:1;
padding:25px;
border-radius:10px;
color:white;
}

.blue{
background:#3498db;
}

.green{
background:#2ecc71;
}

.card h3{
font-size:35px;
margin:0;
}

.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.btn{
padding:10px 15px;
border-radius:6px;
text-decoration:none;
color:white;
font-weight:bold;
}

.tambah{
background:#27ae60;
}

.edit{
background:#f39c12;
}

.hapus{
background:#e74c3c;
}

.filter input{
padding:10px;
width:250px;
border:1px solid #ccc;
border-radius:5px;
}

.filter button{
padding:10px 15px;
background:#3498db;
color:white;
border:none;
border-radius:5px;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#3498db;
color:white;
padding:12px;
}

table td{
padding:12px;
border-bottom:1px solid #ddd;
text-align:center;
}

tr:hover{
background:#f9f9f9;
}

</style>
</head>

<body>

<div class="wrapper">

<h2>Kelola Data Anggota</h2>

<!-- DASHBOARD -->
<div class="dashboard">

<div class="card blue">
<h4>Total Anggota</h4>
<h3><?= isset($anggota) ? count($anggota) : 0; ?></h3>
</div>

<div class="card green">
<h4>Anggota Aktif</h4>
<h3><?= isset($anggota) ? count($anggota) : 0; ?></h3>
</div>

</div>


<!-- TOP BAR -->
<div class="topbar">

<a href="<?= site_url('anggota/tambah'); ?>" class="btn tambah">
+ Tambah Anggota
</a>

<form method="get" action="<?= site_url('anggota'); ?>" class="filter">

<input
type="text"
name="keyword"
placeholder="Cari anggota..."
value="<?= $this->input->get('keyword'); ?>">

<button type="submit">
Filter
</button>

</form>

</div>


<!-- TABEL -->
<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Alamat</th>
<th>No HP</th>
<th>Aksi</th>
</tr>

<?php if(!empty($anggota)){ ?>

<?php
$no=1;
foreach($anggota as $a){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $a->nama; ?></td>

<td><?= $a->email; ?></td>

<td><?= $a->alamat; ?></td>

<td><?= $a->no_hp; ?></td>

<td>

<a
href="<?= site_url('anggota/edit/'.$a->id); ?>"
class="btn edit">
Edit
</a>

<a
href="<?= site_url('anggota/hapus/'.$a->id); ?>"
class="btn hapus"
onclick="return confirm('Yakin hapus data ini?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

<?php }else{ ?>

<tr>
<td colspan="6">
Data anggota belum ada
</td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin</title>
<style>

body{
font-family:Arial;
background:#f4f4f4;
text-align:center;
}

.container{
margin-top:50px;
}

.box{
display:inline-block;
width:250px;
padding:30px;
margin:20px;
background:white;
border-radius:10px;
box-shadow:0 0 10px rgb(12, 21, 153);
}

a{
text-decoration:none;
}

button{
padding:15px 30px;
font-size:18px;
}

</style>
</head>
<body>

<h1>DASHBOARD ADMIN PERPUSTAKAAN</h1>

<div class="container">

<div class="box">
<h2>Kelola Buku</h2>

<a href="<?= site_url('buku'); ?>">
<button>Masuk</button>
</a>

</div>


<div class="box">
<h2>Data Anggota</h2>

<a href="<?= site_url('anggota'); ?>">
<button>Masuk</button>
</a>

</div>


<div class="box">
<h2>Data Peminjaman</h2>

<a href="<?= site_url('peminjaman'); ?>">
<button>Masuk</button>
</a>

</div>

</div>

<br><br>

<a href="<?= site_url('auth/logout'); ?>">
<button>Logout</button>
</a>

</body>
</html>
<?php
$laporan  = $laporan ?? [];
$pending  = $pending ?? 0;
$diproses = $diproses ?? 0;
$selesai  = $selesai ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Petugas Panel</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">

    <div class="brand">
        <img src="<?= base_url('img/logo.png') ?>">
        <h2>Lapor<span class="accent">Cepat</span></h2>
        <small>PETUGAS PANEL</small>
    </div>

    <a href="<?= base_url('admin/index') ?>">
        <i class="fa fa-home"></i>
        Dashboard
    </a>

    <a href="<?= base_url('admin/laporan') ?>">
        <i class="fa fa-file"></i> 
        Data Laporan
    </a>


    <a href="<?= base_url('admin/user') ?>">
        <i class="fa fa-users"></i> 
        Users
    </a>



    <a href="<?= base_url('logout') ?>"
        class="logout"
        onclick="return confirm('Apakah Anda yakin ingin keluar?')">
        <i class="fa fa-right-from-bracket"></i> Keluar
    </a>

</div>





<style>

/* ================= RESET ================= */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI, sans-serif;
}

body{
background:#f4f6fb;
color:#1e1e1e;
}

/* ================= SIDEBAR ================= */
.sidebar{
position:fixed;
left:0;
top:0;
width:240px;
height:100vh;
background:#002b78;
color:white;
padding:20px;
display:flex;
flex-direction:column;
gap:12px;
}

.sidebar .brand{
text-align:center;
margin-bottom:20px;
}

.sidebar .brand img{
width:70px;
}

.sidebar a{
color:white;
text-decoration:none;
padding:10px;
border-radius:10px;
display:flex;
gap:10px;
align-items:center;
font-size:14px;
transition:.3s;
}

.sidebar a:hover{
background:#ff9735;
transform:translateX(5px);
}

.logout{
margin-top:auto;
background:#e74c3c;
}

.brand h2{
    font-size:18px;
}

.brand .accent{
    color:#ff9735;
}

/* ================= ACTION BAR ================= */
.action-bar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
flex-wrap:wrap;
gap:10px;
}





/* ================= RESPONSIVE ================= */
@media(max-width:900px){

.sidebar{
width:70px;
}

.sidebar h2,
.sidebar small,
.sidebar a span{
display:none;
}

.main{
margin-left:70px;
}

.stat-grid{
grid-template-columns:repeat(2,1fr);
}

.card{
flex-direction:column;
}

.card img{
width:100%;
height:180px;
}

}

</style>
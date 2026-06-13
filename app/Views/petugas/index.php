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
        <h2>LaporCepat</h2>
        <small>PETUGAS PANEL</small>
    </div>

    <a href="<?= base_url('petugas') ?>"><i class="fa fa-home"></i> Dashboard</a>
    <a href="#laporan"><i class="fa fa-inbox"></i> Laporan Masuk</a>
    <a href="#diproses"><i class="fa fa-spinner"></i> Diproses</a>
    <a href="#selesai"><i class="fa fa-check"></i> Selesai</a>

    <a href="<?= base_url('logout') ?>" class="logout">
        <i class="fa fa-right-from-bracket"></i> Logout
    </a>

</div>

<!-- ================= MAIN ================= -->
<div class="main">

    <!-- HEADER -->
    <div class="topbar">

        <div>
            <h2>Dashboard Petugas</h2>
            <p>Kelola laporan masyarakat dengan cepat</p>
        </div>

        <div class="badge">
            <i class="fa fa-bell"></i>
            <?= $pending ?> laporan baru
        </div>

    </div>


    <!-- ================= STATISTIK ================= -->
<div class="stat-grid">

    <div class="stat-card">
        <i class="fa-solid fa-layer-group"></i>
        <div>
            <h3><?= $laporan ? count($laporan) : 0 ?></h3>
            <span>Total</span>
        </div>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-clock"></i>
        <div>
            <h3><?= $pending ?></h3>
            <span>Pending</span>
        </div>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-gear"></i>
        <div>
            <h3><?= $diproses ?></h3>
            <span>Diproses</span>
        </div>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-circle-check"></i>
        <div>
            <h3><?= $selesai ?></h3>
            <span>Selesai</span>
        </div>
    </div>

</div>

<!-- ================= FILTER + SEARCH ================= -->
<div class="action-bar">

    <!-- FILTER -->
    <div class="filter">
        <a href="<?= base_url('petugas') ?>">Semua</a>
        <a href="<?= base_url('petugas?status=Pending') ?>">Pending</a>
        <a href="<?= base_url('petugas?status=Diproses') ?>">Diproses</a>
        <a href="<?= base_url('petugas?status=Selesai') ?>">Selesai</a>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="search">
        <input type="text" name="keyword" placeholder="Cari laporan...">
        <button><i class="fa fa-search"></i></button>
    </form>

</div>

<!-- ================= LIST LAPORAN ================= -->
<div class="list" id="laporan">

<?php if (!empty($laporan)): ?>

    <?php foreach($laporan as $l): ?>

        <div class="card">

            <!-- FOTO -->
            <div class="img">
                <img src="<?= base_url('uploads/'.$l['foto']) ?>">
            </div>

            <!-- CONTENT -->
            <div class="content">

                <div class="top">
                    <h3><?= esc($l['judul'] ?? '-') ?></h3>

                    <span class="status <?= strtolower($l['status'] ?? 'pending') ?>">
                        <?= esc($l['status'] ?? 'Pending') ?>
                    </span>
                </div>

                <p>
                    <i class="fa fa-user"></i>
                    <?= esc($l['nama'] ?? '-') ?>
                </p>

                <p>
                    <i class="fa fa-layer-group"></i>
                    <?= esc($l['nama_layanan'] ?? '-') ?>
                </p>

                <p>
                    <i class="fa fa-location-dot"></i>
                    <?= esc($l['lokasi'] ?? '-') ?>
                </p>

                <p class="desc">
                    <?= character_limiter(strip_tags($l['deskripsi'] ?? ''), 100) ?>
                </p>

                <!-- ACTION BUTTON -->
                <div class="btn-group">

                    <a href="<?= base_url('petugas?id='.$l['id_laporan']) ?>" class="btn blue">
                        Detail
                    </a>

                    <a href="<?= base_url('petugas/proses/'.$l['id_laporan']) ?>" class="btn orange">
                        Proses
                    </a>

                    <a href="<?= base_url('petugas/selesai/'.$l['id_laporan']) ?>" class="btn green">
                        Selesai
                    </a>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <div class="empty">
        <i class="fa fa-folder-open"></i>
        <p>Tidak ada laporan masuk</p>
    </div>

<?php endif; ?>

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
width:55px;
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

/* ================= MAIN ================= */
.main{
margin-left:240px;
padding:20px;
}

/* ================= TOPBAR ================= */
.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.topbar h2{
color:#002b78;
}

.topbar p{
color:#666;
font-size:13px;
}

.badge{
background:#ff9735;
color:white;
padding:8px 14px;
border-radius:20px;
display:flex;
gap:8px;
align-items:center;
font-size:13px;
}

/* ================= STAT ================= */
.stat-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:15px;
margin-bottom:20px;
}

.stat-card{
background:white;
padding:15px;
border-radius:15px;
display:flex;
gap:12px;
align-items:center;
box-shadow:0 6px 18px rgba(0,0,0,.06);
transition:.3s;
}

.stat-card:hover{
transform:translateY(-3px);
}

.stat-card i{
width:42px;
height:42px;
display:flex;
align-items:center;
justify-content:center;
border-radius:10px;
color:white;
}

.stat-card:nth-child(1) i{background:#2f80ed;}
.stat-card:nth-child(2) i{background:#ff9735;}
.stat-card:nth-child(3) i{background:#9b59b6;}
.stat-card:nth-child(4) i{background:#27ae60;}

/* ================= ACTION BAR ================= */
.action-bar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
flex-wrap:wrap;
gap:10px;
}

/* FILTER */
.filter{
display:flex;
gap:10px;
flex-wrap:wrap;
}

.filter a{
padding:7px 14px;
background:white;
border-radius:20px;
text-decoration:none;
font-size:13px;
color:#333;
box-shadow:0 3px 10px rgba(0,0,0,.05);
transition:.3s;
}

.filter a:hover{
background:#ff9735;
color:white;
}

/* SEARCH */
.search{
display:flex;
gap:10px;
}

.search input{
padding:8px 12px;
border:1px solid #ddd;
border-radius:10px;
outline:none;
}

.search button{
background:#002b78;
color:white;
border:none;
padding:8px 12px;
border-radius:10px;
cursor:pointer;
}

/* ================= LIST ================= */
.list{
display:flex;
flex-direction:column;
gap:15px;
}

/* CARD */
.card{
display:flex;
gap:15px;
background:white;
padding:15px;
border-radius:18px;
box-shadow:0 6px 18px rgba(0,0,0,.06);
transition:.3s;
}

.card:hover{
transform:scale(1.01);
}

.card img{
width:140px;
height:110px;
object-fit:cover;
border-radius:12px;
}

.content{
flex:1;
}

.top{
display:flex;
justify-content:space-between;
align-items:center;
}

.top h3{
font-size:16px;
color:#002b78;
}

/* ================= STATUS ================= */
.status{
padding:5px 10px;
border-radius:20px;
font-size:11px;
font-weight:600;
}

.pending{background:#fff0df;color:#ff9735;}
.diproses{background:#eaf2ff;color:#2f80ed;}
.selesai{background:#e9f8ef;color:#27ae60;}

/* ================= BUTTON ================= */
.btn-group{
margin-top:10px;
display:flex;
gap:8px;
flex-wrap:wrap;
}

.btn{
padding:6px 10px;
border-radius:8px;
text-decoration:none;
font-size:11px;
color:white;
}

.blue{background:#2f80ed;}
.orange{background:#ff9735;}
.green{background:#27ae60;}

/* ================= EMPTY ================= */
.empty{
text-align:center;
padding:40px;
color:#777;
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
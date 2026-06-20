<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel - LaporCepat</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<?php
$laporan = $laporan ?? [];
$user = $user ?? [];
$notifikasi = $notifikasi ?? [];
?>

<!-- ================= SIDEBAR ================= -->
<?php
$current = uri_string();
?>

<div class="sidebar">

    <div class="brand">
        <img src="<?= base_url('img/logo.png') ?>">
        <h2>LaporCepat</h2>
        <small>ADMIN PANEL</small>
    </div>

    <a href="<?= base_url('admin') ?>" class="<?= ($current == 'admin') ? 'active' : '' ?>">
        <i class="fa fa-home"></i> Dashboard
    </a>

    <a href="<?= base_url('admin/laporan') ?>" class="<?= (str_contains($current,'laporan')) ? 'active' : '' ?>">
        <i class="fa fa-file"></i> Laporan
    </a>

    <a href="<?= base_url('admin/user') ?>" class="<?= (str_contains($current,'user')) ? 'active' : '' ?>">
        <i class="fa fa-users"></i> User
    </a>

    <a href="<?= base_url('admin/notifikasi') ?>" class="<?= (str_contains($current,'notifikasi')) ? 'active' : '' ?>">
        <i class="fa fa-bell"></i> Notifikasi
    </a>

    <a href="<?= base_url('logout') ?>"
        class="logout"
        onclick="return confirm('Apakah Anda yakin ingin keluar?')">
        <i class="fa fa-right-from-bracket"></i> Keluar
    </a>

</div>
<!-- ================= MAIN ================= -->
<div class="main">

    <div class="topbar">

    <h2>Dashboard Admin</h2>

    <div class="right">

        <a href="<?= base_url('admin/notifikasi') ?>" class="notif">
            <i class="fa fa-bell"></i>

            <?php if($jumlah_notifikasi > 0): ?>
                <span><?= $jumlah_notifikasi ?></span>
            <?php endif; ?>
        </a>

        <div class="profile">

            <div class="avatar">
                <?= strtoupper(substr(session('nama'), 0, 1)) ?>
            </div>

                <span>
                    <?= session('nama') ?>
                        <i class="fa fa-chevron-down"></i>
                </span>

            <div class="profile-menu">

                <a href="<?= base_url('admin') ?>">
                    <i class="fa fa-home"></i> Dashboard
                </a>

                <a href="<?= base_url('admin/ganti-password') ?>">
                    <i class="fa fa-lock"></i> Ganti Password
                </a>

                <a href="<?= base_url('logout') ?>">
                    <i class="fa fa-right-from-bracket"></i> Logout
                </a>

            </div>

        </div>

    </div>

</div>

    <!-- ================= STAT ================= -->
<div class="stats">

    <div class="card blue">
        <i class="fa fa-file"></i>
        <div>
            <h3><?= $total ?></h3>
            <p>Laporan</p>
        </div>
    </div>

    <div class="card orange">
        <i class="fa fa-clock"></i>
        <div>
            <h3><?= $menunggu ?></h3>
            <p>Menunggu</p>
        </div>
    </div>

    <div class="card green">
        <i class="fa fa-gear"></i>
        <div>
            <h3><?= $diproses ?></h3>
            <p>Diproses</p>
        </div>
    </div>

    <div class="card red">
        <i class="fa fa-check"></i>
        <div>
            <h3><?= $selesai ?></h3>
            <p>Selesai</p>
        </div>
    </div>

</div>

    <!-- ================= CONTENT ================= -->
<!-- ================= CONTENT ================= -->
<div class="content">

    <div class="content-head">

        <h3>Data Laporan Masuk</h3>

        <form method="GET" class="search">
            <input
                type="text"
                name="keyword"
                placeholder="Cari judul, layanan, lokasi, status..."
                value="<?= esc($_GET['keyword'] ?? '') ?>">

            <?php if (!empty($_GET['status'])) : ?>
                <input
                    type="hidden"
                    name="status"
                    value="<?= esc($_GET['status']) ?>">
            <?php endif; ?>

            <button type="submit">
                <i class="fa fa-search"></i>
            </button>

        </form>

    </div>

    <!-- FILTER -->
    <div class="filter">

        <a href="<?= base_url('admin') ?>">Semua</a>
        <a href="<?= base_url('admin?status=menunggu') ?>">Menunggu</a>
        <a href="<?= base_url('admin?status=Diproses') ?>">Diproses</a>
        <a href="<?= base_url('admin?status=Selesai') ?>">Selesai</a>

    </div>

    <!-- TABLE LAPORAN -->
    <div class="table">

        <table>

            <tr>
                <th>Judul</th>
                <th>Layanan</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>

            <?php if (!empty($laporan)) { ?>

                <?php foreach ($laporan as $l) { ?>

                    <tr>

                        <td><?= esc($l['judul'] ?? '-') ?></td>

                        <td><?= esc($l['nama_layanan'] ?? '-') ?></td>

                        <td><?= esc($l['lokasi'] ?? '-') ?></td>

                        <td>
                            <span class="badge <?= strtolower($l['status'] ?? 'pending') ?>">
                                <?= esc($l['status'] ?? 'Pending') ?>
                            </span>
                        </td>

                        <td>
                            <?= date('d M Y', strtotime($l['created_at'] ?? date('Y-m-d'))) ?>
                        </td>

                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="6" style="text-align:center;padding:20px;">
                        Tidak ada laporan
                    </td>
                </tr>

            <?php } ?>

        </table>

    </div>

</div>

<!-- ================= USER TERBARU ================= -->
<div class="section-box">

    <h3>User</h3>

    <div class="user-list">

        <?php if (!empty($user)) { ?>

            <?php foreach($user as $u) { ?>

                <div class="user-card">

                    <div class="avatar">
                        <?= strtoupper(substr($u['nama'] ?? 'U', 0, 1)) ?>
                    </div>

                    <div class="info">
                        <b><?= esc($u['nama'] ?? '-') ?></b><br>
                        <small>Email: <?= esc($u['email'] ?? '-') ?></small><br>
                        <small>Role: <?= esc($u['role'] ?? '-') ?></small><br>
                        <small>No Hp: <?= esc($u['no_hp'] ?? '_') ?></small><br>
                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <p>Tidak ada user</p>

        <?php } ?>

    </div>

</div>


<!-- ================= NOTIFIKASI ================= -->
<div class="section-box">

    <h3>Notifikasi</h3>

    <div class="notif-list">

        <?php if (!empty($notifikasi)) { ?>

            <?php foreach($notifikasi as $n) { ?>

                <div class="notif-item <?= ($n['status_baca'] ?? 0) == 0 ? 'new' : '' ?>">

                    <i class="fa fa-circle-info"></i>

                    <div>
                        <p><?= esc($n['pesan'] ?? '-') ?></p>
                        <small><?= esc($n['created_at'] ?? '-') ?></small>
                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <p>Tidak ada notifikasi</p>

        <?php } ?>

    </div>

</div>
<!-- ================= CSS (PAKAI PALING BAWAH) ================= -->
<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI, sans-serif;
}

body{
background:#f4f6fb;
display:flex;
}

/* PROFILE */
.profile{
    position:relative;
    display:flex;
    align-items:center;
    gap:10px;
    cursor:pointer;
}

.profile span{
    font-weight:600;
    color:#333;
}

/* MENU DROPDOWN */
.profile-menu{
    display:none;
    position:absolute;
    top:50px;
    right:0;
    width:200px;
    background:#fff;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    overflow:hidden;
    z-index:1000;
}

.profile-menu a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px 15px;
    color:#333;
    text-decoration:none;
    transition:.3s;
}

.profile-menu a:hover{
    background:#f4f6fb;
    color:#002b78;
    
}

.profile-menu.show{
    display:block;
}



/* SIDEBAR */
.sidebar{
width:240px;
height:100vh;
background:#002b78;
color:white;
padding:20px;
position:fixed;
display:flex;
flex-direction:column;
gap:15px;
}

.brand{
text-align:center;
margin-bottom:20px;
}

.brand img{
width:55px;
}

.brand h2{
font-size:18px;
}

.brand small{
opacity:.7;
font-size:11px;
}

.sidebar a{
color:white;
text-decoration:none;
padding:10px;
border-radius:8px;
display:flex;
gap:10px;
align-items:center;
font-size:14px;
transition:.3s;
}

.sidebar a:hover{
background:#ff9735;
}

.active{
background:#ff9735;
}

.logout{
margin-top:auto;
background:#e74c3c;
}

/* MAIN */
.main{
margin-left:240px;
width:100%;
padding:20px;
}

/* TOPBAR */
.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.right{
display:flex;
align-items:center;
gap:20px;
}

/* NOTIF */
.notif{
position:relative;
font-size:20px;
cursor:pointer;
}

.notif span{
position:absolute;
top:-8px;
right:-10px;
background:red;
color:white;
font-size:11px;
width:18px;
height:18px;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
}

/* PROFILE */
.profile{
display:flex;
align-items:center;
gap:10px;
}

.avatar{
width:35px;
height:35px;
border-radius:50%;
background:#ff9735;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-weight:bold;
}

/* STATS */
.stats{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:15px;
margin-bottom:20px;
}

.card{
background:white;
padding:15px;
border-radius:12px;
display:flex;
gap:10px;
align-items:center;
box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.card i{
width:40px;
height:40px;
display:flex;
align-items:center;
justify-content:center;
border-radius:10px;
color:white;
}

.blue i{background:#2f80ed;}
.orange i{background:#ff9735;}
.green i{background:#27ae60;}
.red i{background:#e74c3c;}

/* CONTENT */
.content{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,.05);
}

/* CONTENT HEADER */
.content-head{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:15px;
}

.search{
display:flex;
gap:10px;
}

.search input{
padding:8px;
border:1px solid #ddd;
border-radius:8px;
outline:none;
}

.search button{
background:#002b78;
color:white;
border:none;
padding:8px 12px;
border-radius:8px;
cursor:pointer;
}

/* FILTER */
.filter{
display:flex;
gap:10px;
margin-bottom:15px;
flex-wrap:wrap;
}

.filter a{
padding:6px 12px;
background:#eee;
border-radius:20px;
text-decoration:none;
color:#333;
font-size:13px;
}

.filter a:hover{
background:#ff9735;
color:white;
}

/* TABLE */
.table{
overflow-x:auto;
}

table{
width:100%;
table-layout:fixed;
border-collapse:collapse;
background:white;
border-radius:10px;
overflow:hidden;
}

th{
background:#002b78;
color:white;
padding:10px;
font-size:13px;
}

td{
padding:10px;
font-size:13px;
border-bottom:1px solid #eee;
overflow:hidden;
text-overflow:ellipsis;
white-spice:nowrap;
text-align:center;
}

.badge{
padding:5px 10px;
border-radius:20px;
font-size:11px;
}

.pending{
background:#fff0df;
color:#ff9735;
}

.diproses{
background:#eaf2ff;
color:#2f80ed;
}

.selesai{
background:#e9f8ef;
color:#27ae60;
}

/* BUTTON AKSI */
.aksi{
display:flex;
gap:5px;
}

.btn{
padding:5px 8px;
border-radius:6px;
text-decoration:none;
font-size:11px;
}


/* SECTION BOX */
.section-box{
margin-top:20px;
background:white;
padding:15px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.section-box h3{
margin-bottom:10px;
color:#002b78;
}

/* USER */
.user-list{
display:flex;
flex-direction:column;
gap:10px;
}

.user-card{
display:flex;
align-items:center;
gap:10px;
padding:10px;
border-bottom:1px solid #eee;
}

.user-card .avatar{
width:35px;
height:35px;
border-radius:50%;
background:#ff9735;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-weight:bold;
}

/* NOTIF */
.notif-list{
display:flex;
flex-direction:column;
gap:10px;
}

.notif-item{
display:flex;
gap:10px;
padding:10px;
border-bottom:1px solid #eee;
font-size:13px;
}

.notif-item i{
color:#2f80ed;
margin-top:3px;
}

.notif-item.new{
background:#fff7e6;
}

</style>


<script>
const profile = document.querySelector('.profile');
const menu = document.querySelector('.profile-menu');

profile.addEventListener('click', function(e){
    e.stopPropagation();
    menu.classList.toggle('show');
});

document.addEventListener('click', function(){
    menu.classList.remove('show');
});
</script>

</body>
</html>
<?= $this->include('home/header') ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Laporan Saya - Lapor Cepat</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="container">

    <!-- TITLE -->
    <div class="title-box">

        <div>
            <h1>Laporan Saya</h1>
            <p>Pantau seluruh laporan yang Anda kirim</p>
        </div>

        <a href="<?= base_url('buat_laporan') ?>" class="btn-orange">
            <i class="fa-solid fa-plus"></i>
            Buat Laporan
        </a>

    </div>

    <!-- STATISTIK -->
    <div class="stat-grid">

        <div class="stat-card">
            <i class="fa-solid fa-file-lines"></i>
            <div>
                <h3><?= $total_laporan ?? 0 ?></h3>
                <span>Total</span>
            </div>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-clock"></i>
            <div>
                <h3><?= $menunggu ?? 0 ?></h3>
                <span>Menunggu</span>
            </div>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-gear"></i>
            <div>
                <h3><?= $diproses ?? 0 ?></h3>
                <span>Diproses</span>
            </div>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-circle-check"></i>
            <div>
                <h3><?= $selesai ?? 0 ?></h3>
                <span>Selesai</span>
            </div>
        </div>

    </div>

    <!-- FILTER -->
    <?php $statusAktif = $_GET['status'] ?? ''; ?>
    <div class="filter">
        <a href="<?= base_url('laporan') ?>"
            class="<?= $statusAktif == '' ? 'active' : '' ?>">
            Semua
        </a>

        <a href="<?= base_url('laporan?status=Menunggu') ?>"
            class="<?= $statusAktif == 'Menunggu' ? 'active' : '' ?>">
            Menunggu
        </a>

        <a href="<?= base_url('laporan?status=Diproses') ?>"
            class="<?= $statusAktif == 'Diproses' ? 'active' : '' ?>">
            Diproses
        </a>

        <a href="<?= base_url('laporan?status=Selesai') ?>"
            class="<?= $statusAktif == 'Selesai' ? 'active' : '' ?>">
            Selesai
        </a>

    </div>

    <!-- SEARCH -->
    <form method="GET" class="search-box">

        <i class="fa-solid fa-search"></i>

        <input type="text"
        name="keyword"
        placeholder="Cari laporan..."
        value="<?= esc($_GET['keyword'] ?? '') ?>">

        <button type="submit">Cari</button>

    </form>

    <!-- LIST LAPORAN -->
    <div class="list">

        <?php if (!empty($laporan)): ?>

            <?php foreach ($laporan as $row): ?>

            <div class="card">

                <div class="img-box">
                    <img src="<?= base_url('uploads/'.$row['foto']) ?>">
                </div>

                <div class="content">

                    <div class="top">
                        <h3><?= esc($row['judul']) ?></h3>

                        <span class="status <?= strtolower($row['status']) ?>">
                            <?= esc($row['status']) ?>
                        </span>
                    </div>

                    <p class="meta">
                        <i class="fa-solid fa-layer-group"></i>
                        <?= esc($row['nama_layanan']) ?>
                    </p>

                    <p class="meta">
                        <i class="fa-solid fa-location-dot"></i>
                        <?= esc($row['lokasi']) ?>
                    </p>

                    <p class="meta">
                        <i class="fa-solid fa-calendar"></i>
                        <?= date('d M Y', strtotime($row['created_at'])) ?>
                    </p>

                    <p class="desc">
                        <?= character_limiter(strip_tags($row['deskripsi']), 120) ?>
                    </p>

                    <div class="btn-group">

                        <a href="<?= base_url('laporan/detail/'.$row['id_laporan']) ?>" class="btn-blue">
                            Detail
                        </a>

                        <a href="<?= base_url('laporan/hapus/'.$row['id_laporan']) ?>" class="btn-merah"
                            onclick="return confirm('Yakin ingin menghapus laporan ini ? ')">
                            hapus
                        </a>

                    </div>

                </div>

            </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty">
                <i class="fa-solid fa-folder-open"></i>
                <h3>Belum ada laporan</h3>
                <a href="<?= base_url('buat_laporan') ?>">Buat Laporan</a>
            </div>

        <?php endif; ?>

    </div>

</div>

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI,sans-serif;
}

body{
background:#f5f7fb;
}

/* CONTAINER */
.container{
width:90%;
max-width:1200px;
margin:30px auto;
}

/* TITLE */
.title-box{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.title-box h1{
color:#163b79;
}

.title-box p{
color:#666;
font-size:14px;
}

.btn-orange{
background:#ff9735;
color:#fff;
padding:10px 18px;
border-radius:50px;
text-decoration:none;
font-size:13px;
}

/* STAT */
.stat-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:15px;
margin-bottom:20px;
}

.stat-card{
background:#fff;
padding:15px;
border-radius:15px;
display:flex;
gap:12px;
align-items:center;
box-shadow:0 8px 20px rgba(0,0,0,.06);
}

.stat-card i{
background:#2f80ed;
color:#fff;
width:40px;
height:40px;
display:flex;
align-items:center;
justify-content:center;
border-radius:10px;
}

/* FILTER */
.filter{
display:flex;
gap:10px;
margin-bottom:20px;
flex-wrap:wrap;
}

.filter a{
padding:8px 14px;
background:#fff;
border-radius:20px;
text-decoration:none;
color:#163b79;
font-size:13px;
box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.filter a.active{
background:#163b79;
color:#fff;
}

/* SEARCH */
.search-box{
display:flex;
background:#fff;
padding:10px;
border-radius:15px;
margin-bottom:20px;
gap:10px;
align-items:center;
box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.search-box input{
flex:1;
border:none;
outline:none;
}

.search-box button{
background:#163b79;
color:#fff;
border:none;
padding:10px 15px;
border-radius:10px;
cursor:pointer;
}

/* LIST */
.list{
display:flex;
flex-direction:column;
gap:15px;
}

.card{
display:flex;
gap:15px;
background:#fff;
padding:15px;
border-radius:18px;
box-shadow:0 8px 20px rgba(0,0,0,.06);
}

.img-box img{
width:160px;
height:120px;
object-fit:cover;
border-radius:12px;
}

.content{
flex:1;
}

.top{
display:flex;
justify-content:space-between;
}

.top h3{
color:#163b79;
font-size:16px;
}

.status{
padding:5px 10px;
border-radius:20px;
font-size:11px;
}

.pending{background:#fff0df;color:#ff9735;}
.diproses{background:#eaf2ff;color:#2f80ed;}
.selesai{background:#e9f8ef;color:#27ae60;}

.meta{
font-size:13px;
color:#555;
margin-top:5px;
}

.meta i{
color:#163b79;
margin-right:5px;
}

.desc{
margin-top:10px;
font-size:13px;
color:#666;
line-height:1.6;
}

.btn-group{
margin-top:12px;
display:flex;
gap:10px;
}

.btn-blue{
background:#163b79;
color:#fff;
padding:8px 14px;
border-radius:10px;
text-decoration:none;
font-size:12px;
}

.btn-merah{
    background: #ff0303;
    color: #fff;
    padding:8px 14px;
    border-radius: 10px;
    text-decoration:none;
    font-size:12px;
}

.btn-orange{
background:#ff9735;
color:#fff;
padding:8px 14px;
border-radius:10px;
text-decoration:none;
font-size:12px;
}

/* EMPTY */
.empty{
text-align:center;
padding:60px;
background:#fff;
border-radius:20px;
}

.empty i{
font-size:50px;
color:#2f80ed;
margin-bottom:10px;
}

.empty a{
display:inline-block;
margin-top:10px;
background:#ff9735;
padding:10px 20px;
border-radius:50px;
color:#fff;
text-decoration:none;
}

/* RESPONSIVE */
@media(max-width:768px){

.stat-grid{
grid-template-columns:repeat(2,1fr);
}

.card{
flex-direction:column;
}

.img-box img{
width:100%;
height:200px;
}

.title-box{
flex-direction:column;
align-items:flex-start;
gap:10px;
}

}

</style>

</body>
</html>
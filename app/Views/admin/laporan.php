<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Laporan</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    font-family:Segoe UI,sans-serif;
    background:#f4f6fb;
    padding:20px;
}

.content{
    margin-left:260px;
    padding:20px;
}

@media(max-width:900px){
    .content{
        margin-left:90px;
    }
}

.card{
    background:white;
    padding:20px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
    padding-bottom:15px;
    border-bottom:1px solid #eee;
}

.header h2{
    margin:0;
    font-size:20px;
    color:#1f2937;
}

.search{
    display:flex;
    gap:10px;
}

.search input{
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
    width:250px;
}

.search button{
    background:#002b78;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:8px;
    cursor:pointer;
}

.filter{
    display:flex;
    gap:10px;
    margin-bottom:20px;
}

.filter a{
    text-decoration:none;
    background:#eee;
    color:#333;
    padding:8px 15px;
    border-radius:20px;
}

.filter a:hover{
    background:#ff9735;
    color:white;
}

table{
    width:100%;
    border-collapse:collapse;
    table-layout:auto;
    border-spacing:0 10px;

}

thead th,
tbody td{
    text-align:left;
    vertical-align:middle;
}

thead tr th{
    background:#002b78;
    color:white;
    padding:14px;
    font-size:13px;
    position:sticky;
    top:0;
    z-index:2;
}

tbody tr{
    background:white;
    box-shadow:0 3px 10px rgba(0,0,0,.05);
    border-radius:12px;
    transition:.2s;
}

tbody tr:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

td{
    padding:14px;
    border:none;
}

/* biar sudut tabel halus */
tbody tr td:first-child{
    border-top-left-radius:12px;
    border-bottom-left-radius:12px;
}

tbody tr td:last-child{
    border-top-right-radius:12px;
    border-bottom-right-radius:12px;
}

.badge{
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.5);
    z-index:999;
}

.modal-content{
    background:#fff;
    width:600px;
    max-width:90%;
    padding:25px;
    border-radius:12px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}

.close{
    float:right;
    font-size:25px;
    cursor:pointer;
}

.detail-item{
    margin-bottom:10px;
}

.menunggu{
    background:#fff3cd;
    color:#856404;
}

.diproses{
    background:#dbeafe;
    color:#1d4ed8;
}

.selesai{
    background:#dcfce7;
    color:#15803d;
}

.btn{
    padding:6px 10px;
    border-radius:6px;
    color:white;
    text-decoration:none;
    font-size:12px;
}

.blue{
    background:#2563eb;
}

.orange{
    background:#f97316;
}

.green{
    background:#16a34a;
}


.page-header{
    background: linear-gradient(135deg, #002b78, #1d4ed8);
    color: white;
    padding: 25px 20px;
    border-radius: 16px;
    margin-bottom: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
}

.page-header h1{
    margin: 0;
    font-size: 22px;
}

.page-header p{
    margin: 5px 0 0;
    font-size: 14px;
    opacity: 0.9;
}

.modal-title{
    margin-bottom:15px;
}

.modal-title h2{
    margin:0;
    font-size:20px;
    color:#1f2937;
}

.modal-title small{
    color:#6b7280;
}

.modal-foto{
    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:12px;
    margin-bottom:15px;
    background:#eee;
}

.detail-box{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:10px;
    font-size:14px;
}

.detail-box div{
    background:#f9fafb;
    padding:10px;
    border-radius:10px;
}

.detail-box b{
    display:block;
    font-size:12px;
    color:#6b7280;
    margin-bottom:3px;
}

.detail-box .full{
    grid-column:1 / -1;
}

.detail-box p{
    margin:0;
    color:#374151;
    line-height:1.5;
}


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

</style>
</head>
<body>

<?= $this->include('admin/sidebar') ?>



<div class="content">

<div class="page-header">
    <h1>📋 Data Laporan</h1>
    <p>Kelola semua laporan masuk, pantau status, dan lihat detail laporan dengan mudah.</p>
</div>

<div class="card">

    <div class="header">

        <h2>Data Laporan</h2>

        <form method="GET" class="search">

            <input type="text"
                   name="keyword"
                   placeholder="Cari laporan..."
                   value="<?= esc($_GET['keyword'] ?? '') ?>">

            <button type="submit">
                <i class="fa fa-search"></i>
            </button>

        </form>

    </div>

    <div class="filter">

        <a href="<?= base_url('admin/laporan') ?>">Semua</a>

        <a href="<?= base_url('admin/laporan?status=Menunggu') ?>">
            Menunggu
        </a>

        <a href="<?= base_url('admin/laporan?status=Diproses') ?>">
            Diproses
        </a>

        <a href="<?= base_url('admin/laporan?status=Selesai') ?>">
            Selesai
        </a>

    </div>

    <table>

        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Layanan</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php if(!empty($laporan)): ?>

            <?php $no=1; ?>

            <?php foreach($laporan as $l): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= esc($l['judul']) ?></td>

                <td><?= esc($l['nama_layanan'] ?? '-') ?></td>

                <td><?= esc($l['lokasi']) ?></td>

                <td>

                    <span class="badge <?= strtolower($l['status']) ?>">
                        <?= esc($l['status']) ?>
                    </span>

                </td>

                <td>
                    <?= date('d-m-Y', strtotime($l['created_at'])) ?>
                </td>

                <td>

                    <button
                        class="btn blue detail-btn"

                        data-judul="<?= esc($l['judul']) ?>"
                        data-layanan="<?= esc($l['nama_layanan']) ?>"
                        data-lokasi="<?= esc($l['lokasi']) ?>"
                        data-status="<?= esc($l['status']) ?>"
                        data-tanggal="<?= date('d-m-Y', strtotime($l['created_at'])) ?>"
                        data-deskripsi="<?= esc($l['deskripsi'] ?? '-') ?>"
                        data-foto="<?= base_url('uploads/'.$l['foto']) ?>">
                        Detail

                    </button>

                </td>

            </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="7" style="text-align:center; padding:40px;">
                    <div style="color:#6b7280;">
                        <i class="fa-solid fa-folder-open" style="font-size:40px;margin-bottom:10px;"></i>
                        <p style="margin:0;">Belum ada laporan</p>
                    </div>
                </td>
            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<div id="detailModal" class="modal">

    <div class="modal-content">

        <span class="close">&times;</span>

        <div class="modal-title">
            <h2>Detail Laporan</h2>
            <small>Informasi lengkap dari database</small>
        </div>

        <img id="modalFoto" class="modal-foto" alt="Foto Laporan">

        <div class="detail-box">

            <div><b>Judul:</b> <span id="modalJudul"></span></div>
            <div><b>Layanan:</b> <span id="modalLayanan"></span></div>
            <div><b>Lokasi:</b> <span id="modalLokasi"></span></div>
            <div><b>Status:</b> <span id="modalStatus"></span></div>
            <div><b>Tanggal:</b> <span id="modalTanggal"></span></div>

            <div class="full">
                <b>Deskripsi:</b>
                <p id="modalDeskripsi"></p>
            </div>

        </div>

    </div>

</div>

<script>

const modal = document.getElementById('detailModal');

document.querySelectorAll('.detail-btn').forEach(btn => {

    btn.addEventListener('click', function(){

        document.getElementById('modalFoto').src =
            this.dataset.foto || '';

        document.getElementById('modalJudul').innerText =
            this.dataset.judul || '-';

        document.getElementById('modalLayanan').innerText =
            this.dataset.layanan || '-';

        document.getElementById('modalLokasi').innerText =
            this.dataset.lokasi || '-';

        document.getElementById('modalStatus').innerText =
            this.dataset.status || '-';

        document.getElementById('modalTanggal').innerText =
            this.dataset.tanggal || '-';

        document.getElementById('modalDeskripsi').innerText =
            this.dataset.deskripsi || '-';

        modal.style.display = 'block';

    });

});

document.querySelector('.close').onclick = function(){
    modal.style.display = 'none';
}

window.onclick = function(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
}

</script>

</div> 

</body>
</html>
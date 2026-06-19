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

.card{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
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
}

th{
    background:#002b78;
    color:white;
    padding:12px;
}

.modal-foto{
    width:100%;
    max-height:300px;
    object-fit:cover;
    border-radius:10px;
    margin-bottom:15px;
}

td{
    padding:12px;
    border-bottom:1px solid #eee;
}

.badge{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
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

</style>
</head>
<body>

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
                <td colspan="7" align="center">
                    Tidak ada laporan
                </td>
            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<div id="detailModal" class="modal">

    <div class="modal-content">

        <span class="close">&times;</span>

            <img id="modalFoto"
                class="modal-foto"
                alt="Foto Laporan">

            <p id="debugFoto"></p>

        <h2>Detail Laporan</h2>

        <div class="detail-item">
            <b>Judul :</b>
            <span id="modalJudul"></span>
        </div>

        <div class="detail-item">
            <b>Layanan :</b>
            <span id="modalLayanan"></span>
        </div>

        <div class="detail-item">
            <b>Lokasi :</b>
            <span id="modalLokasi"></span>
        </div>

        <div class="detail-item">
            <b>Status :</b>
            <span id="modalStatus"></span>
        </div>

        <div class="detail-item">
            <b>Tanggal :</b>
            <span id="modalTanggal"></span>
        </div>

        <div class="detail-item">
            <b>Deskripsi :</b>
            <p id="modalDeskripsi"></p>
        </div>

    </div>

</div>

<script>

const modal = document.getElementById('detailModal');

document.querySelectorAll('.detail-btn').forEach(btn => {

    btn.addEventListener('click', function(){

        document.getElementById('modalFoto').src =
            this.dataset.foto;

        document.getElementById('debugFoto').innerText =
        this.dataset.foto;

        document.getElementById('modalJudul').innerText =
            this.dataset.judul;

        document.getElementById('modalLayanan').innerText =
            this.dataset.layanan;

        document.getElementById('modalLokasi').innerText =
            this.dataset.lokasi;

        document.getElementById('modalStatus').innerText =
            this.dataset.status;

        document.getElementById('modalTanggal').innerText =
            this.dataset.tanggal;

        document.getElementById('modalDeskripsi').innerText =
            this.dataset.deskripsi;

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

</body>
</html>
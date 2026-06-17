<?= $this->include('home/header') ?>

<div class="container">

    <div class="detail-card">

        <img src="<?= base_url('uploads/' . $laporan['foto']) ?>" class="foto">

        <h1><?= esc($laporan['judul']) ?></h1>

        <div class="info">
            <p><strong>Layanan:</strong> <?= esc($laporan['nama_layanan']) ?></p>

            <p><strong>Lokasi:</strong> <?= esc($laporan['lokasi']) ?></p>

            <p><strong>Status:</strong> <?= esc($laporan['status']) ?></p>

            <p><strong>Tanggal:</strong>
                <?= date('d M Y H:i', strtotime($laporan['created_at'])) ?>
            </p>
        </div>

        <div class="deskripsi">
            <h3>Deskripsi Laporan</h3>
            <p><?= nl2br(esc($laporan['deskripsi'])) ?></p>
        </div>

        <a href="<?= base_url('laporan') ?>" class="btn-kembali">
            ← Kembali
        </a>

    </div>

</div>

<style>
.container{
    width:90%;
    max-width:900px;
    margin:30px auto;
}

.detail-card{
    background:#fff;
    padding:25px;
    border-radius:20px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

.foto{
    width:100%;
    max-height:450px;
    object-fit:cover;
    border-radius:15px;
    margin-bottom:20px;
}

h1{
    color:#163b79;
    margin-bottom:15px;
}

.info p{
    margin-bottom:10px;
}

.deskripsi{
    margin-top:20px;
}

.btn-kembali{
    display:inline-block;
    margin-top:20px;
    padding:10px 20px;
    background:#163b79;
    color:white;
    text-decoration:none;
    border-radius:10px;
}
</style>
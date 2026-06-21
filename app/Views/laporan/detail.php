

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

        <div class="tanggapan">
            <h3>Tanggapan Petugas</h3>

            <?php if (!empty($tanggapan)): ?>
                <p><?= nl2br(esc($tanggapan['isi_tanggapan'])) ?></p>
            <?php else: ?>
                <p class="belum">Belum ada tanggapan.</p>
            <?php endif; ?>
        </div>

        <a href="<?= base_url('laporan') ?>" class="btn-kembali">
            Kembali
        </a>

    </div>

</div>



<style>

*{
    box-sizing:border-box;
}

body{
    background:#eef2f7;
    font-family:Segoe UI, Arial, sans-serif;
    margin:0;
}

.container{
    width:92%;
    max-width:800px;
    margin:20px auto;
}

.detail-card{
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
}

.foto{
    width:100%;
    max-height:240px;
    object-fit:cover;
    border-radius:10px;
    margin-bottom:12px;
}

h1{
    font-size:20px;
    margin:0 0 12px;
    color:#1f2d3d;
    border-left:4px solid #163b79;
    padding-left:10px;
}

.info{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:10px;
    padding:12px;
    background:#f7f9fc;
    border-radius:10px;
}

.info p{
    margin:0;
    font-size:13px;
    background:#fff;
    padding:8px;
    border-radius:8px;
    border:1px solid #e6eaf2;
}

.info strong{
    color:#163b79;
}

.deskripsi,
.tanggapan{
    margin-top:14px;
}

.deskripsi h3,
.tanggapan h3{
    font-size:15px;
    margin-bottom:6px;
}

.deskripsi p{
    font-size:13px;
    line-height:1.5;
    background:#fafafa;
    padding:10px;
    border-radius:10px;
    border-left:3px solid #163b79;
}

.tanggapan p{
    font-size:13px;
    line-height:1.5;
    background:#eef6ff;
    padding:10px;
    border-radius:10px;
    border-left:3px solid #1e5aa8;
}

.tanggapan .belum{
    background:#fff5f5;
    border-left:3px solid #d9534f;
    color:#a94442;
}

.btn-kembali{
    display:inline-block;
    margin-top:16px;
    padding:8px 12px;
    background:#163b79;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    font-size:13px;
}

@media (max-width:600px){
    .info{
        grid-template-columns:1fr;
    }

    h1{
        font-size:18px;
    }
}
</style>
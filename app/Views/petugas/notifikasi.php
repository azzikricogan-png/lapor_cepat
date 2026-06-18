<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notifikasi</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

.btn-baca{
    display:inline-block;
    margin-top:10px;
    padding:8px 14px;
    background:#10b981;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:13px;
    font-weight:600;
}

.btn-baca:hover{
    background:#059669;
}

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f5f7fb;
}

.main-content{
    margin-left:260px;
    padding:30px;
}

.page-header{
    margin-bottom:25px;
}

.page-header h1{
    margin:0;
    color:#1f2937;
}

.page-header p{
    color:#6b7280;
}

.notifikasi-container{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.notifikasi-card{
    background:white;
    border-radius:15px;
    padding:18px;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
    display:flex;
    gap:15px;
    align-items:flex-start;
}

.notifikasi-icon{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#2563eb;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:20px;
}

.notifikasi-content{
    flex:1;
}

.notifikasi-content h4{
    margin:0 0 5px;
    color:#111827;
}

.notifikasi-content p{
    margin:0;
    color:#6b7280;
    line-height:1.5;
}

.notifikasi-time{
    margin-top:8px;
    font-size:12px;
    color:#9ca3af;
}

.kosong{
    background:white;
    padding:30px;
    text-align:center;
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
    color:#6b7280;
}

@media(max-width:992px){

    .main-content{
        margin-left:0;
    }

}

</style>
</head>
<body>

<?= $this->include('petugas/index') ?>

<div class="main-content">

    <div class="page-header">
        <h1>
            <i class="fa fa-bell"></i>
            Notifikasi
        </h1>
        <p>Daftar notifikasi terbaru sistem.</p>
    </div>

    <div class="notifikasi-container">

        <?php if(!empty($notifikasi)): ?>

            <?php foreach($notifikasi as $n): ?>

                <div class="notifikasi-time">
                    <?= date('d M Y H:i', strtotime($n['created_at'])) ?>
                </div>

                <?php if($n['status_baca'] == 'belum_dibaca'): ?>
                    <a href="<?= base_url('petugas/notifikasi/read/'.$n['id_notifikasi']) ?>"
                        class="btn-baca">
                            <i class="fa fa-check"></i>
                            Tandai Dibaca
                     </a>
                <?php endif; ?>

                <div class="notifikasi-card">

                    <div class="notifikasi-icon">
                        <i class="fa fa-bell"></i>
                    </div>

                    <div class="notifikasi-content">

                        <h4>
                            <?= esc($n['judul'] ?? 'Notifikasi') ?>
                        </h4>

                        <p>
                            <?= esc($n['pesan'] ?? '') ?>
                        </p>

                        <div class="notifikasi-time">
                            <?= date('d M Y H:i', strtotime($n['created_at'])) ?>
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="kosong">

                <i class="fa fa-bell-slash fa-3x"></i>

                <h3>Tidak ada notifikasi</h3>

                <p>Belum ada notifikasi yang tersedia.</p>

            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>
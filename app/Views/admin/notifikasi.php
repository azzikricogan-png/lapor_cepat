<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Notifikasi</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:#f4f6fb;
    font-family:Segoe UI,sans-serif;
    padding:20px;
}

.card{
    background:white;
    border-radius:12px;
    padding:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.notif-item{
    display:flex;
    gap:15px;
    padding:15px;
    border-bottom:1px solid #eee;
}

.notif-item:last-child{
    border-bottom:none;
}

.icon{
    width:45px;
    height:45px;
    border-radius:50%;
    background:#002b78;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
}

.info{
    flex:1;
}

.info p{
    margin-bottom:5px;
}

.info small{
    color:#888;
}

.badge{
    padding:4px 10px;
    border-radius:20px;
    font-size:11px;
}

.belum{
    background:#ffe8c2;
    color:#ff8c00;
}

.sudah{
    background:#dcfce7;
    color:#15803d;
}

.kosong{
    text-align:center;
    padding:30px;
    color:#777;
}

.btn-kembali{
    background:#002b78;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:8px;
    display:flex;
    align-items:center;
    gap:8px;
    transition:.3s;
}

.btn-kembali:hover{
    background:#ff9735;
}

</style>
</head>
<body>

<div class="card">

    <div class="header">

        <h2>Notifikasi</h2>

        <a href="<?= base_url('admin') ?>" class="btn-kembali">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

    </div>

    <?php if(!empty($notifikasi)): ?>

        <?php foreach($notifikasi as $n): ?>

        <div class="notif-item">

            <div class="icon">
                <i class="fa fa-bell"></i>
            </div>

            <div class="info">

                <p>
                    <?= esc($n['pesan']) ?>
                </p>

                <small>
                    <?= date('d M Y H:i', strtotime($n['created_at'])) ?>
                </small>

            </div>

            <div>

                <?php if(($n['status_baca'] ?? 0) == 0): ?>

                    <span class="badge belum">
                        Belum Dibaca
                    </span>

                <?php else: ?>

                    <span class="badge sudah">
                        Sudah Dibaca
                    </span>

                <?php endif; ?>

            </div>

        </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="kosong">
            <i class="fa fa-bell-slash fa-2x"></i>
            <p>Tidak ada notifikasi</p>
        </div>

    <?php endif; ?>

</div>

</body>
</html>
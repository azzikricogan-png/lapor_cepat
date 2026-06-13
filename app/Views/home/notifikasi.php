<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Notifikasi - Lapor Cepat</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <div>
            <h1>Notifikasi</h1>
            <p>Informasi terbaru dari laporan Anda</p>
        </div>

        <a href="<?= base_url('/home') ?>" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>

    </div>

    <!-- LIST NOTIFIKASI -->
    <div class="notif-list">

        <?php if (!empty($notifikasi)): ?>

            <?php foreach ($notifikasi as $n): ?>

                <div class="notif-card <?= $n['status_baca'] == 0 ? 'unread' : '' ?>">

                    <div class="icon">
                        <i class="fa-solid fa-bell"></i>
                    </div>

                    <div class="content">

                        <p class="pesan">
                            <?= esc($n['pesan']) ?>
                        </p>

                        <span class="time">
                            <?= date('d M Y H:i', strtotime($n['created_at'])) ?>
                        </span>

                    </div>

                    <div class="action">

                        <?php if ($n['status_baca'] == 0): ?>

                            <a href="<?= base_url('notifikasi/read/'.$n['id_notifikasi']) ?>" class="btn-read">
                                Tandai Dibaca
                            </a>

                        <?php else: ?>

                            <span class="readed">Sudah dibaca</span>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty">
                <i class="fa-solid fa-bell-slash"></i>
                <h3>Tidak ada notifikasi</h3>
                <p>Semua informasi akan muncul di sini</p>
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
max-width:900px;
margin:40px auto;
}

/* HEADER */
.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.header h1{
color:#163b79;
}

.header p{
color:#666;
font-size:14px;
}

.btn-back{
background:#fff;
padding:10px 16px;
border-radius:50px;
text-decoration:none;
color:#163b79;
box-shadow:0 8px 20px rgba(0,0,0,.06);
}

/* LIST */
.notif-list{
display:flex;
flex-direction:column;
gap:15px;
}

/* CARD */
.notif-card{
display:flex;
gap:15px;
background:#fff;
padding:15px;
border-radius:18px;
box-shadow:0 8px 20px rgba(0,0,0,.06);
align-items:center;
}

/* UNREAD */
.notif-card.unread{
border-left:5px solid #ff9735;
background:#fffaf5;
}

/* ICON */
.icon{
width:45px;
height:45px;
background:#2f80ed;
color:#fff;
display:flex;
align-items:center;
justify-content:center;
border-radius:12px;
}

/* CONTENT */
.content{
flex:1;
}

.pesan{
font-size:14px;
color:#163b79;
font-weight:600;
}

.time{
font-size:12px;
color:#888;
display:block;
margin-top:5px;
}

/* ACTION */
.action{
display:flex;
flex-direction:column;
align-items:flex-end;
}

.btn-read{
background:#ff9735;
color:#fff;
padding:8px 12px;
border-radius:10px;
text-decoration:none;
font-size:12px;
}

.readed{
font-size:12px;
color:#27ae60;
font-weight:600;
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

.empty h3{
color:#163b79;
}

.empty p{
color:#777;
margin-top:5px;
}

/* RESPONSIVE */
@media(max-width:768px){

.notif-card{
flex-direction:column;
align-items:flex-start;
}

.action{
align-items:flex-start;
}

}

</style>

</body>
</html>
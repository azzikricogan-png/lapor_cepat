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

                <div class="notif-card <?= $n['status_baca'] == 'belum_dibaca' ? 'unread' : '' ?>">

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

                        <?php if ($n['status_baca'] == 'belum_dibaca'): ?>

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
font-family:Segoe UI, sans-serif;
}

body{
background:linear-gradient(135deg,#eef3ff,#f7f9fc);
}

/* CONTAINER */
.container{
width:95%;
max-width:950px;
margin:40px auto;
}

/* HEADER */
.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
padding:20px;
background:#fff;
border-radius:16px;
box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.header h1{
color:#163b79;
font-size:22px;
}

.header p{
color:#6b7280;
font-size:13px;
margin-top:3px;
}

.btn-back{
background:#163b79;
color:#fff;
padding:10px 16px;
border-radius:10px;
text-decoration:none;
font-size:13px;
display:flex;
align-items:center;
gap:8px;
transition:.2s;
}

.btn-back:hover{
background:#0f2d7a;
transform:translateY(-2px);
}

/* LIST */
.notif-list{
display:flex;
flex-direction:column;
gap:12px;
}

/* CARD */
.notif-card{
display:flex;
gap:15px;
background:#fff;
padding:16px;
border-radius:14px;
box-shadow:0 6px 18px rgba(0,0,0,.05);
align-items:flex-start;
transition:.2s;
}

.notif-card:hover{
transform:translateY(-2px);
}

/* UNREAD */
.notif-card.unread{
border-left:5px solid #ff9735;
background:#fffaf3;
}

/* ICON */
.icon{
width:44px;
height:44px;
background:linear-gradient(135deg,#2f80ed,#1c5edb);
color:#fff;
display:flex;
align-items:center;
justify-content:center;
border-radius:12px;
flex-shrink:0;
}

/* CONTENT */
.content{
flex:1;
}

.pesan{
font-size:14px;
color:#163b79;
font-weight:600;
line-height:1.4;
}

.time{
font-size:12px;
color:#9aa4b2;
margin-top:6px;
display:block;
}

/* ACTION */
.action{
display:flex;
flex-direction:column;
align-items:flex-end;
gap:6px;
}

.btn-read{
background:#ff9735;
color:#fff;
padding:8px 12px;
border-radius:8px;
text-decoration:none;
font-size:12px;
transition:.2s;
}

.btn-read:hover{
background:#e67e22;
transform:scale(1.05);
}

.readed{
font-size:12px;
color:#16a34a;
font-weight:600;
}

/* EMPTY */
.empty{
text-align:center;
padding:70px 20px;
background:#fff;
border-radius:18px;
box-shadow:0 10px 25px rgba(0,0,0,.05);
}

.empty i{
font-size:48px;
color:#2f80ed;
margin-bottom:10px;
}

.empty h3{
color:#163b79;
margin-bottom:5px;
}

.empty p{
color:#6b7280;
font-size:13px;
}

/* RESPONSIVE */
@media(max-width:768px){

.header{
flex-direction:column;
align-items:flex-start;
gap:10px;
}

.notif-card{
flex-direction:column;
}

.action{
align-items:flex-start;
}

}

</style>

</body>
</html>
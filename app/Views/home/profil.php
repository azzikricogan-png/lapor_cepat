<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil Pengguna - LaporCepat</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f4f6f9;
}

/* HEADER */

.profile-header{
    background:linear-gradient(135deg,#163b79,#0d6efd);
    height:220px;
}

/* CONTAINER */

.container{
    max-width:1000px;
    margin:-100px auto 50px;
    padding:20px;
}

/* CARD */

.profile-card{
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

/* TOP */

.profile-top{
    display:flex;
    align-items:center;
    gap:25px;
    flex-wrap:wrap;
}

.profile-photo{
    width:130px;
    height:130px;
    border-radius:50%;
    overflow:hidden;
    border:5px solid #fff;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.profile-photo img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.profile-info h2{
    color:#163b79;
    margin-bottom:8px;
}

.profile-info p{
    color:#666;
    margin-bottom:5px;
}

/* BUTTON */

.action-btn{
    margin-top:15px;
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

.btn{
    text-decoration:none;
    padding:10px 18px;
    border-radius:10px;
    color:white;
    font-weight:600;
}

.btn-edit{
    background:#163b79;
}

.btn-password{
    background:#f39c12;
}

.btn-logout{
    background:#e74c3c;
}

/* DETAIL */

.detail-grid{
    margin-top:35px;
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
}

.detail-item{
    background:#f8f9fc;
    padding:18px;
    border-radius:12px;
}

.detail-item h4{
    color:#163b79;
    margin-bottom:6px;
}

.detail-item p{
    color:#666;
}

/* STATISTIK */

.statistik{
    margin-top:35px;
}

.statistik h3{
    color:#163b79;
    margin-bottom:20px;
}

.stat-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.stat-card{
    text-align:center;
    background:white;
    border-radius:15px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.stat-card i{
    font-size:30px;
    margin-bottom:10px;
}

.stat-card h2{
    color:#163b79;
}

.stat-card p{
    color:#666;
}

/* RIWAYAT */

.riwayat{
    margin-top:40px;
}

.riwayat h3{
    color:#163b79;
    margin-bottom:20px;
}

.riwayat-card{
    background:white;
    border-radius:12px;
    padding:15px;
    margin-bottom:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.05);

    display:flex;
    justify-content:space-between;
    align-items:center;
}

.badge{
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
}

.selesai{
    background:#27ae60;
}

.proses{
    background:#f39c12;
}

.verifikasi{
    background:#3498db;
}

/* RESPONSIVE */

@media(max-width:768px){

    .detail-grid{
        grid-template-columns:1fr;
    }

    .stat-grid{
        grid-template-columns:1fr;
    }

    .riwayat-card{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
    }
}

</style>
</head>

<body>

<div class="profile-header"></div>

<div class="container">

    <div class="profile-card">

        <div class="profile-top">

            <div class="profile-photo">
                <img src="https://i.pravatar.cc/300" alt="">
            </div>

            <div class="profile-info">
                <h2><?= $nama ?></h2>
                <p>
                    <i class="fa fa-envelope"></i>
                    <?= $email ?>
                </p>
                <p><i class="fa fa-user"></i> Masyarakat</p>

                <div class="action-btn">

                    <a href="#" class="btn btn-edit">
                        <i class="fa fa-pen"></i> Edit Profil
                    </a>

                    <a href="#" class="btn btn-password">
                        <i class="fa fa-lock"></i> Ubah Password
                    </a>

                    <a href="/logout" class="btn btn-logout">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>

                </div>

            </div>

        </div>

        <!-- DETAIL -->

        <div class="detail-grid">

            <div class="detail-item">
                <h4>Nomor HP</h4>
                <p>0812-3456-7890</p>
            </div>

            <div class="detail-item">
                <h4>Alamat</h4>
                <p>Kota Palu, Sulawesi Tengah</p>
            </div>

            <div class="detail-item">
                <h4>Tanggal Bergabung</h4>
                <p>01 Januari 2026</p>
            </div>

            <div class="detail-item">
                <h4>Status Akun</h4>
                <p>Aktif</p>
            </div>

        </div>

    </div>

    <!-- STATISTIK -->

    <div class="statistik">

        <h3>Statistik Laporan</h3>

        <div class="stat-grid">

            <div class="stat-card">
                <i class="fa fa-file-alt"></i>
                <h2>12</h2>
                <p>Total Laporan</p>
            </div>

            <div class="stat-card">
                <i class="fa fa-spinner"></i>
                <h2>3</h2>
                <p>Diproses</p>
            </div>

            <div class="stat-card">
                <i class="fa fa-check-circle"></i>
                <h2>9</h2>
                <p>Selesai</p>
            </div>

        </div>

    </div>

    <!-- RIWAYAT -->

    <div class="riwayat">

        <h3>Riwayat Laporan Terbaru</h3>

        <div class="riwayat-card">
            <span>Jalan berlubang di Jl. Moh. Hatta</span>
            <span class="badge proses">Diproses</span>
        </div>

        <div class="riwayat-card">
            <span>Sampah menumpuk di Pasar Inpres</span>
            <span class="badge verifikasi">Verifikasi</span>
        </div>

        <div class="riwayat-card">
            <span>Lampu jalan mati di Talise</span>
            <span class="badge selesai">Selesai</span>
        </div>

    </div>

</div>

</body>
</html>
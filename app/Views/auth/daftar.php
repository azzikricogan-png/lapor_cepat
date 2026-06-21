<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar - LaporCepat</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="container">

    <!-- KIRI -->
    <div class="left-panel">

        <div class="logo">
            <img src="<?= base_url('img/logo.png') ?>" alt="login" class="maskot">
            <div>
                <h3>LAPOR<span>CEPAT</span></h3>
                <small>Sampaikan. Kami Tindaklanjuti.</small>
            </div>
        </div>

        <div class="form-body">


            <h1>Daftar</h1>

            <p>
                Buat akun baru untuk mulai menggunakan
                sistem Laporcepat.
            </p>


        </div>
        
        <div class="form-content">


            <form action="<?= base_url('/register') ?>" method="post">


                 <div class="input-group">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>

                <div class="input-group">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" name="no_hp" placeholder="No HP" required>
                </div>

                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>


                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                </div>


                <div class="input-group">
                    <i class="fa-solid fa-shield-halved"></i>
                    <select name="role" required>
                        <option value="">Pilih Role</option>
                        <option value="user">Masyarakat</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>

            <button type="submit" class="btn-daftar">
                Daftar
            </button>

            </form>

            <div class="login-link">
                Sudah punya akun?
                <a href="<?= base_url('login') ?>">Klik di sini !</a>
            </div>

        </div>

    </div>

    <!-- PEMISAH -->
    <div class="divider">
        <div class="divider-logo">P</div>
    </div>

    <!-- KANAN -->
    <div class="right-panel">

        <div class="badge">
            <i class="fa-solid fa-shield-halved"></i>
            Layanan Pengaduan Masyarakat
        </div>

        <h1>
            Sampaikan Laporan Anda,<br>
            Kami Tindaklanjuti dengan Cepat
        </h1>

        <p class="desc">
            Laporcepat hadir untuk memudahkan masyarakat
            dalam menyampaikan pengaduan dengan aman,
            cepat, dan transparan.
        </p>

        <button class="btn-masuk" onclick="window.location.href='<?= base_url('login') ?>'">
            Masuk
        </button>

        <!-- ILUSTRASI -->
        <div class="illustration">

            <div class="phone">
                <div class="notch"></div>

                <img src="<?= base_url('img/logo.png') ?>" alt="login" class="hp">

                <div class="item">
                    <div class="check"></div>
                    <div class="line"></div>
                </div>

                 <div class="item">
                    <div class="check"></div>
                    <div class="line"></div>
                </div>

                <div class="item">
                    <div class="check"></div>
                    <div class="line"></div>
                </div>
                
            </div>

           <img src="<?= base_url('img/orang.png') ?>" class="login-image" alt="orang">

        </div>

        <!-- FITUR -->
        <div class="features">

            <div class="feature">
                <i class="fa-solid fa-bolt"></i>
                <div>
                    <h4>Cepat & Mudah</h4>
                    <p>Sampaikan laporan kapan saja dan dimana saja.</p>
                </div>
            </div>

            <div class="feature">
                <i class="fa-solid fa-eye"></i>
                <div>
                    <h4>Transparan</h4>
                    <p>Pantau perkembangan laporan secara realtime.</p>
                </div>
            </div>

            <div class="feature">
                <i class="fa-solid fa-shield"></i>
                <div>
                    <h4>Aman & Terpercaya</h4>
                    <p>Data Anda aman bersama sistem terpercaya.</p>
                </div>
            </div>

        </div>

    </div>

</div>




</body>
</html>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
    background:#eef1f6;
    margin:0;
    min-height:100vh;
}

.container{
    width:100%;
    height:100vh;
    display:flex;
    overflow:hidden;
}

.maskot{
    width: 50px;
    height: auto;
    position: relative;
    top: 3px; /* turun 20px */
}






/* KIRI */

.left-panel{
width:32%;
padding: 15px;
background:white;
}

.logo{
display:flex;
align-items:center;
gap:6px;
margin-bottom:20px;
margin-left:-10px; 
}

.logo-icon{
width:42px;
height:42px;
background:#ff8a00;
color:white;
font-weight:700;
display:flex;
align-items:center;
justify-content:center;
border-radius:10px;
}

.logo h3{
font-size:13px;
color:#0f2d7a;
margin:0;

}

.logo span{
color:#ff8a00;

}

.logo small{
color:#666;
font-size:10px;
    margin-top:2px;
    display:block;
}

.form-body h1{
    font-size:30px;   /* diperkecil */
    color:#1e40af;    /* biru lebih cerah */
    margin-bottom:1px;
    margin-top:20px;
}

.form-body p{
    font-size:11px;   /* lebih kecil */
    color:#6b7280;
    line-height:1.3;
    margin-bottom:25px;
}

.form-content{
max-width:500px;
margin-top:50px;
}

form{
    margin-top:114px;
}

.input-group{
height:32px;
border:2px solid #e5e7eb;
border-radius:12px;
display:flex;
align-items:center;
padding:0 12px;
margin-bottom:8px;
position: relative;
}

.input-group i{
color:#80879a;
font-size:14px;
}

.input-group input,
.input-group select{
width:100%;
border:none;
outline:none;
padding-left:15px;
font-size:12px;
background:none;
color:#444;
}



.btn-daftar{
width:100%;
height:32px;
border:none;
border-radius:10px;
background:linear-gradient(90deg,#ff9500,#ff7300);
color:white;
font-size:12px;
font-weight:600;
cursor:pointer;
margin-top:35px;
display:flex;
justify-content:center;
align-items:center;
gap:15px;
}

.login-link{
margin-top:15px;
text-align:center;
font-size:12px;
color:#666;
}

.login-link a{
color:#ff8a00;
text-decoration:none;
font-weight:600;
}

/* PEMISAH */

.divider{
position:absolute;
left:50%;
top:0;
transform:translateX(-50%);
width:1px;
height:100%;
background:#e5e7eb;
}

.divider-logo{
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
width:50px;
height:50px;
border-radius:50%;
background:white;
border:2px solid #e5e7eb;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
color:#ff8a00;
}

/* KANAN */

.right-panel{
width:100%;
padding:15px;
background: #fbfcff;
position:relative;
overflow:hidden;
}

.badge{
display:inline-flex;
align-items:center;
gap:10px;
padding:8px 14px;
border:2px solid #e6eaf4;
border-radius:999px;
font-weight:600;
font-size:12px;
color:#0f2d7a;
margin-bottom:35px;
}

.badge i{
color:#ff8a00;
}

.right-panel h1{
font-size:26px;
line-height:1.2;
color:#0f2d7a;
margin-bottom:8px;
}

.desc{
font-size:14px;
color:#6b7280;
line-height:1.5;
max-width:650px;
}

.btn-masuk{
    margin-top:20px;
    height:32px;
    padding:0 18px;
    border:none;
    border-radius:10px;
    background:linear-gradient(90deg,#ff9500,#ff7300);
    color:white;
    font-size:12px;
    font-weight:600;
    cursor:pointer;
    display:flex;
    align-items:center;
    gap:8px;
}
/* ILUSTRASI */

.illustration{
    position: relative;
    display:flex;
    justify-content:center;
    align-items:flex-end;
    gap:40px;
    margin-top:10px;
    height:200px;
}

.login-image{
    position:absolute;

    width:800px;      /* ukuran gambar */
    right:-100px;      /* geser ke kiri/kanan */
    bottom:-130px;     /* geser ke atas/bawah */

    z-index:2;
}

.phone{
    width:150px;
    height:280px;
    background:white;
    border:10px solid #0f2d7a;
    border-radius:35px;
    position:relative;
    box-shadow:0 15px 40px rgba(0,0,0,.12);
    transform: translateY(114px) translateX(-100px);
    display:flex;
    flex-direction:column;
    align-items:center;
    padding-top:40px; /* kecilkan supaya isi masuk layar */
    gap:10px;
    overflow:hidden; /* penting: biar tidak keluar dari HP */
}

.hp{
    width:60px;
    height:auto;
    position:relative;
    margin-bottom:0px;
    left:0;
    top:0;
}

.item{
    display:flex;
    align-items:center;
    gap:10px;
    margin:1px 0;
}

.notch{
width:90px;
height:15px;
background: #0f2d7a;
border-radius:20px;
position:absolute;
top:12px;
left:50%;
transform:translateX(-50%);
}


.check{
    width:18px;
    height:18px;
    background:#2563eb;
    border-radius:50%;
}

.line{
    width:90px;
    height:6px;
    background:#e5e7eb;
    border-radius:20px;
    margin:0;
}



/* FITUR */

.features{
    position:absolute;
    left:0;
    right:0;
    bottom:0;

    background:#0f2d7a;
    padding:12px;

    display:flex;
    justify-content:space-between;
    gap:10px;
}

.feature{
display:flex;
gap:10px;
width:100%;
color:white;
}

.feature i{
font-size:18px;
color:#ff8a00;
margin-top:5px;
}

.feature h4{
font-size:12px;
margin-bottom:4px;
}

.feature p{
font-size:10px;
line-height:1.7;
color:#d7ddf7;
}

@media(max-width:1200px){

.container{
flex-direction:column;
}

.left-panel,
.right-panel{
width:100%;
}

.divider{
display:none;
}

.features{
position:relative;
margin-top:40px;
flex-direction:column;
gap:25px;
}

.feature{
width:100%;
}

}

</style>
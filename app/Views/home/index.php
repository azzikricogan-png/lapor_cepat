<?= $this->include('home/header') ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Lapor Cepat Kota Palu</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<section class="hero">



    <div class="hero-content">

        <h3 class="welcome-text">
            Selamat Datang di Lapor Cepat
        </h3>

        <h1>
            Sampaikan Aduan dan
            Aspirasi Anda Secara
            Cepat & Mudah
        </h1>

        <p>
            Laporkan permasalahan di sekitar Anda dan
            pantau proses penanganannya secara transparan
            melalui Lapor Cepat Kota Palu.
        </p>

        <div class="hero-btn">

            <a href="/buat_laporan" class="btn-primary">
                <i class="fa-solid fa-file-circle-plus"></i>
                Buat Laporan
            </a>

        
        </div>

    </div>

</section>

<section class="kategori">

    <div class="card-kategori">

        <div class="icon orange-bg">
            <i class="fa-solid fa-road"></i>
        </div>

        <div>
            <h3>Infrastruktur</h3>
            <p>Laporkan kerusakan jalan, jembatan, dan fasilitas umum</p>
        </div>

    </div>

    <div class="card-kategori">

        <div class="icon yellow-bg">
            <i class="fa-solid fa-lightbulb"></i>
        </div>

        <div>
            <h3>Lampu Jalan</h3>
            <p>Laporkan lampu jalan mati atau rusak</p>
        </div>

    </div>

    <div class="card-kategori">

        <div class="icon green-bg">
            <i class="fa-solid fa-trash"></i>
        </div>

        <div>
            <h3>Kebersihan</h3>
            <p>Laporkan masalah sampah dan kebersihan lingkungan</p>
        </div>

    </div>

    <div class="card-kategori">

        <div class="icon blue-bg">
            <i class="fa-solid fa-droplet"></i>
        </div>

        <div>
            <h3>Air Bersih</h3>
            <p>Laporkan gangguan air atau layanan terkait</p>
        </div>

    </div>

    <div class="card-kategori">

        <div class="icon purple-bg">
            <i class="fa-solid fa-shield-halved"></i>
        </div>

        <div>
            <h3>Ketertiban Umum</h3>
            <p>Laporkan gangguan keamanan dan ketertiban</p>
        </div>

    </div>

</section>

<section class="info-section">

    <!-- Statistik -->

    <div class="box-info">

        <h2>Statistik Laporan</h2>

        <div class="stat-grid">

            <div class="stat-card">

                <div class="stat-icon biru">
                    <i class="fa-solid fa-file-lines"></i>
                </div>

                <h3><?= $total ?></h3>
                <p>Laporan Masuk</p>

            </div>

            <div class="stat-card">

                <div class="stat-icon ungu">
                    <i class="fa-solid fa-hourglass-half"></i>
                </div>

                <h3><?= $menunggu ?></h3>
                <p>Menunggu Verifikasi</p>

            </div>


            <div class="stat-card">

                <div class="stat-icon orange">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <h3><?= $diproses ?></h3>
                <p>Sedang Diproses</p>

            </div>


            <div class="stat-card">

                <div class="stat-icon hijau">
                    <i class="fa-solid fa-check"></i>
                </div>

                <h3><?= $selesai ?></h3>
                <p>Laporan Selesai</p>

            </div>

        </div>

    </div>

    <!-- Cara Kerja -->

    <div class="box-info">

        <h2>Cara Kerja Lapor Cepat</h2>

        <div class="steps">

            <div class="step">

                <div class="step-icon biru">
                    <i class="fa-solid fa-file-lines"></i>
                </div>

                <span>1</span>

                <h4>Kirim Laporan</h4>

                <p>Sampaikan aduan Anda dengan mudah</p>

            </div>

            <div class="step">

                <div class="step-icon hijau">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

                <span>2</span>

                <h4>Verifikasi</h4>

                <p>Laporan diverifikasi oleh petugas</p>

            </div>

            <div class="step">

                <div class="step-icon orange">
                    <i class="fa-solid fa-gear"></i>
                </div>

                <span>3</span>

                <h4>Proses</h4>

                <p>Laporan ditindaklanjuti</p>

            </div>

            <div class="step">

                <div class="step-icon hijau">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <span>4</span>

                <h4>Selesai</h4>

                <p>Informasi penyelesaian diberikan</p>

            </div>

        </div>

    </div>

</section>



<style>

/* ========= RESET ========= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f5f7fb;
    font-size:90%
}

/* ========= HERO ========= */

.hero{

    min-height:100vh;

    background:

    linear-gradient(
        90deg,
        rgba(0, 89, 255, 0.18) 0%,
        rgba(0, 42, 120, 0.14) 45%,
        rgba(0, 42, 120, 0) 100%
    ),

    url('<?= base_url('img/palu.png') ?>');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

}


/* ========= HERO CONTENT ========= */

.hero-content{
    margin-left: 5%;
    max-width:550px;

    padding-top:60px; /* Turunkan ke bawah */

    margin-bottom:15px;
}

.welcome-text{

    display:inline-flex;
    align-items:center;
    gap:12px;

    color: #ffffff;

    font-size:11px;

    font-weight:700;

    letter-spacing:3px;

    text-transform:uppercase;

    padding:10px 18px;

    border-radius:50px;

    background:rgb(255, 136, 0);

    

    border:1px solid rgba(255,255,255,.2);

    text-shadow:0 2px 10px rgba(0, 0, 0, 0.35);

    margin-bottom:30px;
}

.hero-content h1{

    color:white;
    

    font-size:clamp(28px, 3.5vw, 42px);

    line-height:1.1;

    margin-bottom:25px;
}

.hero-content p{

    color: #eef4ff;

    font-size:15px;

    line-height:1.7;

    max-width:650px;
}

/* ========= BUTTON HERO ========= */

.hero-btn{

    margin-top:35px;

    display:flex;

    gap:18px;
}

.btn-primary{

    display:inline-flex;
    align-items:center;
    gap:12px;

    color: #ffffff;

    text-decoration:none; /* Hilangkan garis bawah */

    font-size:11px;

    font-weight:700;

    letter-spacing:3px;

    text-transform:uppercase;

    padding:10px 18px;

    border-radius:50px;

    background: #ff5e00;

    backdrop-filter:blur(8px);

    border:1px solid rgba(255,255,255,.2);

    text-shadow:0 2px 10px rgba(0, 0, 0, 0.49)
}

.btn-primary:hover{

    transform:translateY(-1px);

    box-shadow:0 12px 30px rgba(255, 128, 0, 0.5);
}






@media(max-width:768px){

    .hero-content{
        margin:40px 20px;
    }

    .hero-content h1{
        font-size:38px;
    }

    .hero-btn{
        flex-direction:column;
    }

}

/* ==========================
   KATEGORI LAPORAN
========================== */

.kategori{

    width:90%;

    margin:-70px auto 0;

    position:relative;
    z-index:99;

    display:grid;
    grid-template-columns:repeat(5,1fr);

    gap:15px;
}

.card-kategori{

    background:white;

    border-radius:18px;

    padding:12px;

    display:flex;
    gap:12px;
    align-items:flex-start;

    box-shadow:
    0 10px 30px rgba(0,0,0,.08);

    transition:.3s;
}

.card-kategori:hover{

    transform:translateY(-8px);

}

.card-kategori h3{

    color:#173a7a;

    margin-bottom:10px;

    font-size:13px;
}

.card-kategori p{

    color:#666;

    line-height:1.6;

    font-size:10px;
    line-height:1.5;
}

.icon{

    width:50px;
    height:50px;

    border-radius:15px;

    display:flex;
    justify-content:center;
    align-items:center;

    flex-shrink:0;
}

.icon i{

    font-size:22px;
}

.orange-bg{
    background:#fff0e2;
    color:#ff9735;
}

.yellow-bg{
    background:#fff7df;
    color:#f4b400;
}

.green-bg{
    background:#e9f8ef;
    color:#2eb872;
}

.blue-bg{
    background:#eaf2ff;
    color:#2f80ed;
}

.purple-bg{
    background:#f1e9ff;
    color:#8f5ad6;
}

@media(max-width:1200px){

    .kategori{
        grid-template-columns:repeat(2,1fr);
    }

}

@media(max-width:768px){

    .kategori{
        grid-template-columns:1fr;
        margin-top:20px;
    }

}

/* ==========================
   STATISTIK & CARA KERJA
========================== */

.info-section{

    width:90%;

    margin:35px auto;

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:25px;
}

.box-info{

    background:#fff;

    border-radius:20px;

    padding:20px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.06);
}

.box-info h2{

    color:#163b79;

    margin-bottom:25px;

    font-size:17px;
}

.stat-grid{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:15px;
}

.stat-card{

    border:1px solid #eee;

    border-radius:15px;

    text-align:center;

    padding:18px 8px;
}

.stat-card h3{

    margin-top:15px;

    color:#163b79;

    font-size:18px;
}

.stat-card p{

    color: #666;
    font-size:11px;

    margin-top:8px;
}

.icon{
    width:42px;
    height:42px;
}

.icon i{
    font-size:18px;
}

.stat-icon,
.step-icon{
    
    width:40px;
    height:40px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#fff;

    margin:auto;
}

.stat-icon i,
.step-icon i{

    font-size:15px;
}

.biru{
    background:#2f80ed;
}

.hijau{
    background:#27ae60;
}

.orange{
    background:#ff9735;
}

.ungu{
    background:#9b51e0;
}

/* Cara Kerja */

.steps{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:20px;

    text-align:center;
}

.step span{

    display:block;

    margin:12px 0;

    font-size:14px;

    font-weight:700;

    color:#163b79;
}

.step h4{

    color:#163b79;
    font-size:13px;

    margin-bottom:10px;
}

.step p{

    color:#666;

    line-height:1.6;

    font-size:10px;
}

@media(max-width:1200px){

    .info-section{
        grid-template-columns:1fr;
    }

    .stat-grid{
        grid-template-columns:repeat(2,1fr);
    }

    .steps{
        grid-template-columns:repeat(2,1fr);
    }

}

@media(max-width:768px){

    .stat-grid{
        grid-template-columns:1fr;
    }

    .steps{
        grid-template-columns:1fr;
    }

}


</style>

</body>
</html>

<?= $this->include('layout/footer') ?>
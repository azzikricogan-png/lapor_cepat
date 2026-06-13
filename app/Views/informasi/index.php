<?= $this->include('home/header') ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tentang Lapor Cepat</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="about-section">

    <div class="about-container">

        <div class="about-left">

            <h3 class="about-badge">
                Tentang Lapor Cepat
            </h3>

            <h1 class="about-title">
                Lapor Cepat<br>
                Kota Palu
            </h1>

            <p class="about-desc">
                Lapor Cepat Kota Palu merupakan platform pengaduan masyarakat
                yang memudahkan warga menyampaikan laporan, aspirasi, maupun
                keluhan terkait pelayanan publik dan fasilitas umum secara cepat,
                transparan, serta terintegrasi dengan instansi pemerintah yang berwenang.
            </p>

            <div class="about-features">

                <div class="feature">
                    <i class="fa-solid fa-bolt"></i>
                    <span>Cepat & Responsif</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>Aman & Rahasia</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-eye"></i>
                    <span>Transparan</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-mobile-screen"></i>
                    <span>Mudah Digunakan</span>
                </div>

            </div>

        </div>

        <div class="about-right">

            <div class="about-card">
                <h2>1. Kirim Laporan</h2>
                <p>Warga menyampaikan laporan melalui website Lapor Cepat.</p>
            </div>

            <div class="about-card">
                <h2>2. Verifikasi Laporan</h2>
                <p>Laporan diperiksa dan diverifikasi oleh admin.</p>
            </div>

            <div class="about-card">
                <h2>3. Tindak Lanjut</h2>
                <p>Instansi terkait menerima dan memproses laporan.</p>
            </div>

            <div class="about-card">
                <h2>4. Monitoring Status</h2>
                <p>Pelapor dapat memantau perkembangan laporan secara real-time.</p>
            </div>

        </div>

    </div>

</div>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f7fc;
    overflow-x:hidden;
}

/* Background Blur */

body::before{
    content:'';
    position:fixed;
    top:-200px;
    left:-200px;
    width:500px;
    height:500px;
    background:#ff5e00;
    opacity:.08;
    border-radius:50%;
    filter:blur(100px);
    z-index:-1;
}

body::after{
    content:'';
    position:fixed;
    right:-200px;
    bottom:-200px;
    width:500px;
    height:500px;
    background:#163b79;
    opacity:.08;
    border-radius:50%;
    filter:blur(100px);
    z-index:-1;
}

.about-section{
    width:90%;
    max-width:1200px;
    margin:80px auto;
}

.about-container{
    display:grid;
    grid-template-columns:1.2fr 1fr;
    gap:60px;
    align-items:center;
}

.about-badge{
    display:inline-block;
    padding:10px 18px;
    background:#ff5e00;
    color:#fff;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
    letter-spacing:2px;
    text-transform:uppercase;
    margin-bottom:18px;
}

.about-title{
    font-size:48px;
    line-height:1.2;
    color:#163b79;
    margin-bottom:20px;
}

.about-title::after{
    content:'';
    display:block;
    width:90px;
    height:4px;
    background:#ff5e00;
    border-radius:10px;
    margin-top:15px;
}

.about-desc{
    color:#555;
    font-size:15px;
    line-height:1.9;
    margin-bottom:30px;
}

.about-features{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:15px;
}

.feature{
    background:#fff;
    padding:15px;
    border-radius:15px;
    display:flex;
    align-items:center;
    gap:12px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    transition:.3s;
}

.feature:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}

.feature i{
    color:#ff5e00;
    font-size:20px;
}

.feature span{
    font-size:14px;
    font-weight:600;
}

.about-right{
    display:grid;
    gap:18px;
}

.about-card{
    background:#fff;
    padding:22px;
    border-radius:18px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
    transition:.3s;
}

.about-card:hover{
    transform:translateY(-8px);
}

.about-card:nth-child(1){
    border-left:5px solid #ff5e00;
}

.about-card:nth-child(2){
    border-left:5px solid #2f80ed;
}

.about-card:nth-child(3){
    border-left:5px solid #00b894;
}

.about-card:nth-child(4){
    border-left:5px solid #9b59b6;
}

.about-card h2{
    color:#163b79;
    font-size:18px;
    margin-bottom:10px;
}

.about-card p{
    color:#666;
    font-size:14px;
    line-height:1.7;
}

@media(max-width:900px){

    .about-container{
        grid-template-columns:1fr;
    }

    .about-title{
        font-size:34px;
    }

    .about-features{
        grid-template-columns:1fr;
    }

}

</style>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lapor Cepat</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f8f9ff;
}

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 8%;
    background:white;
    box-shadow:0 2px 15px rgba(0,0,0,.05);
}

.logo{
    font-size:24px;
    font-weight:700;
    color:#6C3CF0;
}

.nav-menu a{
    text-decoration:none;
    margin-left:25px;
    color:#444;
}

.btn-login{
    background:#6C3CF0;
    color:white !important;
    padding:10px 20px;
    border-radius:10px;
}

.hero{
    padding:80px 8%;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:50px;
    align-items:center;
}

.hero-text h1{
    font-size:50px;
    color:#222;
    margin-bottom:20px;
}

.hero-text span{
    color:#6C3CF0;
}

.hero-text p{
    color:#666;
    line-height:1.8;
    margin-bottom:30px;
}

.btn-primary{
    background:#6C3CF0;
    color:white;
    padding:15px 30px;
    border:none;
    border-radius:12px;
    cursor:pointer;
}

.form-card{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.form-card h3{
    margin-bottom:20px;
    color:#333;
}

.form-group{
    margin-bottom:15px;
}

.form-group input,
.form-group textarea,
.form-group select{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:10px;
}

.form-card button{
    width:100%;
    background:#6C3CF0;
    color:white;
    padding:15px;
    border:none;
    border-radius:10px;
    font-weight:bold;
    cursor:pointer;
}

.steps{
    padding:80px 8%;
    text-align:center;
}

.steps h2{
    margin-bottom:50px;
}

.step-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.step-card{
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.step-number{
    width:50px;
    height:50px;
    margin:auto;
    border-radius:50%;
    background:#6C3CF0;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    margin-bottom:15px;
}

.stats{
    background:#6C3CF0;
    color:white;
    padding:70px 8%;
}

.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    text-align:center;
    gap:20px;
}

.stats h3{
    font-size:40px;
}

footer{
    text-align:center;
    padding:20px;
    background:white;
}
</style>

</head>
<body>

<nav class="navbar">
    <div class="logo">LaporCepat</div>

    <div class="nav-menu">
        <a href="#">Beranda</a>
        <a href="#">Laporan</a>
        <a href="#">Statistik</a>
        <a href="#" class="btn-login">Masuk</a>
    </div>
</nav>

<section class="hero">

    <div class="hero-text">
        <h1>Laporkan Masalah Anda Dengan <span>Cepat & Mudah</span></h1>

        <p>
            Sistem pelaporan masyarakat yang transparan,
            aman, dan terintegrasi untuk membantu
            penyelesaian laporan secara efektif.
        </p>

        <button class="btn-primary">
            Buat Laporan
        </button>
    </div>

    <div class="form-card">
        <h3>Form Pelaporan</h3>

        <div class="form-group">
            <input type="text" placeholder="Judul Laporan">
        </div>

        <div class="form-group">
            <select>
                <option>Pilih Kategori</option>
                <option>Infrastruktur</option>
                <option>Pelayanan Publik</option>
                <option>Keamanan</option>
            </select>
        </div>

        <div class="form-group">
            <textarea rows="5" placeholder="Isi laporan..."></textarea>
        </div>

        <button>Kirim Laporan</button>
    </div>

</section>

<section class="steps">

    <h2>Alur Pelaporan</h2>

    <div class="step-grid">

        <div class="step-card">
            <div class="step-number">1</div>
            <h4>Tulis Laporan</h4>
            <p>Buat laporan secara lengkap.</p>
        </div>

        <div class="step-card">
            <div class="step-number">2</div>
            <h4>Verifikasi</h4>
            <p>Laporan diverifikasi admin.</p>
        </div>

        <div class="step-card">
            <div class="step-number">3</div>
            <h4>Tindak Lanjut</h4>
            <p>Instansi menindaklanjuti laporan.</p>
        </div>

        <div class="step-card">
            <div class="step-number">4</div>
            <h4>Selesai</h4>
            <p>Laporan berhasil diselesaikan.</p>
        </div>

    </div>

</section>

<section class="stats">

    <div class="stats-grid">

        <div>
            <h3>12K+</h3>
            <p>Total Laporan</p>
        </div>

        <div>
            <h3>500+</h3>
            <p>Laporan Selesai</p>
        </div>

        <div>
            <h3>120</h3>
            <p>Instansi</p>
        </div>

        <div>
            <h3>98%</h3>
            <p>Tingkat Respon</p>
        </div>

    </div>

</section>

<footer>
    © 2026 LaporCepat - Sistem Pelaporan Masyarakat
</footer>

</body>
</html>
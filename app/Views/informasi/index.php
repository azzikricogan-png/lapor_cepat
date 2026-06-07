<section class="about-section">

    <div class="about-container">

        <div class="about-left">

            <h3 class="about-badge">
                Tentang Lapor Cepat
            </h3>

            <h1 class="about-title">
                Sistem Pengaduan Digital<br>
                Kota Palu
            </h1>

            <p class="about-desc">
                Lapor Cepat Kota Palu adalah platform layanan pengaduan masyarakat
                berbasis digital yang memudahkan warga untuk menyampaikan laporan,
                aspirasi, dan keluhan terhadap fasilitas umum serta pelayanan publik.
                Semua laporan akan diteruskan secara cepat, transparan, dan terintegrasi
                kepada instansi terkait untuk ditindaklanjuti.
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

            <div class="about-card card1">
                <h2>1. Kirim Laporan</h2>
                <p>Warga mengisi form laporan dengan mudah melalui website.</p>
            </div>

            <div class="about-card card2">
                <h2>2. Verifikasi Sistem</h2>
                <p>Laporan diperiksa oleh admin untuk validasi awal.</p>
            </div>

            <div class="about-card card3">
                <h2>3. Tindak Lanjut</h2>
                <p>Instansi terkait menerima laporan untuk diproses.</p>
            </div>

            <div class="about-card card4">
                <h2>4. Selesai & Monitoring</h2>
                <p>Pengguna dapat memantau status laporan secara real-time.</p>
            </div>

        </div>

    </div>
<style>
/* =========================
   ABOUT SECTION
========================= */

.about-section{
    width:90%;
    margin:80px auto;
}

.about-container{
    display:grid;
    grid-template-columns:1.2fr 1fr;
    gap:40px;
    align-items:center;
}

/* LEFT */
.about-badge{
    display:inline-block;
    padding:8px 16px;
    background:#ff5e00;
    color:white;
    border-radius:30px;
    font-size:13px;
    letter-spacing:2px;
    text-transform:uppercase;
    margin-bottom:15px;
    animation: fadeDown 0.8s ease;
}

.about-title{
    font-size:42px;
    color:#163b79;
    margin-bottom:20px;
    animation: fadeUp 1s ease;
}

.about-desc{
    color:#555;
    line-height:1.8;
    font-size:16px;
    margin-bottom:25px;
    animation: fadeUp 1.2s ease;
}

/* FEATURES */
.about-features{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:15px;
}

.feature{
    background:#fff;
    padding:12px 15px;
    border-radius:12px;
    display:flex;
    align-items:center;
    gap:10px;
    box-shadow:0 8px 20px rgba(0,0,0,0.06);
    transition:0.3s;
    cursor:pointer;
}

.feature i{
    color:#ff5e00;
    font-size:18px;
}

.feature:hover{
    transform:translateY(-5px);
    background:#fff7f2;
}

/* RIGHT CARD */
.about-right{
    display:grid;
    gap:15px;
}

.about-card{
    background:white;
    padding:18px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    position:relative;
    overflow:hidden;
    transition:0.3s;
}

.about-card h2{
    color:#163b79;
    font-size:18px;
    margin-bottom:8px;
}

.about-card p{
    color:#666;
    font-size:13px;
    line-height:1.6;
}

/* ANIMATED BORDER EFFECT */
.about-card::before{
    content:'';
    position:absolute;
    width:100%;
    height:3px;
    top:0;
    left:-100%;
    background:linear-gradient(90deg,#ff5e00,#2f80ed);
    transition:0.5s;
}

.about-card:hover::before{
    left:0;
}

.about-card:hover{
    transform:translateY(-6px);
}

/* ANIMASI */
@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes fadeDown{
    from{
        opacity:0;
        transform:translateY(-20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* RESPONSIVE */
@media(max-width:900px){
    .about-container{
        grid-template-columns:1fr;
    }

    .about-title{
        font-size:32px;
    }
}
</style>
</section>

<?= $this->include('layout/footer') ?>

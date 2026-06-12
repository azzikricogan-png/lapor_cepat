<?= view($header) ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cek Status Laporan</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, sans-serif;
    background:#f4f6f9;
}

/* WRAPPER */
.status-section{
    max-width:1000px;
    margin:60px auto;
    padding:0 20px;
}

/* HEADER */
.status-header{
    text-align:center;
    margin-bottom:30px;
}

.status-header h1{
    color:#163b79;
    font-size:38px;
    margin-bottom:10px;
}

.status-header p{
    color:#666;
}

/* SEARCH */
.status-search-box{
    display:flex;
    gap:10px;
    justify-content:center;
    margin-bottom:35px;
}

.status-search-box input{
    width:60%;
    padding:12px 15px;
    border:1px solid #ddd;
    border-radius:10px;
    outline:none;
}

.status-search-box button{
    background:#ff5e00;
    color:#fff;
    border:none;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
    font-weight:bold;
}

/* LIST */
.laporan-list{
    display:flex;
    flex-direction:column;
    gap:20px;
}

/* CARD */
.laporan-card{
    background:white;
    padding:20px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);

    display:flex;
    justify-content:space-between;
    align-items:center;

    transition:.3s;
}

.laporan-card:hover{
    transform:translateY(-3px);
}

.laporan-card h3{
    color:#163b79;
    margin-bottom:8px;
}

.laporan-card p{
    color:#666;
    margin-bottom:10px;
}

/* BADGE */
.status-badge{
    padding:6px 12px;
    border-radius:20px;
    color:white;
    font-size:12px;
    font-weight:600;
}

.proses{
    background:#f39c12;
}

.verifikasi{
    background:#3498db;
}

.selesai{
    background:#27ae60;
}

/* INFO */
.info-laporan{
    margin-top:10px;
    display:flex;
    gap:20px;
    color:#888;
    font-size:14px;
}

/* BUTTON */
.detail-btn{
    background:#163b79;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.detail-btn:hover{
    background:#0f2956;
}

/* RESPONSIVE */
@media(max-width:768px){

    .status-search-box{
        flex-direction:column;
    }

    .status-search-box input{
        width:100%;
    }

    .laporan-card{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }

    .detail-btn{
        width:100%;
        text-align:center;
    }

    .info-laporan{
        flex-direction:column;
        gap:5px;
    }
}

</style>
</head>
<body>

<section class="status-section">

    <!-- HEADER -->
    <div class="status-header">
        <h1>Cek Status Laporan</h1>
        <p>Lihat perkembangan laporan yang telah Anda kirimkan</p>
    </div>

    <!-- SEARCH -->
    <div class="status-search-box">
        <input type="text" placeholder="Cari berdasarkan kode laporan...">
        <button>
            <i class="fa fa-search"></i> Cari
        </button>
    </div>

    <!-- DAFTAR LAPORAN -->
    <div class="laporan-list">

        <!-- LAPORAN 1 -->
        <div class="laporan-card">

            <div>
                <h3>LP-2026-001</h3>

                <p>Jalan berlubang di Jl. Moh. Hatta</p>

                <span class="status-badge proses">
                    Diproses
                </span>

                <div class="info-laporan">
                    <span><i class="fa fa-location-dot"></i> Palu Barat</span>
                    <span><i class="fa fa-calendar"></i> 07 Juni 2026</span>
                </div>
            </div>

            <a href="#" class="detail-btn">
                Lihat Detail
            </a>

        </div>

        <!-- LAPORAN 2 -->
        <div class="laporan-card">

            <div>
                <h3>LP-2026-002</h3>

                <p>Sampah menumpuk di Pasar Inpres Manonda</p>

                <span class="status-badge verifikasi">
                    Verifikasi
                </span>

                <div class="info-laporan">
                    <span><i class="fa fa-location-dot"></i> Palu Selatan</span>
                    <span><i class="fa fa-calendar"></i> 08 Juni 2026</span>
                </div>
            </div>

            <a href="#" class="detail-btn">
                Lihat Detail
            </a>

        </div>

        <!-- LAPORAN 3 -->
        <div class="laporan-card">

            <div>
                <h3>LP-2026-003</h3>

                <p>Lampu jalan mati di Kelurahan Talise</p>

                <span class="status-badge selesai">
                    Selesai
                </span>

                <div class="info-laporan">
                    <span><i class="fa fa-location-dot"></i> Mantikulore</span>
                    <span><i class="fa fa-calendar"></i> 09 Juni 2026</span>
                </div>
            </div>

            <a href="#" class="detail-btn">
                Lihat Detail
            </a>

        </div>

    </div>

</section>

</body>
</html>

<?= $this->include('layout/footer') ?>
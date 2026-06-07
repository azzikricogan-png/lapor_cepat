
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cek Status Laporan</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* RESET */
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f4f6f9;
}

/* WRAPPER */
.status-section{
    max-width: 900px;
    margin: 60px auto;
    padding: 0 20px;
}

/* HEADER */
.status-header{
    text-align:center;
    margin-bottom:25px;
}

.status-header h1{
    color:#163b79;
    font-size:36px;
    margin-bottom:10px;
}

.status-header p{
    color:#666;
    font-size:15px;
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
    border-radius:10px;
    border:1px solid #ddd;
}

.status-search-box button{
    background:#ff5e00;
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:10px;
    cursor:pointer;
}

/* CARD */
.result-card{
    background:white;
    padding:25px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

/* TOP */
.result-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

/* BADGE STATUS */
.status-badge{
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    color:white;
    font-weight:600;
}

/* STATUS COLOR */
.proses{ background:#f39c12; }
.verifikasi{ background:#3498db; }
.selesai{ background:#27ae60; }

/* PROGRESS */
.progress-wrapper{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin:25px 0;
}

.progress-step{
    text-align:center;
    flex:1;
    color:#aaa;
}

.progress-step i{
    width:40px;
    height:40px;
    line-height:40px;
    border-radius:50%;
    background:#eee;
    color:#999;
    display:inline-block;
    margin-bottom:8px;
}

/* DONE */
.done i{
    background:#27ae60;
    color:white;
}

/* ACTIVE */
.active i{
    background:#2f80ed;
    color:white;
}

/* LINE */
.line{
    height:3px;
    flex:1;
    background:#eee;
}

.line.done{ background:#27ae60; }
.line.active{ background:#2f80ed; }

/* INFO */
.info-box{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:15px;
    margin-top:25px;
}

.info-box div{
    background:#f9fbff;
    padding:12px;
    border-radius:10px;
    text-align:center;
}

/* RESPONSIVE */
@media(max-width:768px){
    .status-search-box{
        flex-direction:column;
    }

    .status-search-box input{
        width:100%;
    }

    .progress-wrapper{
        flex-direction:column;
        gap:15px;
    }

    .line{ display:none; }

    .info-box{
        grid-template-columns:1fr;
    }
}

</style>
</head>

<body>

<section class="status-section">

    <!-- HEADER -->
    <div class="status-header">
        <h1>Cek Status Laporan</h1>
        <p>Masukkan kode laporan untuk melihat progres</p>
    </div>

    <!-- SEARCH -->
    <div class="status-search-box">
        <input type="text" placeholder="Masukkan Kode Laporan">
        <button><i class="fa fa-search"></i> Cek</button>
    </div>

    <!-- CARD -->
    <div class="result-card">

        <div class="result-top">
            <h3>Kode: LP-2026-001</h3>

            <!-- GANTI STATUS DI SINI -->
            <span class="status-badge proses">
                <i class="fa-solid fa-spinner"></i> Diproses
            </span>
        </div>

        <p>Jalan berlubang di Jl. Moh. Hatta</p>

        <!-- PROGRESS -->
        <div class="progress-wrapper">

            <div class="progress-step done">
                <i class="fa-solid fa-paper-plane"></i>
                <span>Dikirim</span>
            </div>

            <div class="line done"></div>

            <div class="progress-step done">
                <i class="fa-solid fa-check"></i>
                <span>Verifikasi</span>
            </div>

            <div class="line active"></div>

            <div class="progress-step active">
                <i class="fa-solid fa-gear"></i>
                <span>Diproses</span>
            </div>

            <div class="line"></div>

            <div class="progress-step">
                <i class="fa-solid fa-circle-check"></i>
                <span>Selesai</span>
            </div>

        </div>

        <!-- INFO -->
        <div class="info-box">
            <div>
                <h4>Lokasi</h4>
                <p>Palu</p>
            </div>

            <div>
                <h4>Tanggal</h4>
                <p>07 Juni 2026</p>
            </div>

            <div>
                <h4>Instansi</h4>
                <p>Dinas PU</p>
            </div>
        </div>

    </div>

</section>

</body>
</html>
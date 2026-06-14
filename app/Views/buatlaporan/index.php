<?= $this->include('home/header') ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buat Laporan</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>



<div class="hero-banner">
    <h1>Layanan Pengaduan Untuk Masyarakat Palu</h1>
    <p>
        Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang.
    </p>
</div>

<div class="container">

    <div class="form-card">

        <h2>Buat Laporan</h2>

        <form action="<?= base_url('buat_laporan/simpan') ?>" method="post" enctype="multipart/form-data">






            <div class="form-group">
                <label>Kategori Laporan</label>

                <select name="id_layanan">
                    <option value="">Pilih Kategori Laporan</option>
                    <option value="17">Jalan Rusak</option>
                    <option value="18">Lampu Jalan</option>
                    <option value="19">Sampah</option>
                    <option value="20">Drainase/Banjir</option>
                    <option value="21">Air Bersih</option>
                    <option value="22">Kependudukan (KTP, KK, Akta)</option>
                    <option value="23">Pendidikan</option>
                    <option value="24">Kesehatan</option>
                    <option value="25">Perizinan</option>
                    <option value="26">Ketertiban Umum</option>
                    <option value="27">Kebakaran</option>
                    <option value="28">Bencana Alam</option>
                    <option value="29">Fasilitas Umum</option>
                    <option value="30">Lainnya</option>
                </select>
            </div>

            
            <div class="form-group">
                <label>Judul Laporan<span>*</span></label>

                <textarea
                name="judul"
                rows="1"
                placeholder="Ketik Isi Laporan Anda"></textarea>
            </div>

            <div class="form-group">
                <label>Isi Laporan <span>*</span></label>

                <textarea
                name="deskripsi"
                rows="6"
                placeholder="Ketik Isi Laporan Anda"></textarea>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Kejadian</label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    max="<?= date('m-Y-d') ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Lokasi Kejadian <span>*</span></label>

                <select name="lokasi">
                <option>Pilih Lokasi Kejadian</option>

                <option>Balaroa</option>
                <option>Besusu Barat</option>
                <option>Besusu Tengah</option>
                <option>Besusu Timur</option>
                <option>Duyu</option>
                <option>Kabonena</option>
                <option>Kamonji</option>
                <option>Lere</option>
                <option>Nunu</option>
                <option>Palupi</option>
                <option>Pengawu</option>
                <option>Silae</option>
                <option>Talise</option>
                <option>Talise Valangguni</option>
                <option>Tanamodindi</option>
                <option>Tatura Selatan</option>
                <option>Tatura Utara</option>
                <option>Tawanjuka</option>
                <option>Tondo</option>
                <option>Tipo</option>
                <option>Ujuna</option>
                </select>
            </div>

        

            <div class="upload-area">

                <label for="lampiran" class="upload-btn">
                    <i class="fa-solid fa-link"></i>
                    Upload Lampiran
                </label>

                <input
                type="file"
                name="foto"
                id="lampiran"
                hidden>

            </div>

            <button type="submit" class="btn-submit">
                Lapor
            </button>

        </form>

    </div>

</div>



<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

.hero-banner{
    width:100%;
    text-align:center;
    padding:30px 20px;
    margin-bottom:20px;
}

.hero-banner h1{
    font-size:40px;
    font-weight:700;
    color:#163b79;
    margin-bottom:10px;
}

.hero-banner p{
    font-size:20px;
    color:#666;
    font-weight:500;
}



/* BACKGROUND */

.bg-left{
    position:fixed;
    left:-150px;
    top:-100px;
    width:450px;
    height:450px;
    background:linear-gradient(
        135deg,
        #6D28D9,
        #8B5CF6
    );
    border-radius:50%;
    filter:blur(80px);
    opacity:.25;
    z-index:-1;
}

.bg-right{
    position:fixed;
    right:-150px;
    bottom:-100px;
    width:450px;
    height:450px;
    background:linear-gradient(
        135deg,
        #7C3AED,
        #A78BFA
    );
    border-radius:50%;
    filter:blur(80px);
    opacity:.25;
    z-index:-1;
}

.bg-center{
    position:fixed;
    top:40%;
    left:50%;
    transform:translate(-50%,-50%);
    width:500px;
    height:500px;
    background:#C4B5FD;
    border-radius:50%;
    filter:blur(120px);
    opacity:.15;
    z-index:-1;
}

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f4f6f9;
    min-height:100vh;
    overflow-x:hidden;
}


.container{
    display:flex;
    justify-content:center;
    padding:20px;
}

.form-card{
    width:100%;
    max-width:  650px; /* perbesar dari ukuran default */
    background:#ffffff;
    border-radius:18px;
    padding:25px 30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    border:none;
    color:#333;
}

.form-card h2{
    margin-bottom:20px;
    color :#ffffff;
    font-size:22px;
}

.form-group{
    margin-bottom:18px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color: #163b79;
}

.form-group span{
    color:red;
}


# tanggal lapooran

input[type="date"]::-webkit-datetime-edit{
    color:transparent;
}

input[type="date"]:focus::-webkit-datetime-edit,
input[type="date"]:valid::-webkit-datetime-edit{
    color:#333;
}

# ---

textarea::placeholder,
input::placeholder{
    color:#cfe3ff;
}

input,
textarea,
select{
    width:100%;
    padding:12px 15px;
    border:1px solid #ddd;
    border-radius:10px;
    background:#fff;
    color:#333;
    outline:none;
}

input:focus,
textarea:focus,
select:focus{
    border-color:#2f80ed;
}

.upload-area{
    margin-top:10px;
    margin-bottom:20px;
}

.upload-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:12px 20px;
    border:1px solid #ff9735;
    border-radius:8px;
    color:#ff9735;
    cursor:pointer;
    transition:.3s;
    font-size:11px;
}

.upload-btn:hover{
    background:#ff9735;
    color:#002b78;
}

.check-group{
    display:flex;
    gap:20px;
    margin:25px 0;
}

.check-group label{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
}

.check-group input{
    width:18px;
    height:18px;
}

.btn-submit{
    width:100%;
    height:45px;
    border:none;
    border-radius:10px;
    background:#ff6a00;
    color:white;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-submit:hover{
    background:#ff7a1a;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(255,106,0,.35);
}

.progress-laporan{
    width:100%;
    max-width:1100px;
    margin:40px auto;
    padding:20px 10px;
    position:relative;

    display:flex;
    justify-content:space-between;
    text-align:center;
}

.progress-line{
    position:absolute;
    top:45px;
    left:110px;
    right:110px;
    height:3px;
    background:#d9d9d9;
    z-index:1;
}

.progress-active{
    width:25%;
    height:100%;
    background:linear-gradient(
        90deg,
        #ff512f,
        #dd2476,
        #7b2ff7
    );
}

.step{
    width:180px;
    position:relative;
    z-index:2;
}

.icon{
    width:48px;
    height:48px;
    margin:auto;

    border-radius:50%;
    background:#cfcfcf;
    color:#fff;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:18px;
}

.step.active .icon{
    background:linear-gradient(
        135deg,
        #ff6a00,
        #ff9735
    );
    box-shadow:0 5px 15px rgba(255,106,0,.3);
}

.step h4{
    margin-top:18px;
    margin-bottom:12px;
    color:#163b79;
    font-size:16px;
    font-weight:700;
}

.step p{
    color:#666;
    font-size:14px;
    line-height:1.5;
}

@media(max-width:900px){

    .progress-laporan{
        flex-direction:column;
        gap:30px;
    }

    .progress-line{
        display:none;
    }

    .step{
        width:100%;
    }
}



select option{
    background:#002b78;
    color:#fff;
}

@media(max-width:768px){

    .bg-left,
    .bg-right{
        display:none;
    }

    .form-card{
        padding:20px;
    }

}

</style>

</body>
</html>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Laporan</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- SIDEBAR -->
<?= $this->include('petugas/index') ?>

<!-- MAIN CONTENT -->
<div class="main-content">

    <!-- HEADER -->
    <div class="page-header">

        <div>
            <h1>Data Laporan</h1>
            <p>Kelola seluruh laporan masyarakat dengan mudah.</p>
        </div>

  

    </div>

    <!-- STATISTIK -->
    <div class="statistik-container">

        <div class="card-stat">
            <div class="icon blue">
                <i class="fa fa-file-lines"></i>
            </div>

            <div class="info">
                <h3><?= $total ?? 0 ?></h3>
                <p>Total Laporan</p>
            </div>
        </div>

        <div class="card-stat">
            <div class="icon orange">
                <i class="fa fa-clock"></i>
            </div>

            <div class="info">
                <h3><?= $menunggu ?? 0 ?></h3>
                <p>Menunggu</p>
            </div>
        </div>

        <div class="card-stat">
            <div class="icon purple">
                <i class="fa fa-spinner"></i>
            </div>

            <div class="info">
                <h3><?= $diproses ?? 0 ?></h3>
                <p>Diproses</p>
            </div>
        </div>

        <div class="card-stat">
            <div class="icon green">
                <i class="fa fa-circle-check"></i>
            </div>

            <div class="info">
                <h3><?= $selesai ?? 0 ?></h3>
                <p>Selesai</p>
            </div>
        </div>

    </div>

    <!-- FILTER -->
    <div class="filter-box">

        <form method="get" action="<?= base_url('petugas/laporan') ?>" class="search-box">

            <i class="fa fa-search"></i>

            <input
                type="text"
                name="keyword"
                placeholder="Cari judul, pelapor, atau lokasi..."
                value="<?= esc($_GET['keyword'] ?? '') ?>">

        </form>

        <div class="filter-right">

            <select id="statusFilter">
                <option value="">Semua Status</option>
                <option value="Menunggu">Menunggu</option>
                <option value="Diproses">Diproses</option>
                <option value="Selesai">Selesai</option>
                <option value="Ditolak">Ditolak</option>
            </select>

        </div>

    </div>

    <!-- TABEL -->
    <div class="table-container">

        <table id="laporanTable">

            <thead>

                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Pelapor</th>
                    <th>Layanan</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>

            </thead>

<tbody>

<?php foreach ($laporan as $row): ?>

<tr>

    <td>
        <?php if (!empty($row['foto'])): ?>
            <img
                src="<?= base_url('uploads/' . $row['foto']) ?>"
                class="foto-laporan">
        <?php else: ?>
            Tidak Ada Foto
        <?php endif; ?>
    </td>

    <td><?= esc($row['judul']) ?></td>

    <td><?= esc($row['nama']) ?></td>

    <td><?= esc($row['nama_layanan']) ?></td>

    <td><?= esc($row['lokasi']) ?></td>

    <td>

        <?php if($row['status'] == 'Menunggu'): ?>

            <span class="badge Menunggu">
                Menunggu
            </span>

        <?php elseif($row['status'] == 'Diproses'): ?>

            <span class="badge proses">
                Diproses
            </span>

        <?php elseif($row['status'] == 'Selesai'): ?>
            <span class="bage selesai">
                Selesai
            </span>
        <?php else: ?>

            <span class="badge Ditolak">
                Ditolak
            </span>

        <?php endif; ?>

    </td>

    <td>
        <?= date('d M Y', strtotime($row['created_at'])) ?>
    </td>

    <td>

        <button
            class="btn-detail"

            onclick="openModal(
            '<?= $row['id_laporan'] ?>',
            '<?= esc($row['judul']) ?>',
            '<?= esc($row['nama']) ?>',
            '<?= esc($row['nama_layanan']) ?>',
            '<?= esc($row['lokasi']) ?>',
            '<?= esc($row['deskripsi']) ?>',
            '<?= esc($row['status']) ?>',
            '<?= $row['foto'] ?>'
            )">

            <i class="fa fa-eye"></i>
            Detail

        </button>

    </td>

</tr>

<?php endforeach; ?>

</tbody>
        </table>

    </div>

</div>

<!-- MODAL DETAIL -->
<div id="detailModal" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h2>
                <i class="fa fa-file-lines"></i>
                Detail Laporan
            </h2>

            <span class="close" onclick="closeModal()">
                &times;
            </span>

        </div>

        <div class="modal-body">

            <div class="detail-grid">

                <div class="detail-item">
                    <label>Judul</label>
                    <p id="detailJudul"></p>
                </div>

                <div class="detail-item">
                    <label>Pelapor</label>
                    <p id="detailPelapor"></p>
                </div>

                <div class="detail-item">
                    <label>Layanan</label>
                    <p id="detailLayanan"></p>
                </div>

                <div class="detail-item">
                    <label>Lokasi</label>
                    <p id="detailLokasi"></p>
                </div>

                <div class="detail-item full">
                    <label>Status</label>
                    <p id="detailStatus"></p>
                </div>

                <div class="detail-item full">
                    <label>Deskripsi</label>
                    <div class="deskripsi-box">
                        <p id="detailDeskripsi"></p>
                    </div>
                </div>

            </div>

            <!-- TANGGAPAN -->
            <div class="section-card">


                    <h3><i class="fa fa-image"></i> Foto Laporan</h3>

                    <img id="detailFoto"
                        style="width:200px;border-radius:10px;">
                <h3>
                    <i class="fa fa-comments"></i>
                    Tanggapan Petugas
                </h3>

                <form action="#" method="post">

                    <textarea
                        name="isi_tanggapan"
                        rows="5"
                        placeholder="Tulis tanggapan untuk laporan ini..."
                    ></textarea>

                    <button type="submit" class="btn-kirim">

                        <i class="fa fa-paper-plane"></i>
                        Kirim Tanggapan

                    </button>

                </form>

            </div>

            <!-- UPDATE STATUS -->
            <div class="section-card">

                <h3>
                    <i class="fa fa-gear"></i>
                    Update Status
                </h3>

            <form action="<?= base_url('petugas/updateStatus') ?>" method="post">

                <input type="hidden"
                        name="id_laporan"
                        id="id_laporan">

                <select name="status">
                    <option value="Menunggu">Menunggu</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Ditolak">Ditolak</option>
                    </select>

                <button type="submit" class="btn-update">
                    Simpan Status
                </button>

            </form>


            </div>

        </div>

    </div>

</div>

<script>

function openModal(
    id_laporan,
    judul,
    pelapor,
    layanan,
    lokasi,
    deskripsi,
    status,
    foto
){
    console.log("ID Laporan =", id_laporan);

    document.getElementById('id_laporan').value = id_laporan;

    document.getElementById('detailJudul').innerText = judul;
    document.getElementById('detailPelapor').innerText = pelapor;
    document.getElementById('detailLayanan').innerText = layanan;
    document.getElementById('detailLokasi').innerText = lokasi;
    document.getElementById('detailDeskripsi').innerText = deskripsi;
    document.getElementById('detailStatus').innerText = status;

      // 🔥 INI PENTING
    document.getElementById('detailFoto').src =
        '<?= base_url('uploads/') ?>/' + foto;

    document.getElementById('detailModal').style.display = 'flex';

   
}
function closeModal()
{
    document.getElementById('detailModal').style.display = 'none';
}
</script>

<script>

document
.getElementById("searchInput")
.addEventListener("keyup", function(){

    let filter =
        this.value.toLowerCase();

    let rows =
        document.querySelectorAll(
            "#laporanTable tbody tr"
        );

    rows.forEach(function(row){

        let text =
            row.innerText.toLowerCase();

        row.style.display =
            text.includes(filter)
            ? ""
            : "none";

    });

});

</script>

<script>

document
.getElementById("statusFilter")
.addEventListener("change", function(){

    let status = this.value;

    let rows =
        document.querySelectorAll(
            "#laporanTable tbody tr"
        );

    rows.forEach(function(row){

        let cell =
            row.cells[5].innerText.trim();

        if(
            status === ""
            || cell === status
        ){

            row.style.display = "";

        }
        else{

            row.style.display = "none";

        }

    });

});

</script>

<style>

/* ======================
   MAIN CONTENT
====================== */

.main-content{
    margin-left:260px;
    padding:30px;
    background:#f5f7fb;
    min-height:100vh;
}

/* ======================
   HEADER
====================== */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.page-header h1{
    font-size:28px;
    color:#1f2937;
    margin-bottom:5px;
}

.page-header p{
    color:#6b7280;
    font-size:14px;
}

.btn-refresh{
    border:none;
    cursor:pointer;
    padding:12px 18px;
    border-radius:10px;
    background:#2563eb;
    color:white;
    font-weight:600;
    transition:.3s;
}

.btn-refresh:hover{
    transform:translateY(-2px);
}

/* ======================
   STATISTIK
====================== */

.statistik-container{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:25px;
}

.card-stat{
    background:white;
    border-radius:18px;
    padding:22px;
    display:flex;
    align-items:center;
    gap:15px;
    box-shadow:0 5px 18px rgba(0,0,0,.06);
}

.icon{
    width:60px;
    height:60px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:15px;
    font-size:22px;
    color:white;
}

.blue{
    background:#2563eb;
}

.orange{
    background:#f59e0b;
}

.purple{
    background:#8b5cf6;
}

.green{
    background:#10b981;
}

.card-stat h3{
    font-size:28px;
    color:#111827;
}

.card-stat p{
    color:#6b7280;
    font-size:14px;
}

/* ======================
   FILTER
====================== */

.filter-box{
    background:white;
    border-radius:18px;
    padding:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    box-shadow:0 5px 18px rgba(0,0,0,.05);
}

.search-box{
    position:relative;
    width:350px;
}

.search-box i{
    position:absolute;
    left:15px;
    top:50%;
    transform:translateY(-50%);
    color:#9ca3af;
}

.search-box input{
    width:100%;
    padding:12px 15px 12px 42px;
    border:1px solid #e5e7eb;
    border-radius:10px;
    outline:none;
}

.search-box input:focus{
    border-color:#2563eb;
}

.filter-right select{
    padding:12px 15px;
    border-radius:10px;
    border:1px solid #e5e7eb;
    cursor:pointer;
}

/* ======================
   TABLE
====================== */

.table-container{
    background:white;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 5px 18px rgba(0,0,0,.05);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#f9fafb;
}

thead th{
    padding:18px;
    text-align:left;
    font-size:14px;
    color:#374151;
}

tbody td{
    padding:18px;
    border-top:1px solid #f1f5f9;
    vertical-align:middle;
}

tbody tr:hover{
    background:#f8fafc;
}

/* ======================
   FOTO
====================== */

.foto-laporan{
    width:65px;
    height:65px;
    border-radius:12px;
    object-fit:cover;
}

.no-image{
    width:65px;
    height:65px;
    background:#e5e7eb;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:12px;
    color:#6b7280;
}

/* ======================
   BADGE
====================== */

.badge{
    padding:8px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.pending{
    background:#fff7ed;
    color:#ea580c;
}

.proses{
    background:#ede9fe;
    color:#7c3aed;
}

.selesai{
    background:#ecfdf5;
    color:#059669;
}

/* ======================
   BUTTON DETAIL
====================== */

.btn-detail{
    border:none;
    background:#2563eb;
    color:white;
    padding:10px 15px;
    border-radius:10px;
    cursor:pointer;
    font-size:13px;
    transition:.3s;
}

.btn-detail:hover{
    background:#1d4ed8;
}

/* ======================
   MODAL
====================== */

.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.45);
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.modal-content{
    background:white;
    width:70%;
    max-width:600px;
    border-radius:20px;
    overflow:hidden;
    max-height:90vh;
    overflow-y:auto;
}

.modal-header{
    padding:20px 25px;
    border-bottom:1px solid #e5e7eb;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.modal-header h2{
    color:#111827;
}

.close{
    font-size:28px;
    cursor:pointer;
    color:#6b7280;
}

.modal-body{
    padding:25px;
}

/* ======================
   DETAIL GRID
====================== */

.detail-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
    margin-bottom:25px;
}

.detail-item{
    display:flex;
    flex-direction:column;
}

.detail-item label{
    font-size:13px;
    font-weight:600;
    color:#6b7280;
    margin-bottom:8px;
}

.detail-item p{
    color:#111827;
    font-size:15px;
    line-height:1.6;
}

.detail-item.full{
    grid-column:1 / -1;
}

/* ======================
   DESKRIPSI
====================== */

.deskripsi-box{
    background:#f9fafb;
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:16px;
    line-height:1.8;
}

/* ======================
   SECTION CARD
====================== */

.section-card{
    background:#ffffff;
    border:1px solid #e5e7eb;
    border-radius:16px;
    padding:22px;
    margin-top:25px;
}

.section-card h3{
    font-size:18px;
    color:#111827;
    margin-bottom:18px;
}

.section-card h3 i{
    margin-right:8px;
    color:#2563eb;
}

/* ======================
   FORM
====================== */

.section-card form{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.section-card textarea{
    resize:vertical;
    min-height:120px;
    border:1px solid #d1d5db;
    border-radius:12px;
    padding:15px;
    font-size:14px;
    outline:none;
    transition:.3s;
}

.section-card textarea:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.1);
}

.section-card select{
    border:1px solid #d1d5db;
    border-radius:12px;
    padding:14px;
    outline:none;
    font-size:14px;
}

.section-card select:focus{
    border-color:#2563eb;
}

/* ======================
   BUTTON KIRIM
====================== */

.btn-kirim{
    background:#2563eb;
    color:white;
    border:none;
    border-radius:12px;
    padding:14px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-kirim:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

/* ======================
   BUTTON UPDATE
====================== */

.btn-update{
    background:#10b981;
    color:white;
    border:none;
    border-radius:12px;
    padding:14px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-update:hover{
    background:#059669;
    transform:translateY(-2px);
}

/* ======================
   SCROLLBAR
====================== */

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-track{
    background:#f1f5f9;
}

::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:20px;
}

::-webkit-scrollbar-thumb:hover{
    background:#94a3b8;
}

/* ======================
   TABLE HOVER
====================== */

tbody tr{
    transition:.25s;
}

tbody tr:hover{
    transform:scale(1.002);
}

/* ======================
   CARD HOVER
====================== */

.card-stat{
    transition:.3s;
}

.card-stat:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 24px rgba(0,0,0,.08);
}

/* ======================
   RESPONSIVE LAPTOP
====================== */

@media(max-width:1200px){

    .statistik-container{
        grid-template-columns:repeat(2,1fr);
    }

}

/* ======================
   TABLET
====================== */

@media(max-width:992px){

    .main-content{
        margin-left:0;
        padding:20px;
    }

    .page-header{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }

    .filter-box{
        flex-direction:column;
        align-items:stretch;
        gap:15px;
    }

    .search-box{
        width:100%;
    }

    .detail-grid{
        grid-template-columns:1fr;
    }

}

/* ======================
   MOBILE
====================== */

@media(max-width:768px){

    .statistik-container{
        grid-template-columns:1fr;
    }

    .table-container{
        overflow-x:auto;
    }

    table{
        min-width:900px;
    }

    .page-header h1{
        font-size:24px;
    }

    .modal-content{
        width:95%;
        max-height:95vh;
    }

    .modal-body{
        padding:18px;
    }

    .section-card{
        padding:18px;
    }

}

/* ======================
   SMALL MOBILE
====================== */

@media(max-width:480px){

    .main-content{
        padding:15px;
    }

    .card-stat{
        padding:18px;
    }

    .card-stat h3{
        font-size:22px;
    }

    .icon{
        width:50px;
        height:50px;
        font-size:18px;
    }

    .btn-detail{
        padding:8px 12px;
        font-size:12px;
    }

    .btn-refresh{
        width:100%;
    }

}
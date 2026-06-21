<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data User</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">




<style>

body{
    background:#f4f6fb;
    font-family:Segoe UI,sans-serif;
    padding:20px;
}

.card{
    background:white;
    border-radius:12px;
    padding:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.search{
    display:flex;
    gap:10px;
}

.search input{
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
    width:250px;
}

.search button{
    border:none;
    background:#002b78;
    color:white;
    padding:10px 15px;
    border-radius:8px;
    cursor:pointer;
}

.btn-reset{
    background:#dc2626;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:8px;
}

table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed; /* penting biar kolom stabil */
}


th:first-child,
td:first-child {
    width: 50px;
    text-align: center;
}

th:nth-child(2),
td:nth-child(2) {
    width: 160px;
}

th:nth-child(3),
td:nth-child(3) {
    text-align: left;
    width: 200px;

}

th, td {
    padding: 12px;
    border-bottom: 1px solid #eee;
    vertical-align: middle; /* ini kunci biar sejajar vertikal */
    text-align: left;
}

/* khusus header biar rapi */
th {
    background: #002b78;
    color: white;
    font-weight: 600;
}

/* isi user info biar tidak “turun” */
.user-info {
    display: flex;
    align-items: center; /* sudah benar, tapi pastikan ini aktif */
    gap: 10px;
}

/* supaya tombol aksi juga sejajar tengah */
td:last-child {
    vertical-align: middle;
    white-space: nowrap;
}

/* biar teks role tidak bikin beda tinggi */
.badge {
    display: inline-block;
    vertical-align: middle;
}

.admin{
    background:#ffe5c7;
    color:#ff7b00;
}

.avatar-img{
    width:35px;
    height:35px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid #ddd;
}


/* ------- */

.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.55);
    backdrop-filter: blur(6px);
    z-index:999;
}

.modal-content{
    width:420px;
    max-width:92%;
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    box-shadow:0 25px 60px rgba(0,0,0,.25);
    animation:pop .25s ease;
}

@keyframes pop{
    from{transform:translate(-50%,-45%) scale(.95); opacity:0;}
    to{transform:translate(-50%,-50%) scale(1); opacity:1;}
}

/* HEADER */
.modal-header{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    height:120px;
    position:relative;
}

/* FOTO */
.modal-foto{
    width:110px;
    height:110px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #fff;
    position:absolute;
    left:50%;
    bottom:-55px;
    transform:translateX(-50%);
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

/* BODY */
.modal-body{
    padding:70px 22px 25px;
}

/* NAME */
.modal-name{
    text-align:center;
    margin-bottom:18px;
}

.modal-name h3{
    margin:0;
    font-size:22px;
    color:#111827;
}

/* ROLE BADGE */
.modal-role{
    display:inline-block;
    margin-top:6px;
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
    background:#e0e7ff;
    color:#1d4ed8;
}

/* INFO GRID */
.info-grid{
    display:grid;
    grid-template-columns:1fr;
    gap:10px;
}

.info-item{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px;
    border-radius:14px;
    background:#f8fafc;
    transition:.2s;
}

.info-item:hover{
    transform:translateY(-2px);
    background:#eef2ff;
}

.info-item i{
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px;
    background:#e0e7ff;
    color:#1d4ed8;
    font-size:16px;
}

.info-label{
    font-size:12px;
    color:#6b7280;
}

.info-value{
    font-weight:600;
    color:#111827;
}

/* CLOSE BUTTON */
.close{
    position:absolute;
    top:10px;
    right:14px;
    width:34px;
    height:34px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:rgba(255,255,255,.2);
    color:#fff;
    font-size:20px;
    cursor:pointer;
    transition:.2s;
}

.close:hover{
    background:rgba(255,255,255,.35);
    transform:rotate(90deg);
}


/* ------- */


.petugas{
    background:#dbeafe;
    color:#2563eb;
}

.user{
    background:#dcfce7;
    color:#15803d;
}

.btn{
    padding:6px 10px;
    border-radius:6px;
    text-decoration:none;
    color:white;
    font-size:12px;
}

.blue{
    background:#2563eb;
}

.red{
    background:#dc2626;
}

.avatar{
    width:35px;
    height:35px;
    border-radius:50%;
    background:#ff9735;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

.user-info{
    display:flex;
    align-items:center;
    gap:10px;
}


.layout{
    display:flex;
}

/* sidebar kamu (sesuaikan kalau sudah ada class sidebar) */
.sidebar{
    width:250px;
    position:sticky;
    top:0;
    height:100vh;
}

/* isi utama */
.content{
    margin-left:260px;
    padding:20px;
}

.page-header{
    background:#fff;
    border-radius:16px;
    padding:30px;
    margin-bottom:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.page-badge{
    display:inline-block;
    background:#e8f0ff;
    color:#2563eb;
    padding:8px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    margin-bottom:12px;
}

.page-header h1{
    margin:0;
    font-size:30px;
    color:#1f2937;
}

.page-header p{
    margin-top:10px;
    color:#6b7280;
    max-width:600px;
    line-height:1.7;
}

.page-icon{
    width:120px;
    height:120px;
    border-radius:50%;
    background:#eef4ff;
    display:flex;
    align-items:center;
    justify-content:center;
}

.page-icon i{
    font-size:50px;
    color:#2563eb;
}


.sidebar{
width:240px;
height:100vh;
background:#002b78;
color:white;
padding:20px;
position:fixed;
display:flex;
flex-direction:column;
gap:15px;
}

.brand{
text-align:center;
margin-bottom:20px;
}

.brand img{
width:55px;
}

.brand h2{
font-size:18px;
}

.brand small{
opacity:.7;
font-size:11px;
}

.sidebar a{
color:white;
text-decoration:none;
padding:10px;
border-radius:8px;
display:flex;
gap:10px;
align-items:center;
font-size:14px;
transition:.3s;
}

.sidebar a:hover{
background:#ff9735;
}

</style>

</head>
<body>


<?= $this->include('admin/sidebar') ?>

<div class="content">

<div class="page-header">

    <div class="page-info">
        <span class="page-badge">
            <i class="fa-solid fa-users"></i> Manajemen User
        </span>

        <h1>Data Pengguna</h1>

        <p>
            Kelola seluruh akun yang terdaftar pada sistem Lapor Cepat.
            Cari pengguna, lihat detail profil, dan lakukan pengelolaan data.
        </p>
    </div>

    <div class="page-icon">
        <i class="fa-solid fa-users-gear"></i>
    </div>

</div>


<div class="card">

    <div class="header">

        <h2>Data User</h2>

        <form method="GET" class="search">

            <input
                type="text"
                name="keyword"
                placeholder="Cari nama atau email..."
                value="<?= esc($_GET['keyword'] ?? '') ?>">

            <button type="submit">
                <i class="fa fa-search"></i>
            </button>

            <a href="<?= base_url('admin/user') ?>" class="btn-reset">
                Reset
            </a>

        </form>

    </div>

    <table>

        <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php if(!empty($user)): ?>

            <?php $no = 1; ?>

            <?php foreach($user as $u): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td>

                    <div class="user-info">

                        <?php if(!empty($u['foto'])): ?>

                            <img src="<?= base_url('uploads/'.$u['foto']) ?>"
                                class="avatar-img"
                                alt="Foto Profil">

                        <?php else: ?>

                            <div class="avatar">
                                <?= strtoupper(substr($u['nama'],0,1)) ?>
                            </div>

                        <?php endif; ?>

                        <div>
                            <?= esc($u['nama']) ?>
                        </div>

                    </div>

                </td>

                <td><?= esc($u['email']) ?></td>

                <td><?= esc($u['no_hp'] ?? '-') ?></td>

                <td>

                    <span class="badge <?= strtolower($u['role']) ?>">
                        <?= esc($u['role']) ?>
                    </span>

                </td>

                <td>

                    <button
                        class="btn blue detail-btn"
                        data-nama="<?= esc($u['nama']) ?>"
                        data-email="<?= esc($u['email']) ?>"
                        data-hp="<?= esc($u['no_hp']) ?>"
                        data-role="<?= esc($u['role']) ?>"
                        data-alamat="<?= esc($u['alamat'] ?? '-') ?>"
                        data-foto="<?= base_url('uploads/'.$u['foto']) ?>">
                        Detail
                    </button>

                    <a href="<?= base_url('admin/user/hapus/'.$u['id_user']) ?>"
                       class="btn red"
                       onclick="return confirm('Hapus user ini?')">
                        Hapus
                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="6" align="center">
                    Tidak ada data user
                </td>
            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<div id="detailModal" class="modal">

    <div class="modal-content">

        <span class="close">&times;</span>

        <div class="modal-header">
            <img id="modalFoto" class="modal-foto">
        </div>

        <div class="modal-body">

            <div class="modal-name">
                <h3 id="modalNama"></h3>
                <span class="modal-role" id="modalRole"></span>
            </div>

            <div class="info-item">
                <i class="fa-solid fa-envelope"></i>
                <div>
                    <div class="info-label">Email</div>
                    <div class="info-value" id="modalEmail"></div>
                </div>
            </div>

            <div class="info-item">
                <i class="fa-solid fa-phone"></i>
                <div>
                    <div class="info-label">Nomor HP</div>
                    <div class="info-value" id="modalHp"></div>
                </div>
            </div>

            <div class="info-item">
                <i class="fa-solid fa-location-dot"></i>
                <div>
                    <div class="info-label">Alamat</div>
                    <div class="info-value" id="modalAlamat"></div>
                </div>
            </div>

        </div>

    </div>

</div>

<script>

const modal = document.getElementById('detailModal');

document.querySelectorAll('.detail-btn').forEach(btn => {

    btn.addEventListener('click', function(){

        document.getElementById('modalNama').innerText =
            this.dataset.nama;

        document.getElementById('modalEmail').innerText =
            this.dataset.email;

        document.getElementById('modalHp').innerText =
            this.dataset.hp;

        document.getElementById('modalRole').innerText =
            this.dataset.role;

        document.getElementById('modalAlamat').innerText =
            this.dataset.alamat;

        document.getElementById('modalFoto').src =
            this.dataset.foto;

        modal.style.display = 'block';

    });

});

document.querySelector('.close').onclick = function(){
    modal.style.display = 'none';
}

window.onclick = function(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
}

</script>

</div> <!-- content -->
</body>
</html>
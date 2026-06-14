<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Petugas</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- SIDEBAR -->
<?= $this->include('petugas/index') ?>

<!-- MAIN CONTENT -->
<div class="main">

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="page-header">

        <div>
            <h2>Profil Petugas</h2>
            <p>Informasi akun petugas sistem LaporCepat</p>
        </div>

        <a href="#" class="btn-edit" onclick="openModal()">
            <i class="fa fa-pen"></i>
            Edit Profil
        </a>

    </div>

    <div class="profile-wrapper">

        <!-- CARD PROFIL -->
        <div class="profile-card">

            <div class="avatar">
                <i class="fa-solid fa-user"></i>
            </div>

            <h3><?= session()->get('nama') ?></h3>

            <span class="role">
                <?= ucfirst(session()->get('role')) ?>
            </span>

            <div class="status-akun">
                <i class="fa-solid fa-circle-check"></i>
                Akun Aktif
            </div>

        </div>

        <!-- DETAIL -->
        <div class="detail-card">

            <h3>Informasi Akun</h3>

            <div class="info-grid">

                <div class="item">
                    <label>Nama Lengkap</label>
                    <p><?= session()->get('nama') ?></p>
                </div>

                <div class="item">
                    <label>Email</label>
                    <p><?= session()->get('email') ?></p>
                </div>

                <div class="item">
                    <label>Nomor HP</label>
                    <p><?= session()->get('no_hp') ?></p>
                </div>

                <div class="item">
                    <label>Role</label>
                    <p><?= session()->get('role') ?></p>
                </div>

            </div>

            <div class="info-box">

                <h4>
                    <i class="fa-solid fa-circle-info"></i>
                    Informasi Petugas
                </h4>

                <p>
                    Petugas bertugas menerima laporan masyarakat,
                    memverifikasi laporan, memberikan tanggapan,
                    serta memproses laporan hingga selesai.
                </p>

            </div>

        </div>

    </div>

</div>

<!-- MODAL EDIT PROFIL -->

<div id="editModal" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h3>Edit Profil</h3>

            <span class="close" onclick="closeModal()">
                &times;
            </span>

        </div>

        <form action="<?= base_url('petugas/updateProfil') ?>" method="post">

            <div class="form-group">
                <label>Nama</label>

                <input
                    type="text"
                    name="nama"
                    value="<?= session()->get('nama') ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="<?= session()->get('email') ?>"
                    required>
            </div>

            <div class="form-group">
                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    value="<?= session()->get('no_hp') ?>"
                    required>
            </div>

            <div class="modal-footer">

                <button type="submit" class="btn-save">
                    Simpan
                </button>

                <button
                    type="button"
                    class="btn-cancel"
                    onclick="closeModal()">
                    Batal
                </button>

            </div>

        </form>

    </div>

</div>

<script>

function openModal() {
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function(event) {

    let modal = document.getElementById('editModal');

    if(event.target == modal){
        modal.style.display = 'none';
    }

}

</script>

</body>
</html>

<style>

/* ================= RESET ================= */

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI, sans-serif;
}

/* ================= MAIN ================= */

.main{
margin-left:240px;
padding:30px;
background:#f4f6fb;
min-height:100vh;
}

/* ================= HEADER ================= */

.page-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
flex-wrap:wrap;
gap:15px;
}

.page-header h2{
font-size:28px;
color:#002b78;
margin-bottom:5px;
}

.page-header p{
font-size:14px;
color:#777;
}

/* ================= BUTTON ================= */

.btn-edit{
background:#ff9735;
color:white;
padding:12px 18px;
border-radius:10px;
text-decoration:none;
font-size:14px;
font-weight:600;
display:flex;
align-items:center;
gap:8px;
transition:.3s;
}

.btn-edit:hover{
transform:translateY(-2px);
box-shadow:0 5px 15px rgba(255,151,53,.3);
}

/* ================= WRAPPER ================= */

.profile-wrapper{
display:grid;
grid-template-columns:320px 1fr;
gap:20px;
}

/* ================= PROFILE CARD ================= */

.profile-card{
background:white;
border-radius:20px;
padding:30px;
text-align:center;
box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.avatar{
width:110px;
height:110px;
margin:auto;
border-radius:50%;
background:#002b78;
display:flex;
justify-content:center;
align-items:center;
font-size:42px;
color:white;
}

.profile-card h3{
margin-top:15px;
font-size:22px;
color:#222;
}

.role{
display:inline-block;
margin-top:10px;
padding:7px 16px;
background:#ff9735;
color:white;
font-size:12px;
border-radius:30px;
}

.status-akun{
margin-top:20px;
padding:12px;
background:#e8fff0;
color:#27ae60;
border-radius:10px;
font-weight:600;
}

/* ================= DETAIL CARD ================= */

.detail-card{
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.detail-card h3{
color:#002b78;
margin-bottom:20px;
}

/* ================= GRID ================= */

.info-grid{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:15px;
margin-bottom:25px;
}

.item{
background:#f7f9fc;
padding:18px;
border-radius:12px;
border:1px solid #eef1f6;
}

.item label{
display:block;
font-size:12px;
color:#888;
margin-bottom:6px;
}

.item p{
font-size:15px;
font-weight:600;
color:#333;
}

/* ================= INFO BOX ================= */

.info-box{
background:#eef4ff;
border-left:5px solid #002b78;
padding:20px;
border-radius:12px;
}

.info-box h4{
color:#002b78;
margin-bottom:10px;
}

.info-box p{
color:#555;
line-height:1.8;
}

/* ================= MODAL ================= */

.modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,.5);
backdrop-filter:blur(4px);
z-index:9999;
}

.modal-content{
background:white;
width:90%;
max-width:500px;
margin:80px auto;
padding:25px;
border-radius:20px;
animation:fadeIn .3s ease;
}

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(-15px);
}
to{
opacity:1;
transform:translateY(0);
}
}

.modal-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.modal-header h3{
color:#002b78;
}

.close{
font-size:28px;
cursor:pointer;
color:#999;
}

.close:hover{
color:#e74c3c;
}

/* ================= FORM ================= */

.form-group{
margin-bottom:15px;
}

.form-group label{
display:block;
margin-bottom:6px;
font-size:13px;
font-weight:600;
}

.form-group input{
width:100%;
padding:12px;
border:1px solid #ddd;
border-radius:10px;
outline:none;
}

.form-group input:focus{
border-color:#002b78;
}

/* ================= MODAL BUTTON ================= */

.modal-footer{
display:flex;
gap:10px;
margin-top:20px;
}

.btn-save{
background:#27ae60;
color:white;
border:none;
padding:12px 18px;
border-radius:10px;
cursor:pointer;
font-weight:600;
}

.btn-cancel{
background:#e74c3c;
color:white;
border:none;
padding:12px 18px;
border-radius:10px;
cursor:pointer;
font-weight:600;
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

.main{
margin-left:70px;
padding:20px;
}

.profile-wrapper{
grid-template-columns:1fr;
}

.info-grid{
grid-template-columns:1fr;
}

.page-header{
flex-direction:column;
align-items:flex-start;
}

}

</style>
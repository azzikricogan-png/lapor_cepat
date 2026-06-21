<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil Pengguna - LaporCepat</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', Arial, sans-serif;
}

body{
    background:#eef2f7;
    color:#333;
}

/* HEADER */
.profile-header{
    background:linear-gradient(135deg,#0f2d5c,#1d6efd);
    height:180px;
    border-bottom-left-radius:40px;
    border-bottom-right-radius:40px;
}

/* CONTAINER */
.container{
    max-width:1050px;
    margin:-80px auto 40px;
    padding:15px;
}

/* CARD UTAMA */
.profile-card{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 8px 25px rgba(0,0,0,0.08);
}

/* TOP PROFILE */
.profile-top{
    display:flex;
    gap:20px;
    align-items:center;
    flex-wrap:wrap;
}

/* FOTO */
.profile-photo{
    width:120px;
    height:120px;
    border-radius:50%;
    overflow:hidden;
    border:4px solid #fff;
    box-shadow:0 5px 15px rgba(0,0,0,0.15);
    background:#0f2d5c;
    display:flex;
    align-items:center;
    justify-content:center;
}

.profile-photo img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.profile-photo i{
    font-size:45px;
    color:#fff;
}

/* INFO */
.profile-info h2{
    font-size:22px;
    color:#0f2d5c;
    margin-bottom:5px;
}

.profile-info p{
    font-size:14px;
    color:#666;
    margin-bottom:4px;
}

/* BUTTON */
.action-btn{
    margin-top:12px;
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.btn{
    padding:8px 14px;
    border-radius:8px;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
    transition:0.2s;
}

.btn-edit{
    background:#0d6efd;
    color:#fff;
}

.btn-password{
    background:#f39c12;
    color:#fff;
}

.logout{
    background:#e74c3c;
    color:#fff;
    text-decoration:none;
    padding:8px 14px;
    border-radius:8px;
    font-size:13px;
}

.logout:hover{
    opacity:0.9;
}

/* DETAIL GRID */
.detail-grid{
    margin-top:25px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:15px;
}

.detail-item{
    background:#f8fafc;
    padding:15px;
    border-radius:12px;
    border:1px solid #eef1f5;
}

.detail-item h4{
    font-size:13px;
    color:#0f2d5c;
    margin-bottom:5px;
}

.detail-item p{
    font-size:14px;
    color:#555;
}

/* STATISTIK */
.statistik{
    margin-top:30px;
}

.statistik h3{
    margin-bottom:15px;
    color:#0f2d5c;
}

.stat-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:15px;
}

.stat-card{
    background:#fff;
    padding:20px;
    border-radius:14px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.06);
    transition:0.2s;
}

.stat-card:hover{
    transform:translateY(-3px);
}

.stat-card i{
    font-size:22px;
    color:#0d6efd;
    margin-bottom:8px;
}

.stat-card h2{
    color:#0f2d5c;
}

/* RIWAYAT */
.riwayat{
    margin-top:30px;
}

.riwayat h3{
    margin-bottom:15px;
    color:#0f2d5c;
}

.riwayat-card{
    background:#fff;
    padding:15px;
    border-radius:12px;
    margin-bottom:10px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 3px 10px rgba(0,0,0,0.05);
}

/* BADGE */
.badge{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
    color:#fff;
}

.menunggu{background:#3498db;}
.diproses{background:#f39c12;}
.selesai{background:#27ae60;}

/* MODAL */
.modal{
    display:none;
    position:fixed;
    top:0;left:0;
    width:100%;height:100%;
    background:rgba(0,0,0,0.5);
}

.modal-content{
    background:#fff;
    width:90%;
    max-width:450px;
    margin:70px auto;
    padding:20px;
    border-radius:14px;
}

.close{
    float:right;
    font-size:22px;
    cursor:pointer;
}

.modal input{
    width:100%;
    padding:10px;
    margin:6px 0 12px;
    border:1px solid #ddd;
    border-radius:8px;
}

.modal button{
    width:100%;
    padding:10px;
    background:#0d6efd;
    color:#fff;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

/* RESPONSIVE */
@media(max-width:768px){
    .profile-top{
        flex-direction:column;
        align-items:flex-start;
    }

    .riwayat-card{
        flex-direction:column;
        align-items:flex-start;
        gap:8px;
    }
}

</style>
</head>



<body>

<div class="profile-header"></div>

<div class="container">

    <div class="profile-card">

        <div class="profile-top">

           <div class="profile-photo">

                <?php if (!empty($foto) && $foto != 'default.png') : ?>

                    <img src="<?= base_url('uploads/' . $foto) ?>" alt="Foto Profil">

                <?php else : ?>

                    <i class="fa-solid fa-user"></i>

                <?php endif; ?>

            </div>

            <div class="profile-info">
                <h2><?= $nama ?></h2>
                <p>
                    <i class="fa fa-envelope"></i>
                    <?= $email ?>
                </p>
                <p><i class="fa fa-user"></i> Masyarakat</p>

                <div class="action-btn">

                    <a href="#" class="btn btn-edit" onclick="openModal()">
                        <i class="fa fa-pen"></i> Edit Profil
                    </a>

                    <a href="#" class="btn btn-password" onclick="openPasswordModal()">
                        <i class="fa fa-lock"></i> Ubah Password
                    </a>

                    <a href="<?= base_url('logout') ?>"
                        class="logout"
                        onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                        <i class="fa fa-right-from-bracket"></i> Keluar
                    </a>

                </div>

            </div>

        </div>

        <!-- DETAIL -->

        <div class="detail-grid">

            <div class="detail-item">
                <h4>Nomor HP</h4>
                <p><?= esc($no_hp) ?></p>
            </div>

            <div class="detail-item">
                <h4>Alamat</h4>
                <p><?= esc($alamat) ?></p>
            </div>

            <div class="detail-item">
                <h4>Tanggal Bergabung</h4>
                <p><?= date('d F Y', strtotime($tanggal_daftar)) ?></p>
            </div>

        </div>

    </div>

    <!-- STATISTIK -->

    <div class="statistik">

        <h3>Statistik Laporan</h3>

        <div class="stat-grid">

           <div class="stat-card">
                <i class="fa fa-file-alt"></i>
                <h2><?= $total_laporan ?? 0 ?></h2>
                <p>Total Laporan</p>
            </div>

            <div class="stat-card">
                <i class="fa fa-spinner"></i>
                <h2><?= $proses ?? 0 ?></h2>
                <p>Diproses</p>
            </div>

            <div class="stat-card">
                <i class="fa fa-check-circle"></i>
                <h2><?= $selesai ?? 0 ?></h2>
                <p>Selesai</p>
            </div>

        </div>

    </div>

    <!-- RIWAYAT -->

    <div class="riwayat">

        <h3>Riwayat Laporan Terbaru</h3>

        <?php foreach($riwayat as $r): ?>

        <div class="riwayat-card">
            <div>
                <strong><?= esc($r['judul']) ?></strong><br>
                <small>
                    <i class="fa fa-location-dot"></i>
                    <?= esc($r['lokasi']) ?>
                </small>
            </div>
            <span class="badge <?= strtolower($r['status']) ?>">
                <?= esc($r['status']) ?>
            </span>

            </div>

        <?php endforeach; ?>

    </div>

</div>


<!-- update profil -->
<div id="editModal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeModal()">&times;</span>

        <h2>Edit Profil</h2>

        <form action="<?= base_url('profil/update') ?>" method="post" enctype="multipart/form-data">

            <label>Nama</label>
            <input type="text" name="nama"
                   value="<?= esc($nama) ?>">

            <label>Alamat</label>
            <input type="text" name="alamat"
                value="<?= esc($alamat ?? '') ?>">
            
            <label>Foto Profil</label>
            <input type="file" name="foto" accept="image/*">

            <label>Email</label>
            <input type="email" name="email"
                   value="<?= esc($email) ?>">

            <label>No HP</label>
            <input type="text" name="no_hp"
                   value="<?= esc($no_hp) ?>">

            <button type="submit">Simpan Perubahan</button>

        </form>

    </div>

</div>

    <!-- UBAH PASSWORD-->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePasswordModal()">&times;</span>

        <h2>Ubah Password</h2>

        <form action="<?= base_url('profil/password') ?>" method="post">

            <label>Password Lama</label>
            <input type="password" name="password_lama" required>

            <label>Password Baru</label>
            <input type="password" name="password_baru" required>

            <label>Konfirmasi Password Baru</label>
            <input type="password" name="konfirmasi_password" required>

            <button type="submit">Simpan Password</button>

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

    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

<script>
function openPasswordModal() {
    document.getElementById('passwordModal').style.display = 'block';
}

function closePasswordModal() {
    document.getElementById('passwordModal').style.display = 'none';
}
</script>

</body>
</html>
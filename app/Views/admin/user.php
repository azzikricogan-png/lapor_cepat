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

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#002b78;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    border-bottom:1px solid #eee;
}

.badge{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
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

.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.5);
    z-index:999;
}

.modal-content{
    background:white;
    width:400px;
    max-width:90%;
    padding:20px;
    border-radius:12px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}

.close{
    float:right;
    font-size:25px;
    cursor:pointer;
}

.modal-foto{
    width:100px;
    height:100px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:15px;
}

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

</style>

</head>
<body>

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

        <center>

            <img id="modalFoto" class="modal-foto">

            <h3 id="modalNama"></h3>

        </center>

        <p><b>Email:</b> <span id="modalEmail"></span></p>
        <p><b>No HP:</b> <span id="modalHp"></span></p>
        <p><b>Role:</b> <span id="modalRole"></span></p>
        <p><b>Alamat:</b> <span id="modalAlamat"></span></p>

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

</body>
</html>
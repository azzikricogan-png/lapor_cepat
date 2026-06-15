<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    
</head>
<body>

<div class="container">

    <!-- KIRI -->
    <div class="left-panel">

        <div class="form-box">

            <h1>Daftar</h1>

            <?php if(session()->getFlashdata('error')) : ?>
                <div style="color:red;">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/register') ?>" method="post" autocomplete="off"">

                <div class="input-group">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>

                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <input type="tel" name="no_hp" placeholder="No HP" required>
                </div>

                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="input-group">
                    <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                </div>

                <div class="input-group">
                    <select name="role" required>
                        <option value="">Pilih Role</option>
                        <option value="masyarakat">Masyarakat</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>

                <button type="submit" class="register-btn">
                    Daftar
                </button>

            </form>

            <p class="separator">atau</p>

            <button class="google-btn">
                <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png">
                Masuk dengan Google
            </button>

        </div>

    </div>

    <!-- KANAN -->
    <div class="right-panel">

        <div class="right-content">

            <h2>Sudah Punya Akun?</h2>

            <p>
                Untuk tetap terhubung dengan kami,
                silahkan Masuk sekarang
            </p>

            <a href="<?= base_url('/login') ?>" class="login-link">
                Masuk
            </a>

            <img src="<?= base_url('img/maskot1.png') ?>" alt="login">

        </div>

    </div>

</div>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background: #f4f6f9;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:10px;
}

.container{
    width:100%;
    max-width:1400px;
    height:95vh;
    background:white;
    border-radius:10px;
    overflow:hidden;
    display:flex;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

/* KIRI */

.left-panel{
    width:50%;
    background: #f4f6f9;
    display:flex;
    justify-content:center;
    align-items:center;
}

.form-box{
    width:55%;
    text-align:center;
}

.form-box h1{
    font-size:32px;
    font-weight:700;
    margin-bottom:15px;
    color:#333;
}

.input-group{
    height:45px;
    background:white;
    border-radius:25px;
    display:flex;
    align-items:center;
    padding:0 15px;
    margin-bottom:7px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.input-group i{
    color: #c0c0c0;
}

.input-group input,
.input-grup select{
    flex:1;
    border:none;
    outline:none;
    background:transparent;
    padding:0 15px;
    font-size:14px;
    color: #555;
}

.register-btn{
    width:150px;
    height:45px;
    border:none;
    border-radius:30px;
    background:#ff9735;
    color:white;
    cursor:pointer;
    font-weight:600;
    margin-top:10px;
    box-shadow:0 8px 20px rgba(103,79,61,0.3);
    transition:.3s;
    font-size:14px;
}

.register-btn:hover{
    background:#ffad5a;
    transform:translateY(-3px);
}

.separator{
    margin:12px 0;
    font-size:13px;
    color:#888;
}

.google-btn{
    width:100%;
    height:48px;
    border:none;
    background:white;
    color:#333;
    border-radius:30px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    cursor:pointer;
    font-weight:600;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
    transition:.3s;
    margin-top:10px;
    font-size:13px;
}

.google-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 15px rgba(0,0,0,.15);
}

.google-btn img{
    width:20px;
    height:20px;
    background:none;
    padding:0;
}

/* KANAN */

.right-panel{
    width:50%;
    background: #002b78;
    position:relative;
    overflow:hidden;
}

.right-panel::before{
    content:'';
    position:absolute;
    left:-250px;
    top:-100px;
    width:700px;
    height:1000px;
    background: #f4f6f9;
    border-radius:50%;
}

.right-content{
    position:relative;
    z-index:2;
    height:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    padding-top:60px;
}

.right-content h2{
    font-size:22px;
    font-weight:600;
    margin-bottom:15px;
    color: rgb(0, 0, 0);
}

.right-content p{
    text-align:center;
    margin-bottom:25px;
    font-size:14px;
    line-height:1.6;
    max-width:300px;
    color: rgb(0, 0, 0);
}



.login-link{
    display:inline-block;
    padding:10px 35px;
    background:#ff9735;
    border-radius:50px;
    color:#ffffff;
    text-decoration:none;
    font-weight:600;
    font-size:14px;
}

.login-link:hover{
    background: #ff9735;
    color: #ffffff;
    transform:translateY(-3px);
}



.right-content img{
    width:380px;
    margin-top:40px;
}

.input-group select{
    flex:1;
    border:none;
    outline:none;
    background:transparent;
    font-size:15px;
    padding:0 15px;
    color: ##ff9735;
}


/* RESPONSIVE */

@media(max-width:900px){

    .container{
        flex-direction:column;
        height:auto;
    }

    .left-panel,
    .right-panel{
        width:100%;
    }

    .form-box{
        width:90%;
        padding:50px 0;
    }

    .right-content img{
        width:250px;
    }

    .form-box h1{
        font-size:40px;
    }
}

</style>

</body>
</html>
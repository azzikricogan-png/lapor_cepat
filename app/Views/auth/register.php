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
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="input-group">
                    <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
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
    font-size:50px;
    margin-bottom:20px;
    color: #333;
}

.input-group{
    height:55px;
    background:white;
    border-radius:30px;
    display:flex;
    align-items:center;
    padding:0 20px;
    margin-bottom:7px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.input-group i{
    color: #c0c0c0;
}

.input-group input{
    flex:1;
    border:none;
    outline:none;
    background:transparent;
    padding:0 15px;
    font-size:15px;
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
}

.register-btn:hover{
    background:#ffad5a;
    transform:translateY(-3px);
}

.separator{
    margin:25px 0;
    font-size:22px;
}

.google-btn{
    border:none;
    background:#002b78;
    color:white;
    height:50px;
    border-radius:30px;
    padding:0 25px;
    display:flex;
    align-items:center;
    gap:12px;
    margin:auto;
    cursor:pointer;
    font-weight:600;
}

.google-btn img{
    width:28px;
    background:white;
    border-radius:50%;
    padding:3px;
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
    font-size:28px;
    margin-bottom:15px;
    color: rgb(0, 0, 0);
}

.right-content p{
    text-align:center;
    margin-bottom:25px;
    font-size:18px;
    color: rgb(0, 0, 0);
}



.login-link{
    display:inline-block;
    padding:12px 40px;
    background:#ff9735;
    border-radius:50px;
    color:#ffffff;
    text-decoration:none;
    font-weight:600;
}

.login-link:hover{
    background:#ff9735;
    color:#ffffff;
    transform:translateY(-3px);
}



.right-content img{
    width:380px;
    margin-top:40px;
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
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="container">

    <!-- KIRI -->
    <div class="left-panel">

        <div class="left-content">

            <h1>Belum punya Akun ?</h1>

            <p>Yuk gabung sekarang</p>
            <p>Dan buat laporan sekarang</p>

            <button class="register-btn">
                Daftar
            </button>

            <img src="https://example.com/maskot.png">

        </div>

    </div>

    <!-- KANAN -->
    <div class="right-panel">

    <div class="login-box">

        <form action="<?= base_url('auth/login') ?>" method="post">
            <h2>Masuk</h2>

            <div class="input-group">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Masukkan Kata Sandi" required>
            </div>

            <a href="#" class="forgot">
                Lupa Kata Sandi?
            </a>

            <button type="submit" class="login-btn">
                Masuk
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

body{
    background: #f5f5f5;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:95%;
    height:92vh;
    background:white;
    border-radius:10px;
    overflow:hidden;
    display:flex;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

/* PANEL KIRI */

.left-panel{
    width:50%;
    background: #0400ffd8;
    position:relative;
    overflow:hidden;
}

.left-panel::after{
    content:'';
    position:absolute;
    right:-250px;
    top:-100px;
    width:700px;
    height:900px;
    background:white;
    border-radius:50%;
}

.left-content{
    position:relative;
    z-index:2;
    height:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    padding-top:60px;
}

.left-content h1{
    margin-bottom:20px;
    font-size:40px;
}

.left-content p{
    margin-bottom:10px;
    font-size:18px;
}

.register-btn{
    margin-top:25px;
    background: <div class="login-box">;
    border:none;
    padding:15px 60px;
    border-radius:30px;
    cursor:pointer;
    font-size:17px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.left-content img{
    width:320px;
    margin-top:70px;
}

/* PANEL KANAN */

.right-panel{
    width:50%;
    background: #ececec;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box {
    width:65%;
    text-align:center;
}

.login-box h2{
    font-size:60px;
    margin-bottom:40px;
    color: #333;
}

.input-group{
    background:white;
    margin-bottom:25px;
    border-radius:40px;
    display:flex;
    align-items:center;
    padding:0 20px;
    height:55px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.input-group i{
    color: #bbb;
}

.input-group input{
    flex:1;
    border:none;
    outline:none;
    padding:15px;
    background:transparent;
    font-size:15px;
}

.forgot{
    text-decoration:none;
    display:block;
    text-align:right;
    margin-bottom:25px;
    color: #1565c0;
}

.login-btn{
    width:170px;
    height:50px;
    border:none;
    border-radius:30px;
    background: #0400ffd8;
    font-size:17px;
    font-weight:bold;
    cursor:pointer;
    box-shadow:0 5px 10px rgba(0,0,0,.1);
}

.separator{
    margin:25px 0;
    font-size:20px;
}

.google-btn{
    border:none;
    background: #4c8bf5;
    color:white;
    height:50px;
    padding:0 25px;
    border-radius:30px;
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

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
select:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset !important;
    box-shadow: 0 0 0px 1000px white inset !important;
    -webkit-text-fill-color: #000 !important;
    transition: background-color 5000s ease-in-out 0s;
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

    .left-content img{
        width:220px;
    }

    .login-box{
        width:90%;
        padding:50px 0;
    }

}

<style>

/* semua CSS kamu */

/* RESPONSIVE */
@media(max-width:900px){
    ...
}

/* FIX AUTOFILL BROWSER */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
select:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset !important;
    box-shadow: 0 0 0px 1000px white inset !important;
    -webkit-text-fill-color: #000 !important;
    transition: background-color 5000s ease-in-out 0s;
}

</style>

</style>

</body>
</html>
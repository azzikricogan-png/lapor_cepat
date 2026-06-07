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

        <div class="right-content">

            <h2>Belum Punya Akun?</h2>

            <p>
                Silahkan daftar terlebih dahulu
                untuk mulai membuat laporan
            </p>

            <a href="<?= base_url('/register') ?>" class="btn">
                Daftar
            </a>

            <img src="<?= base_url('img/maskot1.png') ?>" alt="login">

        </div>

    </div>

    <!-- KANAN -->
    <div class="right-panel">

        <div class="form-box">

            <h1>Masuk</h1>

            <form action="<?= base_url('auth/login') ?>" method="post">

                <div class="input-group">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <a href="#" class="forgot">Lupa password?</a>

                <button type="submit" class="btn-login">
                    Masuk
                </button>

            </form>

        </div>

    </div>

</div>

<style>

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

/* BODY */
body{
    background:#f4f6f9;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CONTAINER */
.container{
    width:100%;
    max-width:1330px;
    border-radius:10px;
    height:95vh;
    background:white;
    display:flex;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

/* LEFT (biru) */
.left-panel{
    width:50%;
    background: #002b78;
    position:relative;
    overflow:hidden;
}

/* curve */
.left-panel::before{
    content:'';
    position:absolute;
    right:-250px;
    top:-100px;
    width:700px;
    height:1000px;
    background:#f4f6f9;
    border-radius:50%;
}

/* RIGHT CONTENT DI KIRI */
.right-content{
    position:relative;
    z-index:2;
    height:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:20px;
}

.right-content h2{
    font-size:30px;
    margin-bottom:15px;
    color: #000000;;

}

.right-content p{
    font-size:18px;
    margin-bottom:25px;
    color:rgb(0, 0, 0);
    font-weight:450;
}

.right-content img{
    width:300px;
    margin-top:30px;
}

/* RIGHT PANEL (FORM) */
.right-panel{
    width:50%;
    background: #f4f6f9;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* FORM BOX */
.form-box{
    width:60%;
    text-align:center;
}

.form-box h1{
    font-size:50px;
    margin-bottom:25px;
    color: #000000;
}

/* INPUT */
.input-group{
    height:55px;
    background: white;
    border-radius:30px;
    display:flex;
    align-items:center;
    padding:0 20px;
    margin-bottom:12px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.input-group i{
    color: #9aa4b2;
}



.input-group input{
    flex:1;
    border:none;
    outline:none;
    font-size:15px;
    padding:0 10px;
    background: transparent !important;
}


/* BUTTON */
.btn,
.btn-login{
    display:inline-block;
    margin-top:10px;
    padding:12px 40px;
    border:none;
    border-radius:50px;
    cursor:pointer;

    background: #ff9735;
    color: #ffffff;

    font-size:15px;
    font-weight:600;
    text-decoration:none;

    box-shadow:0 8px 20px rgba(103,79,61,0.3);
    transition:transform .3s ease, box-shadow .3s ease, background .3s ease;
}

.btn:hover,
.btn-login:hover{
    background:#ffad5a;
    transform:translateY(-4px);
    box-shadow:0 14px 28px rgba(103,79,61,0.35);
}

.btn:active,
.btn-login:active{
    transform:translateY(0);
}
/* forgot */
.forgot{
    display:block;
    text-align:right;
    margin:10px 0 20px;
    color: #002b78;
    text-decoration:none;
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
        padding:40px 0;
    }

    .right-content img{
        width:220px;
    }
}

</style>

</body>
</html>
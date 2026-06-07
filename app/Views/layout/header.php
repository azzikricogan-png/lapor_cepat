<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Lapor Cepat' ?></title>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

.navbar{
    position:sticky;
    top:0;
    left:0;
    width:100%;
    height:90px;
    padding:0 6%;

    display:flex;
    justify-content:space-between;
    align-items:center;

    background: #002b78; /* Biru saat di atas */

    transition:all .4s ease;
    z-index:9999;
}

/* Saat scroll */
.navbar.scrolled{
    background: #002a78b8;
    backdrop-filter:blur(1px);
}

    .logo{
        display:flex;
        align-items:center;
        gap:12px;
    }

    .logo img{
        width:60px;
    }

    .logo-title{
        font-size:24px;
        font-weight:700;
        display:flex;
        gap:2px;
    }

    .putih{
        color:#fff;
    }

    .orans{
        color: #ff9735;
    }

    .logo-sub{
        color:#fff;
        letter-spacing:4px;
        font-size:12px;
    }

    .menu{
        display:flex;
        margin-left:auto;

        gap:17px;
    }

    .btn-login{
    margin-left:19px;
    }
    .menu a,
    .logo-title,
    .logo-sub,
    .btn-login{
        text-shadow: 0 2px 8px rgba(0,0,0,.5);
    }

    .menu a{
    color:white;
    text-decoration:none;
    font-size:17px;
    font-weight:500;
    position:relative;
    transition:all .3s ease;
    }

    .menu a::after{
    content:'';
    position:absolute;
    left:0;
    bottom:-6px;
    width:0%;
    height:2px;
    background:#ff9735;
    transition:.3s ease;
    }

    .menu a:hover{
    color:#ff9735;
    transform:translateY(-3px);
    text-shadow:0 0 10px rgba(255,151,53,.6);
}

    .btn-login{
        background: #ff6a00;
        color:white;
        text-decoration:none;
        padding:9px 20px;
        border-radius:12px;
        font-weight:600;
        display:inline-flex;
        align-items:center;
        gap:8px;
        transition:all .3s ease;
        position:relative;
        overflow:hidden;
    }

    .btn-login:hover{
        transform:translateY(-3px);
        background:#ff7a1a;
        box-shadow:0 8px 20px rgba(255,106,0,.4);
    }

    .shine-text{
        position:relative;
        display:inline-block;
        overflow:hidden;
    }

    .shine-text::after{
    content:'';
    position:absolute;
    top:0;
    left:-75%;
    width:50%;
    height:100%;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.7),
        transparent
    );
    transform:skewX(-20deg);
}

.shine-text:hover::after{
    animation:shineMove .8s ease;
}

@keyframes shineMove{
    0%{
        left:-75%;
    }
    100%{
        left:130%;
    }
}

    

    @media(max-width:992px){
        .menu{
            display:none;
        }
    }

    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">

        <img src="<?= base_url('img/logo.png') ?>">

        <div class="logo-text">

            <div class="logo-title shine-text">
                <span class="putih">Lapor</span><span class="orans">Cepat</span>
            </div>

            <div class="logo-sub">
                KOTA PALU
            </div>

        </div>

    </div>

    <div class="menu">

        <a href="<?= base_url('/') ?>">Beranda</a>
        <a href="<?= base_url('laporan') ?>">Laporan</a>
        <a href="<?= base_url('informasi') ?>">Informasi</a>
        <a href="<?= base_url('kontak') ?>">Kontak</a>

    </div>

    <a href="<?= base_url('auth/login') ?>" class="btn-login">
        <i class="fa-solid fa-right-to-bracket"></i>
        Masuk
    </a>

</nav>

<script>
window.addEventListener('scroll', function(){

    const navbar = document.querySelector('.navbar');

    if(window.scrollY > 50){
        navbar.classList.add('scrolled');
    }else{
        navbar.classList.remove('scrolled');
    }

});
</script>

</body>
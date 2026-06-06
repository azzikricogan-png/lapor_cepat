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
    z-index:9999;

    height:90px;
    padding:0 6%;

    display:flex;
    justify-content:space-between;
    align-items:center;

    background:#002b78;

    border-top:2px solid rgba(255,255,255,.8);
    border-bottom:2px solid rgba(255,255,255,.8);

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.15);

    transition:all .3s ease;
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
        color:#ff9735;
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

    .menu a{
        color:white;
        text-decoration:none;
        font-size:17px;
        font-weight:500;
    }

    .btn-login{
        background:#ff9735;
        color:white;
        text-decoration:none;
        padding:9px 20px;
        border-radius:12px;
        font-weight:600;
        
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

            <div class="logo-title">
                <span class="putih">Lapor</span>
                <span class="orans">Cepat</span>
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
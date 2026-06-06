<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Lapor Cepat</title>
</head>
<body>

<header class="header">

    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="Logo">
        <h2>Lapor Cepat</h2>
    </div>

    <nav>
        <ul class="nav-menu">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Buat Laporan</a></li>
            <li><a href="#">Status Laporan</a></li>
            <li><a href="#">Tentang</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
    </nav>

    <div class="header-right">
        <a href="#" class="btn-login">Tentang Kami</a>
    </div>

</header>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f8fafc;
    padding-top:80px;
}

/* HEADER */

.header{
    width:100%;
    height:80px;
    display:flex;
    align-items:center;
    padding:0 60px;
    position:fixed;
    top:0;
    left:0;
    z-index:1000;

    background:transparent;
    transition:all .3s ease;
}

.header.scrolled{
    background:rgba(255,255,255,0.95);
    backdrop-filter:blur(10px);
    box-shadow:0 2px 15px rgba(0,0,0,.08);
}

.header.hide{
    transform:translateY(-100%);
}

.header-right{
    margin-left:20px;
}

.logo{
    display:flex;
    align-items:center;
    gap:12px;
}

.logo img{
    width:40px;
    height:40px;
}

.logo h2{
    color:#6D28D9;
    font-size:24px;
}

nav{
    margin-left:auto;
}


.nav-menu{
    display:flex;
    list-style:none;
    gap:20px;
}

.nav-menu a{
    text-decoration:none;
    color:#333;
    font-weight:500;
    transition:.3s;
}

.nav-menu a:hover{
    color:#6D28D9;
}

.btn-login{
    text-decoration:none;
    background:#6D28D9;
    color:white;
    padding:12px 25px;
    border-radius:8px;
    font-weight:600;
    transition:.3s;
}

.btn-login:hover{
    background:#5B21B6;
}

/* HERO DEMO */

.hero{
    height:500px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.hero h1{
    font-size:50px;
    margin-bottom:15px;
    color:#1e293b;
}

.hero p{
    font-size:18px;
    color:#64748b;
}

/* RESPONSIVE */

@media(max-width:768px){

    .header{
        padding:0 20px;
    }

    .nav-menu{
        display:none;
    }

    .logo h2{
        font-size:20px;
    }

    .btn-login{
        padding:10px 18px;
    }

    .hero h1{
        font-size:32px;
    }

}

</style>

<script>

let lastScroll = 0;
const header = document.querySelector('.header');

window.addEventListener('scroll', () => {

    const currentScroll = window.pageYOffset;

    // Background muncul saat scroll
    if(currentScroll > 10){
        header.classList.add('scrolled');
    }else{
        header.classList.remove('scrolled');
    }

    // Hilang saat scroll ke bawah
    if(currentScroll > lastScroll && currentScroll > 100){
        header.classList.add('hide');
    }
    // Muncul saat scroll ke atas
    else{
        header.classList.remove('hide');
    }

    lastScroll = currentScroll;

});

</script>
</body>
</html>

<!-- FOOTER -->
<footer class="footer">

    <div class="footer-top">
        <h3>Dikelola Oleh</h3>

        <div class="footer-logo">

            <img src="<?= base_url('img/pemerintah.png') ?>" alt="Logo Kota Palu">
            <img src="<?= base_url('img/kominfo.png') ?>" alt="Logo Kota Palu">

        </div>
    </div>

    <div class="footer-menu">
        <a href="#">BERANDA</a>
        <a href="#">TENTANG KAMI</a>
        <a href="#">LAYANAN</a>
        <a href="#">HUBUNGI KAMI</a>
    </div>

    <div class="footer-contact">
        <p>Jl. Balaikota No.1, Kota Palu, Sulawesi Tengah</p>
        <p>Email: diskominfo@palukota.go.id | Telp: (0451) 421011</p>
    </div>

    <div class="footer-social">
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-youtube"></i></a>
    </div>

    <div class="footer-copy">
        Copyright © 2026 Pemerintah Kota Palu. Hak Cipta Dilindungi.
    </div>

</footer>

<style>

/* RESET */

/* =========================
   FOOTER MODERN & COMPACT
========================= */

.footer{
    background:#f8fafc;
    border-top:1px solid #e5e7eb;
    padding:20px;
    margin-top:25px;
    text-align:center;
}

/* Membatasi lebar isi footer */
.footer > *{
    max-width:800px;
    margin-left:auto;
    margin-right:auto;
}

.footer-top{
    margin-bottom:12px;
}

.footer-top h3{
    color:#374151;
    font-size:15px;
    font-weight:600;
    margin-bottom:10px;
}

.footer-logo{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:15px;
    margin-bottom:15px;
}

.footer-logo img{
    width:45px;
    height:auto;
    transition:.3s;
}

.footer-logo img:hover{
    transform:scale(1.05);
}

.footer-menu{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:15px;
    margin-bottom:15px;
}

.footer-menu a{
    text-decoration:none;
    color:#4b5563;
    font-size:13px;
    font-weight:500;
    transition:.3s;
}

.footer-menu a:hover{
    color:#dc2626;
}

.footer-contact{
    max-width:600px;
    margin:0 auto 15px;
    color:#6b7280;
    font-size:13px;
    line-height:1.6;
}

.footer-social{
    display:flex;
    justify-content:center;
    gap:10px;
    margin-bottom:15px;
}

.footer-social a{
    width:34px;
    height:34px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:#fff;
    color:#dc2626;
    text-decoration:none;
    box-shadow:0 2px 8px rgba(0,0,0,.08);
    transition:.3s;
}

.footer-social a:hover{
    background:#dc2626;
    color:#fff;
    transform:translateY(-2px);
}

.footer-copy{
    max-width:600px;
    margin:0 auto;
    padding-top:10px;
    border-top:1px solid #e5e7eb;
    color:#9ca3af;
    font-size:12px;
}

/* RESPONSIVE */

@media (max-width:768px){

    .footer{
        padding:15px;
    }

    .footer-logo img{
        width:40px;
    }

    .footer-menu{
        gap:10px;
    }

    .footer-menu a{
        font-size:12px;
    }

    .footer-contact{
        font-size:12px;
    }

    .footer-copy{
        font-size:11px;
    }
}

</style>

</body>
</html>
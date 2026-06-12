<footer class="footer-modern">

    <div class="footer-top">

        <div class="footer-brand">

            <h2 class="footer-shine">
                <span class="putih">Lapor</span><span class="oranye">Cepat</span>
            </h2>

            <p>
                Platform pelayanan pengaduan masyarakat Kota Palu yang
                cepat, transparan, dan terintegrasi untuk mewujudkan
                pelayanan publik yang lebih baik.
            </p>

        </div>

        <div class="footer-menu">

            <h3>Menu</h3>

            <a href="#">Beranda</a>
            <a href="#">Laporan</a>
            <a href="#">Informasi</a>
            <a href="#">Kontak</a>

        </div>

        <div class="footer-layanan">

            <h3>Layanan</h3>

            <a href="#">Buat Laporan</a>
            <a href="#">Cek Status</a>
            <a href="#">Panduan</a>

        </div>

        <div class="footer-kontak">

            <h3>Hubungi Kami</h3>

            <p>
                <i class="fa-solid fa-location-dot lokasi"></i>
                Kota Palu, Sulawesi Tengah
            </p>

            <p>
                <i class="fa-solid fa-phone telepon"></i>
                0811-4500-200
            </p>

            <p>
                <i class="fa-solid fa-envelope email"></i>
                laporcepat@palu.go.id
            </p>

        </div>

    </div>

    <div class="footer-bottom">

        <p>
            © 2026 Lapor Cepat Kota Palu. All Rights Reserved.
        </p>

        <div class="footer-social">

            <a href="#" class="facebook">
                <i class="fab fa-facebook-f"></i>
            </a>

            <a href="#" class="instagram">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="#" class="youtube">
                <i class="fab fa-youtube"></i>
            </a>

        </div>


<style>

.footer-modern{

    background:#071f4e;

    color:#fff;

    padding:25px 8% 25px;
}

.footer-top{

    display:grid;

    grid-template-columns:
    2fr
    1fr
    1fr
    1.5fr;

    gap:40px;

    padding-bottom:40px;

    border-bottom:1px solid rgba(255,255,255,.1);
}

.footer-brand h2{

    font-size:28px;

    margin-bottom:12px;
}

.putih{
    color:#fff;
}

.oranye{
    color: #ff5e00;
}

.footer-shine{
    position:relative;
    display:inline-block;
    overflow:hidden;
}

.footer-shine::after{
    content:'';
    position:absolute;
    top:0;
    left:-75%;
    width:50%;
    height:100%;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.6),
        transparent
    );
    transform:skewX(-20deg);
}

.footer-shine:hover::after{
    animation:footerShine 0.8s ease;
}

@keyframes footerShine{
    0%{
        left:-75%;
    }
    100%{
        left:130%;
    }
}

.footer-brand p{
    color: #b8c8eb;
    line-height:1.9;
    max-width:420px;
    font-size:14px;
}

.footer-menu h3,
.footer-layanan h3,
.footer-kontak h3{
    margin-bottom:18px;
    color: #fff;
    font-size:16px;
}

.footer-menu a,
.footer-layanan a{
    display:block;
    color: #b8c8eb;
    text-decoration:none;
    margin-bottom:12px;
    transition:.3s;
    font-size:14px;

}

.footer-menu a:hover,
.footer-layanan a:hover{

    color:#ff9735;

    padding-left:6px;
}

.footer-kontak p{
    color: #b8c8eb;
    margin-bottom:15px;
    display:flex;
    align-items:center;
    gap:10px;
    font-size:14px;
}

.footer-kontak i.lokasi {
    color: #ff5e00; /* oranye */
}

.footer-kontak i.telepon {
    color: #00c853; /* hijau */
}

.footer-kontak i.email {
    color: #ffffff; /* biru */
}

.footer-kontak i {
    font-size: 16px;
    transition: .3s;
}

.footer-kontak p:hover i {
    transform: scale(1.2);
}
.footer-bottom{

    margin-top:25px;

    display:flex;

    justify-content:space-between;

    align-items:center;
}

.footer-bottom p{
    color: #b8c8eb;
    font-size:13px;
}

.footer-social{

    display:flex;

    gap:12px;
}

.footer-social a{

    width:42px;
    height:42px;

    border-radius:50%;

    display:flex;

    align-items:center;
    justify-content:center;

    text-decoration:none;

    background:rgba(255,255,255,.08);

    color: #fff;

    transition:.3s;
}

.footer-social a.facebook {
    color: #1877F2;
    
}

.footer-social a.instagram {
    color: #ff00a2;
}

.footer-social a.youtube {
    color: #FF0000;
}

.footer-social a:hover{

    transform:translateY(-4px);
}

@media(max-width:992px){

    .footer-top{

        grid-template-columns:1fr;

        text-align:center;
    }

    .footer-brand p{

        max-width:100%;
    }

    .footer-kontak p{

        justify-content:center;
    }

    .footer-bottom{

        flex-direction:column;

        gap:15px;
    }
}

</style>

</footer>
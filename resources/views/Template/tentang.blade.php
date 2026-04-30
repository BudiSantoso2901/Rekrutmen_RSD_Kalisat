<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami — RSD Kalisat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>

<body>
    <div id="preloader">
        <div class="pulse-ring"></div>
        <div class="pulse-ring delay-1"></div>
        <svg class="loader-icon" viewBox="0 0 60 60" fill="none">
            <path d="M30 8 L30 52 M8 30 L52 30" stroke="white" stroke-width="5" stroke-linecap="round" />
            <circle cx="30" cy="30" r="25" stroke="white" stroke-width="3" stroke-dasharray="157"
                stroke-dashoffset="157" class="circle-anim" />
        </svg>
        <p>RSD Kalisat</p>
    </div>

    <nav id="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-brand">
                <div class="brand-icon"><i class="fa-solid fa-hospital-user"></i></div>
                <div class="brand-text"><span class="brand-name">RSD Kalisat</span><span class="brand-sub">Portal
                        Rekrutmen</span></div>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="index.html">Beranda</a></li>
                <li><a href="tentang.html" class="active">Tentang</a></li>
                <li><a href="lowongan.html">Lowongan</a></li>
                <li><a href="persyaratan.html">Persyaratan</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
            <a href="lowongan.html" class="btn-apply-nav">Lamar Sekarang</a>
            <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
        </div>
    </nav>

    <div class="page-hero">
        <div class="section-label">Profil Rumah Sakit</div>
        <h1 class="hero-title">Tentang <span class="gradient-text">RSD Kalisat</span></h1>
        <p>Mengenal lebih dekat Rumah Sakit Daerah Kalisat — visi, misi, sejarah, dan tim profesional kami.</p>
        <div class="breadcrumb">
            <a href="index.html">Beranda</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Tentang</span>
        </div>
    </div>

    <section class="section" style="background:var(--bg-section)">
        <div class="container">
            <div class="about-grid">
                <div class="about-img-wrap reveal">
                    <div class="about-img-card" style="aspect-ratio:1/1">
                        <div class="about-img-icon"><i class="fa-solid fa-hospital" style="font-size:8rem"></i></div>
                        <div class="about-img-bg"></div>
                        <div class="about-badge-float"><i class="fa-solid fa-award"></i> Akreditasi Paripurna</div>
                    </div>
                    <div class="about-card-mini" style="bottom:-20px">
                        <i class="fa-solid fa-calendar-check"></i>
                        <div><strong>Berdiri sejak 2008</strong><span>Melayani masyarakat Jember</span></div>
                    </div>
                </div>
                <div class="about-text reveal delay-1">
                    <div class="section-label">Sejarah Kami</div>
                    <h2 class="section-title">Profil <span class="gradient-text">RSD Kalisat</span></h2>
                    <p>Rumah Sakit Daerah (RSD) Kalisat adalah rumah sakit milik Pemerintah Kabupaten Jember yang
                        berlokasi di Kecamatan Kalisat, Jember, Jawa Timur. Didirikan untuk memenuhi kebutuhan layanan
                        kesehatan di wilayah utara Jember dan sekitarnya.</p>
                    <p>RSD Kalisat telah berhasil meraih Akreditasi Paripurna dari Komisi Akreditasi Rumah Sakit (KARS),
                        sebuah pencapaian tertinggi yang membuktikan komitmen kami terhadap mutu dan keselamatan pasien.
                    </p>
                    <p>Dengan kapasitas lebih dari 100 tempat tidur, berbagai instalasi spesialis, dan lebih dari 350
                        tenaga kesehatan profesional, RSD Kalisat terus bertumbuh untuk memberikan layanan terbaik.</p>
                    <div class="hero-stats" style="margin-top:24px">
                        <div class="stat-item"><span class="stat-num" data-target="100">0</span><span
                                class="stat-unit">+</span><span class="stat-label">Tempat Tidur</span></div>
                        <div class="stat-divider"></div>
                        <div class="stat-item"><span class="stat-num" data-target="350">0</span><span
                                class="stat-unit">+</span><span class="stat-label">Tenaga Kesehatan</span></div>
                        <div class="stat-divider"></div>
                        <div class="stat-item"><span class="stat-num" data-target="15">0</span><span
                                class="stat-unit">+</span><span class="stat-label">Instalasi</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-label reveal">Visi & Misi</div>
            <h2 class="section-title reveal">Arah <span class="gradient-text">Tujuan Kami</span></h2>
            <div class="vision-mission-grid" style="margin-top:40px">
                <div class="vm-card reveal">
                    <div class="vm-icon"><i class="fa-solid fa-eye"></i></div>
                    <h3>Visi</h3>
                    <p>Menjadi Rumah Sakit Daerah yang <strong style="color:var(--accent-teal)">terpercaya, bermutu,
                            dan mandiri</strong> dalam memberikan pelayanan kesehatan kepada masyarakat Jember dan
                        sekitarnya berdasarkan nilai-nilai kemanusiaan.</p>
                </div>
                <div class="vm-card reveal delay-1">
                    <div class="vm-icon"><i class="fa-solid fa-bullseye"></i></div>
                    <h3>Misi</h3>
                    <ul>
                        <li><i class="fa-solid fa-circle-dot"></i> Memberikan pelayanan kesehatan yang bermutu, aman,
                            dan terjangkau.</li>
                        <li><i class="fa-solid fa-circle-dot"></i> Meningkatkan profesionalisme dan kompetensi SDM
                            secara berkelanjutan.</li>
                        <li><i class="fa-solid fa-circle-dot"></i> Mengembangkan sarana, prasarana, dan teknologi
                            kesehatan terkini.</li>
                        <li><i class="fa-solid fa-circle-dot"></i> Menciptakan tata kelola rumah sakit yang transparan
                            dan akuntabel.</li>
                        <li><i class="fa-solid fa-circle-dot"></i> Meningkatkan kepuasan pasien dan stakeholder secara
                            berkesinambungan.</li>
                    </ul>
                </div>
            </div>
            <!-- Nilai-nilai -->
            <h2 class="section-title reveal text-center" style="margin-top:64px">Nilai-Nilai <span
                    class="gradient-text">RSD Kalisat</span></h2>
            <div class="benefit-grid reveal" style="margin-top:32px">
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-shield-heart"></i></div>
                    <h4>Integritas</h4>
                    <p>Jujur, bertanggung jawab, dan konsisten dalam setiap tindakan pelayanan.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-hands-holding-heart"></i></div>
                    <h4>Empati</h4>
                    <p>Melayani dengan sepenuh hati dan memahami kebutuhan setiap pasien.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-star"></i></div>
                    <h4>Profesional</h4>
                    <p>Kompeten, terampil, dan selalu mengutamakan keselamatan pasien.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-users"></i></div>
                    <h4>Kolaborasi</h4>
                    <p>Bekerja sama lintas profesi untuk hasil pelayanan yang optimal.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    <h4>Inovasi</h4>
                    <p>Terus berinovasi menghadirkan solusi kesehatan terbaik dan terkini.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-leaf"></i></div>
                    <h4>Berkelanjutan</h4>
                    <p>Menjaga kualitas layanan dan lingkungan untuk generasi mendatang.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="background:var(--bg-section)">
        <div class="container">
            <div class="section-label reveal">Manajemen</div>
            <h2 class="section-title reveal">Tim <span class="gradient-text">Pimpinan</span></h2>
            <div class="team-grid" style="margin-top:40px">
                <div class="team-card reveal">
                    <div class="team-avatar"><i class="fa-solid fa-user-tie"></i></div>
                    <h4>dr. H. Ahmad Fauzi, M.Kes</h4>
                    <p>Direktur RSD Kalisat</p>
                </div>
                <div class="team-card reveal">
                    <div class="team-avatar"><i class="fa-solid fa-user-doctor"></i></div>
                    <h4>dr. Siti Aminah, SpPD</h4>
                    <p>Wakil Direktur Pelayanan</p>
                </div>
                <div class="team-card reveal">
                    <div class="team-avatar"><i class="fa-solid fa-user-gear"></i></div>
                    <h4>Budi Hartono, S.E., M.M.</h4>
                    <p>Wakil Direktur Umum & Keuangan</p>
                </div>
                <div class="team-card reveal">
                    <div class="team-avatar"><i class="fa-solid fa-user-shield"></i></div>
                    <h4>Yuliani, S.Kep., M.Kes</h4>
                    <p>Kepala Bidang Keperawatan</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-wave"><svg viewBox="0 0 1440 80" preserveAspectRatio="none">
                <path d="M0,40 C360,80 1080,0 1440,40 L1440,0 L0,0 Z" fill="var(--bg-section)" />
            </svg></div>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="nav-brand">
                        <div class="brand-icon"><i class="fa-solid fa-hospital-user"></i></div>
                        <div class="brand-text"><span class="brand-name">RSD Kalisat</span><span
                                class="brand-sub">Portal Rekrutmen</span></div>
                    </div>
                    <p>Rumah Sakit Daerah Kalisat — melayani dengan hati, tumbuh bersama masyarakat Jember.</p>
                    <div class="footer-social"><a href="#"><i class="fa-brands fa-instagram"></i></a><a
                            href="#"><i class="fa-brands fa-facebook-f"></i></a><a href="#"><i
                                class="fa-brands fa-youtube"></i></a><a href="#"><i
                                class="fa-solid fa-envelope"></i></a></div>
                </div>
                <div class="footer-links">
                    <h5>Navigasi</h5>
                    <ul>
                        <li><a href="index.html">Beranda</a></li>
                        <li><a href="tentang.html">Tentang RSD</a></li>
                        <li><a href="lowongan.html">Lowongan Kerja</a></li>
                        <li><a href="persyaratan.html">Persyaratan</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="kontak.html">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h5>Informasi</h5>
                    <ul>
                        <li><a href="#">Pengumuman Seleksi</a></li>
                        <li><a href="#">Jadwal Tes</a></li>
                        <li><a href="#">Hasil Seleksi</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h5>Kontak</h5>
                    <ul>
                        <li><i class="fa-solid fa-location-dot"></i> Jl. Raya Kalisat No.20, Jember</li>
                        <li><i class="fa-solid fa-phone"></i> (0331) 593xxx</li>
                        <li><i class="fa-solid fa-envelope"></i> rekrutmen@rsdkalisat.go.id</li>
                        <li><i class="fa-regular fa-clock"></i> Senin–Jumat, 08.00–15.00 WIB</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 RSD Kalisat — Kabupaten Jember. Seluruh hak cipta dilindungi.</p>
                <p>Dibuat dengan <i class="fa-solid fa-heart" style="color:var(--accent-teal)"></i> untuk pelayanan
                    kesehatan yang lebih baik.</p>
            </div>
        </div>
    </footer>
    <button class="back-to-top" id="backToTop"><i class="fa-solid fa-chevron-up"></i></button>
    <script src="{{ asset('main.js') }}"></script>
</body>

</html>

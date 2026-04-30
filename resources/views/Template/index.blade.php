<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rekrutmen Pegawai — RSD Kalisat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>

<body>

    <!-- PRELOADER -->
    <div id="preloader">
        <div class="pulse-ring"></div>
        <div class="pulse-ring delay-1"></div>
        <svg class="loader-icon" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 8 L30 52 M8 30 L52 30" stroke="white" stroke-width="5" stroke-linecap="round" />
            <circle cx="30" cy="30" r="25" stroke="white" stroke-width="3" stroke-dasharray="157"
                stroke-dashoffset="157" class="circle-anim" />
        </svg>
        <p>RSD Kalisat</p>
    </div>

    <!-- NAVBAR -->
    <nav id="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-brand">
                <div class="brand-icon"><i class="fa-solid fa-hospital-user"></i></div>
                <div class="brand-text">
                    <span class="brand-name">RSD Kalisat</span>
                    <span class="brand-sub">Portal Rekrutmen</span>
                </div>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="index.html" class="active">Beranda</a></li>
                <li><a href="tentang.html">Tentang</a></li>
                <li><a href="lowongan.html">Lowongan</a></li>
                <li><a href="persyaratan.html">Persyaratan</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
            <a href="lowongan.html" class="btn-apply-nav">Lamar Sekarang</a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <div class="hero-bg-shape shape-1"></div>
        <div class="hero-bg-shape shape-2"></div>
        <div class="hero-bg-shape shape-3"></div>
        <div class="particles" id="particles"></div>
        <div class="hero-content">
            <div class="hero-badge animate-fadeup">
                <i class="fa-solid fa-circle-check"></i> Penerimaan Pegawai 2025
            </div>
            <h1 class="hero-title animate-fadeup delay-1">
                Bergabung &amp; Wujudkan<br>
                <span class="gradient-text">Layanan Kesehatan</span><br>
                Terbaik Bersama Kami
            </h1>
            <p class="hero-desc animate-fadeup delay-2">
                RSD Kalisat membuka kesempatan bagi tenaga kesehatan dan non-kesehatan profesional untuk bersama-sama
                memberikan pelayanan prima kepada masyarakat Jember dan sekitarnya.
            </p>
            <div class="hero-cta animate-fadeup delay-3">
                <a href="lowongan.html" class="btn-primary"><i class="fa-solid fa-briefcase-medical"></i> Lihat
                    Lowongan</a>
                <a href="tentang.html" class="btn-outline"><i class="fa-solid fa-circle-info"></i> Tentang RSD</a>
            </div>
            <div class="hero-stats animate-fadeup delay-4">
                <div class="stat-item">
                    <span class="stat-num" data-target="24">0</span><span class="stat-unit">+</span>
                    <span class="stat-label">Posisi Tersedia</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-num" data-target="350">0</span><span class="stat-unit">+</span>
                    <span class="stat-label">Tenaga Medis</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-num" data-target="15">0</span><span class="stat-unit">+</span>
                    <span class="stat-label">Tahun Berdiri</span>
                </div>
            </div>
        </div>
        <div class="hero-visual animate-fadein delay-2">
            <div class="hero-card-wrap">
                <div class="floating-card card-pos1">
                    <i class="fa-solid fa-user-doctor"></i>
                    <div><strong>Dokter Spesialis</strong><span>3 Posisi</span></div>
                </div>
                <div class="floating-card card-pos2">
                    <i class="fa-solid fa-user-nurse"></i>
                    <div><strong>Perawat</strong><span>10 Posisi</span></div>
                </div>
                <div class="floating-card card-pos3">
                    <i class="fa-solid fa-flask-vial"></i>
                    <div><strong>Analis Lab</strong><span>4 Posisi</span></div>
                </div>
                <div class="hero-circle-main">
                    <div class="hero-circle-inner">
                        <i class="fa-solid fa-hospital"></i>
                        <span>RSD</span>
                        <span class="circle-sub">Kalisat</span>
                    </div>
                </div>
                <svg class="hero-orbit" viewBox="0 0 360 360">
                    <circle cx="180" cy="180" r="150" fill="none" stroke="rgba(0,196,140,0.15)"
                        stroke-width="1" stroke-dasharray="8 6" />
                </svg>
            </div>
        </div>
        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-line">
                <div class="scroll-dot"></div>
            </div>
        </div>
    </section>

    <!-- MARQUEE -->
    <div class="marquee-wrap">
        <div class="marquee-track">
            <span><i class="fa-solid fa-heart-pulse"></i> Dokter Umum</span>
            <span><i class="fa-solid fa-syringe"></i> Perawat DIII/S1</span>
            <span><i class="fa-solid fa-microscope"></i> Analis Kesehatan</span>
            <span><i class="fa-solid fa-tooth"></i> Dokter Gigi</span>
            <span><i class="fa-solid fa-pills"></i> Apoteker</span>
            <span><i class="fa-solid fa-lungs"></i> Fisioterapis</span>
            <span><i class="fa-solid fa-x-ray"></i> Radiografer</span>
            <span><i class="fa-solid fa-file-medical"></i> Rekam Medis</span>
            <span><i class="fa-solid fa-laptop-medical"></i> IT Rumah Sakit</span>
            <span><i class="fa-solid fa-heart-pulse"></i> Dokter Umum</span>
            <span><i class="fa-solid fa-syringe"></i> Perawat DIII/S1</span>
            <span><i class="fa-solid fa-microscope"></i> Analis Kesehatan</span>
            <span><i class="fa-solid fa-tooth"></i> Dokter Gigi</span>
            <span><i class="fa-solid fa-pills"></i> Apoteker</span>
            <span><i class="fa-solid fa-lungs"></i> Fisioterapis</span>
            <span><i class="fa-solid fa-x-ray"></i> Radiografer</span>
            <span><i class="fa-solid fa-file-medical"></i> Rekam Medis</span>
            <span><i class="fa-solid fa-laptop-medical"></i> IT Rumah Sakit</span>
        </div>
    </div>

    <!-- ABOUT SNIPPET -->
    <section class="section about-snippet" id="about">
        <div class="container">
            <div class="section-label reveal">Tentang Kami</div>
            <div class="about-grid">
                <div class="about-img-wrap reveal">
                    <div class="about-img-card">
                        <div class="about-img-icon"><i class="fa-solid fa-hospital-user"></i></div>
                        <div class="about-img-bg"></div>
                        <div class="about-badge-float">
                            <i class="fa-solid fa-award"></i>
                            <span>Akreditasi Paripurna</span>
                        </div>
                    </div>
                    <div class="about-card-mini">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <div>
                            <strong>Lokasi</strong>
                            <span>Jl. Raya Kalisat No.20, Jember</span>
                        </div>
                    </div>
                </div>
                <div class="about-text reveal delay-1">
                    <h2 class="section-title">Rumah Sakit Daerah <span class="gradient-text">Kalisat</span></h2>
                    <p>RSD Kalisat adalah rumah sakit milik Pemerintah Kabupaten Jember yang melayani masyarakat sejak
                        tahun 2008. Dengan fasilitas lengkap dan tenaga medis terampil, kami berkomitmen memberikan
                        pelayanan kesehatan berkualitas tinggi.</p>
                    <p>Dalam rangka meningkatkan kualitas layanan, kami membuka rekrutmen untuk menemukan putra-putri
                        terbaik yang memiliki semangat melayani dan dedikasi tinggi di bidang kesehatan.</p>
                    <div class="about-values">
                        <div class="value-chip"><i class="fa-solid fa-shield-heart"></i> Integritas</div>
                        <div class="value-chip"><i class="fa-solid fa-hands-holding-heart"></i> Empati</div>
                        <div class="value-chip"><i class="fa-solid fa-star"></i> Profesional</div>
                        <div class="value-chip"><i class="fa-solid fa-users"></i> Kolaborasi</div>
                    </div>
                    <a href="tentang.html" class="btn-primary">Pelajari Lebih Lanjut <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED JOBS -->
    <section class="section jobs-section" id="jobs">
        <div class="section-bg-accent"></div>
        <div class="container">
            <div class="section-label reveal">Lowongan Terbaru</div>
            <div class="section-header reveal">
                <h2 class="section-title">Posisi yang <span class="gradient-text">Tersedia</span></h2>
                <a href="lowongan.html" class="btn-link">Lihat Semua <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="jobs-grid">
                <div class="job-card reveal" data-delay="0">
                    <div class="job-card-top">
                        <div class="job-icon bg-teal"><i class="fa-solid fa-user-doctor"></i></div>
                        <span class="job-tag urgent">Segera</span>
                    </div>
                    <h3>Dokter Umum</h3>
                    <p>Instalasi Gawat Darurat & Rawat Jalan. Dibutuhkan 2 orang dokter umum berpengalaman.</p>
                    <div class="job-meta">
                        <span><i class="fa-regular fa-clock"></i> Full-time</span>
                        <span><i class="fa-solid fa-graduation-cap"></i> S1 Kedokteran</span>
                    </div>
                    <div class="job-footer">
                        <span class="job-deadline"><i class="fa-regular fa-calendar"></i> Tutup 31 Agustus 2025</span>
                        <a href="lowongan.html" class="btn-sm">Daftar</a>
                    </div>
                </div>
                <div class="job-card reveal" data-delay="1">
                    <div class="job-card-top">
                        <div class="job-icon bg-blue"><i class="fa-solid fa-user-nurse"></i></div>
                        <span class="job-tag">Baru</span>
                    </div>
                    <h3>Perawat Klinis</h3>
                    <p>Unit rawat inap dan ICU. Dibutuhkan 10 perawat DIII/S1 Keperawatan berdedikasi.</p>
                    <div class="job-meta">
                        <span><i class="fa-regular fa-clock"></i> Full-time</span>
                        <span><i class="fa-solid fa-graduation-cap"></i> DIII/S1 Kep.</span>
                    </div>
                    <div class="job-footer">
                        <span class="job-deadline"><i class="fa-regular fa-calendar"></i> Tutup 31 Agustus 2025</span>
                        <a href="lowongan.html" class="btn-sm">Daftar</a>
                    </div>
                </div>
                <div class="job-card reveal" data-delay="2">
                    <div class="job-card-top">
                        <div class="job-icon bg-green"><i class="fa-solid fa-microscope"></i></div>
                        <span class="job-tag">Baru</span>
                    </div>
                    <h3>Analis Kesehatan</h3>
                    <p>Laboratorium Klinik. Dibutuhkan 4 analis kesehatan untuk instalasi laboratorium.</p>
                    <div class="job-meta">
                        <span><i class="fa-regular fa-clock"></i> Full-time</span>
                        <span><i class="fa-solid fa-graduation-cap"></i> DIII Analis</span>
                    </div>
                    <div class="job-footer">
                        <span class="job-deadline"><i class="fa-regular fa-calendar"></i> Tutup 31 Agustus 2025</span>
                        <a href="lowongan.html" class="btn-sm">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TIMELINE / ALUR PENDAFTARAN -->
    <section class="section timeline-section">
        <div class="container">
            <div class="section-label reveal">Alur Pendaftaran</div>
            <h2 class="section-title text-center reveal">Cara Mendaftar <span class="gradient-text">Mudah &amp;
                    Cepat</span></h2>
            <div class="timeline">
                <div class="timeline-item reveal" data-step="1">
                    <div class="timeline-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <div class="timeline-content">
                        <h4>Cari Lowongan</h4>
                        <p>Telusuri posisi yang sesuai kualifikasi dan minat Anda di halaman lowongan.</p>
                    </div>
                </div>
                <div class="timeline-item reveal" data-step="2">
                    <div class="timeline-icon"><i class="fa-solid fa-file-pen"></i></div>
                    <div class="timeline-content">
                        <h4>Siapkan Berkas</h4>
                        <p>Lengkapi seluruh dokumen persyaratan sesuai ketentuan yang berlaku.</p>
                    </div>
                </div>
                <div class="timeline-item reveal" data-step="3">
                    <div class="timeline-icon"><i class="fa-solid fa-paper-plane"></i></div>
                    <div class="timeline-content">
                        <h4>Kirim Lamaran</h4>
                        <p>Kirim lamaran ke alamat atau email yang tertera pada setiap lowongan.</p>
                    </div>
                </div>
                <div class="timeline-item reveal" data-step="4">
                    <div class="timeline-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div class="timeline-content">
                        <h4>Seleksi Administrasi</h4>
                        <p>Tim kami akan melakukan verifikasi kelengkapan dokumen pelamar.</p>
                    </div>
                </div>
                <div class="timeline-item reveal" data-step="5">
                    <div class="timeline-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                    <div class="timeline-content">
                        <h4>Tes &amp; Wawancara</h4>
                        <p>Peserta yang lolos seleksi akan diundang untuk tes kompetensi dan wawancara.</p>
                    </div>
                </div>
                <div class="timeline-item reveal" data-step="6">
                    <div class="timeline-icon"><i class="fa-solid fa-trophy"></i></div>
                    <div class="timeline-content">
                        <h4>Pengumuman Hasil</h4>
                        <p>Hasil seleksi diumumkan melalui website resmi dan papan pengumuman RSD Kalisat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="section testimonial-section">
        <div class="container">
            <div class="section-label reveal">Mereka Bercerita</div>
            <h2 class="section-title text-center reveal">Suara <span class="gradient-text">Pegawai Kami</span></h2>
            <div class="swiper testimonial-swiper reveal">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-card">
                            <div class="testi-quote"><i class="fa-solid fa-quote-left"></i></div>
                            <p>"Bergabung dengan RSD Kalisat adalah keputusan terbaik saya. Lingkungan kerja yang
                                suportif dan manajemen yang peduli pada pengembangan SDM membuat saya berkembang pesat
                                sebagai tenaga medis."</p>
                            <div class="testi-author">
                                <div class="testi-avatar"><i class="fa-solid fa-user-nurse"></i></div>
                                <div>
                                    <strong>Siti Rahmawati, S.Kep</strong>
                                    <span>Perawat Rawat Inap — 4 Tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-card">
                            <div class="testi-quote"><i class="fa-solid fa-quote-left"></i></div>
                            <p>"Proses rekrutmen sangat transparan dan profesional. Fasilitas yang disediakan rumah
                                sakit sangat mendukung kinerja saya sebagai dokter. Bangga menjadi bagian dari keluarga
                                besar RSD Kalisat."</p>
                            <div class="testi-author">
                                <div class="testi-avatar"><i class="fa-solid fa-user-doctor"></i></div>
                                <div>
                                    <strong>dr. Budi Santoso</strong>
                                    <span>Dokter IGD — 3 Tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-card">
                            <div class="testi-quote"><i class="fa-solid fa-quote-left"></i></div>
                            <p>"Sebagai analis laboratorium, saya sangat puas dengan peralatan modern yang tersedia. Tim
                                yang kompak dan atasan yang membimbing menjadikan setiap hari kerja terasa menyenangkan
                                dan bermakna."</p>
                            <div class="testi-author">
                                <div class="testi-avatar"><i class="fa-solid fa-microscope"></i></div>
                                <div>
                                    <strong>Ahmad Fauzi, A.Md.AK</strong>
                                    <span>Analis Laboratorium — 2 Tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- FASILITAS / BENEFIT -->
    <section class="section benefit-section">
        <div class="container">
            <div class="section-label reveal">Keunggulan</div>
            <h2 class="section-title text-center reveal">Mengapa Bergabung dengan <span class="gradient-text">RSD
                    Kalisat?</span></h2>
            <div class="benefit-grid">
                <div class="benefit-card reveal">
                    <div class="benefit-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                    <h4>Gaji Kompetitif</h4>
                    <p>Remunerasi yang sesuai dengan standar dan kualifikasi dengan tunjangan kinerja menarik.</p>
                </div>
                <div class="benefit-card reveal">
                    <div class="benefit-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                    <h4>Pengembangan Karir</h4>
                    <p>Program pelatihan, seminar, dan kesempatan studi lanjut untuk peningkatan kompetensi.</p>
                </div>
                <div class="benefit-card reveal">
                    <div class="benefit-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4>BPJS Ketenagakerjaan</h4>
                    <p>Jaminan sosial tenaga kerja lengkap meliputi JHT, JKK, JKM, dan JP.</p>
                </div>
                <div class="benefit-card reveal">
                    <div class="benefit-icon"><i class="fa-solid fa-hospital"></i></div>
                    <h4>Fasilitas Modern</h4>
                    <p>Peralatan medis dan fasilitas kerja mutakhir yang mendukung produktivitas pelayanan.</p>
                </div>
                <div class="benefit-card reveal">
                    <div class="benefit-icon"><i class="fa-solid fa-people-group"></i></div>
                    <h4>Tim Solid</h4>
                    <p>Lingkungan kerja yang kolaboratif, suportif, dan penuh semangat gotong royong.</p>
                </div>
                <div class="benefit-card reveal">
                    <div class="benefit-icon"><i class="fa-solid fa-medal"></i></div>
                    <h4>Penghargaan Prestasi</h4>
                    <p>Apresiasi terhadap karyawan berprestasi melalui reward dan recognition program.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="cta-section reveal">
        <div class="cta-bg"></div>
        <div class="container">
            <div class="cta-content">
                <div class="cta-icon"><i class="fa-solid fa-briefcase-medical"></i></div>
                <h2>Siap Bergabung Bersama Kami?</h2>
                <p>Jadilah bagian dari tim profesional RSD Kalisat dan wujudkan pelayanan kesehatan terbaik untuk
                    masyarakat Jember.</p>
                <div class="cta-buttons">
                    <a href="lowongan.html" class="btn-white">Lihat Semua Lowongan</a>
                    <a href="kontak.html" class="btn-outline-white">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-wave">
            <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
                <path d="M0,40 C360,80 1080,0 1440,40 L1440,0 L0,0 Z" fill="var(--bg-section)" />
            </svg>
        </div>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="nav-brand">
                        <div class="brand-icon"><i class="fa-solid fa-hospital-user"></i></div>
                        <div class="brand-text">
                            <span class="brand-name">RSD Kalisat</span>
                            <span class="brand-sub">Portal Rekrutmen</span>
                        </div>
                    </div>
                    <p>Rumah Sakit Daerah Kalisat — melayani dengan hati, tumbuh bersama masyarakat Jember.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-solid fa-envelope"></i></a>
                    </div>
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
                        <li><i class="fa-solid fa-location-dot"></i> Jl. Raya Kalisat No.20, Kalisat, Jember, Jawa
                            Timur 68191</li>
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

    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop" aria-label="Kembali ke atas">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('main.js') }}"></script>
</body>

</html>

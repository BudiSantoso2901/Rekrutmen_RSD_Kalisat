<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RSD Kalisat — Sistem Rekrutmen Pegawai</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>

<body>

    <!-- ========== PRELOADER ========== -->
    <div id="preloader">
        <div class="preloader-inner">
            <div class="pulse-ring"></div>
            <div class="pulse-ring delay1"></div>
            <div class="pulse-ring delay2"></div>
            <div class="preloader-logo">
                <i class="fa-solid fa-heart-pulse"></i>
            </div>
            <p class="preloader-text">RSD Kalisat</p>
        </div>
    </div>

    <!-- ========== NAVBAR ========== -->
    <nav id="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-brand">
                <div class="brand-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                <div class="brand-text">
                    <span class="brand-name">RSD Kalisat</span>
                    <span class="brand-sub">Rekrutmen Pegawai</span>
                </div>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="index.html" class="nav-link active">Beranda</a></li>
                <li><a href="tentang.html" class="nav-link">Tentang</a></li>
                <li><a href="lowongan.html" class="nav-link">Lowongan</a></li>
                <li><a href="persyaratan.html" class="nav-link">Persyaratan</a></li>
                <li><a href="tahapan.html" class="nav-link">Tahapan</a></li>
                <li><a href="faq.html" class="nav-link">FAQ</a></li>
                <li><a href="kontak.html" class="nav-link">Kontak</a></li>
            </ul>
            <a href="lowongan.html" class="btn-daftar">Lamar Sekarang</a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
        <!-- Mobile Drawer -->
        <div class="mobile-drawer" id="mobileDrawer">
            <div class="drawer-header">
                <div class="brand-icon small"><i class="fa-solid fa-heart-pulse"></i></div>
                <span>RSD Kalisat</span>
                <button class="drawer-close" id="drawerClose"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <ul class="drawer-links">
                <li><a href="index.html"><i class="fa-solid fa-house"></i> Beranda</a></li>
                <li><a href="tentang.html"><i class="fa-solid fa-hospital"></i> Tentang</a></li>
                <li><a href="lowongan.html"><i class="fa-solid fa-briefcase-medical"></i> Lowongan</a></li>
                <li><a href="persyaratan.html"><i class="fa-solid fa-clipboard-list"></i> Persyaratan</a></li>
                <li><a href="tahapan.html"><i class="fa-solid fa-stairs"></i> Tahapan</a></li>
                <li><a href="faq.html"><i class="fa-solid fa-circle-question"></i> FAQ</a></li>
                <li><a href="kontak.html"><i class="fa-solid fa-phone"></i> Kontak</a></li>
            </ul>
            <a href="lowongan.html" class="btn-daftar full">Lamar Sekarang</a>
        </div>
        <div class="overlay" id="overlay"></div>
    </nav>

    <!-- ========== HERO ========== -->
    <section class="hero" id="hero">
        <div class="hero-bg">
            <div class="hero-blob b1"></div>
            <div class="hero-blob b2"></div>
            <div class="hero-blob b3"></div>
            <div class="hero-grid"></div>
        </div>
        <div class="hero-content">
            <div class="hero-badge"><i class="fa-solid fa-circle-check"></i> Rekrutmen Terbuka 2025</div>
            <h1 class="hero-title">
                Bergabunglah Bersama<br>
                <em>Tim Kesehatan</em><br>
                RSD Kalisat
            </h1>
            <p class="hero-desc">Kami membuka kesempatan bagi tenaga kesehatan profesional dan non-kesehatan yang
                berdedikasi untuk melayani masyarakat Jember dan sekitarnya.</p>
            <div class="hero-cta">
                <a href="lowongan.html" class="btn-primary"><i class="fa-solid fa-search"></i> Lihat Lowongan</a>
                <a href="tahapan.html" class="btn-outline"><i class="fa-solid fa-route"></i> Tahapan Seleksi</a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-num" data-target="12">0</span>
                    <span class="stat-label">Posisi Tersedia</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-num" data-target="450">0</span>
                    <span class="stat-label">Pegawai Aktif</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-num" data-target="28">0</span>
                    <span class="stat-label">Tahun Berpengalaman</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="visual-card vc1" data-aos="fade-left" data-aos-delay="200">
                <i class="fa-solid fa-user-nurse"></i>
                <span>Tenaga Medis</span>
            </div>
            <div class="visual-card vc2" data-aos="fade-left" data-aos-delay="350">
                <i class="fa-solid fa-flask-vial"></i>
                <span>Laboratorium</span>
            </div>
            <div class="visual-card vc3" data-aos="fade-left" data-aos-delay="500">
                <i class="fa-solid fa-laptop-medical"></i>
                <span>Administrasi</span>
            </div>
            <div class="visual-card vc4" data-aos="fade-left" data-aos-delay="650">
                <i class="fa-solid fa-x-ray"></i>
                <span>Radiologi</span>
            </div>
            <div class="floating-badge fb1">
                <i class="fa-solid fa-heart-pulse"></i> RSD Kalisat
            </div>
            <div class="floating-badge fb2">
                <i class="fa-solid fa-shield-heart"></i> Terakreditasi
            </div>
        </div>
        <div class="scroll-indicator">
            <span>Gulir ke bawah</span>
            <div class="scroll-arrow"><i class="fa-solid fa-chevron-down"></i></div>
        </div>
    </section>

    <!-- ========== PENGUMUMAN TICKER ========== -->
    <div class="ticker-bar">
        <div class="ticker-label"><i class="fa-solid fa-bullhorn"></i> PENGUMUMAN</div>
        <div class="ticker-wrap">
            <div class="ticker-content" id="ticker">
                <span>🔔 Pendaftaran rekrutmen pegawai RSD Kalisat gelombang I dibuka mulai 1 Juni 2025</span>
                <span>📋 Batas akhir pengumpulan berkas: 30 Juni 2025</span>
                <span>📣 Tersedia 12 posisi untuk berbagai bidang keahlian kesehatan dan non-kesehatan</span>
                <span>✅ Seleksi administrasi, tes kompetensi, psikotes, dan wawancara akan dilaksanakan secara
                    bertahap</span>
                <span>📍 Proses rekrutmen dilaksanakan di RSD Kalisat, Jl. Sriwijaya No. 47, Kalisat, Jember</span>
            </div>
        </div>
    </div>

    <!-- ========== HIGHLIGHT POSISI ========== -->
    <section class="section highlight-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag">Posisi Terbuka</span>
                <h2 class="section-title">Lowongan <em>Tersedia</em></h2>
                <p class="section-desc">Temukan posisi yang sesuai dengan keahlian dan passion Anda di RSD Kalisat</p>
            </div>
            <div class="cards-grid">
                <div class="job-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="job-card-icon" style="--c:#0ea5e9"><i class="fa-solid fa-stethoscope"></i></div>
                    <div class="job-badge">Medis</div>
                    <h3>Dokter Umum</h3>
                    <p>Melayani pasien rawat inap dan rawat jalan serta mendukung pelayanan IGD.</p>
                    <div class="job-meta">
                        <span><i class="fa-solid fa-briefcase"></i> Full Time</span>
                        <span><i class="fa-solid fa-user-graduate"></i> S1 Kedokteran</span>
                    </div>
                    <a href="lowongan.html" class="job-link">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="job-card featured" data-aos="fade-up" data-aos-delay="200">
                    <div class="featured-tag">⭐ Prioritas</div>
                    <div class="job-card-icon" style="--c:#10b981"><i class="fa-solid fa-user-nurse"></i></div>
                    <div class="job-badge">Keperawatan</div>
                    <h3>Perawat Pelaksana</h3>
                    <p>Memberikan asuhan keperawatan berkualitas kepada pasien di berbagai unit layanan.</p>
                    <div class="job-meta">
                        <span><i class="fa-solid fa-briefcase"></i> Full Time</span>
                        <span><i class="fa-solid fa-user-graduate"></i> D3/S1 Keperawatan</span>
                    </div>
                    <a href="lowongan.html" class="job-link">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="job-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="job-card-icon" style="--c:#f59e0b"><i class="fa-solid fa-flask-vial"></i></div>
                    <div class="job-badge">Penunjang</div>
                    <h3>Analis Laboratorium</h3>
                    <p>Melaksanakan pemeriksaan laboratorium klinik untuk mendukung diagnosis dokter.</p>
                    <div class="job-meta">
                        <span><i class="fa-solid fa-briefcase"></i> Full Time</span>
                        <span><i class="fa-solid fa-user-graduate"></i> D3 Analis Kesehatan</span>
                    </div>
                    <a href="lowongan.html" class="job-link">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="job-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="job-card-icon" style="--c:#8b5cf6"><i class="fa-solid fa-pills"></i></div>
                    <div class="job-badge">Farmasi</div>
                    <h3>Apoteker / TTK</h3>
                    <p>Mengelola dan mendistribusikan obat serta memberikan informasi farmasi kepada pasien.</p>
                    <div class="job-meta">
                        <span><i class="fa-solid fa-briefcase"></i> Full Time</span>
                        <span><i class="fa-solid fa-user-graduate"></i> S1 Farmasi / D3 Farmasi</span>
                    </div>
                    <a href="lowongan.html" class="job-link">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="job-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="job-card-icon" style="--c:#ef4444"><i class="fa-solid fa-x-ray"></i></div>
                    <div class="job-badge">Penunjang</div>
                    <h3>Radiografer</h3>
                    <p>Melaksanakan pemeriksaan radiologi diagnostik dan membantu pembacaan hasil imaging.</p>
                    <div class="job-meta">
                        <span><i class="fa-solid fa-briefcase"></i> Full Time</span>
                        <span><i class="fa-solid fa-user-graduate"></i> D3/D4 Radiologi</span>
                    </div>
                    <a href="lowongan.html" class="job-link">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="job-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="job-card-icon" style="--c:#14b8a6"><i class="fa-solid fa-laptop-medical"></i></div>
                    <div class="job-badge">Non Medis</div>
                    <h3>Staf Administrasi</h3>
                    <p>Mengelola administrasi rekam medis, keuangan, dan kesekretariatan rumah sakit.</p>
                    <div class="job-meta">
                        <span><i class="fa-solid fa-briefcase"></i> Full Time</span>
                        <span><i class="fa-solid fa-user-graduate"></i> D3/S1 Semua Jurusan</span>
                    </div>
                    <a href="lowongan.html" class="job-link">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="section-cta" data-aos="fade-up">
                <a href="lowongan.html" class="btn-primary">Lihat Semua Lowongan <i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- ========== MENGAPA RSD KALISAT ========== -->
    <section class="section why-section">
        <div class="why-bg"></div>
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag light">Keunggulan Kami</span>
                <h2 class="section-title light">Mengapa Bergabung<br>dengan <em>RSD Kalisat?</em></h2>
            </div>
            <div class="why-grid">
                <div class="why-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-icon"><i class="fa-solid fa-award"></i></div>
                    <h3>Terakreditasi Nasional</h3>
                    <p>RSD Kalisat telah memperoleh akreditasi nasional sebagai bukti komitmen kami terhadap kualitas
                        pelayanan kesehatan.</p>
                </div>
                <div class="why-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="why-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                    <h3>Pengembangan Karier</h3>
                    <p>Program pelatihan dan pendidikan berkelanjutan untuk mendukung pertumbuhan profesional setiap
                        pegawai.</p>
                </div>
                <div class="why-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="why-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Jaminan Kesejahteraan</h3>
                    <p>Kompensasi kompetitif, BPJS Ketenagakerjaan & Kesehatan, tunjangan kinerja, dan fasilitas
                        kesejahteraan pegawai.</p>
                </div>
                <div class="why-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="why-icon"><i class="fa-solid fa-users-gear"></i></div>
                    <h3>Tim Profesional</h3>
                    <p>Bekerja bersama tim tenaga kesehatan berpengalaman dan berkomitmen tinggi dalam memberikan
                        pelayanan terbaik.</p>
                </div>
                <div class="why-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="why-icon"><i class="fa-solid fa-hospital"></i></div>
                    <h3>Fasilitas Modern</h3>
                    <p>Didukung fasilitas medis yang lengkap dan terus diperbarui mengikuti perkembangan teknologi
                        kesehatan.</p>
                </div>
                <div class="why-item" data-aos="fade-up" data-aos-delay="600">
                    <div class="why-icon"><i class="fa-solid fa-handshake-angle"></i></div>
                    <h3>Seleksi Transparan</h3>
                    <p>Proses rekrutmen yang jujur, transparan, dan bebas dari praktik pungutan liar (pungli) maupun
                        KKN.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== TAHAPAN SELEKSI MINI ========== -->
    <section class="section timeline-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag">Proses Seleksi</span>
                <h2 class="section-title">Tahapan <em>Rekrutmen</em></h2>
                <p class="section-desc">Ikuti setiap tahap seleksi dengan persiapan matang untuk meningkatkan peluang
                    Anda</p>
            </div>
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                    <div class="timeline-number">01</div>
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fa-solid fa-file-circle-check"></i></div>
                        <h3>Seleksi Administrasi</h3>
                        <p>Verifikasi kelengkapan dan kesesuaian berkas lamaran dengan persyaratan yang ditetapkan.</p>
                        <span class="timeline-date">1–10 Juli 2025</span>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="200">
                    <div class="timeline-number">02</div>
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fa-solid fa-brain"></i></div>
                        <h3>Tes Kompetensi</h3>
                        <p>Ujian tertulis meliputi pengetahuan teknis sesuai bidang pekerjaan yang dilamar.</p>
                        <span class="timeline-date">15 Juli 2025</span>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                    <div class="timeline-number">03</div>
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fa-solid fa-chart-bar"></i></div>
                        <h3>Psikotes</h3>
                        <p>Tes psikologi untuk mengukur kepribadian, kemampuan analitis, dan kesesuaian budaya kerja.
                        </p>
                        <span class="timeline-date">22 Juli 2025</span>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="400">
                    <div class="timeline-number">04</div>
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fa-solid fa-comments"></i></div>
                        <h3>Wawancara</h3>
                        <p>Sesi tanya jawab mendalam dengan tim HRD dan kepala unit terkait untuk menilai motivasi dan
                            kompetensi.</p>
                        <span class="timeline-date">29 Juli 2025</span>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="500">
                    <div class="timeline-number">05</div>
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fa-solid fa-trophy"></i></div>
                        <h3>Pengumuman & Orientasi</h3>
                        <p>Pengumuman hasil seleksi dan program orientasi bagi peserta yang diterima.</p>
                        <span class="timeline-date">5 Agustus 2025</span>
                    </div>
                </div>
            </div>
            <div class="section-cta" data-aos="fade-up">
                <a href="tahapan.html" class="btn-outline-dark">Detail Tahapan <i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- ========== PENGUMUMAN / BERITA ========== -->
    <section class="section news-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag">Info Terkini</span>
                <h2 class="section-title">Pengumuman <em>Rekrutmen</em></h2>
            </div>
            <div class="news-grid">
                <div class="news-card featured-news" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-img-placeholder">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <div class="news-body">
                        <span class="news-tag">Pengumuman</span>
                        <h3>Pembukaan Rekrutmen Pegawai RSD Kalisat Gelombang I Tahun 2025</h3>
                        <p>RSD Kalisat membuka pendaftaran calon pegawai baru untuk 12 posisi di berbagai unit layanan.
                            Pendaftaran dibuka mulai 1 Juni hingga 30 Juni 2025.</p>
                        <div class="news-footer">
                            <span><i class="fa-regular fa-calendar"></i> 1 Juni 2025</span>
                            <a href="lowongan.html">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="news-list">
                    <div class="news-mini" data-aos="fade-up" data-aos-delay="200">
                        <div class="news-mini-icon"><i class="fa-solid fa-file-alt"></i></div>
                        <div>
                            <span class="news-tag sm">Pengumuman</span>
                            <h4>Persyaratan Berkas Lamaran Rekrutmen 2025</h4>
                            <span class="news-date"><i class="fa-regular fa-calendar"></i> 1 Juni 2025</span>
                        </div>
                    </div>
                    <div class="news-mini" data-aos="fade-up" data-aos-delay="300">
                        <div class="news-mini-icon"><i class="fa-solid fa-calendar-check"></i></div>
                        <div>
                            <span class="news-tag sm">Jadwal</span>
                            <h4>Jadwal Lengkap Tahapan Seleksi Pegawai RSD Kalisat 2025</h4>
                            <span class="news-date"><i class="fa-regular fa-calendar"></i> 1 Juni 2025</span>
                        </div>
                    </div>
                    <div class="news-mini" data-aos="fade-up" data-aos-delay="400">
                        <div class="news-mini-icon"><i class="fa-solid fa-circle-info"></i></div>
                        <div>
                            <span class="news-tag sm">Info</span>
                            <h4>Panduan Pengisian Formulir Pendaftaran Online RSD Kalisat</h4>
                            <span class="news-date"><i class="fa-regular fa-calendar"></i> 1 Juni 2025</span>
                        </div>
                    </div>
                    <div class="news-mini" data-aos="fade-up" data-aos-delay="500">
                        <div class="news-mini-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                        <div>
                            <span class="news-tag sm warning">Penting</span>
                            <h4>Rekrutmen RSD Kalisat Tidak Dipungut Biaya Apapun</h4>
                            <span class="news-date"><i class="fa-regular fa-calendar"></i> 1 Juni 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CTA BANNER ========== -->
    <section class="cta-section" data-aos="fade-up">
        <div class="cta-bg">
            <div class="cta-blob cb1"></div>
            <div class="cta-blob cb2"></div>
        </div>
        <div class="container">
            <div class="cta-content">
                <div class="cta-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                <h2>Siap Bergabung dengan<br>Tim RSD Kalisat?</h2>
                <p>Jadilah bagian dari keluarga besar RSD Kalisat dan wujudkan dedikasi Anda dalam pelayanan kesehatan
                    masyarakat Jember.</p>
                <div class="cta-buttons">
                    <a href="lowongan.html" class="btn-cta-primary"><i class="fa-solid fa-paper-plane"></i> Lamar
                        Sekarang</a>
                    <a href="kontak.html" class="btn-cta-outline"><i class="fa-solid fa-phone"></i> Hubungi Kami</a>
                </div>
                <p class="cta-note"><i class="fa-solid fa-shield-check"></i> Proses seleksi bebas biaya dan bebas dari
                    praktik KKN</p>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <div class="brand-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                            <div>
                                <span class="brand-name">RSD Kalisat</span>
                                <span class="brand-sub">Sistem Rekrutmen Pegawai</span>
                            </div>
                        </div>
                        <p>Rumah Sakit Daerah Kalisat berkomitmen menghadirkan pelayanan kesehatan terbaik melalui SDM
                            yang profesional dan berdedikasi tinggi.</p>
                        <div class="footer-social">
                            <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h4>Menu Utama</h4>
                        <ul>
                            <li><a href="index.html"><i class="fa-solid fa-chevron-right"></i> Beranda</a></li>
                            <li><a href="tentang.html"><i class="fa-solid fa-chevron-right"></i> Tentang RSD
                                    Kalisat</a></li>
                            <li><a href="lowongan.html"><i class="fa-solid fa-chevron-right"></i> Lowongan Kerja</a>
                            </li>
                            <li><a href="persyaratan.html"><i class="fa-solid fa-chevron-right"></i> Persyaratan</a>
                            </li>
                            <li><a href="tahapan.html"><i class="fa-solid fa-chevron-right"></i> Tahapan Seleksi</a>
                            </li>
                            <li><a href="faq.html"><i class="fa-solid fa-chevron-right"></i> FAQ</a></li>
                            <li><a href="kontak.html"><i class="fa-solid fa-chevron-right"></i> Kontak</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Kontak</h4>
                        <ul class="footer-contact">
                            <li><i class="fa-solid fa-location-dot"></i> Jl. Sriwijaya No. 47, Kalisat, Jember, Jawa
                                Timur 68191</li>
                            <li><i class="fa-solid fa-phone"></i> (0331) 591032</li>
                            <li><i class="fa-solid fa-envelope"></i> rekrutmen@rsdkalisat.go.id</li>
                            <li><i class="fa-regular fa-clock"></i> Senin – Jumat: 08.00 – 15.00 WIB</li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Jadwal Penting</h4>
                        <div class="footer-schedule">
                            <div class="schedule-item">
                                <span class="schedule-label">Buka Pendaftaran</span>
                                <span class="schedule-date">1 Juni 2025</span>
                            </div>
                            <div class="schedule-item">
                                <span class="schedule-label">Tutup Pendaftaran</span>
                                <span class="schedule-date">30 Juni 2025</span>
                            </div>
                            <div class="schedule-item">
                                <span class="schedule-label">Seleksi Administrasi</span>
                                <span class="schedule-date">1–10 Juli 2025</span>
                            </div>
                            <div class="schedule-item">
                                <span class="schedule-label">Tes Kompetensi</span>
                                <span class="schedule-date">15 Juli 2025</span>
                            </div>
                            <div class="schedule-item">
                                <span class="schedule-label">Pengumuman Akhir</span>
                                <span class="schedule-date">5 Agustus 2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>© 2025 RSD Kalisat — Sistem Rekrutmen Pegawai. Hak cipta dilindungi undang-undang.</p>
                <p>Rekrutmen ini <strong>tidak dipungut biaya</strong> dalam bentuk apapun.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button class="scroll-top" id="scrollTop" aria-label="Scroll to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="main.js"></script>
</body>

</html>

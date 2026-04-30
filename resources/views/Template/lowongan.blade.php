<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lowongan Kerja — RSD Kalisat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <style>
        .jobs-full-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        @media(max-width:768px) {
            .jobs-full-grid {
                grid-template-columns: 1fr;
            }
        }

        .job-card-full {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
            position: relative;
            overflow: hidden;
        }

        .job-card-full::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-teal), var(--accent-blue));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s;
        }

        .job-card-full:hover {
            transform: translateY(-4px);
            box-shadow: var(--glow-teal);
            border-color: rgba(0, 196, 140, 0.3);
        }

        .job-card-full:hover::before {
            transform: scaleX(1);
        }

        .job-card-full h3 {
            font-family: var(--font-display);
            font-size: 1.1rem;
        }

        .job-desc {
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .job-info-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .job-info-row span {
            font-size: 0.78rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .job-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .no-results {
            text-align: center;
            padding: 64px 24px;
            color: var(--text-muted);
            display: none;
        }

        .no-results i {
            font-size: 3rem;
            margin-bottom: 16px;
            display: block;
        }

        .badge-dept {
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            background: rgba(10, 124, 246, 0.12);
            color: var(--accent-blue);
            border: 1px solid rgba(10, 124, 246, 0.2);
        }

        .badge-type {
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            background: rgba(34, 197, 94, 0.1);
            color: var(--accent-green);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .quota-badge {
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 700;
            background: rgba(0, 196, 140, 0.12);
            color: var(--accent-teal);
            border: 1px solid rgba(0, 196, 140, 0.2);
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 2000;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        .modal-box {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 40px;
            max-width: 560px;
            width: 100%;
            max-height: 80vh;
            overflow-y: auto;
            transform: translateY(20px);
            transition: transform 0.3s;
        }

        .modal-overlay.open .modal-box {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
            gap: 16px;
        }

        .modal-close {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.2rem;
            padding: 4px;
        }

        .modal-close:hover {
            color: var(--text-primary);
        }

        .modal-section {
            margin-bottom: 20px;
        }

        .modal-section h4 {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--accent-teal);
            margin-bottom: 10px;
        }

        .modal-section ul {
            padding-left: 0;
        }

        .modal-section ul li {
            font-size: 0.87rem;
            color: var(--text-secondary);
            padding: 4px 0;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .modal-section ul li i {
            color: var(--accent-teal);
            margin-top: 2px;
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="pulse-ring"></div>
        <div class="pulse-ring delay-1"></div><svg class="loader-icon" viewBox="0 0 60 60" fill="none">
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
                <li><a href="tentang.html">Tentang</a></li>
                <li><a href="lowongan.html" class="active">Lowongan</a></li>
                <li><a href="persyaratan.html">Persyaratan</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
            <a href="lowongan.html" class="btn-apply-nav">Lamar Sekarang</a>
            <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
        </div>
    </nav>

    <div class="page-hero">
        <div class="section-label">Karir & Peluang</div>
        <h1 class="hero-title">Lowongan <span class="gradient-text">Kerja Tersedia</span></h1>
        <p>Temukan posisi yang sesuai dengan keahlian dan passion Anda. Bergabunglah dengan tim RSD Kalisat.</p>
        <div class="breadcrumb"><a href="index.html">Beranda</a><i
                class="fa-solid fa-chevron-right"></i><span>Lowongan</span></div>
    </div>

    <section class="section">
        <div class="container">
            <!-- Filter Bar -->
            <div class="filter-bar reveal">
                <input type="text" id="searchJob" placeholder="🔍  Cari posisi, instalasi..." />
                <select id="filterDept">
                    <option value="">Semua Departemen</option>
                    <option value="medis">Tenaga Medis</option>
                    <option value="keperawatan">Keperawatan</option>
                    <option value="penunjang">Penunjang Medis</option>
                    <option value="non-medis">Non Medis</option>
                </select>
                <select id="filterType">
                    <option value="">Semua Tipe</option>
                    <option value="fulltime">Full-time</option>
                    <option value="kontrak">Kontrak</option>
                    <option value="magang">Magang</option>
                </select>
            </div>

            <div class="jobs-full-grid" id="jobsGrid">
                <!-- Card 1 -->
                <div class="job-card-full reveal" data-title="dokter umum" data-dept="medis" data-type="fulltime">
                    <div class="job-card-top">
                        <div class="job-icon bg-teal"><i class="fa-solid fa-user-doctor"></i></div>
                        <span class="job-tag urgent">Segera</span>
                    </div>
                    <div>
                        <h3>Dokter Umum</h3>
                        <div class="job-tags" style="margin:10px 0">
                            <span class="badge-dept">Instalasi Gawat Darurat</span>
                            <span class="badge-type">Full-time</span>
                            <span class="quota-badge">Kuota: 2 Orang</span>
                        </div>
                        <p class="job-desc">Melaksanakan pelayanan medis di Instalasi Gawat Darurat (IGD) dan Rawat
                            Jalan. Bertanggung jawab atas diagnosis, tindakan medis, dan koordinasi dengan dokter
                            spesialis.</p>
                    </div>
                    <div class="job-info-row">
                        <span><i class="fa-solid fa-graduation-cap"></i> S1 Profesi Dokter</span>
                        <span><i class="fa-solid fa-id-card"></i> SIP/STR Aktif</span>
                        <span><i class="fa-regular fa-calendar"></i> Tutup: 31 Agustus 2025</span>
                    </div>
                    <div class="job-action">
                        <button class="btn-outline" style="padding:8px 18px;font-size:0.83rem"
                            onclick="openModal('dokter-umum')">Detail Lowongan</button>
                        <a href="kontak.html" class="btn-sm">Lamar Sekarang</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="job-card-full reveal" data-title="perawat klinis" data-dept="keperawatan"
                    data-type="fulltime">
                    <div class="job-card-top">
                        <div class="job-icon bg-blue"><i class="fa-solid fa-user-nurse"></i></div><span
                            class="job-tag">Baru</span>
                    </div>
                    <div>
                        <h3>Perawat Klinis</h3>
                        <div class="job-tags" style="margin:10px 0"><span class="badge-dept">Rawat Inap &
                                ICU</span><span class="badge-type">Full-time</span><span class="quota-badge">Kuota: 10
                                Orang</span></div>
                        <p class="job-desc">Memberikan asuhan keperawatan kepada pasien rawat inap dan intensive care.
                            Melakukan observasi, dokumentasi, dan koordinasi dengan tim medis secara profesional.</p>
                    </div>
                    <div class="job-info-row"><span><i class="fa-solid fa-graduation-cap"></i> DIII/S1
                            Keperawatan</span><span><i class="fa-solid fa-id-card"></i> SIP/STR Aktif</span><span><i
                                class="fa-regular fa-calendar"></i> Tutup: 31 Agustus 2025</span></div>
                    <div class="job-action"><button class="btn-outline" style="padding:8px 18px;font-size:0.83rem"
                            onclick="openModal('perawat')">Detail Lowongan</button><a href="kontak.html"
                            class="btn-sm">Lamar Sekarang</a></div>
                </div>

                <!-- Card 3 -->
                <div class="job-card-full reveal" data-title="analis kesehatan" data-dept="penunjang"
                    data-type="fulltime">
                    <div class="job-card-top">
                        <div class="job-icon bg-green"><i class="fa-solid fa-microscope"></i></div><span
                            class="job-tag">Baru</span>
                    </div>
                    <div>
                        <h3>Analis Kesehatan</h3>
                        <div class="job-tags" style="margin:10px 0"><span class="badge-dept">Laboratorium
                                Klinik</span><span class="badge-type">Full-time</span><span class="quota-badge">Kuota:
                                4 Orang</span></div>
                        <p class="job-desc">Melaksanakan pemeriksaan laboratorium klinik meliputi hematologi, kimia
                            klinik, mikrobiologi, dan imunoserologi untuk mendukung diagnosis pasien.</p>
                    </div>
                    <div class="job-info-row"><span><i class="fa-solid fa-graduation-cap"></i> DIII Analis
                            Kesehatan</span><span><i class="fa-solid fa-id-card"></i> STR Aktif</span><span><i
                                class="fa-regular fa-calendar"></i> Tutup: 31 Agustus 2025</span></div>
                    <div class="job-action"><button class="btn-outline" style="padding:8px 18px;font-size:0.83rem"
                            onclick="openModal('analis')">Detail Lowongan</button><a href="kontak.html"
                            class="btn-sm">Lamar Sekarang</a></div>
                </div>

                <!-- Card 4 -->
                <div class="job-card-full reveal" data-title="apoteker" data-dept="penunjang" data-type="fulltime">
                    <div class="job-card-top">
                        <div class="job-icon bg-teal"><i class="fa-solid fa-pills"></i></div><span
                            class="job-tag">Baru</span>
                    </div>
                    <div>
                        <h3>Apoteker</h3>
                        <div class="job-tags" style="margin:10px 0"><span class="badge-dept">Instalasi
                                Farmasi</span><span class="badge-type">Full-time</span><span
                                class="quota-badge">Kuota: 2 Orang</span></div>
                        <p class="job-desc">Mengelola dan melaksanakan pelayanan kefarmasian, visite ke ruangan,
                            konseling pasien, dan monitoring penggunaan obat di rumah sakit.</p>
                    </div>
                    <div class="job-info-row"><span><i class="fa-solid fa-graduation-cap"></i> S1 Profesi
                            Apoteker</span><span><i class="fa-solid fa-id-card"></i> SIPA Aktif</span><span><i
                                class="fa-regular fa-calendar"></i> Tutup: 31 Agustus 2025</span></div>
                    <div class="job-action"><button class="btn-outline" style="padding:8px 18px;font-size:0.83rem"
                            onclick="openModal('apoteker')">Detail Lowongan</button><a href="kontak.html"
                            class="btn-sm">Lamar Sekarang</a></div>
                </div>

                <!-- Card 5 -->
                <div class="job-card-full reveal" data-title="radiografer" data-dept="penunjang"
                    data-type="fulltime">
                    <div class="job-card-top">
                        <div class="job-icon bg-blue"><i class="fa-solid fa-x-ray"></i></div><span
                            class="job-tag">Baru</span>
                    </div>
                    <div>
                        <h3>Radiografer</h3>
                        <div class="job-tags" style="margin:10px 0"><span class="badge-dept">Radiologi</span><span
                                class="badge-type">Full-time</span><span class="quota-badge">Kuota: 3 Orang</span>
                        </div>
                        <p class="job-desc">Melakukan pemeriksaan radiologi konvensional, CT-Scan, dan USG. Memastikan
                            kualitas citra dan keselamatan pasien dalam setiap prosedur pencitraan.</p>
                    </div>
                    <div class="job-info-row"><span><i class="fa-solid fa-graduation-cap"></i> DIII
                            Radiologi</span><span><i class="fa-solid fa-id-card"></i> STR Aktif</span><span><i
                                class="fa-regular fa-calendar"></i> Tutup: 31 Agustus 2025</span></div>
                    <div class="job-action"><button class="btn-outline" style="padding:8px 18px;font-size:0.83rem"
                            onclick="openModal('radiografer')">Detail Lowongan</button><a href="kontak.html"
                            class="btn-sm">Lamar Sekarang</a></div>
                </div>

                <!-- Card 6 -->
                <div class="job-card-full reveal" data-title="staf administrasi" data-dept="non-medis"
                    data-type="kontrak">
                    <div class="job-card-top">
                        <div class="job-icon bg-green"><i class="fa-solid fa-file-medical"></i></div><span
                            class="job-tag">Kontrak</span>
                    </div>
                    <div>
                        <h3>Staf Administrasi & Rekam Medis</h3>
                        <div class="job-tags" style="margin:10px 0"><span class="badge-dept">Rekam Medis</span><span
                                class="badge-type">Kontrak</span><span class="quota-badge">Kuota: 3 Orang</span></div>
                        <p class="job-desc">Mengelola dokumen rekam medis pasien, pengkodean diagnosis (ICD-10),
                            pelaporan, dan memastikan kerahasiaan serta keakuratan data medis pasien.</p>
                    </div>
                    <div class="job-info-row"><span><i class="fa-solid fa-graduation-cap"></i> DIII Rekam
                            Medis</span><span><i class="fa-solid fa-id-card"></i> STR Aktif</span><span><i
                                class="fa-regular fa-calendar"></i> Tutup: 31 Agustus 2025</span></div>
                    <div class="job-action"><button class="btn-outline" style="padding:8px 18px;font-size:0.83rem"
                            onclick="openModal('rekam')">Detail Lowongan</button><a href="kontak.html"
                            class="btn-sm">Lamar Sekarang</a></div>
                </div>
            </div>

            <div class="no-results" id="noResults">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h3>Tidak ada lowongan ditemukan</h3>
                <p>Coba ubah kata kunci atau filter pencarian Anda.</p>
            </div>
        </div>
    </section>

    <!-- MODAL DETAIL -->
    <div class="modal-overlay" id="modal">
        <div class="modal-box">
            <div class="modal-header">
                <div>
                    <div class="section-label" id="modal-dept" style="margin-bottom:8px">Departemen</div>
                    <h2 class="section-title" id="modal-title" style="font-size:1.4rem;margin-bottom:0">Judul</h2>
                </div>
                <button class="modal-close" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div id="modal-body"></div>
            <div style="margin-top:24px;display:flex;gap:12px;flex-wrap:wrap">
                <a href="kontak.html" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Lamar Sekarang</a>
                <button class="btn-outline" style="cursor:pointer" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

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
                    <p>Rumah Sakit Daerah Kalisat — melayani dengan hati.</p>
                    <div class="footer-social"><a href="#"><i class="fa-brands fa-instagram"></i></a><a
                            href="#"><i class="fa-brands fa-facebook-f"></i></a><a href="#"><i
                                class="fa-brands fa-youtube"></i></a><a href="#"><i
                                class="fa-solid fa-envelope"></i></a></div>
                </div>
                <div class="footer-links">
                    <h5>Navigasi</h5>
                    <ul>
                        <li><a href="index.html">Beranda</a></li>
                        <li><a href="tentang.html">Tentang</a></li>
                        <li><a href="lowongan.html">Lowongan</a></li>
                        <li><a href="persyaratan.html">Persyaratan</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="kontak.html">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h5>Info</h5>
                    <ul>
                        <li><a href="#">Pengumuman</a></li>
                        <li><a href="#">Jadwal Tes</a></li>
                        <li><a href="#">Hasil Seleksi</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h5>Kontak</h5>
                    <ul>
                        <li><i class="fa-solid fa-location-dot"></i> Jl. Raya Kalisat No.20, Jember</li>
                        <li><i class="fa-solid fa-phone"></i> (0331) 593xxx</li>
                        <li><i class="fa-solid fa-envelope"></i> rekrutmen@rsdkalisat.go.id</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 RSD Kalisat — Kabupaten Jember.</p>
                <p>Dibuat dengan <i class="fa-solid fa-heart" style="color:var(--accent-teal)"></i></p>
            </div>
        </div>
    </footer>
    <button class="back-to-top" id="backToTop"><i class="fa-solid fa-chevron-up"></i></button>

    <script src="{{ asset('main.js') }}"></script>
    <script>
        const modalData = {
            'dokter-umum': {
                dept: 'Instalasi Gawat Darurat & Rawat Jalan',
                title: 'Dokter Umum',
                body: `
      <div class="modal-section"><h4>Deskripsi Pekerjaan</h4><ul>
        <li><i class="fa-solid fa-circle-dot"></i>Melakukan pelayanan medis di IGD dan Rawat Jalan.</li>
        <li><i class="fa-solid fa-circle-dot"></i>Melakukan anamnesis, pemeriksaan fisik, dan tindakan medis.</li>
        <li><i class="fa-solid fa-circle-dot"></i>Berkoordinasi dengan dokter spesialis dan tim keperawatan.</li>
        <li><i class="fa-solid fa-circle-dot"></i>Mengisi rekam medis dengan lengkap dan akurat.</li>
      </ul></div>
      <div class="modal-section"><h4>Kualifikasi</h4><ul>
        <li><i class="fa-solid fa-check"></i>Sarjana Kedokteran (S1 Profesi Dokter).</li>
        <li><i class="fa-solid fa-check"></i>Memiliki SIP dan STR yang masih berlaku.</li>
        <li><i class="fa-solid fa-check"></i>Sertifikat ACLS/ATLS lebih diutamakan.</li>
        <li><i class="fa-solid fa-check"></i>Bersedia bekerja shift termasuk malam hari.</li>
        <li><i class="fa-solid fa-check"></i>Usia maksimal 35 tahun.</li>
      </ul></div>
      <div class="modal-section"><h4>Info Tambahan</h4><ul>
        <li><i class="fa-regular fa-calendar"></i>Batas pendaftaran: 31 Agustus 2025</li>
        <li><i class="fa-solid fa-users"></i>Kuota: 2 orang</li>
        <li><i class="fa-solid fa-briefcase"></i>Status: Full-time</li>
      </ul></div>`
            },
            'perawat': {
                dept: 'Rawat Inap & ICU',
                title: 'Perawat Klinis',
                body: `<div class="modal-section"><h4>Deskripsi Pekerjaan</h4><ul><li><i class="fa-solid fa-circle-dot"></i>Memberikan asuhan keperawatan profesional kepada pasien rawat inap.</li><li><i class="fa-solid fa-circle-dot"></i>Melakukan observasi kondisi pasien dan melaporkan perubahan klinis.</li><li><i class="fa-solid fa-circle-dot"></i>Melaksanakan tindakan keperawatan sesuai SOP.</li></ul></div><div class="modal-section"><h4>Kualifikasi</h4><ul><li><i class="fa-solid fa-check"></i>DIII/S1 Keperawatan.</li><li><i class="fa-solid fa-check"></i>SIP dan STR aktif.</li><li><i class="fa-solid fa-check"></i>Pengalaman min. 1 tahun di RS lebih diutamakan.</li><li><i class="fa-solid fa-check"></i>Bersedia bekerja shift.</li></ul></div><div class="modal-section"><h4>Info</h4><ul><li><i class="fa-regular fa-calendar"></i>Tutup: 31 Agustus 2025</li><li><i class="fa-solid fa-users"></i>Kuota: 10 orang</li></ul></div>`
            },
            'analis': {
                dept: 'Laboratorium Klinik',
                title: 'Analis Kesehatan',
                body: `<div class="modal-section"><h4>Deskripsi</h4><ul><li><i class="fa-solid fa-circle-dot"></i>Melakukan pemeriksaan hematologi, kimia klinik, dan mikrobiologi.</li><li><i class="fa-solid fa-circle-dot"></i>Menjaga kualitas hasil pemeriksaan dan kalibrasi alat.</li></ul></div><div class="modal-section"><h4>Kualifikasi</h4><ul><li><i class="fa-solid fa-check"></i>DIII Analis Kesehatan/Teknologi Laboratorium Medik.</li><li><i class="fa-solid fa-check"></i>STR aktif.</li><li><i class="fa-solid fa-check"></i>Usia maks. 30 tahun.</li></ul></div><div class="modal-section"><h4>Info</h4><ul><li><i class="fa-regular fa-calendar"></i>Tutup: 31 Agustus 2025</li><li><i class="fa-solid fa-users"></i>Kuota: 4 orang</li></ul></div>`
            },
            'apoteker': {
                dept: 'Instalasi Farmasi',
                title: 'Apoteker',
                body: `<div class="modal-section"><h4>Deskripsi</h4><ul><li><i class="fa-solid fa-circle-dot"></i>Pelayanan kefarmasian klinis dan dispensing.</li><li><i class="fa-solid fa-circle-dot"></i>Konseling penggunaan obat kepada pasien.</li><li><i class="fa-solid fa-circle-dot"></i>Monitoring efek samping obat.</li></ul></div><div class="modal-section"><h4>Kualifikasi</h4><ul><li><i class="fa-solid fa-check"></i>S1 Profesi Apoteker.</li><li><i class="fa-solid fa-check"></i>SIPA aktif.</li><li><i class="fa-solid fa-check"></i>Menguasai sistem informasi farmasi RS.</li></ul></div><div class="modal-section"><h4>Info</h4><ul><li><i class="fa-regular fa-calendar"></i>Tutup: 31 Agustus 2025</li><li><i class="fa-solid fa-users"></i>Kuota: 2 orang</li></ul></div>`
            },
            'radiografer': {
                dept: 'Instalasi Radiologi',
                title: 'Radiografer',
                body: `<div class="modal-section"><h4>Deskripsi</h4><ul><li><i class="fa-solid fa-circle-dot"></i>Pemeriksaan radiologi konvensional, CT-Scan, dan USG.</li><li><i class="fa-solid fa-circle-dot"></i>Menjaga keselamatan radiasi bagi pasien dan petugas.</li></ul></div><div class="modal-section"><h4>Kualifikasi</h4><ul><li><i class="fa-solid fa-check"></i>DIII Radiologi.</li><li><i class="fa-solid fa-check"></i>STR dan SIR aktif.</li><li><i class="fa-solid fa-check"></i>Bersedia bekerja shift.</li></ul></div><div class="modal-section"><h4>Info</h4><ul><li><i class="fa-regular fa-calendar"></i>Tutup: 31 Agustus 2025</li><li><i class="fa-solid fa-users"></i>Kuota: 3 orang</li></ul></div>`
            },
            'rekam': {
                dept: 'Instalasi Rekam Medis',
                title: 'Staf Administrasi & Rekam Medis',
                body: `<div class="modal-section"><h4>Deskripsi</h4><ul><li><i class="fa-solid fa-circle-dot"></i>Mengelola dokumen rekam medis pasien.</li><li><i class="fa-solid fa-circle-dot"></i>Pengkodean diagnosis menggunakan ICD-10.</li><li><i class="fa-solid fa-circle-dot"></i>Pelaporan data morbiditas dan mortalitas.</li></ul></div><div class="modal-section"><h4>Kualifikasi</h4><ul><li><i class="fa-solid fa-check"></i>DIII Rekam Medis dan Informasi Kesehatan.</li><li><i class="fa-solid fa-check"></i>STR aktif.</li><li><i class="fa-solid fa-check"></i>Teliti dan mampu bekerja dengan data.</li></ul></div><div class="modal-section"><h4>Info</h4><ul><li><i class="fa-regular fa-calendar"></i>Tutup: 31 Agustus 2025</li><li><i class="fa-solid fa-users"></i>Kuota: 3 orang</li></ul></div>`
            }
        };

        function openModal(key) {
            const d = modalData[key];
            if (!d) return;
            document.getElementById('modal-dept').textContent = d.dept;
            document.getElementById('modal-title').textContent = d.title;
            document.getElementById('modal-body').innerHTML = d.body;
            document.getElementById('modal').classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('open');
            document.body.style.overflow = '';
        }
        document.getElementById('modal').addEventListener('click', e => {
            if (e.target === document.getElementById('modal')) closeModal();
        });

        // filter with no-results
        const origFilter = window.filterJobs;

        function filterJobsExtended() {
            const search = document.getElementById('searchJob')?.value.toLowerCase() || '';
            const dept = document.getElementById('filterDept')?.value || '';
            const type = document.getElementById('filterType')?.value || '';
            let visible = 0;
            document.querySelectorAll('.job-card-full').forEach(card => {
                const title = card.dataset.title?.toLowerCase() || '';
                const department = card.dataset.dept || '';
                const jobType = card.dataset.type || '';
                const match = (!search || title.includes(search)) && (!dept || department === dept) && (!type ||
                    jobType === type);
                card.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
        }
        document.getElementById('searchJob')?.addEventListener('input', filterJobsExtended);
        document.getElementById('filterDept')?.addEventListener('change', filterJobsExtended);
        document.getElementById('filterType')?.addEventListener('change', filterJobsExtended);
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Persyaratan — RSD Kalisat</title>
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
                <li><a href="lowongan.html">Lowongan</a></li>
                <li><a href="persyaratan.html" class="active">Persyaratan</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
            <a href="lowongan.html" class="btn-apply-nav">Lamar Sekarang</a>
            <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
        </div>
    </nav>

    <div class="page-hero">
        <div class="section-label">Panduan Pendaftaran</div>
        <h1 class="hero-title">Persyaratan <span class="gradient-text">Pendaftaran</span></h1>
        <p>Pastikan Anda memenuhi seluruh persyaratan dan melengkapi dokumen sebelum mengajukan lamaran.</p>
        <div class="breadcrumb"><a href="index.html">Beranda</a><i
                class="fa-solid fa-chevron-right"></i><span>Persyaratan</span></div>
    </div>

    <section class="section">
        <div class="container">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px">

                <div class="req-card reveal">
                    <h3><i class="fa-solid fa-user-check"></i> Persyaratan Umum</h3>
                    <ul class="req-list">
                        <li><i class="fa-solid fa-check-circle"></i> Warga Negara Indonesia (WNI).</li>
                        <li><i class="fa-solid fa-check-circle"></i> Tidak sedang terikat kontrak kerja dengan instansi
                            lain.</li>
                        <li><i class="fa-solid fa-check-circle"></i> Sehat jasmani dan rohani, dibuktikan dengan surat
                            keterangan dokter.</li>
                        <li><i class="fa-solid fa-check-circle"></i> Berkelakuan baik, dibuktikan dengan SKCK dari
                            Kepolisian.</li>
                        <li><i class="fa-solid fa-check-circle"></i> Tidak sedang menjalani hukuman disiplin atau
                            pidana.</li>
                        <li><i class="fa-solid fa-check-circle"></i> Bersedia ditempatkan di seluruh unit kerja RSD
                            Kalisat.</li>
                        <li><i class="fa-solid fa-check-circle"></i> Bersedia bekerja dalam sistem shift sesuai
                            ketentuan.</li>
                    </ul>
                </div>

                <div class="req-card reveal delay-1">
                    <h3><i class="fa-solid fa-graduation-cap"></i> Persyaratan Pendidikan</h3>
                    <ul class="req-list">
                        <li><i class="fa-solid fa-check-circle"></i> Memiliki ijazah dari institusi pendidikan
                            terakreditasi.</li>
                        <li><i class="fa-solid fa-check-circle"></i> IPK minimal 2,75 (skala 4,00) untuk DIII.</li>
                        <li><i class="fa-solid fa-check-circle"></i> IPK minimal 3,00 (skala 4,00) untuk S1/Profesi.
                        </li>
                        <li><i class="fa-solid fa-check-circle"></i> Batas usia: Maks. 30 tahun (DIII), 35 tahun
                            (S1/Profesi).</li>
                        <li><i class="fa-solid fa-check-circle"></i> Memiliki STR/SIP yang masih berlaku (bagi tenaga
                            medis).</li>
                        <li><i class="fa-solid fa-check-circle"></i> Sertifikasi kompetensi sesuai bidang profesi.</li>
                    </ul>
                </div>

                <div class="req-card reveal">
                    <h3><i class="fa-solid fa-folder-open"></i> Berkas yang Harus Dilengkapi</h3>
                    <ul class="req-list">
                        <li><i class="fa-solid fa-file-alt"></i> Surat lamaran kerja ditujukan kepada Direktur RSD
                            Kalisat.</li>
                        <li><i class="fa-solid fa-file-alt"></i> Daftar Riwayat Hidup (CV) terbaru.</li>
                        <li><i class="fa-solid fa-file-alt"></i> Fotokopi ijazah dan transkrip nilai yang dilegalisir.
                        </li>
                        <li><i class="fa-solid fa-file-alt"></i> Fotokopi KTP yang masih berlaku.</li>
                        <li><i class="fa-solid fa-file-alt"></i> Pas foto terbaru ukuran 4×6 (2 lembar, background
                            merah).</li>
                        <li><i class="fa-solid fa-file-alt"></i> Fotokopi STR/SIP yang masih berlaku.</li>
                        <li><i class="fa-solid fa-file-alt"></i> Surat keterangan sehat dari dokter (RS/Puskesmas).</li>
                        <li><i class="fa-solid fa-file-alt"></i> SKCK dari Kepolisian yang masih berlaku.</li>
                        <li><i class="fa-solid fa-file-alt"></i> Sertifikat pelatihan/kompetensi pendukung (jika ada).
                        </li>
                    </ul>
                </div>

                <div class="req-card reveal delay-1">
                    <h3><i class="fa-solid fa-calendar-alt"></i> Tahapan Seleksi</h3>
                    <ul class="req-list">
                        <li><i class="fa-solid fa-circle-check"></i>
                            <div><strong>Tahap 1 — Seleksi Administrasi</strong><br><span
                                    style="font-size:0.8rem">Verifikasi kelengkapan dan kesesuaian berkas
                                    lamaran.</span></div>
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i>
                            <div><strong>Tahap 2 — Tes Tertulis</strong><br><span style="font-size:0.8rem">Tes
                                    kompetensi bidang dan psikotes dasar.</span></div>
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i>
                            <div><strong>Tahap 3 — Tes Praktik/Keterampilan</strong><br><span
                                    style="font-size:0.8rem">Demonstrasi keterampilan klinis (bagi tenaga
                                    medis).</span></div>
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i>
                            <div><strong>Tahap 4 — Wawancara</strong><br><span style="font-size:0.8rem">Wawancara
                                    dengan tim HRD dan kepala instalasi.</span></div>
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i>
                            <div><strong>Tahap 5 — Pengumuman Kelulusan</strong><br><span
                                    style="font-size:0.8rem">Diumumkan melalui website resmi dan email pelamar.</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Important Notice -->
            <div class="reveal"
                style="margin-top:32px;padding:28px 32px;background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.2);border-radius:16px;display:flex;gap:16px;align-items:flex-start">
                <i class="fa-solid fa-triangle-exclamation"
                    style="color:#f87171;font-size:1.5rem;flex-shrink:0;margin-top:3px"></i>
                <div>
                    <h4 style="color:#f87171;margin-bottom:8px">Perhatian Penting</h4>
                    <p style="font-size:0.87rem;color:var(--text-secondary);line-height:1.7">Seluruh proses rekrutmen
                        RSD Kalisat <strong style="color:var(--text-primary)">tidak dipungut biaya apapun</strong>.
                        Waspada terhadap oknum yang mengatasnamakan RSD Kalisat dan meminta imbalan dalam proses
                        seleksi. Laporkan kepada kami jika menemukan indikasi penipuan.</p>
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
                    <p>Melayani dengan hati, tumbuh bersama masyarakat.</p>
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
</body>

</html>

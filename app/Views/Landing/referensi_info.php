<!-- 
    Developer: Abdul Yamin, S.Pd., M.Kom
    GitHub: https://github.com/ocikyamin
    Project: Lapor Pak Wadek 3 - FTIK UIN Bukittinggi
-->
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berhasil - SIGAP FTIK</title>
    <meta name="author" content="Abdul Yamin, S.Pd., M.Kom" />
    <meta name="developer" content="https://github.com/ocikyamin" />

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0"
        rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0D9488',
                        'primary-hover': '#0F766E',
                        'primary-light': '#CCFBF1',
                        'accent': '#6366f1',
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/css/referensi.css') ?>">
    <style>
        .animate-blob {
            animation: blob 7s infinite;
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .entry-anim {
            opacity: 0;
            transform: translateY(20px);
            animation: entry 0.8s ease-out forwards;
        }

        @keyframes entry {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ticket-cutout {
            position: relative;
        }

        .ticket-cutout::before,
        .ticket-cutout::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 20px;
            height: 20px;
            background: #f8fafc;
            /* Adjust to match container bg */
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 10;
        }

        .ticket-cutout::before {
            left: -11px;
            box-shadow: inset -3px 0 5px rgba(0, 0, 0, 0.05);
        }

        .ticket-cutout::after {
            right: -11px;
            box-shadow: inset 3px 0 5px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="min-h-screen bg-[#f8fafc] font-sans antialiased overflow-x-hidden">

    <!-- Background Decoration -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div
            class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-[120px] animate-blob">
        </div>
        <div
            class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-accent/10 rounded-full blur-[120px] animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute top-[30%] right-[10%] w-[30%] h-[30%] bg-emerald-400/10 rounded-full blur-[120px] animate-blob animation-delay-4000">
        </div>
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.03]"></div>
    </div>

    <div class="relative min-h-screen flex items-center justify-center px-4 py-16 sm:px-6 lg:px-8">
        <div class="w-full max-w-4xl">

            <!-- Success Header -->
            <div class="text-center mb-12 entry-anim">
                <div class="relative inline-flex mb-8">
                    <!-- Animated Rings -->
                    <div class="absolute inset-0 rounded-full bg-primary animate-pulse-ring"></div>
                    <div class="absolute inset-0 rounded-full bg-emerald-400 animate-pulse-ring"
                        style="animation-delay: 0.7s"></div>

                    <!-- Success Icon -->
                    <div
                        class="relative w-28 h-28 sm:w-36 sm:h-36 rounded-full bg-gradient-to-br from-primary via-teal-500 to-emerald-500 shadow-2xl shadow-primary/40 flex items-center justify-center animate-float overflow-hidden group">
                        <div class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <svg class="w-14 h-14 sm:w-18 sm:h-18 text-white z-10" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6L9 17l-5-5"
                                style="stroke-dasharray: 100; animation: check-draw 0.6s ease-out 0.8s forwards;" />
                        </svg>
                    </div>
                </div>

                <h1
                    class="text-4xl sm:text-5xl lg:text-6xl font-[900] text-slate-900 mb-6 tracking-tight leading-tight">
                    Laporan <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-emerald-600">Berhasil
                        Dikirim!</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-500 max-w-2xl mx-auto leading-relaxed font-medium">
                    Aspirasi Anda adalah energi bagi kami. Laporan telah masuk ke sistem dan segera mendapatkan atensi
                    dari <span class="text-slate-900 font-bold decoration-primary underline-offset-4 decoration-2">Wakil
                        Dekan III FTIK</span>.
                </p>
            </div>

            <!-- Reference Ticket -->
            <div class="glass-card rounded-[3rem] shadow-[0_32px_64px_-16px_rgba(0,0,0,0.1)] border-white/50 p-2 sm:p-4 mb-8 entry-anim"
                style="animation-delay: 0.2s">
                <div class="bg-white rounded-[2.2rem] p-6 sm:p-10 relative overflow-hidden">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
                        <!-- Code Section -->
                        <div class="flex-1 w-full">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-primary text-2xl">confirmation_number</span>
                                </div>
                                <div>
                                    <h2 class="text-xl font-black text-slate-900 leading-tight">Kode Referensi Unik</h2>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Identity
                                        & tracking</p>
                                </div>
                            </div>

                            <?php
                            $ref = '-';
                            if (isset($pengaduan) && is_array($pengaduan)) {
                                $ref = $pengaduan['referensi_pengaduan'];
                            } elseif (isset($referensi_pengaduan)) {
                                $ref = $referensi_pengaduan;
                            }
                            ?>

                            <div
                                class="ticket-cutout bg-slate-50 dark:bg-slate-900/50 rounded-3xl p-8 sm:p-10 border-2 border-dashed border-slate-200 relative group transition-all hover:border-primary/50">
                                <div class="text-center">
                                    <div
                                        class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 mb-4">
                                        <code id="ref-code"
                                            class="text-4xl sm:text-5xl lg:text-6xl font-black text-primary tracking-tighter sm:tracking-normal font-mono">
                                            <?= esc($ref) ?>
                                        </code>
                                        <button onclick="copyToClipboard()"
                                            class="p-4 rounded-2xl bg-primary text-white shadow-xl shadow-primary/30 hover:shadow-primary/50 hover:scale-110 active:scale-95 transition-all group/btn">
                                            <span
                                                class="material-symbols-outlined text-2xl group-hover/btn:rotate-12 transition-transform">content_copy</span>
                                        </button>
                                    </div>
                                    <p class="text-sm font-bold text-slate-400 flex items-center justify-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Gunakan kode ini untuk mengecek progres laporan Anda
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Mini QR/Graphic placeholder -->
                        <div
                            class="hidden lg:flex flex-col items-center justify-center w-48 h-48 rounded-[2.5rem] bg-slate-50 border border-slate-100 p-6">
                            <div class="w-full h-full relative opacity-20">
                                <span class="material-symbols-outlined text-6xl absolute top-0 left-0">shield</span>
                                <span
                                    class="material-symbols-outlined text-6xl absolute top-10 right-0">qr_code_2</span>
                                <span
                                    class="material-symbols-outlined text-4xl absolute bottom-0 left-5">verified_user</span>
                            </div>
                            <p
                                class="text-[10px] font-black text-slate-400 text-center uppercase tracking-widest mt-4 leading-none">
                                Secured by<br>SIGAP Engine</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Cards Grid -->
            <div class="grid lg:grid-cols-2 gap-8 mb-12 entry-anim" style="animation-delay: 0.4s">
                <!-- Summary Card -->
                <?php if (isset($pengaduan) && is_array($pengaduan)): ?>
                    <div class="glass-card rounded-[2.5rem] p-8 border-white/50 space-y-8">
                        <div class="flex items-center gap-4 mb-2">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-emerald-600 text-2xl">receipt_long</span>
                            </div>
                            <h3 class="text-xl font-black text-slate-900">Ringkasan Laporan</h3>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div
                                class="p-5 rounded-3xl bg-slate-50/50 border border-slate-100/50 flex items-center gap-4 hover:bg-white transition-all shadow-sm">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 group-hover:text-primary">
                                    <span class="material-symbols-outlined text-xl">category</span>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kategori</p>
                                    <p class="text-sm font-bold text-slate-900">
                                        <?= esc($pengaduan['kategori_text'] ?? 'Umum') ?>
                                    </p>
                                </div>
                            </div>

                            <div
                                class="p-5 rounded-3xl bg-slate-50/50 border border-slate-100/50 flex items-center gap-4 hover:bg-white transition-all shadow-sm">
                                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400">
                                    <span class="material-symbols-outlined text-xl">calendar_month</span>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kejadian</p>
                                    <p class="text-sm font-bold text-slate-900">
                                        <?= esc(isset($pengaduan['kejadian_tgl']) ? date('d M Y', strtotime($pengaduan['kejadian_tgl'])) : '-') ?>
                                    </p>
                                </div>
                            </div>

                            <?php if (!empty($pengaduan['kejadian_lokasi'])): ?>
                                <div
                                    class="p-5 rounded-3xl bg-slate-50/50 border border-slate-100/50 flex items-center gap-4 hover:bg-white transition-all shadow-sm">
                                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400">
                                        <span class="material-symbols-outlined text-xl">location_on</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Lokasi</p>
                                        <p class="text-sm font-bold text-slate-900 truncate max-w-[150px]">
                                            <?= esc($pengaduan['kejadian_lokasi']) ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Next Steps Card -->
                <div class="glass-card rounded-[2.5rem] p-8 border-white/50 space-y-8">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-12 h-12 rounded-2xl bg-accent/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent text-2xl">conversion_path</span>
                        </div>
                        <h3 class="text-xl font-black text-slate-900">Roadmap Tindak Lanjut</h3>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="mt-1 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-[10px] font-black">
                                01</div>
                            <div>
                                <p class="text-sm font-black text-slate-900">Verifikasi & Validasi</p>
                                <p class="text-xs text-slate-500 font-medium leading-relaxed">Tim admin akan meninjau
                                    kelengkapan laporan Anda dalam 24 jam.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="mt-1 w-6 h-6 rounded-full bg-accent text-white flex items-center justify-center text-[10px] font-black">
                                02</div>
                            <div>
                                <p class="text-sm font-black text-slate-900">Proses Investigasi</p>
                                <p class="text-xs text-slate-500 font-medium leading-relaxed">Wakil Dekan III melakukan
                                    koordinasi dan analisa mendalam atas laporan.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="mt-1 w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] font-black">
                                03</div>
                            <div>
                                <p class="text-sm font-black text-slate-900">Status Penyelesaian</p>
                                <p class="text-xs text-slate-500 font-medium leading-relaxed">Hasil akhir & rekomendasi
                                    diberikan. Status diubah menjadi 'Selesai'.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 entry-anim"
                style="animation-delay: 0.6s">
                <a href="<?= base_url() ?>"
                    class="w-full sm:w-auto px-10 py-5 bg-white border border-slate-200 text-slate-700 rounded-3xl font-black text-sm uppercase tracking-widest shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all flex items-center justify-center gap-3 active:scale-95 group">
                    <span
                        class="material-symbols-outlined text-xl group-hover:rotate-[-10deg] transition-transform">house</span>
                    Beranda
                </a>
                <!-- <a href="<?= base_url('tracking') ?>"
                    class="w-full sm:w-auto px-10 py-5 bg-slate-900 text-white rounded-3xl font-black text-sm uppercase tracking-widest shadow-2xl shadow-slate-900/20 hover:shadow-slate-900/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3 active:scale-95 group">
                    <span
                        class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">insights</span>
                    Lacak Status
                </a> -->
            </div>

            <!-- Brand Footer -->
            <div class="text-center entry-anim" style="animation-delay: 0.8s">
                <div
                    class="flex items-center justify-center gap-4 mb-6 grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                    <img src="<?= base_url('logo/ftik.png') ?>" alt="FTIK" class="h-10">
                </div>
                <p class="text-sm font-bold text-slate-400 leading-relaxed uppercase tracking-[0.2em]">
                    Fakultas Tarbiyah dan Ilmu Keguruan<br>
                    <span class="text-xs">UIN SMDD Bukittinggi</span>
                </p>
            </div>

        </div>
    </div>

    <!-- Copy Toast -->
    <div id="copy-toast"
        class="fixed bottom-10 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-8 py-4 rounded-3xl shadow-2xl opacity-0 transform translate-y-10 transition-all duration-500 flex items-center gap-3 z-50 pointer-events-none">
        <span class="material-symbols-outlined text-emerald-400">check_circle</span>
        <span class="text-sm font-black uppercase tracking-widest">Berhasil Disalin</span>
    </div>

    <script src="<?= base_url('assets/js/referensi.js') ?>"></script>

</body>

</html>
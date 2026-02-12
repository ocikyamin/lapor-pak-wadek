<!-- 
    Developer: Abdul Yamin, S.Pd., M.Kom
    GitHub: https://github.com/ocikyamin
    Project: Lapor Pak Wadek 3 - FTIK UIN Bukittinggi
-->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lapor Pak Wadek 3 - FTIK UIN Bukittinggi</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Layanan pelaporan resmi bagi Sivitas Akademika FTIK UIN Bukittinggi maupun masyarakat umum. Inovasi pimpinan yang menjamin transparansi serta keamanan data pelapor." />
    <meta name="keywords"
        content="Lapor WD3, FTIK UIN Bukittinggi, Pengaduan Mahasiswa, SIGAP UIN Bukittinggi, aspirasi mahasiswa" />
    <meta name="author" content="Abdul Yamin, S.Pd., M.Kom" />
    <meta name="developer" content="https://github.com/ocikyamin" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?= base_url() ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:title" content="Lapor Pak Wadek 3 - FTIK UIN Bukittinggi" />
    <meta property="og:description"
        content="Saluran resmi pengaduan dan aspirasi mahasiswa FTIK UIN Bukittinggi. Aman, Transparan, dan Terverifikasi." />
    <meta property="og:image" content="<?= base_url('logo/og-image.jpg') ?>" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?= base_url() ?>" />
    <meta property="twitter:title" content="Lapor Pak Wadek 3 - FTIK UIN Bukittinggi" />
    <meta property="twitter:description"
        content="Saluran resmi pengaduan dan aspirasi mahasiswa FTIK UIN Bukittinggi. Aman, Transparan, dan Terverifikasi." />
    <meta property="twitter:image" content="<?= base_url('logo/og-image.jpg') ?>" />

    <!-- Favicon & Theme Color -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('favicon/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('manifest.json') ?>">
    <meta name="theme-color" content="#0d968b">
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0d968b",
                        "primary-hover": "#0F766E",
                        "background-light": "#f6f8f8",
                        "background-dark": "#102220",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px" },
                    backgroundImage: {
                        'hero-pattern': "url('https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2070&auto=format&fit=crop')",
                        'grid-pattern': "linear-gradient(to right, #0d968b1a 1px, transparent 1px), linear-gradient(to bottom, #0d968b1a 1px, transparent 1px)",
                    }
                },
            },
        }
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/css/landing.css') ?>">
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-100 font-display antialiased selection:bg-primary selection:text-white">
    <nav
        class="fixed w-full z-50 transition-all duration-300 bg-primary shadow-lg shadow-primary/20 border-b border-primary-hover">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center relative z-50">
                    <div>
                        <div class="flex items-center gap-5">
                            <img src="<?= base_url('logo/ftik.png') ?>" alt="FTIK"
                                class="w-16 h-16 object-contain drop-shadow-lg hover:scale-110 transition-transform duration-300">
                            <div class="h-12 w-[2px] bg-white/30"></div>
                            <img src="<?= base_url('logo/logos.png') ?>" alt="SIGAP"
                                class="h-14 object-contain drop-shadow-lg hover:scale-105 transition-transform duration-300">
                        </div>
                    </div>
                </div>

                <!-- Desktop Menu Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="#">Beranda</a>
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="#about">Tentang</a>
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="#how-it-works">Alur Laporan</a>
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="#kontak">Kontak</a>
                </div>

                <!-- Action Button & Mobile Toggle -->
                <div class="flex items-center gap-4">
                    <div class="hidden md:flex">
                        <a class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-primary transition-all duration-200 bg-white border border-transparent rounded-full hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white shadow-xl"
                            href="<?= base_url('buat-laporan') ?>">
                            <span class="material-icons-round text-sm mr-2">campaign</span>
                            Lapor Sekarang
                        </a>
                    </div>
                    <div class="flex md:hidden relative z-50">
                        <button aria-label="Toggle menu"
                            class="text-white hover:bg-white/10 rounded-lg transition-colors focus:outline-none p-2"
                            id="mobile-menu-btn" type="button">
                            <span class="material-icons-round text-3xl">menu</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="fixed inset-0 z-[60] bg-primary dark:bg-slate-900 backdrop-blur-xl md:hidden overflow-y-auto"
                id="mobile-menu">
                <div class="min-h-screen flex flex-col p-6 sm:p-8">
                    <!-- Mobile Menu Header -->
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex items-center gap-4">
                            <img src="<?= base_url('logo/ftik.png') ?>" alt="FTIK"
                                class="w-12 h-12 object-contain drop-shadow-sm">
                            <div class="h-10 w-[1px] bg-white/30"></div>
                            <img src="<?= base_url('logo/logos.png') ?>" alt="SIGAP"
                                class="h-10 object-contain drop-shadow-sm">
                        </div>
                        <button id="close-mobile-menu"
                            class="p-2 rounded-full bg-white/10 text-white hover:bg-white/20 transition-colors">
                            <span class="material-icons-round text-2xl">close</span>
                        </button>
                    </div>

                    <!-- Nav Links -->
                    <nav class="flex flex-col space-y-3">
                        <a href="#"
                            class="menu-item group flex items-center justify-between p-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/10 transition-all"
                            onclick="document.getElementById('mobile-menu').classList.remove('open')">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white/10 shadow-sm flex items-center justify-center text-emerald-100 group-hover:text-white transition-colors">
                                    <span class="material-icons-round">home</span>
                                </div>
                                <span class="font-bold text-white">Beranda</span>
                            </div>
                            <span
                                class="material-icons-round text-white/50 group-hover:translate-x-1 transition-transform">chevron_right</span>
                        </a>

                        <a href="#about"
                            class="menu-item group flex items-center justify-between p-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/10 transition-all"
                            onclick="document.getElementById('mobile-menu').classList.remove('open')">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white/10 shadow-sm flex items-center justify-center text-emerald-100 group-hover:text-white transition-colors">
                                    <span class="material-icons-round">info_outline</span>
                                </div>
                                <span class="font-bold text-white">Tentang</span>
                            </div>
                            <span
                                class="material-icons-round text-white/50 group-hover:translate-x-1 transition-transform">chevron_right</span>
                        </a>

                        <a href="#how-it-works"
                            class="menu-item group flex items-center justify-between p-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/10 transition-all"
                            onclick="document.getElementById('mobile-menu').classList.remove('open')">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white/10 shadow-sm flex items-center justify-center text-emerald-100 group-hover:text-white transition-colors">
                                    <span class="material-icons-round">account_tree</span>
                                </div>
                                <span class="font-bold text-white">Alur Laporan</span>
                            </div>
                            <span
                                class="material-icons-round text-white/50 group-hover:translate-x-1 transition-transform">chevron_right</span>
                        </a>

                        <a href="#kontak"
                            class="menu-item group flex items-center justify-between p-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/10 transition-all"
                            onclick="document.getElementById('mobile-menu').classList.remove('open')">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white/10 shadow-sm flex items-center justify-center text-emerald-100 group-hover:text-white transition-colors">
                                    <span class="material-icons-round">alternate_email</span>
                                </div>
                                <span class="font-bold text-white">Kontak</span>
                            </div>
                            <span
                                class="material-icons-round text-white/50 group-hover:translate-x-1 transition-transform">chevron_right</span>
                        </a>
                    </nav>

                    <!-- CTA -->
                    <div class="menu-item mt-10 flex flex-col gap-3">
                        <a class="w-full flex items-center justify-center px-6 py-4 text-base font-bold text-primary transition-all duration-300 bg-white border border-transparent rounded-2xl hover:bg-emerald-50 shadow-xl shadow-black/10"
                            href="<?= base_url('buat-laporan') ?>"
                            onclick="document.getElementById('mobile-menu').classList.remove('open')">
                            <span class="material-icons-round mr-2">campaign</span>
                            Lapor Sekarang
                        </a>
                        <!-- PWA Install Button (Hidden by default, shown via JS if PWA is installable) -->
                        <button
                            class="pwa-install-btn hidden w-full flex items-center justify-center px-6 py-4 text-base font-bold text-white transition-all duration-300 bg-white/10 border border-white/20 rounded-2xl hover:bg-white/20 shadow-xl shadow-black/5 backdrop-blur-sm group"
                            onclick="document.getElementById('mobile-menu').classList.remove('open')">
                            <span
                                class="material-icons-round mr-2 text-green-400 group-hover:rotate-12 transition-transform">install_mobile</span>
                            <span class="install-text">Install Aplikasi</span>
                        </button>
                    </div>

                    <!-- Footer info in menu -->
                    <div class="menu-item mt-auto pt-10 text-center">
                        <div class="flex justify-center gap-4 mb-6">
                            <a href="#"
                                class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-emerald-100 hover:text-white hover:bg-white/20 transition-all">
                                <span class="material-icons-round text-xl">language</span>
                            </a>
                            <a href="#"
                                class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-emerald-100 hover:text-white hover:bg-white/20 transition-all">
                                <span class="material-icons-round text-xl">mail</span>
                            </a>
                        </div>
                        <p class="text-xs text-emerald-200/60">© <?= date('Y') ?> Lapor Pak WD3 FTIK UIN Bukittinggi</p>
                    </div>
                </div>
            </div>
    </nav>
    <script src="<?= base_url('assets/js/landing.js') ?>"></script>
    <script>
        // Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('<?= base_url('sw.js') ?>')
                    .then(reg => console.log('Service Worker registered', reg))
                    .catch(err => console.log('Service Worker registration failed', err));
            });
        }
    </script>

    <section id="about" class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/5 to-transparent"></div>
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/20 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute inset-0 opacity-[0.03] dark:opacity-[0.05]"
                style="background-size: 40px 40px; background-image: linear-gradient(to right, #0d968b 1px, transparent 1px), linear-gradient(to bottom, #0d968b 1px, transparent 1px);">
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-left space-y-8">
                    <div
                        class="inline-flex items-center space-x-2 bg-primary/10 dark:bg-primary/5 border border-primary/20 rounded-full px-4 py-1.5 shadow-sm">
                        <span class="material-icons-round text-sm text-primary animate-pulse">new_releases</span>
                        <span class="text-xs font-semibold text-primary tracking-wide uppercase">Inisiatif Wakil Dekan
                            III FTIK</span>
                    </div>
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.15]">
                        Wujudkan Lingkungan Kampus <br />
                        <span class="text-gradient">Berintegritas & Profesional</span>
                    </h1>
                    <p class="text-lg md:text-xl text-slate-600 dark:text-slate-300 max-w-2xl leading-relaxed">
                        Layanan pelaporan resmi bagi Sivitas Akademika FTIK UIN Bukittinggi maupun masyarakat umum.
                        Inovasi pimpinan yang menjamin transparansi serta keamanan data pelapor.
                    </p>
                    <div class="flex flex-col flex-wrap sm:flex-row gap-4 pt-4">
                        <a class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white transition-all duration-200 bg-primary border border-transparent rounded-xl hover:bg-primary-hover shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-1"
                            href="<?= base_url('buat-laporan') ?>">
                            Buat Laporan
                            <span class="material-icons-round ml-2">arrow_forward</span>
                        </a>
                        <!-- PWA Install Button (Hero) - Replaces 'Pelajari Alur' -->
                        <button
                            class="pwa-install-btn hidden inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white transition-all duration-200 bg-slate-900 dark:bg-slate-800/80 border border-slate-700/50 rounded-xl hover:bg-black dark:hover:bg-slate-700 shadow-lg hover:shadow-xl hover:-translate-y-1 group">
                            <span
                                class="material-icons-round mr-2 text-green-400 group-hover:rotate-12 transition-transform">install_mobile</span>
                            <span class="install-text">Install Aplikasi</span>
                        </button>
                    </div>

                </div>
                <div class="relative lg:h-[600px] w-full hidden lg:flex items-center justify-center">
                    <!-- Background Decorative Blob -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] -z-10">
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary/20 rounded-full blur-[100px] animate-pulse">
                        </div>
                        <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-teal-400/20 rounded-full blur-3xl animate-bounce"
                            style="animation-duration: 4s;"></div>
                    </div>

                    <div class="relative w-full max-w-lg aspect-square flex items-center justify-center">
                        <!-- Main Image (Transparent) -->
                        <div
                            class="relative z-10 w-full h-full transform hover:scale-105 transition-transform duration-700 ease-out">
                            <img alt="SIGAP Illustration"
                                class="w-full h-full object-contain drop-shadow-[0_20px_50px_rgba(13,150,139,0.3)]"
                                src="<?= base_url('logo/lapor.png') ?>" />
                        </div>

                        <!-- Floating Badge 1: Quick Stats -->
                        <div
                            class="absolute -top-4 -right-4 z-20 glass-card p-4 rounded-2xl shadow-xl animate-[fadeInRight_1s_ease-out] border border-white/40 dark:border-primary/20">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-500/10 flex items-center justify-center">
                                    <span class="material-icons-round text-green-600">verified</span>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-bold text-slate-400 uppercase leading-none mb-1">Status</span>
                                    <span
                                        class="font-bold text-sm text-slate-700 dark:text-white leading-none">Terverifikasi</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Badge 2: Response Time -->
                        <div
                            class="absolute bottom-1/4 -left-10 z-20 glass-card p-4 rounded-2xl shadow-xl animate-[fadeInLeft_1s_ease-out] border border-white/40 dark:border-primary/20">
                            <div class="flex items-center gap-3 text-left">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="material-icons-round text-primary">speed</span>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase leading-none mb-1">Respon
                                        Cepat</p>
                                    <p class="font-bold text-sm text-slate-700 dark:text-white leading-none">
                                        < 24 Jam</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Commitment Card -->
                        <div
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 z-20 w-[90%] glass-card p-5 rounded-2xl shadow-2xl border border-white/50 dark:border-primary/20 group hover:-translate-y-2 transition-transform duration-300">
                            <div class="flex items-start gap-4 text-left">
                                <div
                                    class="p-3 bg-primary rounded-xl text-white shadow-lg shadow-primary/30 group-hover:rotate-12 transition-transform">
                                    <span class="material-icons-round text-2xl">lock</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900 dark:text-white text-base">Privasi Anda Terjamin
                                    </h3>
                                    <p class="text-xs text-slate-600 dark:text-slate-300 mt-1 leading-relaxed">
                                        Identitas pelapor dilindungi sepenuhnya oleh sistem enkripsi tingkat tinggi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Grid Pattern Dot -->
                    <div class="absolute -z-20 -bottom-10 -right-10 w-32 h-32 opacity-20 dark:opacity-40">
                        <svg fill="currentColor" class="text-primary" viewBox="0 0 100 100">
                            <pattern height="10" id="dots-pattern" patternUnits="userSpaceOnUse" width="10" x="0" y="0">
                                <circle cx="2" cy="2" r="1"></circle>
                            </pattern>
                            <rect fill="url(#dots-pattern)" height="100" width="100"></rect>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 relative bg-white dark:bg-slate-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-primary font-semibold tracking-wide uppercase text-sm">Mengapa Melapor Di Sini?</span>
                <h2 class="mt-2 text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">Komitmen Layanan Kami
                </h2>
                <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">Kami menjamin setiap suara yang masuk akan
                    diperlakukan dengan standar profesionalisme tinggi.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="glass-card rounded-2xl p-8 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2 group">
                    <div
                        class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300 text-primary">
                        <span class="material-icons-round text-3xl">verified_user</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Keamanan Identitas</h3>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Kami menjamin data pelapor dilindungi
                        sepenuhnya dengan protokol keamanan internal. Inovasi untuk menciptakan iklim kampus yang aman
                        tanpa rasa takut.</p>
                </div>
                <div
                    class="glass-card rounded-2xl p-8 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2 group relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110">
                    </div>
                    <div
                        class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300 text-primary relative z-10">
                        <span class="material-icons-round text-3xl">rocket_launch</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 relative z-10">Respon Akselerasi
                    </h3>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed relative z-10">Setiap laporan yang
                        masuk melalui Portal ini akan langsung dipantau oleh pimpinan FTIK. Kepastian tindak lanjut
                        yang terukur dan solutif.</p>
                </div>
                <div
                    class="glass-card rounded-2xl p-8 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-2 group">
                    <div
                        class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300 text-primary">
                        <span class="material-icons-round text-3xl">balance</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Integritas Platform</h3>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Sistem pelaporan yang objektif, bebas
                        dari intervensi, dan menjunjung tinggi nilai profesionalisme demi kemajuan institusi kita
                        bersama.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 relative bg-background-light dark:bg-background-dark" id="how-it-works">
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">Alur Penyelesaian Laporan</h2>
                <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">Empat langkah mudah dari pelaporan hingga
                    penyelesaian kasus.</p>
            </div>
            <div class="relative">
                <!-- Desktop Connector Line -->
                <div
                    class="hidden md:block absolute top-[32px] left-[12.5%] w-[75%] h-0.5 border-t-2 border-dashed border-slate-300 dark:border-slate-700 z-0">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-8 relative z-10">
                    <!-- Step 1 -->
                    <div class="group relative text-center">
                        <div class="relative mb-6">
                            <div
                                class="w-16 h-16 mx-auto bg-white dark:bg-slate-800 rounded-full border-4 border-primary flex items-center justify-center shadow-xl shadow-primary/20 relative z-20 group-hover:scale-110 group-hover:bg-primary group-hover:text-white transition-all duration-500">
                                <span
                                    class="material-icons-round text-primary group-hover:text-white text-3xl transition-colors">edit_note</span>
                            </div>
                            <!-- Mobile Connector Line -->
                            <div
                                class="md:hidden absolute top-16 left-1/2 -translate-x-1/2 w-0.5 h-12 border-l-2 border-dashed border-primary/30 z-0">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">1. Kirim Laporan</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 max-w-[200px] mx-auto">Isi formulir
                            pengaduan dengan detail kejadian dan bukti pendukung.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="group relative text-center">
                        <div class="relative mb-6">
                            <div
                                class="w-16 h-16 mx-auto bg-white dark:bg-slate-800 rounded-full border-4 border-slate-200 dark:border-slate-700 group-hover:border-primary flex items-center justify-center shadow-lg relative z-20 group-hover:scale-110 group-hover:bg-primary transition-all duration-500">
                                <span
                                    class="material-icons-round text-slate-400 group-hover:text-white text-3xl transition-colors">fact_check</span>
                            </div>
                            <!-- Mobile Connector Line -->
                            <div
                                class="md:hidden absolute top-16 left-1/2 -translate-x-1/2 w-0.5 h-12 border-l-2 border-dashed border-primary/30 z-0">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">2. Verifikasi</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 max-w-[200px] mx-auto">Tim WD3 memvalidasi
                            kelengkapan data dan urgensi laporan.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="group relative text-center">
                        <div class="relative mb-6">
                            <div
                                class="w-16 h-16 mx-auto bg-white dark:bg-slate-800 rounded-full border-4 border-slate-200 dark:border-slate-700 group-hover:border-primary flex items-center justify-center shadow-lg relative z-20 group-hover:scale-110 group-hover:bg-primary transition-all duration-500">
                                <span
                                    class="material-icons-round text-slate-400 group-hover:text-white text-3xl transition-colors">search</span>
                            </div>
                            <!-- Mobile Connector Line -->
                            <div
                                class="md:hidden absolute top-16 left-1/2 -translate-x-1/2 w-0.5 h-12 border-l-2 border-dashed border-primary/30 z-0">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">3. Investigasi</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 max-w-[200px] mx-auto">Penelusuran fakta
                            mendalam dilakukan dengan memanggil pihak terkait.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="group relative text-center">
                        <div class="relative mb-6">
                            <div
                                class="w-16 h-16 mx-auto bg-white dark:bg-slate-800 rounded-full border-4 border-slate-200 dark:border-slate-700 group-hover:border-primary flex items-center justify-center shadow-lg relative z-20 group-hover:scale-110 group-hover:bg-primary transition-all duration-500">
                                <span
                                    class="material-icons-round text-slate-400 group-hover:text-white text-3xl transition-colors">gavel</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">4. Penyelesaian</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 max-w-[200px] mx-auto">Pemberian sanksi
                            atau mediasi sesuai temuan, dan penutupan kasus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 relative overflow-hidden" id="report">
        <div class="absolute inset-0 bg-primary">
            <div class="absolute inset-0 opacity-10"
                style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary to-background-dark/30"></div>
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap Melaporkan Masalah?</h2>
            <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">Jangan ragu untuk berbicara. Kontribusi Anda sangat
                berharga untuk menciptakan lingkungan akademik yang sehat dan berintegritas di FTIK.</p>
            <div class="glass-card p-1 rounded-2xl inline-block">
                <a href="<?= base_url('buat-laporan') ?>"
                    class="bg-white text-primary hover:bg-slate-50 font-bold py-4 px-10 rounded-xl text-lg shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-3">
                    <span class="material-icons-round">add_circle_outline</span>
                    Buat Laporan Baru
                </a>
            </div>
        </div>
        <p class="mt-6 text-sm text-white/70">
            Butuh bantuan teknis? <a class="underline hover:text-white font-medium" href="#">Hubungi Admin</a>
        </p>
        </div>
    </section>
    <footer class="bg-slate-900 text-slate-300 py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-primary flex items-center justify-center text-white">
                            <span class="material-icons-round text-lg">school</span>
                        </div>
                        <span class="font-bold text-white text-lg">WD3 FTIK UIN Bukittinggi</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Layanan resmi pengaduan dan aspirasi untuk mewujudkan lingkungan kampus yang bersih,
                        berintegritas, dan profesional.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="#">Beranda</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Tata Cara Pelaporan</a></li>

                        <li><a class="hover:text-primary transition-colors" href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div id="kontak">
                    <h4 class="text-white font-semibold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-3">
                            <span class="material-icons-round text-primary text-base mt-0.5">location_on</span>
                            <span>Gedung FTIK, Kampus II UIN Bukittinggi.<br />
                                Jl. Gurun Aur, Kubang Putih,
                                Bukittinggi, Sumatera Barat
                                26181</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-icons-round text-primary text-base">email</span>
                            <span>supriadi@uinbukittinggi.ac.id</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-icons-round text-primary text-base">call</span>
                            <span>+62 752 625 949</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Lokasi Kampus</h4>
                    <div class="w-full h-32 bg-slate-800 rounded-lg overflow-hidden relative">
                        <img alt="Map location of UIN Bukittinggi campus"
                            class="w-full h-full object-cover opacity-70 hover:opacity-100 transition-opacity"
                            data-alt="Map location of UIN Bukittinggi campus" data-location="UIN Bukittinggi"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBII6wan6hcrV8Cemqaw6DtLMdodsfPcYx8j3uWAQunYjCC5k1nld5wthlBIT8rBvBjvKMsmRXiWkX7Ze_52GZ7MWzhLOw93SViDkwuN4cCUeDl17uFTiGH1unXjQm24lLKf8RfKMzKKVp_FeaV1NNP_RrBJMTsVF5Iz4xDOUmSIp35uAg-WvBXFMLL8RR8onMavsqbGsUNGs2N3fUFyjlfGUkfqA7oRJA_HKXi3VJYJ6Ov1Qo2YwlHtbEP0IBqZCyhCB5VkflslyY" />
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <span class="material-icons-round text-primary text-3xl drop-shadow-lg">place</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500">© <?= date('Y') ?> Lapor WD3 FTIK UIN Sjech M. Djamil Djambek
                    Bukittinggi. All
                    rights
                    reserved.</p>
            </div>
        </div>
    </footer>

    <button id="scrollToTop"
        class="fixed bottom-6 right-6 z-50 p-3 rounded-full bg-primary text-white shadow-lg shadow-primary/30 transform transition-all duration-300 translate-y-20 opacity-0 hover:bg-primary-hover hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-slate-900"
        aria-label="Scroll to top">
        <span class="material-icons-round text-2xl">arrow_upward</span>
    </button>

</body>

</html>
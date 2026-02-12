<!-- 
    Developer: Abdul Yamin, S.Pd., M.Kom
    GitHub: https://github.com/ocikyamin
    Project: Lapor Pak Wadek 3 - FTIK UIN Bukittinggi
-->
<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard Admin - Lapor Pak Wadek III</title>
    <meta name="author" content="Abdul Yamin, S.Pd., M.Kom" />
    <meta name="developer" content="https://github.com/ocikyamin" />
    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0d968b",
                        "primary-light": "#10b8ab",
                        "primary-dark": "#0a756c",
                        "accent": "#06d6a0",
                        "background-light": "#f0f4f8",
                        "background-dark": "#0a1929",
                    },
                    fontFamily: {
                        "display": ["Poppins", "sans-serif"]
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'gradient-primary': 'linear-gradient(135deg, #0d968b 0%, #10b8ab 100%)',
                        'gradient-accent': 'linear-gradient(135deg, #06d6a0 0%, #0d968b 100%)',
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(13, 150, 139, 0.3)',
                        'glow-lg': '0 0 30px rgba(13, 150, 139, 0.4)',
                    },
                    animation: {
                        'slide-in': 'slideIn 0.3s ease-out',
                        'fade-in': 'fadeIn 0.4s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    }
                },
            },
        }
    </script>
    <script id="theme-checker">
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>

<body
    class="bg-gradient-to-br from-background-light to-slate-100 dark:from-background-dark dark:to-slate-900 text-slate-800 dark:text-slate-100 font-display antialiased min-h-screen">

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenuOverlay"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 hidden mobile-menu-overlay opacity-0 lg:hidden">
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 h-screen w-72 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50 flex flex-col bg-white dark:bg-slate-50 shadow-2xl shadow-slate-900/10">
        <!-- Content -->
        <div class="flex flex-col h-full">
            <!-- Brand Header -->
            <div class="h-20 flex items-center justify-between px-6 border-b border-slate-200">
                <div class="flex items-center gap-4">
                    <!-- Logo -->
                    <div class="flex items-center gap-3 relative z-50">
                        <img src="<?= base_url('logo/ftik.png') ?>" alt="FTIK"
                            class="w-12 h-12 object-contain drop-shadow-lg hover:scale-110 transition-transform duration-300">
                        <div>
                            <h1 class="font-bold text-sm text-slate-900 tracking-tight leading-tight uppercase">Control
                                Panel
                            </h1>
                            <p class="text-[10px] text-slate-600 font-bold tracking-widest mt-0.5">
                                Administrator
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Mobile Close Button -->
                <button id="closeMobileMenu" class="lg:hidden text-slate-600 hover:text-slate-900 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 overflow-y-auto py-4 space-y-1">
                <!-- Group: Overview -->
                <p class="nav-group-header">Main Menu</p>

                <!-- Dashboard -->
                <a href="<?= base_url('admin/dashboard') ?>"
                    class="nav-item <?= current_url() == base_url('admin/dashboard') ? 'active' : '' ?>">
                    <span class="material-icons">dashboard</span>
                    <span>Dashboard</span>
                </a>

                <!-- Laporan Masuk -->
                <a href="<?= base_url('admin/laporan-masuk') ?>"
                    class="nav-item <?= current_url() == base_url('admin/laporan-masuk') ? 'active' : '' ?>">
                    <span class="material-icons">mark_email_unread</span>
                    <span class="flex-1">Laporan Masuk</span>
                    <span id="sidebar-badge"
                        class="badge-counter text-white font-bold px-2 rounded-full"><?= model(App\Models\PengaduanModel::class)->where('status_read', 0)->countAllResults() ?></span>
                </a>

                <!-- Arsip Laporan -->
                <a href="<?= base_url('admin/arsip') ?>"
                    class="nav-item <?= current_url() == base_url('admin/arsip') ? 'active' : '' ?>">
                    <span class="material-icons">archive</span>
                    <span>Arsip Laporan</span>
                </a>

                <!-- Log Aktivitas -->
                <a href="<?= base_url('admin/aktivitas') ?>"
                    class="nav-item <?= current_url() == base_url('admin/aktivitas') ? 'active' : '' ?>">
                    <span class="material-icons">history</span>
                    <span>Log Aktivitas</span>
                </a>

                <!-- Group: Master Data -->
                <p class="nav-group-header">Data Master</p>

                <!-- Kategori -->
                <a href="<?= base_url('admin/kategori') ?>"
                    class="nav-item <?= current_url() == base_url('admin/kategori') ? 'active' : '' ?>">
                    <span class="material-icons">category</span>
                    <span>Kategori</span>
                </a>

                <!-- Program Studi -->
                <a href="<?= base_url('admin/prodi') ?>"
                    class="nav-item <?= current_url() == base_url('admin/prodi') ? 'active' : '' ?>">
                    <span class="material-icons">school</span>
                    <span>Program Studi</span>
                </a>

                <!-- User -->
                <a href="<?= base_url('admin/users') ?>"
                    class="nav-item <?= current_url() == base_url('admin/users') ? 'active' : '' ?>">
                    <span class="material-icons">people</span>
                    <span>User</span>
                </a>
            </nav>

            <!-- Admin Profile Footer with Logout -->
            <div class="p-4 bg-slate-50/50">
                <div class="profile-card rounded-2xl p-3 flex items-center gap-3 mb-3">
                    <div class="relative">
                        <img alt="Admin Avatar"
                            class="w-10 h-10 rounded-xl border-2 border-white shadow-sm object-cover"
                            src="https://ui-avatars.com/api/?name=<?= urlencode(session()->get('username')) ?>&background=0d9488&color=fff&bold=true" />
                        <div
                            class="absolute -bottom-1 -right-1 w-3.5 h-3.5 bg-green-500 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[13px] font-extrabold text-slate-900 truncate"><?= session()->get('username') ?>
                        </p>
                        <p class="text-[11px] font-semibold text-slate-600 truncate"><?= session()->get('email') ?></p>
                    </div>
                </div>
                <!-- Logout Button -->
                <a href="<?= base_url('logout') ?>"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-red-100 text-red-600 hover:bg-red-50 hover:border-red-200 transition-all duration-300 group shadow-sm">
                    <span class="material-icons text-xl group-hover:rotate-12 transition-transform">logout</span>
                    <span class="text-xs font-bold uppercase tracking-wider">Keluar Sesi</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="lg:ml-72 flex-1 flex flex-col min-h-screen">
        <!-- Top Navigation Bar -->
        <header
            class="sticky top-0 z-30 h-16 lg:h-18 bg-white/80 dark:bg-slate-800/80 backdrop-blur-lg border-b border-slate-200/50 dark:border-slate-700/50 shadow-sm">
            <div class="h-full px-4 lg:px-8 flex items-center justify-between gap-4">
                <!-- Left Section: Mobile Menu + Title -->
                <div class="flex items-center gap-4">
                    <!-- Mobile Menu Button -->
                    <button id="openMobileMenu"
                        class="lg:hidden text-slate-600 dark:text-slate-300 hover:text-primary transition-colors p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                        <span class="material-icons text-2xl">menu</span>
                    </button>

                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-slate-800 dark:text-white leading-tight">
                            Pusat Resolusi
                        </h2>
                        <p
                            class="text-[11px] font-medium text-teal-600 dark:text-teal-400 uppercase tracking-wider hidden lg:block">
                            Sistem Manajemen Aspirasi & Pengaduan Terpadu
                        </p>
                    </div>
                </div>

                <!-- Right Section: Actions -->
                <div class="flex items-center gap-2 lg:gap-4">
                    <!-- Quick Stats Header (Hidden on mobile) -->
                    <div class="hidden xl:flex items-center gap-6 mr-2">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-blue-100/50 dark:bg-blue-900/20 text-blue-600 flex items-center justify-center shadow-sm">
                                <span class="material-icons text-xl">analytics</span>
                            </div>
                            <div>
                                <p
                                    class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest leading-none mb-1">
                                    Total Laporan</p>
                                <p id="header-total-count"
                                    class="text-sm font-extrabold text-slate-800 dark:text-white leading-none">
                                    <?= model(App\Models\PengaduanModel::class)->countAllResults() ?>
                                </p>
                            </div>
                        </div>
                        <div class="w-px h-8 bg-slate-200 dark:bg-slate-700/50"></div>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-emerald-100/50 dark:bg-emerald-900/20 text-emerald-600 flex items-center justify-center shadow-sm">
                                <span class="material-icons text-xl">task_alt</span>
                            </div>
                            <div>
                                <p
                                    class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest leading-none mb-1">
                                    Tuntas</p>
                                <p id="header-selesai-count"
                                    class="text-sm font-extrabold text-slate-800 dark:text-white leading-none">
                                    <?= model(App\Models\PengaduanModel::class)->where('status_tindakan', 'Selesai')->countAllResults() ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <button
                        class="relative p-2 lg:p-2.5 text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                        <span class="material-icons text-2xl">notifications</span>
                        <span class="absolute top-1 right-1 flex h-5 w-5">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span id="notif-badge"
                                class="relative inline-flex rounded-full h-5 w-5 bg-red-500 text-white text-xs items-center justify-center font-bold"><?= model(App\Models\PengaduanModel::class)->where('status_read', 0)->countAllResults() ?></span>
                        </span>
                    </button>

                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle"
                        class="hidden lg:block p-2.5 text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                        <span class="material-icons text-2xl dark:hidden">dark_mode</span>
                        <span class="material-icons text-2xl hidden dark:block">light_mode</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="flex-1 overflow-y-auto p-4 lg:p-8">
            <!-- Dynamic Content Area -->
            <div class="animate-fade-in">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </main>

    <script>
        window.ADMIN_DASHBOARD_URL = '<?= base_url("admin/dashboard") ?>';
        window.NOTIF_COUNT_URL = '<?= base_url('admin/get-notification-count') ?>';
    </script>
    <script src="<?= base_url('assets/js/admin.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>
<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Login - Lapor Pak Wakil Dekan III</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/dist/notiflix-3.2.7.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/dist/notiflix-aio-3.2.7.min.js"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0d968b",
                        "primary-dark": "#0a7a70",
                        "background-light": "#f6f8f8",
                        "background-dark": "#102220",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-primary/5 blur-3xl"></div>
        <div class="absolute top-[60%] -right-[10%] w-[40%] h-[60%] rounded-full bg-primary/10 blur-3xl"></div>
    </div>
    <!-- Main Login Card -->
    <main
        class="w-full max-w-[400px] bg-white dark:bg-[#1a2e2c] rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 dark:border-primary/20 relative z-10 p-8">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 mb-4 text-primary">
                <img src="<?php echo base_url('logo/ftik.png'); ?>" alt="Logo" class="w-60 mx-auto">
                <!-- <span class="material-icons-round text-3xl">admin_panel_settings</span> -->
            </div>
            <h1 class="font-display text-xl font-bold text-slate-800 dark:text-white mb-1">
                Control Panel
            </h1>
            <p class="font-display text-sm text-slate-500 dark:text-slate-400">
                Administrator System
            </p>
        </div>
        <!-- Conditional Error Alert -->
        <!-- Toggle 'hidden' class to show/hide this alert -->
        <div
            class="hidden flex items-start gap-3 p-3 mb-6 rounded bg-red-50 border border-red-100 text-red-700 text-sm">
            <span class="material-icons-round text-base mt-0.5">error_outline</span>
            <span>Username atau password salah!</span>
        </div>
        <!-- Login Form -->
        <form id="login-form" class="space-y-5" method="POST">
            <!-- Username Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-medium text-slate-600 dark:text-slate-300 ml-1" for="email">Email
                    Address</label>
                <div class="relative group">
                    <div
                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                        <span class="material-icons-round text-xl">mail</span>
                    </div>
                    <input
                        class="block w-full pl-10 pr-3 py-2.5 border-slate-200 dark:border-slate-700 rounded-lg text-sm text-slate-800 dark:text-white dark:bg-black/20 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400"
                        id="email" name="email" placeholder="Masukkan email anda" type="email" />
                </div>
            </div>
            <!-- Password Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-medium text-slate-600 dark:text-slate-300 ml-1"
                    for="password">Password</label>
                <div class="relative group">
                    <div
                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                        <span class="material-icons-round text-xl">lock</span>
                    </div>
                    <input
                        class="block w-full pl-10 pr-10 py-2.5 border-slate-200 dark:border-slate-700 rounded-lg text-sm text-slate-800 dark:text-white dark:bg-black/20 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400"
                        id="password" name="password" placeholder="Masukkan password" type="password" />
                    <button
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors focus:outline-none"
                        type="button">
                        <span class="material-icons-round text-xl">visibility</span>
                    </button>
                </div>
            </div>
            <!-- Forgot Password Link (Optional but standard) -->
            <div class="flex justify-end">
                <a class="text-xs font-medium text-primary hover:text-primary-dark transition-colors" href="#">
                    Lupa password?
                </a>
            </div>
            <!-- Submit Button -->
            <button
                class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-2.5 px-4 rounded-lg shadow-md shadow-primary/20 hover:shadow-lg hover:shadow-primary/30 transition-all duration-200 transform hover:-translate-y-0.5 focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                type="submit">
                Masuk
            </button>
        </form>
        <!-- Footer Info -->
        <div class="mt-8 text-center">
            <p class="text-[10px] text-slate-400 dark:text-slate-500 tracking-wider font-semibold">
                ©
                <?= date('Y') ?> Lapor WD3 FTIK UIN Sjech M. Djamil Djambek
                Bukittinggi. All
                rights
                reserved.
            </p>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            // Init Notiflix
            Notiflix.Notify.init({
                position: 'right-top',
                timeout: 3000,
                cssAnimationStyle: 'zoom',
            });

            // Toggle Password Visibility
            $('#password').next('button').on('click', function () {
                const input = $('#password');
                const icon = $(this).find('span');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.text('visibility_off');
                } else {
                    input.attr('type', 'password');
                    icon.text('visibility');
                }
            });

            $('#login-form').on('submit', function (e) {
                e.preventDefault();

                const email = $('#email').val().trim();
                const password = $('#password').val().trim();

                // Client-side validation
                if (!email || !password) {
                    Notiflix.Notify.warning('Mohon isi email dan password');
                    return;
                }

                // Loading
                Notiflix.Loading.standard('Sedang memverifikasi...');
                const btn = $(this).find('button[type="submit"]');
                btn.prop('disabled', true).addClass('opacity-75 cursor-not-allowed');

                $.ajax({
                    url: '<?= base_url('login') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function (response) {
                        Notiflix.Loading.remove();
                        btn.prop('disabled', false).removeClass('opacity-75 cursor-not-allowed');

                        if (response.success) {
                            Notiflix.Notify.success(response.message || 'Login Berhasil');
                            setTimeout(function () {
                                window.location.href = response.redirect || '<?= base_url('admin/dashboard') ?>';
                            }, 1000);
                        } else {
                            Notiflix.Notify.failure(response.message || 'Login Gagal');
                            // Optional: Show alert box if preferred
                            // $('.bg-red-50').removeClass('hidden').find('span:last').text(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        Notiflix.Loading.remove();
                        btn.prop('disabled', false).removeClass('opacity-75 cursor-not-allowed');
                        Notiflix.Notify.failure('Terjadi kesalahan koneksi (' + status + ')');
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>

</html>
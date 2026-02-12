<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lapor Pak WD III - Refined Complaint Form</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0D9488",
                        "primary-hover": "#0F766E",
                        "primary-light": "#CCFBF1",
                        "surface-bg": "#F8FAFC",
                        "card-bg": "#FFFFFF",
                        "border-light": "#E2E8F0",
                        "text-main": "#1E293B",
                        "text-muted": "#64748B",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    boxShadow: {
                        "glass": "0 4px 30px rgba(0, 0, 0, 0.1)",
                        "soft": "0 10px 40px -10px rgba(0,0,0,0.05)",
                    }
                },
            },
        }
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/css/form-pengaduan.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/notiflix/notiflix-3.2.7.min.css') ?>">
    <script src="<?= base_url('assets/notiflix/notiflix-aio-3.2.7.min.js') ?>"></script>
</head>

<body class="font-display bg-slate-50 text-text-main min-h-screen flex flex-col relative overflow-x-hidden">
    <!-- Sophisticated Background Elements -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-primary/10 blur-[120px]"></div>
        <div class="absolute top-[20%] -right-[5%] w-[30%] h-[30%] rounded-full bg-emerald-400/10 blur-[100px]"></div>
        <div class="absolute -bottom-[10%] left-[20%] w-[50%] h-[50%] rounded-full bg-teal-500/5 blur-[150px]"></div>
    </div>

    <!-- Navigation -->
    <nav
        class="fixed w-full z-50 transition-all duration-300 bg-primary shadow-lg shadow-primary/20 border-b border-primary-hover">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center relative z-50">
                    <a href="<?= base_url() ?>">
                        <div class="flex items-center gap-5">
                            <img src="<?= base_url('logo/ftik.png') ?>" alt="FTIK"
                                class="w-16 h-16 object-contain drop-shadow-lg hover:scale-110 transition-transform duration-300">
                            <div class="h-12 w-[2px] bg-white/30"></div>
                            <img src="<?= base_url('logo/logos.png') ?>" alt="SIGAP"
                                class="h-14 object-contain drop-shadow-lg hover:scale-105 transition-transform duration-300">
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="<?= base_url() ?>">Beranda</a>
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="<?= base_url() ?>#about">Tentang</a>
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="<?= base_url() ?>#how-it-works">Alur Laporan</a>
                    <a class="text-sm font-medium text-emerald-50 hover:text-white transition-colors"
                        href="<?= base_url() ?>#kontak">Kontak</a>
                </div>

                <!-- Action Button -->
                <div class="flex items-center gap-4">
                    <a class="inline-flex items-center justify-center px-4 py-2 sm:px-5 sm:py-2.5 text-xs sm:text-sm font-bold text-primary transition-all duration-200 bg-white border border-transparent rounded-full hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white shadow-xl"
                        href="<?= base_url() ?>">
                        <span class="material-icons-round text-sm mr-1 sm:mr-2">arrow_back</span>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="relative z-10 flex-grow py-32 sm:py-40 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Hero Title Area -->
            <div class="text-center space-y-6 mb-12 animate-fade-in-up">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-widest">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Saluran Aspirasi Aman
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-[1.1]">
                    Suarakan <span class="text-gradient">Aspirasi & Laporan</span> <br />
                    Anda dengan <span class="relative">Aman<span
                            class="absolute bottom-0 left-0 w-full h-2 bg-primary/10 -z-10 rounded-full"></span></span>
                </h2>
                <p class="text-sm sm:text-base text-slate-500 max-w-2xl mx-auto leading-relaxed font-medium">
                    Kami menjamin data pelapor dilindungi sepenuhnya dengan protokol keamanan internal. Inovasi untuk
                    menciptakan iklim kampus yang aman tanpa rasa takut.
                </p>
            </div>



            <!-- Main Form Card (Glass) -->
            <div
                class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-glass border border-white/40 overflow-hidden relative">
                <div class="h-1.5 w-full bg-gradient-to-r from-primary via-emerald-400 to-teal-500"></div>

                <form class="p-5 sm:p-8 md:p-10 space-y-8" id="form-pengaduan">

                    <!-- SECTION 1: JENIS PELAPORAN -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                                <span class="material-symbols-outlined text-[18px]">verified_user</span>
                            </div>
                            <label class="text-sm font-bold text-slate-800 uppercase tracking-widest">Metode
                                Pelaporan</label>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <label class="group cursor-pointer relative">
                                <input checked="" class="peer sr-only" name="pelapor_identitas" type="radio"
                                    value="anonim" id="pelapor_identitas_anonim" />
                                <div
                                    class="p-5 rounded-2xl border-2 border-slate-100 bg-white group-hover:bg-slate-50 transition-all peer-checked:border-primary peer-checked:bg-primary/[0.02] peer-checked:ring-4 peer-checked:ring-primary/10 flex flex-col gap-4">
                                    <div class="flex justify-between items-start w-full">
                                        <div
                                            class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center peer-checked:bg-primary peer-checked:text-white transition-all overflow-hidden relative">
                                            <span class="material-symbols-outlined text-[28px]">visibility_off</span>
                                            <div
                                                class="absolute bottom-0 right-0 w-3 h-3 bg-red-400 border-2 border-white rounded-full">
                                            </div>
                                        </div>
                                        <div
                                            class="w-5 h-5 rounded-full border-2 border-slate-200 flex items-center justify-center peer-checked:border-primary peer-checked:after:content-[''] peer-checked:after:w-2.5 peer-checked:after:h-2.5 peer-checked:after:bg-primary peer-checked:after:rounded-full transition-all">
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900">Anonim (Sangat Rahasia)</h4>
                                        <p class="text-xs text-slate-500 mt-1 font-medium">Identitas Anda tidak akan
                                            terekam dalam database sistem kami.</p>
                                    </div>
                                </div>
                            </label>

                            <label class="group cursor-pointer relative">
                                <input class="peer sr-only" name="pelapor_identitas" type="radio" value="identitas"
                                    id="pelapor_identitas_named" />
                                <div
                                    class="p-5 rounded-2xl border-2 border-slate-100 bg-white group-hover:bg-slate-50 transition-all peer-checked:border-primary peer-checked:bg-primary/[0.02] peer-checked:ring-4 peer-checked:ring-primary/10 flex flex-col gap-4">
                                    <div class="flex justify-between items-start w-full">
                                        <div
                                            class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center peer-checked:bg-primary peer-checked:text-white transition-all overflow-hidden relative">
                                            <span class="material-symbols-outlined text-[28px]">person</span>
                                        </div>
                                        <div
                                            class="w-5 h-5 rounded-full border-2 border-slate-200 flex items-center justify-center peer-checked:border-primary peer-checked:after:content-[''] peer-checked:after:w-2.5 peer-checked:after:h-2.5 peer-checked:after:bg-primary peer-checked:after:rounded-full transition-all">
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900">Gunakan Identitas</h4>
                                        <p class="text-xs text-slate-500 mt-1 font-medium">Memudahkan petugas untuk
                                            melakukan verifikasi & tindak lanjut cepat.</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- ============================================
     SECTION 2: INFO PRIVASI ANONIM
     Menampilkan informasi privasi ketika user memilih pengaduan anonim
     ============================================ -->
                    <!--opsi Anonim -->

                    <div id="anon-info"
                        class="flex items-start gap-4 p-5 bg-blue-50/50 border border-blue-100 rounded-2xl animate-fade-in">
                        <div
                            class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">verified</span>
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-sm font-bold text-slate-900">Perlindungan Anonimitas Aktif</h5>
                            <p class="text-xs text-slate-600 leading-relaxed font-medium">Sistem kami menggunakan
                                enkripsi end-to-end. Data perangkat atau IP Anda tidak akan disimpan dalam laporan ini
                                demi menjaga kerahasiaan penuh.</p>
                        </div>
                    </div>

                    <!-- ============================================
     SECTION 3: IDENTITAS PERLAPOR
     Form untuk input nama dan kontak (Email/WhatsApp) - hanya tampil jika user memilih "Dengan Identitas"
     ============================================ -->
                    <!--  by identitas-->

                    <div id="identity-form"
                        class="p-6 rounded-2xl bg-white border border-slate-100 shadow-sm space-y-6 hidden animate-slide-in">
                        <div class="flex items-center gap-2 border-b border-slate-50 pb-4">
                            <span class="material-symbols-outlined text-primary text-[20px]">assignment_ind</span>
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Identitas Perlapor
                            </h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nama
                                    Lengkap *</label>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400">
                                            <span class="material-symbols-outlined text-[20px]">person</span>
                                        </div>
                                        <input class="form-input-base flex-1" placeholder="Masukkan nama Anda"
                                            type="text" name="pelapor_nama" id="pelapor_nama" />
                                    </div>
                                    <!-- Validation Message Container -->
                                    <div id="pelapor_nama_error" class="hidden mt-1">
                                        <div class="error-message animate-slide-in">
                                            <span class="material-symbols-outlined text-[14px]">error</span>
                                            <span id="pelapor_nama_error_text">Nama lengkap wajib diisi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kontak
                                    Aktif</label>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400">
                                        <span class="material-symbols-outlined text-[20px]">contact_mail</span>
                                    </div>
                                    <input class="form-input-base flex-1" placeholder="WhatsApp atau Email" type="text"
                                        name="pelapor_kontak" id="pelapor_kontak" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Info Perlapor -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                        <!-- SECTION 4: KATEGORI PELANGGARAN -->
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[18px]">category</span>
                                </div>
                                <label class="text-sm font-bold text-slate-800 uppercase tracking-widest">Kategori
                                    Pelanggaran</label>
                            </div>

                            <div class="relative group" id="kategori-select-wrapper">
                                <select class="form-select-base pr-12 focus:ring-4 focus:ring-primary/10"
                                    id="kategori_select" name="kategori_id" data-field-text="kategori_text">
                                    <option disabled="" selected="">Pilih kategori masalah...</option>
                                    <?php foreach ($kategori as $kat): ?>
                                        <option value="<?= $kat['id']; ?>">

                                            <?= esc($kat['kategori']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                    <option value="Lainnya">Lainnya...</option>
                                </select>

                            </div>

                            <div id="kategori-custom-wrapper" class="space-y-3 hidden animate-slide-in">
                                <input
                                    class="form-input-base border-primary shadow-[0_0_15px_-3px_rgba(13,148,136,0.2)]"
                                    id="kategori_custom_input" placeholder="Tuliskan kategori baru..." type="text" />
                                <div class="flex gap-2 justify-end">
                                    <button type="button"
                                        class="text-[11px] font-bold text-slate-500 hover:text-slate-700 flex items-center gap-1 transition-all px-4 py-2 border border-slate-200 rounded-xl hover:bg-slate-50"
                                        id="btn-batal-kategori">
                                        <span class="material-symbols-outlined text-[16px]">close</span> Batal
                                    </button>
                                    <button type="button"
                                        class="text-[11px] font-bold text-white flex items-center gap-1 transition-all px-4 py-2 bg-primary hover:bg-primary-hover rounded-xl shadow-sm hover:shadow-md"
                                        id="btn-tambah-kategori">
                                        <span class="material-symbols-outlined text-[16px]">add_task</span> Tambahkan
                                    </button>
                                </div>
                            </div>

                            <div class="flex justify-start px-1" id="kategori-button-wrapper">
                                <button type="button"
                                    class="text-[11px] font-bold text-primary hover:underline flex items-center gap-1.5 transition-all"
                                    id="btn-tambah-kategori-alt">
                                    <span class="material-symbols-outlined text-[14px]">add_circle</span> Tambah
                                    Kategori Baru
                                </button>
                            </div>
                        </div>

                        <!-- SECTION 5: PIHAK YANG DILAPORKAN -->
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[18px]">group_problem</span>
                                </div>
                                <label class="text-sm font-bold text-slate-800 uppercase tracking-widest">Pihak
                                    Terlapor</label>
                            </div>

                            <div class="relative group">
                                <select class="form-select-base pr-12 focus:ring-4 focus:ring-primary/10"
                                    name="terlapor_jenis" id="terlapor_jenis">
                                    <option disabled="" selected="">Pilih pihak yang dilaporkan...</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Tendik">Tenaga Kependidikan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <!-- END PIHAK YANG DILAPORKAN -->

                    <!-- SECTION 6: DETAIL TERLAPOR (DYNAMIC) -->
                    <div id="detail-mahasiswa"
                        class="p-6 rounded-2xl bg-slate-50/50 border border-slate-100 space-y-6 hidden animate-slide-in">
                        <div class="flex items-center gap-2 border-b border-slate-100 pb-4">
                            <span class="material-symbols-outlined text-primary text-[20px]">school</span>
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Detail Terlapor
                                (Mahasiswa)</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">NIM
                                    (Opsional)</label>
                                <input class="form-input-base focus:ring-4 focus:ring-primary/10"
                                    placeholder="Contoh: 12345678" type="text" name="terlapor_nim" id="terlapor_nim" />
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nama
                                    Lengkap *</label>
                                <input class="form-input-base focus:ring-4 focus:ring-primary/10"
                                    placeholder="Siapa yang dilaporkan?" type="text" name="terlapor_nama_mahasiswa"
                                    id="terlapor_nama_mahasiswa" />
                            </div>
                            <div class="md:col-span-2 space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Program
                                    Studi (Opsional)</label>
                                <select class="form-select-base focus:ring-4 focus:ring-primary/10"
                                    name="terlapor_prodi_id" id="terlapor_prodi_id">
                                    <option disabled="" selected="">Pilih Program Studi Terlapor...</option>
                                    <?php foreach ($prodi as $prd): ?>

                                        <option value="<?= $prd['id']; ?>">
                                            <?= esc($prd['nm_prodi']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="detail-dosen"
                        class="p-6 rounded-2xl bg-slate-50/50 border border-slate-100 space-y-6 hidden animate-slide-in">
                        <div class="flex items-center gap-2 border-b border-slate-100 pb-4">
                            <span class="material-symbols-outlined text-primary text-[20px]">badge</span>
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Detail Terlapor
                                (Dosen)</h3>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nama
                                Lengkap *</label>
                            <input class="form-input-base focus:ring-4 focus:ring-primary/10"
                                placeholder="Nama dosen yang dilaporkan" type="text" name="terlapor_nama_dosen"
                                id="terlapor_nama_dosen" />
                        </div>
                    </div>

                    <div id="detail-tendik"
                        class="p-6 rounded-2xl bg-slate-50/50 border border-slate-100 space-y-6 hidden animate-slide-in">
                        <div class="flex items-center gap-2 border-b border-slate-100 pb-4">
                            <span class="material-symbols-outlined text-primary text-[20px]">engineering</span>
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Detail Terlapor
                                (Tendik)</h3>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nama
                                Lengkap *</label>
                            <input class="form-input-base focus:ring-4 focus:ring-primary/10"
                                placeholder="Nama tenaga kependidikan" type="text" name="terlapor_nama_tendik"
                                id="terlapor_nama_tendik" />
                        </div>
                    </div>

                    <div id="detail-lainnya"
                        class="p-6 rounded-2xl bg-slate-50/50 border border-slate-100 space-y-6 hidden animate-slide-in">
                        <div class="flex items-center gap-2 border-b border-slate-100 pb-4">
                            <span class="material-symbols-outlined text-primary text-[20px]">contact_support</span>
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Detail Terlapor
                                (Lainnya)</h3>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nama
                                Lengkap *</label>
                            <input class="form-input-base focus:ring-4 focus:ring-primary/10"
                                placeholder="Nama pihak terkait" type="text" name="terlapor_nama_lainnya"
                                id="terlapor_nama_lainnya" />
                        </div>
                    </div>

                    <!-- End Detail Terlapor -->

                    <!-- Hidden fields untuk backend -->
                    <input type="hidden" name="terlapor_nama" id="terlapor_nama_hidden" />

                    <!-- SECTION 7: KRONOLOGI KEJADIAN -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[18px]">history_edu</span>
                                </div>
                                <label class="text-sm font-bold text-slate-800 uppercase tracking-widest">Kronologi
                                    Kejadian</label>
                            </div>
                            <span
                                class="text-[10px] font-black bg-slate-100 text-slate-400 px-2 py-1 rounded-md tracking-tighter uppercase">Detail
                                & Obyektif</span>
                        </div>
                        <textarea class="form-input-base resize-y min-h-[120px] focus:ring-4 focus:ring-primary/10"
                            placeholder="Ceritakan kronologi kejadian secara detail, obyektif dan jelas..." rows="4"
                            name="kejadian_deskripsi" id="kejadian_deskripsi"></textarea>
                        <div class="flex items-start gap-2 p-3 bg-amber-50/50 rounded-xl border border-amber-100">
                            <span class="material-symbols-outlined text-amber-500 text-sm mt-0.5">verified</span>
                            <p class="text-[11px] text-amber-800 font-medium">Mohon gunakan bahasa yang sopan. Sertakan
                                informasi <span class="font-bold underline">Apa, Siapa, Kapan, & Dimana</span> untuk
                                memudahkan verifikasi.</p>
                        </div>
                    </div>

                    <!-- SECTION 8: WAKTU & LOKASI -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label
                                class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider pl-1">Tanggal
                                Kejadian</label>
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                                </div>
                                <input class="form-input-base flex-1 focus:ring-4 focus:ring-primary/10" type="date"
                                    name="kejadian_tgl" id="kejadian_tgl" />
                            </div>
                            <!-- Validation Message Container -->
                            <div id="kejadian_tgl_error" class="hidden mt-1">
                                <div class="error-message animate-slide-in">
                                    <span class="material-symbols-outlined text-[14px]">error</span>
                                    <span id="kejadian_tgl_error_text">Tanggal kejadian wajib diisi</span>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider pl-1">Lokasi
                                Kejadian</label>
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">location_on</span>
                                </div>
                                <input class="form-input-base flex-1 focus:ring-4 focus:ring-primary/10"
                                    placeholder="Contoh: Gedung A, Lantai 2" type="text" name="kejadian_lokasi"
                                    id="kejadian_lokasi" />
                            </div>
                        </div>
                    </div>

                    <!-- ============================================
     SECTION 9: BUKTI PENDUKUNG
     File upload area untuk menambahkan bukti/lampiran (PNG, JPG, PDF max 10MB)
     ============================================ -->
                    <!-- SECTION 9: BUKTI PENDUKUNG -->
                    <div class="space-y-6 pt-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                                <span class="material-symbols-outlined text-[18px]">attachment</span>
                            </div>
                            <label class="text-sm font-bold text-slate-800 uppercase tracking-widest">Bukti Pendukung
                                <span
                                    class="text-[10px] lowercase font-medium text-slate-400 underline decoration-dotted decoration-primary">(Opsional)</span></label>
                        </div>

                        <!-- Opsi Tipe Bukti -->
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer group">
                                <input type="radio" name="bukti_tipe" value="file" checked class="peer sr-only"
                                    id="bukti_tipe_file" />
                                <div
                                    class="p-4 rounded-2xl border-2 border-slate-100 bg-white group-hover:bg-slate-50 transition-all peer-checked:border-primary peer-checked:bg-primary/[0.02] flex items-center gap-3 shadow-sm peer-checked:shadow-none">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center peer-checked:bg-primary peer-checked:text-white transition-all">
                                        <span class="material-symbols-outlined text-[22px]">upload_file</span>
                                    </div>
                                    <span class="text-xs font-bold text-slate-600 peer-checked:text-primary">Unggah
                                        File</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="bukti_tipe" value="sosmed" class="peer sr-only"
                                    id="bukti_tipe_sosmed" />
                                <div
                                    class="p-4 rounded-2xl border-2 border-slate-100 bg-white group-hover:bg-slate-50 transition-all peer-checked:border-primary peer-checked:bg-primary/[0.02] flex items-center gap-3 shadow-sm peer-checked:shadow-none">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center peer-checked:bg-primary peer-checked:text-white transition-all">
                                        <span class="material-symbols-outlined text-[22px]">link</span>
                                    </div>
                                    <span class="text-xs font-bold text-slate-600 peer-checked:text-primary">Link
                                        Sosmed</span>
                                </div>
                            </label>
                        </div>

                        <!-- UPLOAD FILE SECTION -->
                        <div id="bukti-file-section" class="w-full animate-fade-in">
                            <label
                                class="flex flex-col items-center justify-center w-full h-44 border-2 border-dashed border-slate-200 rounded-3xl cursor-pointer bg-slate-50/50 hover:bg-slate-100 hover:border-primary/50 transition-all group overflow-hidden relative"
                                for="lampiran">
                                <div class="flex flex-col items-center justify-center text-center px-4 relative z-10">
                                    <div
                                        class="mb-3 p-4 rounded-2xl bg-white shadow-soft text-slate-300 group-hover:text-primary group-hover:scale-110 transition-all duration-300">
                                        <span class="material-symbols-outlined text-4xl">cloud_upload</span>
                                    </div>
                                    <p class="text-sm text-slate-600 font-bold tracking-tight">Klik untuk unggah <span
                                            class="text-slate-400 font-medium">atau tarik file ke sini</span></p>
                                    <p class="text-[10px] text-slate-400 mt-2 font-medium uppercase tracking-widest">
                                        PNG, JPG, PDF • Maksimal 10MB</p>
                                </div>
                                <input class="hidden" id="lampiran" type="file" name="lampiran" />
                            </label>

                            <div id="file-preview-container"
                                class="hidden mt-4 p-5 bg-white border border-slate-100 rounded-2xl shadow-soft animate-slide-in">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xs font-black text-slate-900 uppercase">Lampiran Terpilih</h4>
                                    <button type="button" id="btn-remove-file"
                                        class="text-[10px] font-bold text-red-500 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">close</span> Batalkan
                                    </button>
                                </div>
                                <div id="file-preview-content"></div>
                            </div>
                        </div>

                        <!-- SOSMED SECTION -->
                        <div id="bukti-sosmed-section" class="hidden w-full space-y-6 animate-fade-in">
                            <div class="space-y-4">
                                <label
                                    class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider pl-1">URL
                                    / Tautan Bukti</label>
                                <div class="flex gap-2">
                                    <div class="flex items-center gap-3 flex-1">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">add_link</span>
                                        </div>
                                        <input type="url" id="sosmed_url" name="sosmed_url"
                                            placeholder="Paste URL dari YouTube, TikTok, Instagram, Facebook, atau platform lainnya..."
                                            class="form-input-base flex-1" />
                                    </div>
                                    <button type="button" id="btn-load-sosmed-preview"
                                        class="px-5 py-3 bg-primary hover:bg-primary-hover text-white text-xs font-black rounded-xl transition-all shadow-md hover:shadow-lg active:scale-95 flex items-center gap-2">
                                        PREVIEW
                                    </button>
                                </div>
                                <p class="text-[10px] text-slate-400 pl-1 font-medium">💡 Sistem akan otomatis
                                    mendeteksi platform dari URL yang Anda masukkan</p>
                            </div>

                            <!-- Hidden field untuk platform yang terdeteksi -->
                            <input type="hidden" name="sosmed_platform" id="sosmed_platform_hidden" />

                            <div id="sosmed-preview-container"
                                class="hidden p-5 bg-white border border-slate-100 rounded-2xl shadow-soft animate-slide-in">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xs font-black text-slate-900 uppercase">Hasil Tautan</h4>
                                    <button type="button" id="btn-remove-sosmed"
                                        class="text-[10px] font-bold text-red-500 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">Hapus
                                        Tautan</button>
                                </div>
                                <div id="sosmed-preview-content"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================
     SECTION 10: CHECKBOX PERSETUJUAN
     User harus menyetujui pernyataan kebenaran data sebelum mengirim pengaduan
     ============================================ -->
                    <div class="flex flex-col items-center pt-8 space-y-6">
                        <label
                            class="group relative flex items-start gap-4 p-5 rounded-2xl bg-amber-50/50 border border-amber-100 cursor-pointer transition-all hover:bg-amber-50">
                            <div class="pt-0.5">
                                <input class="w-5 h-5 cursor-pointer accent-primary rounded-md" id="agree_checkbox"
                                    type="checkbox" />
                            </div>
                            <div class="text-sm text-slate-700 leading-relaxed font-medium">
                                Saya bersumpah dan menyatakan bahwa data yang saya berikan adalah <span
                                    class="text-slate-900 font-bold underline">benar, jujur, dan obyektif</span>. Saya
                                memahami segala konsekuensi hukum jika terbukti memberikan fitnah atau laporan palsu.
                            </div>
                        </label>

                        <div class="w-full">
                            <button
                                class="group relative w-full flex justify-center py-5 px-6 items-center gap-3 border border-transparent text-base font-black rounded-2xl text-white bg-gradient-to-r from-primary to-emerald-600 hover:from-primary-hover hover:to-emerald-700 shadow-[0_10px_30px_-5px_rgba(13,148,136,0.3)] transition-all duration-300 hover:-translate-y-1 active:scale-[0.98]"
                                id="btn-kirim-pengaduan" type="button">
                                <span
                                    class="material-symbols-outlined group-hover:rotate-12 transition-transform">rocket_launch</span>
                                SUBMIT LAPORAN SEKARANG
                            </button>
                        </div>
                    </div>
                    <!-- END FORM PENGADUAN -->
                </form>
            </div>
        </div>
    </main>


    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <script>
        window.BASE_URL = '<?= base_url() ?>';
        window.SUBMIT_URL = '<?= base_url('submit-pengaduan') ?>';
    </script>
    <script src="<?= base_url('assets/js/form-pengaduan.js') ?>"></script>
</body>

</html>
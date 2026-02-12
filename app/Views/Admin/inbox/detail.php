<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>

<nav class="flex mb-6 text-sm text-slate-500 dark:text-slate-400">
    <ol class="flex items-center gap-2">
        <li><a class="hover:text-primary transition-colors flex items-center gap-1"
                href="<?= base_url('admin/dashboard') ?>"><span class="material-icons text-sm">home</span>
                Dashboard</a></li>
        <li><span class="material-icons text-sm">chevron_right</span></li>
        <li><a class="hover:text-primary transition-colors" href="<?= base_url('admin/laporan-masuk') ?>">Laporan
                Masuk</a></li>
        <li><span class="material-icons text-sm">chevron_right</span></li>
        <li class="font-bold text-slate-800 dark:text-slate-200">Detail #<?= $referensi_pengaduan ?? 'LAP-000' ?>
        </li>
    </ol>
</nav>

<!-- Header Section -->
<div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-6 mb-8">
    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
        <div
            class="w-16 h-16 bg-primary/10 dark:bg-primary/20 rounded-2xl flex items-center justify-center text-primary shadow-inner">
            <span class="material-icons text-3xl">assignment</span>
        </div>
        <div>
            <div class="flex flex-wrap items-center gap-3 mb-1">
                <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    #<?= $referensi_pengaduan ?? 'LAP-20260210-0012' ?></h1>

                <!-- Status Badge -->
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
                    <span class="w-2 h-2 rounded-full bg-blue-600 dark:bg-blue-400 animate-pulse"></span>
                    <?= $status_tindakan ?? 'Diproses' ?>
                </span>

                <?php if (($is_starred ?? 0) == 1): ?>
                    <span class="material-icons text-amber-500">star</span>
                <?php endif; ?>
            </div>
            <div
                class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm font-medium text-slate-500 dark:text-slate-400">
                <span class="flex items-center gap-1.5"><span
                        class="material-icons text-base text-slate-400">calendar_today</span>
                    <?= date('d M Y, H:i', strtotime($created_at ?? now())) ?> WIB</span>
                <span class="hidden sm:inline text-slate-300">|</span>
                <span class="flex items-center gap-1.5"><span
                        class="material-icons text-base text-slate-400">history_edu</span> Terakhir Update:
                    <?= date('d M Y, H:i', strtotime($updated_at ?? now())) ?></span>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-2 lg:self-start">
        <a href="<?= base_url('admin/laporan-cetak/' . $referensi_pengaduan) ?>" target="_blank"
            class="flex items-center gap-2 px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border-2 border-slate-100 rounded-xl hover:bg-slate-50 hover:border-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:border-slate-700 dark:hover:bg-slate-700 transition-all shadow-sm">
            <span class="material-icons text-lg">print</span>
            <span>Print / Download</span>
        </a>
        <button id="btnStar" data-id="<?= $id ?>"
            class="flex items-center gap-2 px-5 py-2.5 text-sm font-bold <?= ($is_starred ?? 0) == 1 ? 'text-amber-600 bg-amber-50 border-amber-200' : 'text-slate-500 bg-white border-slate-100' ?> border-2 rounded-xl hover:bg-amber-50 dark:bg-slate-800 dark:border-slate-700 transition-all shadow-sm">
            <span
                class="material-icons text-lg icon-star"><?= ($is_starred ?? 0) == 1 ? 'star' : 'star_border' ?></span>
            <span class="text-star"><?= ($is_starred ?? 0) == 1 ? 'Hapus Bintang' : 'Beri Bintang' ?></span>
        </button>
        <button id="btnDelete" data-id="<?= $id ?>" data-ref="<?= $referensi_pengaduan ?>"
            class="flex items-center gap-2 px-5 py-2.5 text-sm font-bold text-red-600 bg-red-50 border-2 border-red-100 rounded-xl hover:bg-red-100 dark:bg-red-900/20 dark:text-red-400 dark:border-red-800/50 transition-all shadow-sm">
            <span class="material-icons text-lg">delete_outline</span>
            <span>Hapus</span>
        </button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    <!-- Main Column (Detail Content) -->
    <div class="lg:col-span-8 space-y-8">

        <!-- Grid Layout for Sender & Reported Party -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card 1: Informasi Pelapor -->
            <div
                class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-md transition-shadow">
                <div
                    class="px-6 py-4 bg-slate-50/50 dark:bg-slate-900/30 border-b border-slate-100 dark:border-slate-700 flex items-center justify-between">
                    <div class="flex items-center gap-2 font-bold text-slate-800 dark:text-white">
                        <span class="material-icons text-primary">person</span>
                        <span>Informasi Pelapor</span>
                    </div>
                    <span
                        class="px-2.5 py-1 rounded-lg text-[10px] uppercase font-black tracking-widest <?= ($pelapor_identitas ?? 'Beridentitas') === 'Anonim' ? 'bg-slate-100 text-slate-600' : 'bg-green-100 text-green-700' ?>">
                        <?= $pelapor_identitas ?? 'Beridentitas' ?>
                    </span>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-wider">Nama
                                Lengkap</label>
                            <p class="text-sm font-bold text-slate-900 dark:text-white">
                                <?= (strtolower($pelapor_identitas ?? '') === 'anonim') ? '*******' : ($pelapor_nama ?? '-') ?>
                            </p>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-wider">Kontak
                                (WA/Telp)</label>
                            <p class="text-sm font-medium text-slate-700 dark:text-slate-300">
                                <?= (strtolower($pelapor_identitas ?? '') === 'anonim') ? '*******' : ($pelapor_kontak ?? '-') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Pihak Terlapor -->
            <div
                class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-md transition-shadow">
                <div
                    class="px-6 py-4 bg-slate-50/50 dark:bg-slate-900/30 border-b border-slate-100 dark:border-slate-700 flex items-center gap-2 font-bold text-slate-800 dark:text-white">
                    <span class="material-icons text-primary">gavel</span>
                    <span>Stakeholder Terlapor</span>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="<?= ($terlapor_jenis ?? '') === 'Mahasiswa' ? '' : 'col-span-2' ?>">
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-wider">Jenis
                                Terlapor</label>
                            <p class="text-sm font-bold text-slate-900 dark:text-white">
                                <?= $terlapor_jenis ?? 'Mahasiswa' ?>
                            </p>
                        </div>
                        <?php if (($terlapor_jenis ?? '') === 'Mahasiswa'): ?>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 tracking-wider">NIM</label>
                                <p class="text-sm font-mono font-bold text-slate-700 dark:text-slate-300">
                                    <?= $terlapor_nim ?? '-' ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <div class="col-span-2">
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-wider">Identitas
                                Terlapor</label>
                            <p class="text-sm font-bold text-slate-900 dark:text-white">
                                <?= $terlapor_nama ?? '-' ?>
                            </p>
                            <?php if (($terlapor_jenis ?? '') === 'Mahasiswa'): ?>
                                <p class="text-xs text-slate-500 font-medium">
                                    <?= $nm_prodi ?? 'Program Studi tidak diketahui' ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Detail Kejadian (Longer Card) -->
        <div
            class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
            <div
                class="px-6 py-4 bg-slate-50/50 dark:bg-slate-900/30 border-b border-slate-100 dark:border-slate-700 flex items-center justify-between">
                <div class="flex items-center gap-2 font-bold text-slate-800 dark:text-white">
                    <span class="material-icons text-primary">feed</span>
                    <span>Kronologi & Detail Aduan</span>
                </div>
            </div>
            <div class="p-6 lg:p-8 space-y-8">
                <!-- Event Metadata -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-3 gap-6 bg-slate-50 dark:bg-slate-900/30 p-5 rounded-2xl border border-slate-100 dark:border-slate-700/50">
                    <div>
                        <label
                            class="block text-[10px] font-black uppercase text-slate-400 tracking-wider mb-1">Kategori
                            Pelanggaran</label>
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400 text-xs font-bold ring-1 ring-orange-200 dark:ring-orange-800/50">
                            <span class="material-icons text-sm">warning</span>
                            <?= $kategori_text ?? 'Akademik' ?>
                        </span>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 tracking-wider mb-1">Waktu
                            Kejadian</label>
                        <p class="text-sm font-bold text-slate-900 dark:text-white flex items-center gap-2">
                            <span class="material-icons text-base text-slate-400">event</span>
                            <?= date('d F Y', strtotime($kejadian_tgl ?? '2026-02-08')) ?>
                        </p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-400 tracking-wider mb-1">Lokasi
                            Kejadian</label>
                        <p class="text-sm font-bold text-slate-900 dark:text-white flex items-center gap-2">
                            <span class="material-icons text-base text-slate-400">place</span>
                            <?= $kejadian_lokasi ?? 'Gedung C, Lab Komputer 2' ?>
                        </p>
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Deskripsi
                        Laporan</label>
                    <div
                        class="prose prose-slate dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed text-sm lg:text-base">
                        <?= nl2br($kejadian_deskripsi ?? "Pada hari Senin, tanggal 8 Februari 2026 sekitar pukul 10:00 WIB, saya sedang melakukan praktikum di Lab Komputer 2. Saya melihat saudara Budi Santoso melakukan tindakan yang tidak semestinya...") ?>
                    </div>
                </div>

                <!-- Evidence / Bukti -->
                <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-700">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Bukti &
                        Lampiran</label>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <?php if (!empty($lampiran)): ?>
                            <div class="space-y-3">
                                <span class="text-xs font-bold text-slate-500">Berkas Pendukung
                                    (<?= $bukti_tipe ?? 'File' ?>)</span>
                                <div class="grid grid-cols-1 gap-3">
                                    <div
                                        class="group relative aspect-video rounded-xl overflow-hidden bg-slate-100 border-2 border-slate-100 dark:border-slate-700 cursor-zoom-in shadow-sm">
                                        <?php
                                        $ext = pathinfo($lampiran, PATHINFO_EXTENSION);
                                        $is_img = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'webp', 'gif']);
                                        ?>
                                        <?php if ($is_img): ?>
                                            <img src="<?= base_url('uploads/pengaduan/' . $lampiran) ?>"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                                onerror="this.src='https://ui-avatars.com/api/?name=File+Error&background=f1f5f9&color=64748b'">
                                        <?php else: ?>
                                            <div
                                                class="w-full h-full flex flex-col items-center justify-center bg-slate-100 dark:bg-slate-900">
                                                <span class="material-icons text-4xl text-slate-400 mb-2">description</span>
                                                <span class="text-[10px] font-bold text-slate-500 uppercase"><?= $ext ?>
                                                    File</span>
                                            </div>
                                        <?php endif; ?>
                                        <div
                                            class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-2">
                                            <a href="<?= base_url('uploads/pengaduan/' . $lampiran) ?>" target="_blank"
                                                class="px-4 py-2 bg-white text-slate-900 rounded-lg text-xs font-bold uppercase tracking-widest hover:bg-slate-100 transition-colors">
                                                Buka Berkas
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($bukti_sosmed_url)): ?>
                            <div class="space-y-3">
                                <span class="text-xs font-bold text-slate-500">Pranala Media Sosial</span>
                                <a href="<?= $bukti_sosmed_url ?>" target="_blank"
                                    class="flex items-center gap-3 p-4 rounded-xl bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800/50 hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-all group shadow-sm">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-white dark:bg-slate-800 flex items-center justify-center text-blue-600 shadow-sm group-hover:scale-110 transition-transform">
                                        <?php
                                        $platform = strtolower($bukti_sosmed_platform ?? 'link');
                                        $icon = 'link';
                                        if (strpos($platform, 'instagram') !== false)
                                            $icon = 'camera_alt';
                                        elseif (strpos($platform, 'tiktok') !== false)
                                            $icon = 'music_note';
                                        elseif (strpos($platform, 'facebook') !== false)
                                            $icon = 'facebook';
                                        elseif (strpos($platform, 'youtube') !== false)
                                            $icon = 'play_circle';
                                        ?>
                                        <span class="material-icons"><?= $icon ?></span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="text-xs font-black text-blue-800 dark:text-blue-400 uppercase tracking-tighter mb-0.5">
                                            <?= $bukti_sosmed_platform ?? 'Link Eksternal' ?>
                                        </p>
                                        <p class="text-xs text-blue-600 dark:text-blue-500 truncate font-medium">
                                            <?= $bukti_sosmed_url ?>
                                        </p>
                                    </div>
                                    <span
                                        class="material-icons text-blue-400 group-hover:translate-x-1 transition-transform">open_in_new</span>
                                </a>
                            </div>
                        <?php endif; ?>

                        <!-- If no proof -->
                        <?php if (empty($lampiran) && empty($bukti_sosmed_url)): ?>
                            <div
                                class="col-span-full py-12 flex flex-col items-center justify-center text-slate-400 border-2 border-dashed border-slate-200 dark:border-slate-700/50 rounded-2xl bg-slate-50/50 dark:bg-transparent">
                                <span class="material-icons text-5xl mb-3 text-slate-300">no_photography</span>
                                <p class="text-xs font-black uppercase tracking-widest text-slate-500">Tidak ada lampiran
                                    bukti</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column (Workflow & Timeline) -->
    <div class="lg:col-span-4 space-y-8">

        <!-- Actions Card -->
        <div
            class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 p-6 lg:p-8 sticky top-4">
            <div class="flex items-center gap-2 mb-6">
                <span class="material-icons text-primary">play_circle_filled</span>
                <h3 class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-widest font-secondary">
                    Tindak Lanjut</h3>
            </div>

            <form id="followUpForm" class="space-y-6">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Ubah
                        Status</label>
                    <div class="relative group">
                        <select id="statusSelect" name="status"
                            class="w-full pl-4 pr-10 py-3 bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-800 dark:text-slate-200 focus:outline-none focus:border-primary appearance-none cursor-pointer transition-all">
                            <option value="0" <?= ($status_tindakan ?? '') == '0' ? 'selected' : '' ?>>Baru
                            </option>
                            <option value="Dibaca" <?= ($status_tindakan ?? '') == 'Dibaca' ? 'selected' : '' ?>>Dibaca
                            </option>
                            <option value="Diproses" <?= ($status_tindakan ?? '') == 'Diproses' ? 'selected' : '' ?>>
                                Diproses</option>
                            <option value="Selesai" <?= ($status_tindakan ?? '') == 'Selesai' ? 'selected' : '' ?>>
                                Selesai</option>
                            <option value="Ditolak" <?= ($status_tindakan ?? '') == 'Ditolak' ? 'selected' : '' ?>>
                                Ditolak</option>
                        </select>

                    </div>
                </div>

                <div class="space-y-3">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Catatan
                        Internal / Tindakan</label>
                    <textarea id="catatanText" name="catatan"
                        class="w-full p-4 bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 focus:outline-none focus:border-primary transition-all min-h-[120px]"
                        placeholder="Berikan keterangan tindakan yang diambil..."><?= $tindakan_keterangan ?? '' ?></textarea>
                </div>

                <button type="submit" id="submitFollowUp"
                    class="w-full py-4 bg-primary hover:bg-primary-dark text-white rounded-2xl font-black uppercase tracking-widest text-xs shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2 group">
                    <span class="material-icons text-lg group-hover:scale-125 transition-transform">verified_user</span>
                    <span class="btn-text">Simpan Perubahan</span>
                </button>
            </form>

            <!-- Workflow History (Compact) -->
            <div class="mt-10 pt-8 border-t border-slate-100 dark:border-slate-700">
                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">Log Aktivitas
                    Laporan</h4>
                <div id="activityLogContainer" class="space-y-6">
                    <?php if (empty($activities)): ?>
                        <div class="flex items-center gap-3 text-slate-400">
                            <span class="material-icons text-sm">info</span>
                            <p class="text-[10px] font-bold uppercase tracking-widest">Belum ada aktivitas</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($activities as $log): ?>
                            <div class="flex gap-4 relative">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="w-2.5 h-2.5 rounded-full <?= $log['status_sesudahnya'] == 'Selesai' ? 'bg-green-500' : 'bg-primary' ?> shadow-[0_0_0_4px_rgba(13,150,139,0.1)]">
                                    </div>
                                    <div class="w-0.5 h-full bg-slate-100 dark:bg-slate-700 mt-2"></div>
                                </div>
                                <div class="pb-6">
                                    <p class="text-xs font-black text-slate-800 dark:text-slate-200 uppercase tracking-tight">
                                        Status: <?= $log['status_sesudahnya'] ?></p>
                                    <?php if ($log['catatan']): ?>
                                        <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-1 italic line-clamp-2">
                                            <?= $log['catatan'] ?>
                                        </p>
                                    <?php endif; ?>
                                    <p class="text-[10px] font-bold text-slate-400 mt-1">
                                        <?= $log['admin_name'] ?? 'Admin' ?> •
                                        <?= date('d M Y, H:i', strtotime($log['created_at'])) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>


<style>
    .font-primary {
        font-family: 'Outfit', sans-serif;
    }

    .font-secondary {
        font-family: 'Inter', sans-serif;
    }

    /* Scrollbar Styling */
    .scrollbar-thin::-webkit-scrollbar {
        width: 4px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
        background: transparent;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: rgba(13, 150, 139, 0.2);
        border-radius: 20px;
    }

    .scrollbar-thin:hover::-webkit-scrollbar-thumb {
        background: rgba(13, 150, 139, 0.5);
    }
</style>

<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/notiflix/notiflix-3.2.7.min.css') ?>">
<script src="<?= base_url('assets/notiflix/notiflix-aio-3.2.7.min.js') ?>"></script>


<script>
    // Initialize Notiflix
    Notiflix.Notify.init({
        width: '320px',
        position: 'right-top',
        distance: '15px',
        borderRadius: '12px',
        timeout: 3000,
        fontFamily: 'Poppins',
        useIcon: true,
        fontSize: '13px',
    });

    $(document).ready(function () {
        $('#followUpForm').on('submit', function (e) {
            e.preventDefault();

            const $btn = $('#submitFollowUp');
            const $btnText = $btn.find('.btn-text');
            const originalText = $btnText.text();

            // Set loading state
            $btn.prop('disabled', true).addClass('opacity-70 cursor-not-allowed');
            $btnText.text('Menyimpan...');

            Notiflix.Loading.pulse('Memproses data...', {
                backgroundColor: 'rgba(255,255,255,0.8)',
                svgColor: '#0d968b',
                messageColor: '#0d968b',
            });

            $.ajax({
                url: '<?= base_url('admin/laporan-update-status') ?>',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    Notiflix.Loading.remove();

                    if (response.status === 'success') {
                        Notiflix.Notify.success(response.message);
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        Notiflix.Notify.failure(response.message);
                        $btn.prop('disabled', false).removeClass('opacity-70 cursor-not-allowed');
                        $btnText.text(originalText);
                    }
                },
                error: function () {
                    Notiflix.Loading.remove();
                    Notiflix.Notify.failure('Terjadi kesalahan saat menghubungi server.');
                    $btn.prop('disabled', false).removeClass('opacity-70 cursor-not-allowed');
                    $btnText.text(originalText);
                }
            });
        });

        // Toggle Star
        $('#btnStar').on('click', function (e) {
            e.preventDefault();
            const $btn = $(this);
            const reportId = $btn.data('id');

            Notiflix.Loading.pulse();

            $.ajax({
                url: '<?= base_url('admin/laporan-toggle-star') ?>',
                type: 'POST',
                data: { id: reportId },
                dataType: 'json',
                success: function (response) {
                    Notiflix.Loading.remove();
                    if (response.status === 'success') {
                        Notiflix.Notify.success(response.message);

                        // Local UI Update
                        if (response.is_starred == 1) {
                            $btn.removeClass('text-slate-500 bg-white border-slate-100')
                                .addClass('text-amber-600 bg-amber-50 border-amber-200');
                            $btn.find('.icon-star').text('star');
                            $btn.find('.text-star').text('Hapus Bintang');
                        } else {
                            $btn.removeClass('text-amber-600 bg-amber-50 border-amber-200')
                                .addClass('text-slate-500 bg-white border-slate-100');
                            $btn.find('.icon-star').text('star_border');
                            $btn.find('.text-star').text('Beri Bintang');
                        }

                        // Optional: reload after some time to see historical log impact
                        setTimeout(() => location.reload(), 2000);
                    } else {
                        Notiflix.Notify.failure(response.message);
                    }
                },
                error: function () {
                    Notiflix.Loading.remove();
                    Notiflix.Notify.failure('Gagal menghubungi server.');
                }
            });
        });

        // Delete Laporan
        $('#btnDelete').on('click', function (e) {
            e.preventDefault();
            const reportId = $(this).data('id');
            const reportRef = $(this).data('ref');

            Notiflix.Confirm.show(
                'Konfirmasi Hapus',
                'Apakah Anda yakin ingin menghapus laporan #' + reportRef + '? Tindakan ini permanen.',
                'Ya, Hapus',
                'Batal',
                function okCb() {
                    Notiflix.Loading.circle('Menghapus laporan...', {
                        svgColor: '#ef4444',
                        messageColor: '#ef4444',
                    });

                    $.ajax({
                        url: '<?= base_url('admin/laporan-delete') ?>',
                        type: 'POST',
                        data: { id: reportId },
                        dataType: 'json',
                        success: function (response) {
                            Notiflix.Loading.remove();
                            if (response.status === 'success') {
                                Notiflix.Report.success(
                                    'Berhasil Dihapus',
                                    response.message,
                                    'Kembali ke Inbox',
                                    function () {
                                        window.location.href = '<?= base_url('admin/laporan-masuk') ?>';
                                    }
                                );
                            } else {
                                Notiflix.Notify.failure(response.message);
                            }
                        },
                        error: function () {
                            Notiflix.Loading.remove();
                            Notiflix.Notify.failure('Gagal menghapus laporan.');
                        }
                    });
                },
                function cancelCb() {
                    // Do nothing
                },
                {
                    width: '350px',
                    okButtonBackground: '#ef4444',
                    titleColor: '#ef4444',
                }
            );
        });
    });
</script>

<?= $this->endSection() ?>
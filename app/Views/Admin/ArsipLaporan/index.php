<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-6 lg:mb-8 mt-2">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-slate-800 dark:text-white mb-1">Arsip Laporan</h1>
            <p class="text-sm text-slate-600 dark:text-slate-400">Daftar semua laporan yang telah selesai ditindaklanjuti atau ditolak.</p>
        </div>
    </div>
</div>

<!-- Main Content Card -->
<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">

    <!-- Filter Section -->
    <div class="p-6 border-b border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-900/20">
        <form action="<?= base_url('admin/arsip') ?>" method="get">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-5">
                <!-- Search -->
                <div class="lg:col-span-12 relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-primary transition-colors">
                        <span class="material-icons text-xl">search</span>
                    </span>
                    <input type="text" name="search" value="<?= esc($filters['search'] ?? '') ?>"
                        class="w-full pl-11 pr-4 py-3 bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl text-sm focus:outline-none focus:border-primary focus:ring-0 transition-all font-medium"
                        placeholder="Cari ID Referensi, Nama Pelapor, atau Nama Pihak Terlapor...">
                </div>

                <!-- Filters -->
                <div class="lg:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-tighter mb-2 ml-1">Status</label>
                    <div class="relative">
                        <select name="status"
                            class="w-full pl-4 pr-10 py-2.5 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-200 focus:outline-none focus:border-primary appearance-none cursor-pointer font-medium">
                            <option value="">Semua Status</option>
                            <option value="Selesai" <?= ($filters['status'] ?? '') == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="Ditolak" <?= ($filters['status'] ?? '') == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-tighter mb-2 ml-1">Kategori</label>
                    <div class="relative">
                        <select name="kategori"
                            class="w-full pl-4 pr-10 py-2.5 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-200 focus:outline-none focus:border-primary appearance-none cursor-pointer font-medium">
                            <option value="">Semua Kategori</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= ($filters['kategori'] ?? '') == $cat['id'] ? 'selected' : '' ?>>
                                    <?= $cat['kategori'] ?? 'Kategori ' . $cat['id'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-tighter mb-2 ml-1">Terlapor</label>
                    <div class="relative">
                        <select name="jenis_terlapor"
                            class="w-full pl-4 pr-10 py-2.5 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-200 focus:outline-none focus:border-primary appearance-none cursor-pointer font-medium">
                            <option value="">Semua Jenis</option>
                            <option value="Mahasiswa" <?= ($filters['jenis_terlapor'] ?? '') == 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                            <option value="Dosen" <?= ($filters['jenis_terlapor'] ?? '') == 'Dosen' ? 'selected' : '' ?>>Dosen</option>
                            <option value="Tendik" <?= ($filters['jenis_terlapor'] ?? '') == 'Tendik' ? 'selected' : '' ?>>Tendik</option>
                            <option value="Lainnya" <?= ($filters['jenis_terlapor'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-tighter mb-2 ml-1">Program Studi</label>
                    <div class="relative">
                        <select name="prodi"
                            class="w-full pl-4 pr-10 py-2.5 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-200 focus:outline-none focus:border-primary appearance-none cursor-pointer font-medium">
                            <option value="">Semua Prodi</option>
                            <?php foreach ($prodis as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= ($filters['prodi'] ?? '') == $p['id'] ? 'selected' : '' ?>>
                                    <?= $p['nm_prodi'] ?? $p['nama'] ?? 'Prodi ' . $p['id'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="lg:col-span-3 flex items-end gap-2">
                    <div class="flex-1">
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-tighter mb-2 ml-1">Tanggal</label>
                        <input type="date" name="tanggal" value="<?= $filters['tanggal'] ?? '' ?>"
                            class="w-full px-4 py-[9px] bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-700 dark:text-slate-200 focus:outline-none focus:border-primary font-medium">
                    </div>
                    <button type="submit"
                        class="px-4 py-2.5 bg-primary text-white rounded-xl hover:bg-primary-dark transition-all shadow-md shadow-primary/20">
                        <span class="material-icons text-xl">filter_list</span>
                    </button>
                    <a href="<?= base_url('admin/arsip') ?>"
                        class="px-4 py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-600 transition-all">
                        <span class="material-icons text-xl">refresh</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[1000px]">
            <thead class="bg-slate-100/50 dark:bg-slate-900/50 text-slate-500 dark:text-slate-400 text-[10px] uppercase font-bold tracking-widest">
                <tr>
                    <th class="p-5 w-12 text-center">No</th>
                    <th class="p-5 w-32">Referensi</th>
                    <th class="p-5">Waktu Masuk</th>
                    <th class="p-5">Pelapor</th>
                    <th class="p-5">Kategori Pelanggaran</th>
                    <th class="p-5">Pihak Terlapor</th>
                    <th class="p-5 w-32">Status</th>
                    <th class="p-5 w-20 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-700 text-sm">
                <?php if (!empty($reports)): ?>
                    <?php
                    $currentPage = $pager->getCurrentPage('default');
                    $perPage = 10;
                    $startIndex = ($currentPage - 1) * $perPage;
                    ?>
                    <?php foreach ($reports as $index => $row): ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors">
                            <td class="p-5 text-center font-bold text-slate-400"><?= $startIndex + $index + 1 ?></td>
                            <td class="p-5">
                                <span class="font-mono font-bold text-primary text-xs bg-primary/10 px-2 py-1 rounded-md">#<?= $row['referensi_pengaduan'] ?></span>
                            </td>
                            <td class="p-5">
                                <div class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                                    <?= date('d M Y', strtotime($row['created_at'])) ?>
                                </div>
                                <div class="text-[10px] text-slate-400 font-bold uppercase mt-0.5">
                                    <?= date('H:i', strtotime($row['created_at'])) ?> WIB
                                </div>
                            </td>
                            <td class="p-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-slate-200 flex-shrink-0 relative overflow-hidden shadow-sm">
                                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($row['pelapor_nama'] ?? 'User') ?>&background=<?= $row['pelapor_identitas'] == 'anonim' ? 'cbd5e1' : '0d968b' ?>&color=fff&size=100"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white line-clamp-1">
                                            <?= $row['pelapor_identitas'] == 'anonim' ? 'Anonim' : ($row['pelapor_nama'] ?? '-') ?>
                                        </p>
                                        <p class="text-[10px] text-primary font-bold uppercase"><?= $row['nm_prodi'] ?? '-' ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-5">
                                <?php
                                $cat_colors = [
                                    'sarana prasarana' => 'bg-orange-100/50 text-orange-600 border-orange-200/50',
                                    'akademik' => 'bg-indigo-100/50 text-indigo-600 border-indigo-200/50',
                                    'kemahasiswaan' => 'bg-emerald-100/50 text-emerald-600 border-emerald-200/50',
                                    'keuangan' => 'bg-rose-100/50 text-rose-600 border-rose-200/50'
                                ];
                                $cat_key = strtolower($row['kategori_text'] ?? '');
                                $cat_style = $cat_colors[$cat_key] ?? 'bg-slate-100 text-slate-600 border-slate-200';
                                ?>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl <?= $cat_style ?> text-[11px] font-bold border">
                                    <span class="material-icons text-xs">label</span>
                                    <?= $row['kategori_text'] ?? 'Umum' ?>
                                </span>
                            </td>
                            <td class="p-5">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-[10px] uppercase font-black tracking-wider text-slate-400">
                                            <?= $row['terlapor_jenis'] ?>
                                        </span>
                                    </div>
                                    <p class="font-bold text-slate-800 dark:text-white leading-tight">
                                        <?= $row['terlapor_nama'] ?>
                                    </p>
                                </div>
                            </td>
                            <td class="p-5">
                                <?php
                                $status_map = [
                                    'selesai' => ['bg' => 'bg-green-100 text-green-700', 'dot' => 'bg-green-500'],
                                    'ditolak' => ['bg' => 'bg-red-100 text-red-700', 'dot' => 'bg-red-500'],
                                ];
                                $st = strtolower($row['status_tindakan'] ?? '');
                                $curr_stat = $status_map[$st] ?? ['bg' => 'bg-slate-100 text-slate-700', 'dot' => 'bg-slate-500'];
                                ?>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full <?= $curr_stat['bg'] ?> text-[11px] font-bold">
                                    <span class="w-2 h-2 rounded-full <?= $curr_stat['dot'] ?>"></span>
                                    <?= $row['status_tindakan'] ?>
                                </span>
                            </td>
                            <td class="p-5 text-center">
                                <a href="<?= base_url('admin/laporan-detail/' . $row['id']) ?>"
                                    class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-white hover:bg-primary rounded-2xl transition-all shadow-sm group mx-auto">
                                    <span class="material-icons group-hover:scale-110 transition-transform">visibility</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="p-10 text-center">
                            <div class="flex flex-col items-center justify-center text-slate-400">
                                <span class="material-icons text-5xl mb-2 text-slate-200">archive</span>
                                <p class="font-bold uppercase tracking-widest text-xs">Belum ada laporan di arsip</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination Section -->
    <div class="p-6 border-t border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-6">
        <div class="text-xs font-bold text-slate-500 uppercase tracking-widest text-center sm:text-left">
            Menampilkan <span class="text-slate-800 dark:text-white"><?= count($reports) ?></span> dari <span
                class="text-slate-800 dark:text-white"><?= $pager->getTotal('default') ?></span> Total Arsip
        </div>

        <div class="flex items-center gap-2">
            <?= $pager->links('default', 'tailwind_pager') ?>
        </div>
    </div>
</div>

<style>
    /* Custom Thin Scrollbar for table */
    ::-webkit-scrollbar {
        height: 6px;
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(13, 150, 139, 0.2);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(13, 150, 139, 0.4);
    }
</style>

<?= $this->endSection() ?>
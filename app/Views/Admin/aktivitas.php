<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>

<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800 dark:text-white mb-1 tracking-tight">Log Aktivitas
            Sistem</h1>
        <p class="text-sm text-slate-600 dark:text-slate-400">Riwayat lengkap seluruh tindakan admin terhadap laporan
        </p>
    </div>
    <div class="flex items-center gap-3">
        <div
            class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 py-2 rounded-xl shadow-sm flex items-center gap-2">
            <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
            <span class="text-xs font-semibold text-slate-700 dark:text-slate-200 uppercase tracking-wider">Live
                Logs</span>
        </div>
    </div>
</div>

<!-- Activity Timeline Container -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
    <div
        class="p-6 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between bg-slate-50/50 dark:bg-slate-900/20">
        <h2 class="font-bold text-slate-800 dark:text-white flex items-center gap-2">
            <span class="material-icons text-primary">history</span>
            Timeline Riwayat
        </h2>
        <span class="text-xs font-medium text-slate-500">Menampilkan 15 aktivitas terbaru per halaman</span>
    </div>

    <div class="p-6">
        <div
            class="relative space-y-8 before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 before:to-transparent dark:before:via-slate-700">

            <?php if (!empty($activities)): ?>
                <?php foreach ($activities as $activity): ?>
                    <!-- Activity Item -->
                    <div
                        class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                        <!-- Icon Dot -->
                        <div
                            class="flex items-center justify-center w-10 h-10 rounded-full border border-white dark:border-slate-800 shadow shadow-slate-300 dark:shadow-slate-900 shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 
                            <?= strpos($activity['status_sesudahnya'], 'Selesai') !== false ? 'bg-emerald-500 text-white' :
                                (strpos($activity['status_sesudahnya'], 'Diproses') !== false ? 'bg-amber-500 text-white' :
                                    (strpos($activity['status_sesudahnya'], 'Dibaca') !== false ? 'bg-blue-500 text-white' : 'bg-primary text-white')) ?>">
                            <span class="material-icons text-lg">
                                <?= strpos($activity['status_sesudahnya'], 'Selesai') !== false ? 'check_circle' :
                                    (strpos($activity['status_sesudahnya'], 'Diproses') !== false ? 'sync' :
                                        (strpos($activity['status_sesudahnya'], 'Dibaca') !== false ? 'visibility' : 'history')) ?>
                            </span>
                        </div>

                        <!-- Content Card -->
                        <div
                            class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 shadow-sm hover:shadow-md transition-shadow group-hover:border-primary/30">
                            <div class="flex items-center justify-between space-x-2 mb-1">
                                <div class="font-bold text-slate-800 dark:text-white">
                                    <?= $activity['status_sesudahnya'] ?>
                                </div>
                                <time
                                    class="font-medium text-xs text-primary bg-primary/10 px-2 py-0.5 rounded-full whitespace-nowrap">
                                    <?= date('d M Y, H:i', strtotime($activity['created_at'])) ?>
                                </time>
                            </div>
                            <div class="text-sm text-slate-600 dark:text-slate-400 mb-3">
                                <a href="<?= base_url('admin/laporan-detail/' . $activity['pengaduan_id']) ?>"
                                    class="font-bold text-primary hover:underline">#
                                    <?= $activity['referensi_pengaduan'] ?>
                                </a>
                                -
                                <?= $activity['catatan'] ?: 'Update status laporan' ?>
                            </div>
                            <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-800">
                                <div
                                    class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center overflow-hidden">
                                    <span class="material-icons text-xs text-slate-500">person</span>
                                </div>
                                <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">Admin:
                                    <?= $activity['admin_name'] ?: 'System' ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-20">
                    <div
                        class="w-20 h-20 bg-slate-100 dark:bg-slate-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-icons text-4xl text-slate-300">history_toggle_off</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700 dark:text-slate-300">Belum Ada Aktivitas</h3>
                    <p class="text-sm text-slate-500 max-w-xs mx-auto">Seluruh tindakan admin terhadap laporan akan tercatat
                        secara otomatis di sini.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <!-- Pagination -->
    <?php if ($pager): ?>
        <div class="p-6 bg-slate-50/50 dark:bg-slate-900/20 border-t border-slate-200 dark:border-slate-700">
            <?= $pager->links('default', 'tailwind_pager') ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
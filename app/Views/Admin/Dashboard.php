<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>

<!-- Dashboard Header -->
<div
    class="mb-8 relative overflow-hidden bg-white/40 backdrop-blur-md rounded-3xl border border-white/40 shadow-sm p-6 lg:p-10">
    <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-emerald-400/5 rounded-full blur-3xl"></div>

    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
        <div class="space-y-2">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-[10px] font-bold uppercase tracking-widest">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Administrator System
            </div>
            <h1 class="text-3xl lg:text-4xl font-black text-slate-900 dark:text-white tracking-tight">
                <span id="greeting" class="text-primary">Selamat Datang</span>, <?= session()->get('username') ?>!
            </h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 font-medium leading-relaxed max-w-xl">
                Senang melihat Anda kembali. Pantau semua aspirasi dan laporan civitas akademika dalam satu dashboard
                terpusat.
            </p>
        </div>
        <!-- Export Data removed -->
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 mb-8">
    <!-- Card 1: Total Laporan -->
    <a href="<?= base_url('admin/laporan-masuk') ?>"
        class="group relative overflow-hidden bg-gradient-to-br from-[#4f46e5] via-[#6366f1] to-[#818cf8] rounded-[2rem] shadow-xl shadow-indigo-200/50 hover:shadow-2xl hover:shadow-indigo-300/60 transition-all duration-500 hover:-translate-y-2">
        <div class="relative p-6">
            <div class="flex items-start justify-between mb-5">
                <div
                    class="w-11 h-11 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform duration-500">
                    <span class="material-icons text-white text-2xl">inbox</span>
                </div>
                <div class="px-3 py-1 bg-white/20 rounded-full">
                    <span class="text-[9px] font-black text-white uppercase tracking-widest">Database</span>
                </div>
            </div>
            <div class="space-y-0.5">
                <h3 class="text-3xl font-black text-white leading-none tracking-tight">
                    <?= number_format($stats['total'] ?? 1) ?></h3>
                    <p class="text-[10px] font-bold text-white/70 uppercase tracking-widest">Total Laporan</p>
            </div>
            <div class="mt-5 pt-4 border-t border-white/10 grid grid-cols-2 gap-4">
                <div class="space-y-0.5">
                    <p class="text-[9px] text-white/60 font-bold uppercase tracking-tighter">Anonim</p>
                    <p class="text-xs font-bold text-white"><?= $stats['anonim'] ?? 0 ?></p>
                </div>
                <div class="space-y-0.5">
                    <p class="text-[9px] text-white/60 font-bold uppercase tracking-tighter">Identitas</p>
                    <p class="text-xs font-bold text-white"><?= $stats['identitas'] ?? 0 ?></p>
                </div>
            </div>
        </div>
    </a>

    <!-- Card 2: Laporan Baru -->
    <a href="<?= base_url('admin/laporan-masuk?status=0') ?>"
        class="group relative overflow-hidden bg-gradient-to-br from-[#f59e0b] via-[#f97316] to-[#ea580c] rounded-[2rem] shadow-xl shadow-orange-200/50 hover:shadow-2xl hover:shadow-orange-300/60 transition-all duration-500 hover:-translate-y-2">
        <div class="relative p-6">
            <div class="flex items-start justify-between mb-5">
                <div
                    class="w-11 h-11 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform duration-500">
                    <span class="material-icons text-white text-2xl">notification_important</span>
                </div>
                <div class="px-3 py-1 bg-white/20 rounded-full animate-pulse">
                    <span class="text-[9px] font-black text-white uppercase tracking-widest">Priority</span>
                </div>
            </div>
            <div class="space-y-0.5">
                <h3 class="text-3xl font-black text-white leading-none tracking-tight">
                    <?= number_format($stats['baru'] ?? 0) ?></h3>
                    <p class="text-[10px] font-bold text-white/70 uppercase tracking-widest">Laporan Baru</p>
            </div>
            <div class="mt-5 pt-4 border-t border-white/10">
                <div class="flex items-center gap-2">
                    <div class="flex -space-x-1.5">
                        <div class="w-5 h-5 rounded-full border-2 border-orange-500 bg-orange-400"></div>
                        <div class="w-5 h-5 rounded-full border-2 border-orange-500 bg-orange-300"></div>
                    </div>
                    <p class="text-[10px] font-bold text-white/90 underline decoration-white/30 underline-offset-4">
                        Tindakan Segera</p>
                </div>
            </div>
        </div>
    </a>

    <!-- Card 3: Diproses -->
    <a href="<?= base_url('admin/laporan-masuk?status=Diproses') ?>"
        class="group relative overflow-hidden bg-gradient-to-br from-[#0d9488] via-[#0D9488] to-[#14b8a6] rounded-[2rem] shadow-xl shadow-teal-200/50 hover:shadow-2xl hover:shadow-teal-300/60 transition-all duration-500 hover:-translate-y-2">
        <div class="relative p-6">
            <div class="flex items-start justify-between mb-5">
                <div
                    class="w-11 h-11 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform duration-500">
                    <span class="material-icons text-white text-2xl">published_with_changes</span>
                </div>
                <div class="px-3 py-1 bg-white/20 rounded-full">
                    <span class="text-[9px] font-black text-white uppercase tracking-widest">Active</span>
                </div>
            </div>
            <div class="space-y-0.5">
                <h3 class="text-3xl font-black text-white leading-none tracking-tight">
                    <?= number_format($stats['diproses'] ?? 0) ?></h3>
                    <p class="text-[10px] font-bold text-white/70 uppercase tracking-widest">Sedang Diproses</p>
            </div>
            <div class="mt-5 pt-4 border-t border-white/10 flex items-center justify-between">
                <div class="flex items-center gap-2 text-white/80">
                    <span class="material-icons text-[10px]">analytics</span>
                    <span class="text-[9px] font-bold uppercase tracking-tight">Investigasi Berjalan</span>
                </div>
                <span class="material-icons text-white/50 text-xs">trending_up</span>
            </div>
        </div>
    </a>

    <!-- Card 4: Selesai -->
    <a href="<?= base_url('admin/laporan-masuk?status=Selesai') ?>"
        class="group relative overflow-hidden bg-gradient-to-br from-[#059669] via-[#10b981] to-[#34d399] rounded-[2rem] shadow-xl shadow-emerald-200/50 hover:shadow-2xl hover:shadow-emerald-300/60 transition-all duration-500 hover:-translate-y-2">
        <div class="relative p-6">
            <div class="flex items-start justify-between mb-5">
                <div
                    class="w-11 h-11 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform duration-500">
                    <span class="material-icons text-white text-2xl">task_alt</span>
                </div>
                <div class="px-3 py-1 bg-white/20 rounded-full">
                    <span class="text-[9px] font-black text-white uppercase tracking-widest">Success</span>
                </div>
            </div>
            <div class="space-y-0.5">
                <h3 class="text-3xl font-black text-white leading-none tracking-tight">
                    <?= number_format($stats['selesai'] ?? 0) ?></h3>
                    <p class="text-[10px] font-bold text-white/70 uppercase tracking-widest">Telah Selesai</p>
            </div>
            <div class="mt-5 pt-3">
                <?php $rate = ($stats['total'] ?? 0) > 0 ? ROUND(($stats['selesai'] ?? 0) / $stats['total'] * 100) : 0; ?>
                <div
                    class="flex items-center justify-between text-[9px] text-white font-black uppercase tracking-widest mb-1.5">
                    <span>Performance</span>
                    <span><?= $rate ?>%</span>
                </div>
                <div class="h-1.5 w-full bg-white/20 rounded-full overflow-hidden shadow-inner">
                    <div class="h-full bg-white rounded-full transition-all duration-1000 ease-out"
                        style="width: <?= $rate ?>%"></div>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Charts & Activity Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    <!-- Chart Section -->
    <div
        class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 p-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                    <span class="material-icons">bar_chart</span>
                </div>
                <div>
                    <h2 class="text-xl font-black text-slate-800 dark:text-white leading-tight">Insight Laporan</h2>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Tren Mingguan & Bulanan
                    </p>
                </div>
            </div>
            <div class="inline-flex p-1.5 bg-slate-100 dark:bg-slate-900 rounded-2xl">
                <button id="btn7Days"
                    class="px-5 py-2 text-xs font-black uppercase tracking-wider bg-white dark:bg-slate-800 text-primary shadow-sm rounded-xl transition-all duration-300">7
                    Hari</button>
                <button id="btn30Days"
                    class="px-5 py-2 text-xs font-black uppercase tracking-wider text-slate-500 hover:text-slate-700 dark:text-slate-400 rounded-xl transition-all duration-300">30
                    Hari</button>
            </div>
        </div>

        <!-- Chart Container -->
        <div class="h-80 relative">
            <canvas id="statsChart"></canvas>
        </div>
    </div>

    <!-- Activity Timeline -->
    <div
        class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 p-8 flex flex-col">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 bg-accent/10 rounded-2xl flex items-center justify-center text-teal-600">
                <span class="material-icons">history_toggle_off</span>
            </div>
            <div>
                <h2 class="text-xl font-black text-slate-800 dark:text-white leading-tight">Aktivitas</h2>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Live Feed Log</p>
            </div>
        </div>

        <div class="flex-1 space-y-6 overflow-y-auto max-h-[400px] pr-2 custom-scrollbar">
            <?php if (!empty($recent_activities)): ?>
                <?php foreach ($recent_activities as $activity): ?>
                    <a href="<?= base_url('admin/laporan-detail/' . $activity['pengaduan_id']) ?>"
                        class="flex gap-4 relative group/item">
                        <div class="flex-shrink-0 relative">
                            <div
                                class="absolute inset-0 bg-primary/20 rounded-full blur-md opacity-0 group-hover/item:opacity-100 transition-opacity">
                            </div>
                            <?php
                            $stAct = $activity['status_sesudahnya'] ?? '';
                            $actConfig = [
                                'Selesai' => ['bg' => 'bg-emerald-500', 'ic' => 'verified'],
                                'Diproses' => ['bg' => 'bg-amber-500', 'ic' => 'sync'],
                                'Dibaca' => ['bg' => 'bg-blue-500', 'ic' => 'visibility'],
                                'default' => ['bg' => 'bg-primary', 'ic' => 'history']
                            ];
                            $curA = $actConfig['default'];
                            foreach ($actConfig as $k => $v) {
                                if ($k !== 'default' && strpos($stAct, $k) !== false) {
                                    $curA = $v;
                                    break;
                                }
                            }
                            ?>
                            <div
                                class="w-12 h-12 rounded-2xl flex items-center justify-center z-10 relative shadow-sm border-2 border-white dark:border-slate-700 transition-transform group-hover/item:scale-110 <?= $curA['bg'] ?> text-white">
                                <span class="material-icons text-xl"><?= $curA['ic'] ?></span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 pt-1">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <p class="text-sm font-black text-slate-800 dark:text-white truncate">
                                    <?= $activity['status_sesudahnya'] ?>
                                </p>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">
                                    <?= date('H:i', strtotime($activity['created_at'])) ?>
                                </span>
                            </div>
                            <p class="text-xs font-medium text-slate-500 dark:text-slate-400 line-clamp-1">
                                <span
                                    class="bg-primary/10 text-primary px-1.5 py-0.5 rounded-md font-bold mr-1">#<?= $activity['referensi_pengaduan'] ?></span>
                                <?= $activity['catatan'] ?: 'Update status laporan' ?>
                            </p>
                            <p
                                class="text-[10px] text-slate-400 font-bold mt-2 uppercase tracking-widest flex items-center gap-1">
                                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                BY <?= $activity['admin_name'] ?: 'System' ?>
                            </p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-12">
                    <div
                        class="w-16 h-16 bg-slate-50 dark:bg-slate-900 rounded-3xl flex items-center justify-center mx-auto mb-4">
                        <span class="material-icons text-slate-300 text-3xl">cloud_off</span>
                    </div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">No Activity Yet</p>
                </div>
            <?php endif; ?>
        </div>

        <a href="<?= base_url('admin/aktivitas') ?>"
            class="mt-8 flex items-center justify-center gap-2 group/btn py-4 rounded-2xl bg-slate-50 dark:bg-slate-900 hover:bg-primary transition-all duration-300">
            <span
                class="text-xs font-black uppercase tracking-widest text-slate-500 group-hover/btn:text-white transition-colors">Semua
                History</span>
            <span
                class="material-icons text-sm text-slate-400 group-hover/btn:text-white transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
        </a>
    </div>
</div>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Dynamic Greeting via jQuery
        const hour = new Date().getHours();
        let greeting = "Selamat Malam";
        if (hour >= 5 && hour < 11) greeting = "Selamat Pagi";
        else if (hour >= 11 && hour < 15) greeting = "Selamat Siang";
        else if (hour >= 15 && hour < 18) greeting = "Selamat Sore";
        $('#greeting').text(greeting);

        const ctx = document.getElementById('statsChart').getContext('2d');
        const btn7Days = document.getElementById('btn7Days');
        const btn30Days = document.getElementById('btn30Days');

        // Data from server
        const chartData = <?= json_encode($chart_data) ?>;

        // Create gradient
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(13, 150, 139, 0.4)');
        gradient.addColorStop(1, 'rgba(13, 150, 139, 0)');

        const statsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.seven_days.labels,
                datasets: [{
                    label: 'Jumlah Laporan',
                    data: chartData.seven_days.data,
                    borderColor: '#4f46e5', // Indigo
                    borderWidth: 4,
                    backgroundColor: (context) => {
                        const chart = context.chart;
                        const { ctx, chartArea } = chart;
                        if (!chartArea) return null;
                        const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                        gradient.addColorStop(0, 'rgba(79, 70, 229, 0.25)');
                        gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');
                        return gradient;
                    },
                    fill: true,
                    tension: 0.45,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#4f46e5',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#4f46e5',
                    pointHoverBorderColor: '#ffffff',
                    pointHoverBorderWidth: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        top: 10,
                        bottom: 0,
                        left: 0,
                        right: 10
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleColor: '#94a3b8',
                        titleFont: { size: 10, family: 'Plus Jakarta Sans', weight: 'bold' },
                        bodyColor: '#ffffff',
                        bodyFont: { size: 14, family: 'Plus Jakarta Sans', weight: '900' },
                        padding: 16,
                        cornerRadius: 16,
                        displayColors: false,
                        callbacks: {
                            label: function (context) {
                                return context.parsed.y + ' Laporan';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(226, 232, 240, 0.4)',
                            borderDash: [5, 5]
                        },
                        ticks: {
                            stepSize: 1,
                            padding: 10,
                            color: '#94a3b8',
                            font: { size: 11, family: 'Plus Jakarta Sans', weight: 'bold' }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            padding: 10,
                            color: '#94a3b8',
                            font: { size: 11, family: 'Plus Jakarta Sans', weight: 'bold' }
                        }
                    }
                }
            }
        });

        const activeClass = ['bg-white', 'dark:bg-slate-800', 'text-primary', 'shadow-sm'];
        const inactiveClass = ['text-slate-500', 'hover:text-slate-700', 'dark:text-slate-400'];

        function updateChart(period) {
            const data = period === '7' ? chartData.seven_days : chartData.thirty_days;

            statsChart.data.labels = data.labels;
            statsChart.data.datasets[0].data = data.data;
            statsChart.update();

            // UI Update
            if (period === '7') {
                btn7Days.classList.add(...activeClass);
                btn7Days.classList.remove(...inactiveClass);
                btn30Days.classList.remove(...activeClass);
                btn30Days.classList.add(...inactiveClass);
            } else {
                btn30Days.classList.add(...activeClass);
                btn30Days.classList.remove(...inactiveClass);
                btn7Days.classList.remove(...activeClass);
                btn7Days.classList.add(...inactiveClass);
            }
        }

        btn7Days.addEventListener('click', () => updateChart('7'));
        btn30Days.addEventListener('click', () => updateChart('30'));
    });
</script>
<?= $this->endSection() ?>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #334155;
    }
</style>

<!-- Bottom Section: Recent Reports & Quick Stats -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-10">
    <!-- Recent Reports Table -->
    <div
        class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 overflow-hidden flex flex-col">
        <div class="p-8 border-b border-slate-50 dark:border-slate-700 bg-slate-50/30">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-indigo-50 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600">
                        <span class="material-icons">list_alt</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-800 dark:text-white leading-tight">Laporan Terbaru</h2>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Queue Management</p>
                    </div>
                </div>
                <a href="<?= base_url('admin/laporan-masuk') ?>"
                    class="hidden sm:flex items-center gap-2 group/btn px-6 py-3 bg-primary text-white rounded-2xl hover:shadow-lg hover:shadow-primary/30 transition-all duration-300">
                    <span class="text-xs font-black uppercase tracking-widest">Lihat Semua</span>
                    <span
                        class="material-icons text-sm transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
                </a>
            </div>
        </div>

        <div class="flex-1 overflow-x-auto custom-scrollbar">
            <table class="w-full text-left min-w-[700px]">
                <thead>
                    <tr
                        class="text-[10px] uppercase font-black text-slate-400 tracking-[0.2em] border-b border-slate-50 dark:border-slate-700">
                        <th class="px-8 py-6">Reference ID</th>
                        <th class="px-8 py-6">Informant</th>
                        <th class="px-8 py-6 text-center">Status</th>
                        <th class="px-8 py-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-slate-700/50">
                    <?php if (!empty($recent_reports)): ?>
                        <?php foreach ($recent_reports as $report): ?>
                            <tr class="group hover:bg-slate-50/80 dark:hover:bg-slate-700/40 transition-all duration-300">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-slate-50 dark:bg-slate-900 flex items-center justify-center text-slate-400 group-hover:bg-primary/10 group-hover:text-primary transition-colors">
                                            <span class="material-icons text-xl">tag</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-slate-900 dark:text-white">
                                                <?= $report['referensi_pengaduan'] ?>
                                            </p>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase">
                                                <?= date('d M Y', strtotime($report['created_at'])) ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="relative">
                                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($report['pelapor_nama'] ?? 'User') ?>&background=<?= $report['pelapor_identitas'] == 'anonim' ? 'e2e8f0' : '0d968b' ?>&color=fff&bold=true&size=100"
                                                class="w-10 h-10 rounded-2xl shadow-sm border-2 border-white dark:border-slate-700">
                                            <?php if ($report['pelapor_identitas'] == 'anonim'): ?>
                                                <div
                                                    class="absolute -top-1 -right-1 w-4 h-4 bg-slate-400 rounded-full border-2 border-white flex items-center justify-center">
                                                    <span class="material-icons text-[10px] text-white">hide_source</span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-slate-800 dark:text-white">
                                                <?= $report['pelapor_identitas'] == 'anonim' ? 'Anonim' : ($report['pelapor_nama'] ?? '-') ?>
                                            </p>
                                            <p
                                                class="text-[10px] font-bold text-teal-600 dark:text-teal-400 uppercase tracking-tighter">
                                                <?= $report['kategori_text'] ?: 'Kategori Umum' ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-center">
                                    <?php
                                    $st = strtolower($report['status_tindakan'] ?? '0');
                                    $map = [
                                        '0' => ['bg' => 'bg-blue-500/10 text-blue-600', 'label' => 'Menunggu'],
                                        'diproses' => ['bg' => 'bg-amber-500/10 text-amber-600', 'label' => 'Diproses'],
                                        'selesai' => ['bg' => 'bg-emerald-500/10 text-emerald-600', 'label' => 'Resolved'],
                                        'dibaca' => ['bg' => 'bg-slate-500/10 text-slate-500', 'label' => 'Dibaca'],
                                    ];
                                    $cur = $map[$st] ?? $map['0'];
                                    ?>
                                    <span
                                        class="inline-flex items-center px-4 py-1.5 rounded-xl <?= $cur['bg'] ?> text-[10px] font-black uppercase tracking-widest shadow-sm">
                                        <?= $cur['label'] ?>
                                    </span>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-center">
                                    <a href="<?= base_url('admin/laporan-detail/' . $report['id']) ?>"
                                        class="inline-flex items-center justify-center w-10 h-10 bg-slate-50 dark:bg-slate-900 text-slate-400 rounded-2xl hover:bg-primary hover:text-white hover:scale-110 active:scale-95 transition-all duration-300">
                                        <span class="material-icons text-xl">visibility</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Empty state handled above -->
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Stats & Actions -->
    <div class="space-y-8">
        <!-- Category Distribution -->
        <div
            class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 p-8">
            <div class="flex items-center gap-4 mb-8">
                <div
                    class="w-12 h-12 bg-orange-50 dark:bg-orange-900/30 rounded-2xl flex items-center justify-center text-orange-600">
                    <span class="material-icons">donut_large</span>
                </div>
                <div>
                    <h2 class="text-xl font-black text-slate-800 dark:text-white leading-tight">Mapele</h2>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Distribusi Isu</p>
                </div>
            </div>

            <div class="space-y-6">
                <?php if (!empty($popular_categories)): ?>
                    <?php
                    $colors = [
                        'bg-indigo-500 shadow-indigo-200',
                        'bg-emerald-500 shadow-emerald-200',
                        'bg-amber-500 shadow-amber-200'
                    ];
                    foreach ($popular_categories as $idx => $cat):
                        $colorClass = $colors[$idx] ?? $colors[0];
                        ?>
                        <div class="group">
                            <div
                                class="flex items-center justify-between mb-3 text-sm font-black text-slate-700 dark:text-slate-300">
                                <span
                                    class="group-hover:text-primary transition-colors"><?= $cat['kategori_text'] ?: 'Umum' ?></span>
                                <span
                                    class="bg-slate-50 dark:bg-slate-900 px-2 py-1 rounded-lg border border-slate-100 dark:border-slate-700 text-xs text-primary"><?= $cat['percentage'] ?>%</span>
                            </div>
                            <div
                                class="w-full bg-slate-50 dark:bg-slate-900 rounded-full h-3 overflow-hidden shadow-inner border border-slate-100 dark:border-slate-700">
                                <div class="<?= $colorClass ?> h-full rounded-full transition-all duration-1000 ease-out shadow-sm"
                                    style="width: <?= $cat['percentage'] ?>%">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-8">
                        <span class="material-icons text-slate-200 text-4xl mb-2">data_exploration</span>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-relaxed px-4">
                            Belum Ada Data Kategori</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="relative group bg-slate-900 dark:bg-black rounded-[2.5rem] shadow-2xl p-8 overflow-hidden">
            <div
                class="absolute inset-0 bg-gradient-to-br from-primary/20 via-transparent to-accent/10 pointer-events-none">
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-white">
                        <span class="material-icons">rocket_launch</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-white leading-tight">Shortcuts</h2>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Akses Prioritas</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <a href="<?= base_url('admin/kategori') ?>"
                        class="flex items-center gap-4 p-5 bg-white/5 border border-white/5 rounded-2xl hover:bg-white/10 active:scale-95 transition-all duration-300 group/link">
                        <div
                            class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400">
                            <span class="material-icons">style</span>
                        </div>
                        <span
                            class="text-sm font-black text-slate-300 group-hover/link:text-white transition-colors">Tipe
                            Kategori</span>
                        <span
                            class="material-icons text-slate-600 ml-auto group-hover/link:translate-x-1 transition-transform">east</span>
                    </a>
                    <a href="<?= base_url('admin/users') ?>"
                        class="flex items-center gap-4 p-5 bg-white/5 border border-white/5 rounded-2xl hover:bg-white/10 active:scale-95 transition-all duration-300 group/link">
                        <div
                            class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                            <span class="material-icons">shield_person</span>
                        </div>
                        <span
                            class="text-sm font-black text-slate-300 group-hover/link:text-white transition-colors">Otoritas
                            Admin</span>
                        <span
                            class="material-icons text-slate-600 ml-auto group-hover/link:translate-x-1 transition-transform">east</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
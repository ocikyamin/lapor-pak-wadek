<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>

<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800 dark:text-white mb-1 tracking-tight">Manajemen Kategori
        </h1>
        <p class="text-sm text-slate-600 dark:text-slate-400">Kelola kategori pelanggaran atau pengaduan sistem</p>
    </div>
    <button onclick="openModal('add')"
        class="flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white rounded-2xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all transform hover:-translate-y-1 active:scale-95 font-bold">
        <span class="material-icons">add_circle</span>
        Tambah Kategori
    </button>
</div>

<!-- Table Section -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
    <div class="p-6 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
        <h2 class="font-bold text-slate-800 dark:text-white flex items-center gap-2">
            <span class="material-icons text-primary">category</span>
            Daftar Kategori
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead
                class="bg-slate-50 dark:bg-slate-900/50 text-slate-500 dark:text-slate-400 text-[10px] uppercase font-bold tracking-widest border-b border-slate-200 dark:border-slate-700">
                <tr>
                    <th class="p-5 w-20 text-center">No</th>
                    <th class="p-5">Nama Kategori</th>
                    <th class="p-5 w-40 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $index => $cat): ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors group">
                            <td class="p-5 text-center font-bold text-slate-400"><?= $index + 1 ?></td>
                            <td class="p-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                                        <span class="material-icons">label</span>
                                    </div>
                                    <span
                                        class="font-bold text-slate-700 dark:text-slate-200 group-hover:text-primary transition-colors"><?= $cat['kategori'] ?></span>
                                </div>
                            </td>
                            <td class="p-5">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openModal('edit', <?= $cat['id'] ?>, '<?= esc($cat['kategori'], 'js') ?>')"
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-600 hover:bg-amber-500 hover:text-white transition-all shadow-sm">
                                        <span class="material-icons text-lg">edit</span>
                                    </button>
                                    <button onclick="deleteKategori(<?= $cat['id'] ?>, '<?= esc($cat['kategori'], 'js') ?>')"
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-rose-50 dark:bg-rose-900/20 text-rose-600 hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                        <span class="material-icons text-lg">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="p-20 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div
                                    class="w-20 h-20 bg-slate-50 dark:bg-slate-900 rounded-full flex items-center justify-center text-slate-200">
                                    <span class="material-icons text-5xl">category</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-600 dark:text-slate-400 uppercase tracking-widest">
                                    Belum Ada Kategori</h3>
                                <p class="text-sm text-slate-400">Klik tombol "Tambah Kategori" untuk mulai mengisi data.
                                </p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Form -->
<div id="kategoriModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="flex min-h-full items-center justify-center p-4 sm:p-6 text-center">
        <div
            class="relative w-full max-w-lg transform overflow-hidden rounded-3xl bg-white dark:bg-slate-800 p-8 text-left shadow-2xl transition-all border border-slate-200 dark:border-slate-700">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-inner">
                        <span id="modalIcon" class="material-icons">add_box</span>
                    </div>
                    <div>
                        <h3 id="modalTitle" class="text-xl font-black text-slate-800 dark:text-white tracking-tight">
                            Tambah Kategori</h3>
                        <p class="text-xs text-slate-500 font-bold uppercase tracking-widest">Formulir Data Kategori</p>
                    </div>
                </div>
                <button onclick="closeModal()"
                    class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>

            <!-- Body -->
            <form id="kategoriForm">
                <input type="hidden" id="kategoriId" name="id">
                <div class="space-y-6">
                    <div class="relative group">
                        <label for="kategoriName"
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama
                            Kategori</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-icons text-xl">label</span>
                            </span>
                            <input type="text" id="kategoriName" name="kategori"
                                class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-semibold dark:text-white"
                                placeholder="Contoh: Sarana & Prasarana" required>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-10 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeModal()"
                        class="px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 transition-colors uppercase tracking-widest">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-8 py-3 bg-primary text-white rounded-2xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all transform hover:-translate-y-1 active:scale-95 font-bold uppercase tracking-tight">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Notiflix -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/src/notiflix.min.css">
<script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-aio-3.2.6.min.js"></script>

<script>
    // Notiflix Init
    Notiflix.Notify.init({
        width: '300px',
        position: 'right-top',
        distance: '20px',
        opacity: 1,
        borderRadius: '15px',
        fontFamily: 'Poppins',
        fontSize: '13px',
        showOnlyTheLastOne: true,
        fontAwesomeIconSize: '20px',
        fontAwesomeIconStyle: 'shadow',
        cssAnimationStyle: 'from-right',
        useIcon: true,
    });

    Notiflix.Confirm.init({
        className: 'notiflix-confirm',
        width: '350px',
        distance: '20px',
        backgroundColor: '#fff',
        borderRadius: '25px',
        backOverlay: true,
        backOverlayColor: 'rgba(15, 23, 42, 0.6)',
        rtl: false,
        fontFamily: 'Poppins',
        cssAnimation: true,
        cssAnimationDuration: 300,
        cssAnimationStyle: 'fade',
        plainText: true,
        titleColor: '#1e293b',
        titleFontSize: '18px',
        messageColor: '#64748b',
        messageFontSize: '14px',
        buttonsFontSize: '14px',
        okButtonColor: '#fff',
        okButtonBackground: '#f43f5e',
        cancelButtonColor: '#64748b',
        cancelButtonBackground: '#f1f5f9',
    });

    // Modal Logic
    const modal = document.getElementById('kategoriModal');
    const form = document.getElementById('kategoriForm');
    const modalTitle = document.getElementById('modalTitle');
    const modalIcon = document.getElementById('modalIcon');
    const inputId = document.getElementById('kategoriId');
    const inputName = document.getElementById('kategoriName');

    function openModal(type, id = '', name = '') {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        if (type === 'add') {
            modalTitle.innerText = 'Tambah Kategori';
            modalIcon.innerText = 'add_box';
            form.reset();
            inputId.value = '';
        } else {
            modalTitle.innerText = 'Edit Kategori';
            modalIcon.innerText = 'edit';
            inputId.value = id;
            inputName.value = name;
        }
    }

    function closeModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // AJAX CRUD Logic
    $(document).ready(function () {
        $('#kategoriForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#kategoriId').val();
            const url = id ? '<?= base_url('admin/kategori-update') ?>' : '<?= base_url('admin/kategori-save') ?>';

            Notiflix.Loading.pulse('Sedang memproses...');

            $.ajax({
                url: url,
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    Notiflix.Loading.remove();
                    if (response.status === 'success') {
                        Notiflix.Notify.success(response.message);
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        Notiflix.Notify.failure(response.message);
                    }
                },
                error: function (xhr) {
                    Notiflix.Loading.remove();
                    Notiflix.Notify.failure('Terjadi kesalahan sistem. Silakan coba lagi.');
                }
            });
        });
    });

    function deleteKategori(id, name) {
        Notiflix.Confirm.show(
            'Hapus Kategori',
            `Apakah Anda yakin ingin menghapus kategori "${name}"? Tindakan ini tidak dapat dibatalkan.`,
            'Ya, Hapus',
            'Batal',
            function () {
                Notiflix.Loading.pulse('Menghapus...');
                $.ajax({
                    url: '<?= base_url('admin/kategori-delete') ?>',
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        Notiflix.Loading.remove();
                        if (response.status === 'success') {
                            Notiflix.Notify.success(response.message);
                            setTimeout(() => location.reload(), 1000);
                        } else {
                            Notiflix.Notify.failure(response.message);
                        }
                    },
                    error: function (xhr) {
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure('Gagal menghapus kategori. Sesuatu yang salah terjadi.');
                    }
                });
            }
        );
    }
</script>
<?= $this->endSection() ?>
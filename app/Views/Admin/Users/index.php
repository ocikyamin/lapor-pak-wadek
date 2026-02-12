<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>

<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800 dark:text-white mb-1 tracking-tight">Manajemen Pengguna
        </h1>
        <p class="text-sm text-slate-600 dark:text-slate-400">Kelola akses administrator sistem</p>
    </div>
    <button onclick="openModal('add')"
        class="flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white rounded-2xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all transform hover:-translate-y-1 active:scale-95 font-bold">
        <span class="material-icons">person_add</span>
        Tambah Admin
    </button>
</div>

<!-- Table Section -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
    <div class="p-6 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
        <h2 class="font-bold text-slate-800 dark:text-white flex items-center gap-2">
            <span class="material-icons text-primary">manage_accounts</span>
            Daftar Admin
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead
                class="bg-slate-50 dark:bg-slate-900/50 text-slate-500 dark:text-slate-400 text-[10px] uppercase font-bold tracking-widest border-b border-slate-200 dark:border-slate-700">
                <tr>
                    <th class="p-5 w-20 text-center">No</th>
                    <th class="p-5">Informasi Admin</th>
                    <th class="p-5">Username</th>
                    <th class="p-5 text-center">Status</th>
                    <th class="p-5 w-40 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $index => $row): ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors group">
                            <td class="p-5 text-center font-bold text-slate-400">
                                <?= $index + 1 ?>
                            </td>
                            <td class="p-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($row['username']) ?>&background=0d968b&color=fff&size=80"
                                            class="w-full h-full rounded-xl shadow-sm">
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-200 group-hover:text-primary transition-colors">
                                            <?= $row['email'] ?>
                                        </span>
                                        <span
                                            class="text-[10px] text-slate-400 uppercase tracking-widest font-black italic">Administrator</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-5">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-900/50 rounded-lg text-xs font-bold text-slate-600 dark:text-slate-400">@
                                    <?= $row['username'] ?>
                                </span>
                            </td>
                            <td class="p-5 text-center">
                                <?php if ($row['is_active'] == 1): ?>
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-emerald-100 text-emerald-600 text-[10px] font-bold uppercase">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Aktif
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-[10px] font-bold uppercase">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        Nonaktif
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="p-5">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        onclick="openModal('edit', <?= $row['id'] ?>, '<?= esc($row['username'], 'js') ?>', '<?= esc($row['email'], 'js') ?>', <?= $row['is_active'] ?>)"
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-600 hover:bg-amber-500 hover:text-white transition-all shadow-sm">
                                        <span class="material-icons text-lg">edit</span>
                                    </button>
                                    <button onclick="deleteUser(<?= $row['id'] ?>, '<?= esc($row['username'], 'js') ?>')"
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-rose-50 dark:bg-rose-900/20 text-rose-600 hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                        <span class="material-icons text-lg">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="p-20 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div
                                    class="w-20 h-20 bg-slate-50 dark:bg-slate-900 rounded-full flex items-center justify-center text-slate-200">
                                    <span class="material-icons text-5xl">person_off</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-600 dark:text-slate-400 uppercase tracking-widest">
                                    Belum Ada Pengguna</h3>
                                <p class="text-sm text-slate-400">Klik tombol "Tambah Admin" untuk mulai mengisi data.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Form -->
<div id="userModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
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
                        <span id="modalIcon" class="material-icons">person_add</span>
                    </div>
                    <div>
                        <h3 id="modalTitle" class="text-xl font-black text-slate-800 dark:text-white tracking-tight">
                            Tambah Admin</h3>
                        <p class="text-xs text-slate-500 font-bold uppercase tracking-widest">Formulir Akses
                            Administrator</p>
                    </div>
                </div>
                <button onclick="closeModal()"
                    class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>

            <!-- Body -->
            <form id="userForm">
                <input type="hidden" id="userId" name="id">
                <div class="space-y-5">
                    <!-- Username -->
                    <div class="relative group">
                        <label for="username"
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 ml-1">Username</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-icons text-xl">alternate_email</span>
                            </span>
                            <input type="text" id="username" name="username"
                                class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-semibold dark:text-white"
                                placeholder="JokoAdmin" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="relative group">
                        <label for="email"
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 ml-1">Email
                            Address</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-icons text-xl">mail</span>
                            </span>
                            <input type="email" id="email" name="email"
                                class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-semibold dark:text-white"
                                placeholder="joko@email.com" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="relative group">
                        <label for="password"
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-icons text-xl">lock</span>
                            </span>
                            <input type="password" id="password" name="password"
                                class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-semibold dark:text-white"
                                placeholder="********">
                        </div>
                        <p id="passwordHelp" class="mt-2 text-[10px] text-amber-500 font-bold hidden">* Kosongkan
                            password jika tidak ingin mengganti</p>
                    </div>

                    <!-- Is Active (Only on Edit) -->
                    <div id="statusContainer" class="hidden">
                        <label
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-3 ml-1">Status
                            Akun</label>
                        <div class="flex items-center gap-4">
                            <label class="relative flex items-center cursor-pointer group">
                                <input type="radio" name="is_active" value="1" class="peer sr-only" checked>
                                <div
                                    class="w-full px-4 py-2 rounded-xl border-2 border-slate-100 dark:border-slate-700 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 dark:peer-checked:bg-emerald-900/20 transition-all">
                                    <span
                                        class="text-xs font-bold text-slate-500 peer-checked:text-emerald-600">Aktif</span>
                                </div>
                            </label>
                            <label class="relative flex items-center cursor-pointer group">
                                <input type="radio" name="is_active" value="0" class="peer sr-only">
                                <div
                                    class="w-full px-4 py-2 rounded-xl border-2 border-slate-100 dark:border-slate-700 peer-checked:border-rose-500 peer-checked:bg-rose-50 dark:peer-checked:bg-rose-900/20 transition-all">
                                    <span
                                        class="text-xs font-bold text-slate-500 peer-checked:text-rose-600">Nonaktif</span>
                                </div>
                            </label>
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
                        Simpan Akun
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
    const modal = document.getElementById('userModal');
    const form = document.getElementById('userForm');
    const modalTitle = document.getElementById('modalTitle');
    const modalIcon = document.getElementById('modalIcon');
    const inputId = document.getElementById('userId');
    const inputUsername = document.getElementById('username');
    const inputEmail = document.getElementById('email');
    const inputPassword = document.getElementById('password');
    const passwordHelp = document.getElementById('passwordHelp');
    const statusContainer = document.getElementById('statusContainer');

    function openModal(type, id = '', username = '', email = '', is_active = 1) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        if (type === 'add') {
            modalTitle.innerText = 'Tambah Admin';
            modalIcon.innerText = 'person_add';
            form.reset();
            inputId.value = '';
            inputPassword.required = true;
            passwordHelp.classList.add('hidden');
            statusContainer.classList.add('hidden');
        } else {
            modalTitle.innerText = 'Edit Admin';
            modalIcon.innerText = 'manage_accounts';
            inputId.value = id;
            inputUsername.value = username;
            inputEmail.value = email;
            inputPassword.value = '';
            inputPassword.required = false;
            passwordHelp.classList.remove('hidden');
            statusContainer.classList.remove('hidden');

            // Set radio checked based on is_active
            document.querySelector(`input[name="is_active"][value="${is_active}"]`).checked = true;
        }
    }

    function closeModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // AJAX CRUD Logic
    $(document).ready(function () {
        $('#userForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#userId').val();
            const url = id ? '<?= base_url('admin/users-update') ?>' : '<?= base_url('admin/users-save') ?>';

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

    function deleteUser(id, username) {
        Notiflix.Confirm.show(
            'Hapus Pengguna',
            `Apakah Anda yakin ingin menghapus administrator "@${username}"? Tindakan ini akan mencabut seluruh akses pengguna tersebut.`,
            'Ya, Hapus',
            'Batal',
            function () {
                Notiflix.Loading.pulse('Menghapus...');
                $.ajax({
                    url: '<?= base_url('admin/users-delete') ?>',
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
                        Notiflix.Notify.failure('Gagal menghapus pengguna. Sesuatu yang salah terjadi.');
                    }
                });
            }
        );
    }
</script>
<?= $this->endSection() ?>
/**
 * Developer: Abdul Yamin, S.Pd., M.Kom
 * GitHub: https://github.com/ocikyamin
 */
$(function () {
    // ============================================
    // 1. NOTIFLIX CONFIGURATION
    // ============================================
    Notiflix.Notify.init({
        width: '320px',
        position: 'right-top',
        distance: '20px',
        borderRadius: '12px',
        fontFamily: 'Inter, sans-serif',
        timeout: 4000,
    });

    Notiflix.Report.init({
        borderRadius: '24px',
        width: '420px',
        fontFamily: 'Inter, sans-serif',
        success: { buttonBackground: '#0D9488', svgColor: '#0D9488' }
    });

    // ============================================
    // 2. FORM INTERACTIVITY
    // ============================================

    // Reporting Method Toggle
    function updateReportingMethod() {
        const val = $('input[name="pelapor_identitas"]:checked').val();
        $('input[name="pelapor_identitas"]').each(function () {
            const card = $(this).closest('label').find('div.border-2');
            if ($(this).is(':checked')) {
                card.addClass('radio-card-active border-primary bg-primary/[0.02]');
                card.find('.icon-box').addClass('bg-primary text-white');
            } else {
                card.removeClass('radio-card-active border-primary bg-primary/[0.02]');
                card.find('.icon-box').removeClass('bg-primary text-white');
            }
        });

        if (val === 'anonim') {
            $('#anon-info').removeClass('hidden').addClass('animate-fade-in');
            $('#identity-form').addClass('hidden');
        } else {
            $('#anon-info').addClass('hidden');
            $('#identity-form').removeClass('hidden').addClass('animate-slide-in');
        }
    }
    $('input[name="pelapor_identitas"]').on('change', updateReportingMethod);
    updateReportingMethod();

    // Terlapor Dynamic Sections
    function updateTerlapor() {
        const val = $('#terlapor_jenis').val();
        const sections = ['Mahasiswa', 'Dosen', 'Tendik', 'Lainnya'];
        sections.forEach(s => {
            const id = `#detail-${s.toLowerCase()}`;
            if (val === s) $(id).removeClass('hidden').addClass('animate-slide-in');
            else $(id).addClass('hidden');
        });
    }
    $('#terlapor_jenis').on('change', updateTerlapor);
    updateTerlapor();

    // Kategori Management
    function updateKategori() {
        const val = $('#kategori_select').val();
        if (val === 'Lainnya') {
            $('#kategori-select-wrapper').addClass('hidden');
            $('#kategori-custom-wrapper').removeClass('hidden').addClass('animate-slide-in');
            $('#kategori-button-wrapper').addClass('hidden');
            $('#kategori_custom_input').focus();
        } else {
            $('#kategori-select-wrapper').removeClass('hidden');
            $('#kategori-custom-wrapper').addClass('hidden');
            $('#kategori-button-wrapper').removeClass('hidden');
        }
    }
    $('#kategori_select').on('change', updateKategori);
    $('#btn-tambah-kategori-alt').on('click', () => $('#kategori_select').val('Lainnya').change());
    $('#btn-batal-kategori').on('click', () => $('#kategori_select').prop('selectedIndex', 0).change());
    $('#btn-tambah-kategori').on('click', function () {
        const name = $('#kategori_custom_input').val().trim();
        if (!name) { Notiflix.Notify.warning('Masukkan nama kategori'); return; }
        const newOpt = $('<option></option>').val(name).text(name);
        $('#kategori_select option[value="Lainnya"]').before(newOpt);
        $('#kategori_select').val(name).change();
        Notiflix.Notify.success('Kategori ditambahkan');
    });

    // ============================================
    // 3. FILE & SOSMED HANDLERS
    // ============================================
    const FileHandler = {
        init() {
            const input = $('#lampiran'), label = input.closest('label');
            label.on('dragover', (e) => { e.preventDefault(); label.addClass('border-primary bg-primary/5'); });
            label.on('dragleave', () => label.removeClass('border-primary bg-primary/5'));
            label.on('drop', (e) => {
                e.preventDefault();
                label.removeClass('border-primary bg-primary/5');
                const files = e.originalEvent.dataTransfer.files;
                if (files.length) this.handle(files[0]);
            });
            input.on('change', (e) => { if (e.target.files.length) this.handle(e.target.files[0]); });
            $('#btn-remove-file').on('click', () => this.clear());
        },
        handle(file) {
            if (!['image/png', 'image/jpeg', 'application/pdf'].includes(file.type)) {
                Notiflix.Notify.failure('Format tidak didukung'); return;
            }
            if (file.size > 10 * 1024 * 1024) { Notiflix.Notify.failure('Maksimal 10MB'); return; }
            this.show(file);
        },
        show(file) {
            const container = $('#file-preview-container'), content = $('#file-preview-content'), size = (file.size / 1024 / 1024).toFixed(2);
            if (file.type.startsWith('image')) {
                const reader = new FileReader();
                reader.onload = (e) => content.html(`<div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100"><img src="${e.target.result}" class="w-12 h-12 object-cover rounded-xl" /><div class="flex-1 overflow-hidden"><p class="text-[11px] font-bold text-slate-800 truncate">${file.name}</p><p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">${size} MB • Gambar</p></div><span class="material-symbols-outlined text-green-500">verified</span></div>`);
                reader.readAsDataURL(file);
            } else {
                content.html(`<div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100"><div class="w-12 h-12 bg-red-50 text-red-500 flex items-center justify-center rounded-xl"><span class="material-symbols-outlined">description</span></div><div class="flex-1 overflow-hidden"><p class="text-[11px] font-bold text-slate-800 truncate">${file.name}</p><p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">${size} MB • Dokumen PDF</p></div><span class="material-symbols-outlined text-green-500">verified</span></div>`);
            }
            container.removeClass('hidden');
        },
        clear() { $('#lampiran').val(''); $('#file-preview-container').addClass('hidden'); }
    };

    const SosmedHandler = {
        init() {
            $('input[name="bukti_tipe"]').on('change', (e) => this.toggle(e.target.value));
            $('#btn-load-sosmed-preview').on('click', () => this.preview());
            $('#btn-remove-sosmed').on('click', () => this.clear());
        },
        toggle(type) {
            if (type === 'file') {
                $('#bukti-file-section').removeClass('hidden');
                $('#bukti-sosmed-section').addClass('hidden');
                this.clear(true);
            } else {
                $('#bukti-file-section').addClass('hidden');
                $('#bukti-sosmed-section').removeClass('hidden');
                FileHandler.clear();
            }
        },
        detectPlatform(url) {
            // Auto-detect platform from URL
            if (!url) return null;

            url = url.toLowerCase();
            if (url.includes('youtube.com') || url.includes('youtu.be')) return 'youtube';
            if (url.includes('tiktok.com')) return 'tiktok';
            if (url.includes('instagram.com')) return 'instagram';
            if (url.includes('facebook.com') || url.includes('fb.com')) return 'facebook';
            if (url.includes('linkedin.com')) return 'linkedin';
            if (url.includes('twitter.com') || url.includes('x.com')) return 'twitter';

            return 'other'; // Default untuk platform lain
        },
        preview() {
            const url = $('#sosmed_url').val().trim();
            if (!url) { Notiflix.Notify.warning('Masukkan URL terlebih dahulu'); return; }

            // Auto-detect platform
            const platform = this.detectPlatform(url);

            const map = {
                youtube: { i: '▶️', c: 'bg-red-50', n: 'YouTube', tc: 'text-red-600' },
                tiktok: { i: '♪', c: 'bg-slate-900 text-white', n: 'TikTok', tc: 'text-white' },
                instagram: { i: '📷', c: 'bg-gradient-to-r from-purple-50 to-pink-50', n: 'Instagram', tc: 'text-pink-600' },
                facebook: { i: '👤', c: 'bg-blue-50', n: 'Facebook', tc: 'text-blue-600' },
                linkedin: { i: '💼', c: 'bg-blue-600 text-white', n: 'LinkedIn', tc: 'text-white' },
                twitter: { i: '🐦', c: 'bg-sky-50', n: 'Twitter / X', tc: 'text-sky-600' },
                other: { i: '🔗', c: 'bg-slate-100', n: 'Link Lainnya', tc: 'text-slate-600' }
            };
            const data = map[platform] || map['other'];

            // Save detected platform to hidden field
            $('#sosmed_platform_hidden').val(platform);

            $('#sosmed-preview-content').html(`<div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100 animate-slide-in"><div class="w-12 h-12 ${data.c} flex items-center justify-center rounded-xl text-xl font-black">${data.i}</div><div class="flex-1 overflow-hidden"><p class="text-[10px] font-black ${data.tc} uppercase tracking-widest">${data.n}</p><p class="text-xs font-bold text-slate-800 truncate">${url}</p></div><span class="material-symbols-outlined text-green-500">verified</span></div>`);
            $('#sosmed-preview-container').removeClass('hidden');
            Notiflix.Notify.success(`Platform terdeteksi: ${data.n}`);
        },
        clear(silent = false) { $('#sosmed_url').val(''); $('#sosmed_platform_hidden').val(''); $('#sosmed-preview-container').addClass('hidden'); }
    };

    // ============================================
    // 4. FORM VALIDATION & SUBMISSION
    // ============================================
    const FormValidator = {
        clearErrors() {
            $('.input-error').removeClass('input-error');
            $('.error-message-dynamic').remove();
            $('[id$="_error"]').addClass('hidden');
        },
        addError(id, msg) {
            const el = $(`#${id}`);
            el.addClass('input-error');

            const errorContainer = $(`#${id}_error`);
            if (errorContainer.length) {
                errorContainer.removeClass('hidden');
                const textSpan = errorContainer.find(`#${id}_error_text`);
                if (textSpan.length) {
                    textSpan.text(msg);
                } else {
                    errorContainer.text(msg);
                }
            } else {
                // Fallback for fields without dedicated container
                if (!el.next('.error-message-dynamic').length) {
                    el.after(`<span class="error-message-dynamic text-red-500 text-xs font-medium mt-1 flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">error</span>${msg}</span>`);
                }
            }
        },
        validate() {
            this.clearErrors();
            let errors = 0;
            if ($('input[name="pelapor_identitas"]:checked').val() === 'identitas') {
                if (!$('#pelapor_nama').val().trim()) { this.addError('pelapor_nama', 'Nama wajib diisi'); errors++; }
            }
            if (!$('#kategori_select').val()) { this.addError('kategori_select', 'Pilih kategori'); errors++; }
            if (!$('#terlapor_jenis').val()) { this.addError('terlapor_jenis', 'Pilih pihak terlapor'); errors++; }

            // Validate terlapor_nama based on jenis
            const terlapor_jenis = $('#terlapor_jenis').val();
            if (terlapor_jenis === 'Mahasiswa' && !$('#terlapor_nama_mahasiswa').val().trim()) {
                this.addError('terlapor_nama_mahasiswa', 'Nama mahasiswa wajib diisi'); errors++;
            } else if (terlapor_jenis === 'Dosen' && !$('#terlapor_nama_dosen').val().trim()) {
                this.addError('terlapor_nama_dosen', 'Nama dosen wajib diisi'); errors++;
            } else if (terlapor_jenis === 'Tendik' && !$('#terlapor_nama_tendik').val().trim()) {
                this.addError('terlapor_nama_tendik', 'Nama tendik wajib diisi'); errors++;
            } else if (terlapor_jenis === 'Lainnya' && !$('#terlapor_nama_lainnya').val().trim()) {
                this.addError('terlapor_nama_lainnya', 'Nama wajib diisi'); errors++;
            }

            if (!$('#kejadian_deskripsi').val().trim() || $('#kejadian_deskripsi').val().length < 20) { this.addError('kejadian_deskripsi', 'Ceritakan minimal 20 karakter'); errors++; }
            if (!$('#kejadian_tgl').val()) { this.addError('kejadian_tgl', 'Pilih tanggal'); errors++; }
            if (!$('#agree_checkbox').is(':checked')) { Notiflix.Notify.info('Harap setujui pernyataan integritas'); errors++; }
            return errors === 0;
        }
    };

    $('#btn-kirim-pengaduan').on('click', function (e) {
        e.preventDefault();
        if (!FormValidator.validate()) {
            Notiflix.Notify.failure('Pastikan semua data terisi dengan benar');
            window.scrollTo({ top: $('#form-pengaduan').offset().top - 100, behavior: 'smooth' });
            return;
        }

        Notiflix.Loading.standard('Mengirim laporan secara aman...');
        const btn = $(this), originalText = btn.html();
        btn.prop('disabled', true);

        // Auto-detect platform if user didn't click preview
        if ($('input[name="bukti_tipe"]:checked').val() === 'sosmed') {
            const url = $('#sosmed_url').val().trim();
            if (url && !$('#sosmed_platform_hidden').val()) {
                const platform = SosmedHandler.detectPlatform(url);
                $('#sosmed_platform_hidden').val(platform);
            }
        }

        const formData = new FormData($('#form-pengaduan')[0]);
        // Ensure kategori_text is sent
        formData.append('kategori_text', $('#kategori_select option:selected').text());

        // Consolidate terlapor_nama based on terlapor_jenis
        const terlapor_jenis = $('#terlapor_jenis').val();
        let terlapor_nama = '';
        if (terlapor_jenis === 'Mahasiswa') {
            terlapor_nama = $('#terlapor_nama_mahasiswa').val();
        } else if (terlapor_jenis === 'Dosen') {
            terlapor_nama = $('#terlapor_nama_dosen').val();
        } else if (terlapor_jenis === 'Tendik') {
            terlapor_nama = $('#terlapor_nama_tendik').val();
        } else if (terlapor_jenis === 'Lainnya') {
            terlapor_nama = $('#terlapor_nama_lainnya').val();
        }
        formData.set('terlapor_nama', terlapor_nama);

        $.ajax({
            type: 'POST',
            url: window.SUBMIT_URL || 'submit-pengaduan',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (res) {
                Notiflix.Loading.remove();
                if (res.success) {
                    Notiflix.Report.success('Laporan Berhasil!', res.message || 'Laporan Anda telah kami terima.', 'Lihat Bukti Lapor', () => {
                        window.location.href = res.data?.referensi_pengaduan ? (window.BASE_URL + 'referensi/' + encodeURIComponent(res.data.referensi_pengaduan)) : (window.BASE_URL || '/');
                    });
                } else {
                    Notiflix.Report.failure('Gagal', res.message || 'Coba lagi nanti.', 'Tutup');
                    btn.prop('disabled', false).html(originalText);
                }
            },
            error: function (xhr) {
                Notiflix.Loading.remove();
                Notiflix.Notify.failure('Terjadi kesalahan server');
                btn.prop('disabled', false).html(originalText);
            }
        });
    });

    // Mobile Menu Toggle Logic
    const mobileMenuBtn = $('#mobile-menu-btn');
    const mobileMenu = $('#mobile-menu');
    const closeMobileMenu = $('#close-mobile-menu');

    if (mobileMenuBtn.length && mobileMenu.length) {
        mobileMenuBtn.on('click', function () {
            mobileMenu.removeClass('translate-x-full');
            $('body').css('overflow', 'hidden');
        });
    }

    if (closeMobileMenu.length) {
        closeMobileMenu.on('click', function () {
            mobileMenu.addClass('translate-x-full');
            $('body').css('overflow', '');
        });
    }

    // Close on click outside
    mobileMenu.on('click', function (e) {
        if (e.target === this) {
            mobileMenu.addClass('translate-x-full');
            $('body').css('overflow', '');
        }
    });

    FileHandler.init();
    SosmedHandler.init();
});

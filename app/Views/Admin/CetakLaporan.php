<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan - #
        <?= $referensi_pengaduan ?>
    </title>
    <style>
        /* Base Setup */
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #fff;
            color: #000;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }

        .container {
            width: 210mm;
            /* A4 Width */
            margin: 0 auto;
            padding: 20mm 25mm;
            background-color: #fff;
            min-height: 297mm;
            /* A4 Height */
            box-sizing: border-box;
        }

        /* Kop Surat (Letterhead) */
        .kop-surat {
            display: flex;
            align-items: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 25px;
            position: relative;
        }

        .kop-surat::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 100%;
            border-bottom: 1px solid #000;
        }

        .logo-left,
        .logo-right {
            width: 85px;
            height: 85px;
            object-fit: contain;
        }

        .logo-left {
            margin-right: 15px;
        }

        .logo-right {
            margin-left: 15px;
        }

        .kop-text {
            text-align: center;
            flex-grow: 1;
        }

        .kop-text h4 {
            margin: 0;
            font-size: 14pt;
            font-weight: normal;
        }

        .kop-text h3 {
            margin: 2px 0;
            font-size: 16pt;
            font-weight: bold;
        }

        .kop-text h2 {
            margin: 0;
            font-size: 18pt;
            font-weight: bold;
        }

        .kop-text p {
            margin: 2px 0;
            font-size: 10pt;
            font-style: italic;
        }

        /* Content Section */
        .title-doc {
            text-align: center;
            text-decoration: underline;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .ref-number {
            text-align: center;
            font-size: 11pt;
            margin-bottom: 30px;
        }

        .section-header {
            background-color: #f0f0f0;
            padding: 5px 10px;
            font-weight: bold;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            margin-top: 20px;
            -webkit-print-color-adjust: exact;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .data-table td {
            padding: 6px 4px;
            vertical-align: top;
            font-size: 11pt;
        }

        .label {
            width: 160px;
            font-weight: bold;
        }

        .separator {
            width: 10px;
        }

        .content-box {
            border: 1px solid #000;
            padding: 15px;
            min-height: 100px;
            font-size: 11pt;
            text-align: justify;
            white-space: pre-line;
        }

        /* Footer / Signature */
        .footer-document {
            margin-top: 50px;
            display: flex;
            justify-content: flex-end;
        }

        .signature-box {
            text-align: center;
            width: 250px;
        }

        .signature-box p {
            margin: 0;
            font-size: 11pt;
        }

        .signature-space {
            height: 80px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }

        /* Print Controls (Non-printing) */
        .print-controls {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-print {
            background-color: #0d968b;
        }

        .btn-back {
            background-color: #64748b;
        }

        @media print {
            .print-controls {
                display: none;
            }

            body {
                background-color: #fff;
            }

            .container {
                margin: 0;
                padding: 0;
                width: 100%;
                box-shadow: none;
            }
        }

        @page {
            size: A4;
            margin: 15mm;
        }
    </style>
</head>

<body>

    <div class="print-controls">
        <a href="<?= base_url('admin/laporan-detail/' . $id) ?>" class="btn-action btn-back">Kembali</a>
        <button onclick="window.print()" class="btn-action btn-print">Cetak Sekarang</button>
    </div>

    <div class="container">
        <!-- Kop Surat -->
        <div class="kop-surat">
            <img src="<?= base_url('logo/uin.png') ?>" alt="Logo UIN" class="logo-left">
            <div class="kop-text">
                <h4>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h4>
                <h3>UNIVERSITAS ISLAM NEGERI (UIN)</h3>
                <h2>SYEKH M. DJAMIL DJAMBEK BUKITTINGGI</h2>
                <h3>FAKULTAS TARBIYAH DAN ILMU KEGURUAN</h3>
                <p>Alamat: Gedung FTIK Kampus II UIN Bukittinggi, Jalan Gurun Aua Kubang Putih, Agam – Sumbar</p>
                <p>Website: ftik.uinbukittinggi.ac.id | Email: ftik@uinbukittinggi.ac.id</p>
            </div>
            <img src="<?= base_url('logo/ftik.png') ?>" alt="Logo FTIK" class="logo-right">
        </div>

        <!-- Judul Dokumen -->
        <h1 class="title-doc">Lembar Detail Pengaduan</h1>
        <p class="ref-number">Nomor Referensi:
            <?= $referensi_pengaduan ?>
        </p>

        <!-- Informasi Pelapor -->
        <div class="section-header">DATA PELAPOR</div>
        <table class="data-table">
            <tr>
                <td class="label">Nama Pelapor</td>
                <td class="separator">:</td>
                <td>
                    <?= (strtolower($pelapor_identitas ?? '') === 'anonim') ? 'ANONIM' : ($pelapor_nama ?? '-') ?>
                </td>
            </tr>
            <tr>
                <td class="label">Identitas Pelapor</td>
                <td class="separator">:</td>
                <td>
                    <?= strtoupper($pelapor_identitas ?? 'Beridentitas') ?>
                </td>
            </tr>
            <tr>
                <td class="label">Kontak/WhatsApp</td>
                <td class="separator">:</td>
                <td>
                    <?= (strtolower($pelapor_identitas ?? '') === 'anonim') ? '**********' : ($pelapor_kontak ?? '-') ?>
                </td>
            </tr>
            <tr>
                <td class="label">Tanggal Lapor</td>
                <td class="separator">:</td>
                <td>
                    <?= date('d F Y, H:i', strtotime($created_at)) ?> WIB
                </td>
            </tr>
        </table>

        <!-- Informasi Terlapor -->
        <div class="section-header">DATA PIHAK TERLAPOR</div>
        <table class="data-table">
            <tr>
                <td class="label">Nama Terlapor</td>
                <td class="separator">:</td>
                <td>
                    <?= strtoupper($terlapor_nama ?? '-') ?>
                </td>
            </tr>
            <tr>
                <td class="label">Jenis Terlapor</td>
                <td class="separator">:</td>
                <td>
                    <?= strtoupper($terlapor_jenis ?? '-') ?>
                </td>
            </tr>
            <?php if (($terlapor_jenis ?? '') === 'Mahasiswa'): ?>
                <tr>
                    <td class="label">NIM</td>
                    <td class="separator">:</td>
                    <td>
                        <?= $terlapor_nim ?? '-' ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Program Studi</td>
                    <td class="separator">:</td>
                    <td>
                        <?= strtoupper($nm_prodi ?? 'Program Studi tidak diketahui') ?>
                    </td>
                </tr>
            <?php endif; ?>
        </table>

        <!-- Detail Kejadian -->
        <div class="section-header">DETAIL KEJADIAN</div>
        <table class="data-table">
            <tr>
                <td class="label">Waktu Kejadian</td>
                <td class="separator">:</td>
                <td>
                    <?= date('d F Y', strtotime($kejadian_tgl ?? now())) ?>
                </td>
            </tr>
            <tr>
                <td class="label">Lokasi Kejadian</td>
                <td class="separator">:</td>
                <td>
                    <?= $kejadian_lokasi ?? '-' ?>
                </td>
            </tr>
            <tr>
                <td class="label">Kategori Laporan</td>
                <td class="separator">:</td>
                <td>
                    <?= strtoupper($kategori_text ?? 'Umum') ?>
                </td>
            </tr>
        </table>

        <div style="font-weight: bold; margin: 10px 0 5px 0; font-size: 11pt;">Kronologi Laporan:</div>
        <div class="content-box">
            <?= nl2br($kejadian_deskripsi) ?>
        </div>

        <!-- Status & Tindakan -->
        <div class="section-header">STATUS & TINDAKAN ADMIN</div>
        <table class="data-table">
            <tr>
                <td class="label">Status Akhir</td>
                <td class="separator">:</td>
                <td><strong>
                        <?= strtoupper($status_tindakan ?? 'Baru') ?>
                    </strong></td>
            </tr>
        </table>

        <div style="font-weight: bold; margin: 10px 0 5px 0; font-size: 11pt;">Keterangan / Tindakan:</div>
        <div class="content-box">
            <?= !empty($tindakan_keterangan) ? nl2br($tindakan_keterangan) : 'Belum ada catatan tindakan yang diambil.' ?>
        </div>

        <!-- Tanda Tangan -->
        <div class="footer-document">
            <div class="signature-box">
                <p>Bukittinggi,
                    <?= date('d F Y') ?>
                </p>
                <p>Mengetahui,</p>
                <p>Wakil Dekan III FTIK</p>
                <div class="signature-space"></div>
                <p class="signature-name">Dr. Supriadi, S.Ag., M.Pd</p>
                <p>NIP. 197210052003121003</p>
            </div>
        </div>
    </div>

    <!-- Auto Print Script -->
    <script>
        // Optional: Auto print when page loads
        // window.onload = function() { window.print(); }
    </script>
</body>

</html>
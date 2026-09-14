ClaimTrack Core v1.11.1
=======================

Perbaikan routing dan penyimpanan WordPress:

1. Menu Fase Klaim, FASE 1 - KDP, FASE 2 - Dok. Lengkap, dan FASE 3 - Terbuku sekarang memakai WordPress Page yang berbeda, bukan hanya query string.
2. Plugin otomatis membuat dan memelihara laman berikut di wp_posts:
   - ClaimTrack
   - Fase Klaim
   - FASE 1 - KDP
   - FASE 2 - Dok. Lengkap
   - FASE 3 - Terbuku
   - Input Mingguan ClaimTrack
   - Unit Kerja ClaimTrack
   - Program ClaimTrack
   - Mitra ClaimTrack
   - Import & Export ClaimTrack
   - Pengaturan ClaimTrack
   - E-Knowledge ClaimTrack
   - Pencapaian ClaimTrack
3. Routing setiap laman disimpan di wp_postmeta sehingga klik menu selalu membuka view yang tepat.
4. URL lama berbasis ?view=phase&program_id=... tetap didukung untuk kompatibilitas.
5. Data operasional tersimpan permanen pada database WordPress:
   - {prefix}claimtrack_units
   - {prefix}claimtrack_programs
   - {prefix}claimtrack_providers
   - {prefix}claimtrack_entries
6. Pengaturan ClaimTrack dan Cloudflare Turnstile tersimpan di wp_options.
7. Input Minggu I-IV sekarang memakai transaksi database. Jika satu penyimpanan gagal, perubahan dibatalkan agar data tidak setengah tersimpan.
8. Format angka Indonesia seperti 1.234,56 didukung pada input nominal.
9. Halaman Pengaturan menampilkan status WordPress Pages dan jumlah data yang tersimpan.
10. Halaman aplikasi diberi no-cache header agar navigasi fase tidak tertahan oleh cache halaman/query.

Catatan upgrade:
- Ganti plugin versi lama dengan ZIP ini. Tidak perlu menghapus data lama.
- Pada request pertama, migrasi self-healing akan membuat laman WordPress yang belum tersedia.
- Data pada tabel ClaimTrack yang sudah ada tidak dihapus atau di-reset.

== 1.12.0 ==
- FASE 1, FASE 2, dan FASE 3 kembali tampil di area konten kanan dashboard. Sidebar dan topbar tetap terlihat pada desktop.
- Backup lengkap JSON dan restore dari dashboard Import/Export.
- Custom Post Type mirror otomatis di wp-admin untuk Unit Kerja, Program/Fase, Mitra/Asuradur, dan Data Klaim.
- Data utama tetap tersimpan pada tabel database ClaimTrack. CPT tersimpan di wp_posts/wp_postmeta sebagai mirror read-only.


== 1.12.1 ==
- Fix final layout FASE 1, FASE 2, dan FASE 3 agar selalu berada di area konten kanan dashboard.
- Sidebar ClaimTrack tetap tampil pada desktop dan topbar tidak lagi disembunyikan oleh CSS legacy fase.
- Halaman fase sekarang dibungkus container ct-content yang sama dengan Dashboard/Input/Master Data.
- Routing, backup/restore, Custom Post Type mirror, dan penyimpanan database tidak diubah.

== 1.13.0 ==
- Menyamakan visual FASE 1, FASE 2, dan FASE 3 dengan tema aktif ClaimTrack.
- Memperbaiki layout desktop, laptop, tablet, dan mobile app.
- Menyesuaikan kartu asuradur, tabel, chart, tooltip, dan tombol nominatif agar konsisten dengan sidebar/topbar.
- Tidak mengubah struktur database, CPT, backup/restore, routing WordPress Page, atau data existing.


== 1.14.0 ==
- FASE 1 / KDP: POSISI KDP dibuat full width satu kolom.
- PERSENTASE KDP PER ASURADUR dan PERSENTASE KDP PER UKER tampil berdampingan dua kolom pada desktop/tablet.
- DAFTAR NOMINATIF DEBITUR KDP dibuat full width satu kolom.
- Mobile tetap responsif: tabel dan nominatif full width, sedangkan dua grafik ditumpuk vertikal agar tetap terbaca.
- Tidak mengubah data, database, CPT, routing, backup/restore, atau logika perhitungan.

== 1.15.0 ==
- Seluruh menu PENGELOLAAN dipusatkan ke WordPress Page /sw-admin/.
- /sw-admin/ memiliki form login administrator yang berbeda dari login karyawan.
- Portal SW Admin menyediakan Dashboard Admin, Berita, Input Mingguan, Unit Kerja, Program/Fase, Mitra/Asuradur, E-Knowledge, Backup/Import/Export, dan Pengaturan.
- UI frontend karyawan tidak lagi menampilkan menu PENGELOLAAN dan form editing E-Knowledge.
- Potensi Subrogasi pada frontend tetap dapat dibaca, tetapi input/edit hanya aktif di SW Admin.
- Pusat Bantuan diganti kartu WhatsApp Admin. Nomor Admin dapat diatur dari SW Admin > Pengaturan.
- Dashboard/Home menampilkan Berita & Update Karyawan tanpa mengurangi fokus utama monitoring klaim.
- Berita disimpan native di WordPress sebagai Custom Post Type ct_news (wp_posts/wp_postmeta + Media Library).
- Berita dapat tambah/edit/hapus melalui /sw-admin/?section=news.
- Backup JSON versi 3 menyertakan Berita dan tetap dapat restore backup format versi 1 dan 2.
- WordPress Page /sw-admin/ dibuat otomatis oleh self-healing page generator.

=== v1.15.1 ===
- Home menjadi halaman berita internal "Berita & Update ClaimTrack" dan ditetapkan sebagai front page WordPress.
- Berita mendukung komentar karyawan. Komentar tersimpan native di wp_comments dan ikut masuk Backup ClaimTrack format v4.
- Dashboard kembali fokus pada monitoring klaim. Berita dipindahkan dari Dashboard ke Home.
- Fase Klaim bukan halaman. Menu hanya berfungsi sebagai grup/submenu FASE 1, FASE 2, dan FASE 3.
- Laman WordPress lama /fase-klaim/ yang dikelola ClaimTrack otomatis dipindahkan ke Trash dengan aman.
- Metadata tanggal/Admin/department yang duplikat pada hero FASE 1-3 dihapus.
- Tombol Input Mingguan pada FASE 1-3 dihapus dari dashboard user.
- Semua shortcut/menu SW Admin di dashboard user dihapus. /sw-admin tetap tersedia melalui URL langsung untuk administrator.

v1.15.2
- Dashboard memakai card glassmorphism yang konsisten dengan halaman FASE.
- Filter bulan Dashboard otomatis memperbarui data; periode kosong menampilkan popup Data Kosong.
- SW Admin menambahkan FASE 1, FASE 2, FASE 3, Potensi Subrogasi, Pencapaian, Tambah Berita, dan List Berita.
- Isi Berita menggunakan editor visual WYSIWYG.
- Menu Pengaturan disederhanakan dan panel diagnostik penyimpanan dihapus dari antarmuka.
- Istilah teknis platform dihilangkan dari antarmuka ClaimTrack.

v1.15.3
- Menu FASE 1, FASE 2, dan FASE 3 pada SW Admin sekarang merupakan halaman input Minggu I-IV per fase.
- Menu Input Mingguan dihapus dari navigasi SW Admin dan URL lama diarahkan ke input FASE 1.
- Dashboard SW Admin diperbarui dengan KPI periode, tren 12 bulan per fase, distribusi Asuradur, ranking Unit Kerja, aksi cepat, dan berita terbaru.
- Input Potensi Subrogasi tetap tersedia sebagai halaman input tersendiri.

v1.15.4
- Ukuran tipografi frontend dan SW Admin dinormalisasi agar lebih mudah dibaca.
- Header Ringkasan Monitoring pada Dashboard user dibuat tanpa background warna di belakang teks.
- Ikon kartu/filter/dashboard menggunakan efek glassmorphism yang konsisten.
- Tambah, edit, dan hapus menampilkan popup hasil aksi; hapus/restore memakai popup konfirmasi custom.
- Navigasi mobile user dilengkapi Home, Dashboard, Fase, Subrogasi, Pencapaian, dan Info.
- Menu Fase pada mobile membuka bottom sheet FASE 1, FASE 2, dan FASE 3.
- SW Admin memiliki bottom navigation mobile untuk akses cepat dan sidebar drawer tetap tersedia untuk menu lengkap.
- Layout tablet/mobile diperbaiki untuk card, grafik, tabel, filter, editor berita, dan form input.


v1.15.6
- Merapikan KPI card Dashboard SW Admin agar tidak terpotong pada laptop/tablet.
- Grid KPI adaptif berdasarkan lebar area konten, bukan dipaksa enam kolom.
- Redesign halaman Pencapaian dengan hero, ringkasan tahunan, glass icon, progress kontribusi, dan card fase responsif.

v1.15.6
- Menambahkan seed demo profesional yang aman untuk FASE 1, FASE 2, FASE 3 dan Potensi Subrogasi.
- Seed hanya mengisi periode yang kosong atau masih murni berisi data demo bawaan; input pengguna tidak ditimpa.
- Menambahkan 4 berita internal contoh pada instalasi yang belum memiliki berita.
- Menambahkan 4 materi E-Knowledge contoh beserta PDF bawaan plugin pada instalasi yang belum memiliki materi.
- Halaman Pencapaian merangkum fase operasional dan subrogasi tanpa menampilkan program Pencapaian sebagai kartu nol tersendiri.

v1.15.9
- Form Tambah Viewer pada SW Admin dibuat full-width satu kolom.
- Seluruh menu dashboard user menyediakan download laporan Excel dan PDF sesuai konteks halaman/periode.


v1.17.0
- Menambahkan role ClaimTrack Admin non-atadro dengan akses penuh ke SW Admin, tanpa akses ke backend wp-admin.
- atadro tetap menjadi satu-satunya Administrator WordPress / Super Admin.
- Sistem mempertahankan maksimal satu ClaimTrack Admin; akun lain tetap Viewer.
- Username `admin` yang sudah ada diprioritaskan sebagai ClaimTrack Admin pada proses migrasi, bila tersedia.
- ClaimTrack Admin dapat mengelola data, berita, E-Knowledge, fase, backup/restore, pengaturan, dan user Viewer melalui SW Admin.
- Akses wp-admin untuk ClaimTrack Admin dan Viewer otomatis diarahkan ke Dashboard User; admin-ajax tetap diizinkan agar fitur aplikasi tidak terganggu.
- Login dari form user selalu diarahkan ke Dashboard User, terlepas dari halaman yang dibuka sebelum login.
- Login dari form SW Admin tetap diarahkan ke Dashboard SW Admin untuk atadro maupun ClaimTrack Admin.


v1.18.0
- Global reference skin untuk seluruh Dashboard User dan SW Admin.
- Sidebar, top header, KPI, panel, tabel, form, tombol, berita, user, E-Knowledge, pencapaian, master data, import/export, dan pengaturan mengikuti HTML referensi.
- Mobile/tablet navigation dan horizontal table containment diseragamkan.
- Sinkron dengan theme Claim Track V1 1.18.0.


v1.19.0
- Sidebar Dashboard User dan SW Admin menggunakan logo ClaimTrack Region 18 terbaru.
- Jarak vertikal antara KPI fase dan panel analitik dipadatkan agar mengikuti HTML referensi.
- Login User didesain ulang mengikuti referensi: area form putih, panel visual biru, logo horizontal, gambar klaim, dan footer dua warna.
- SW Admin > Pengaturan memiliki kontrol warna terpusat untuk sidebar, header, workspace, panel, KPI, tombol, tabel, fase, teks, danger, dan login.
- Navigasi mobile diperhalus menjadi drawer yang lebih rapi dan bottom navigation horizontal dengan scroll-snap serta auto-centering menu aktif.
- Theme sinkron dengan Claim Track V1 1.19.0.

v1.20.0
- Login User dikunci ke satu viewport tanpa scroll, dengan tipografi dan spacing yang lebih ringkas.
- Field password Login User dan Login Admin dilengkapi tombol eye untuk tampil/sembunyikan password.
- Jarak KPI card FASE 1, FASE 2, dan FASE 3 ke bagian POSISI dipadatkan agar tidak ada ruang kosong berlebihan.
- Card Kontribusi per Fase pada menu Pencapaian mengikuti warna KPI dari SW Admin Settings.
- Teks KPI Dashboard Admin menggunakan warna kontras otomatis berdasarkan warna KPI yang dipilih.
- Tidak mengubah struktur database, data existing, routing, import/export, backup/restore, atau perhitungan klaim.


v1.20.1
- Memperbaiki akar penyebab ruang kosong besar pada FASE 1, FASE 2, dan FASE 3: min-height 374px warisan style referensi pada hero fase di-reset menjadi tinggi berdasarkan konten.
- Bagian POSISI kini mulai langsung setelah KPI card dengan jarak bawah yang ringkas dan konsisten.
- Tidak mengubah data, kalkulasi, grafik, tabel, filter, maupun fungsi import/export.

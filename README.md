# TUTU - Aplikasi Android Rekap Penjualan Bakery

Aplikasi pencatatan dan rekapitulasi penjualan harian untuk outlet **DROPSHOT**, **SUASIKO**, dan **BENJAMIN** (serta outlet baru yang bisa ditambahkan kapan saja).

Didesain khusus sesuai format lembar kertas (3 kolom bersanding) dengan kemampuan input cepat di HP Android dan perhitungan otomatis.

---

## 🌟 Fitur Utama

1. **Format Lembar 3 Kolom Bersanding (Persis Sesuai Gambar / Kertas):**
   - Kolom **DROPSHOT**, **SUASIKO**, **BENJAMIN** tampil berdampingan lengkap dengan subkolom:
     - `Date` (Tanggal)
     - `Cookies` (Rp)
     - `Cheesecake` (Rp)
     - `Total` (Otomatis: Cookies + Cheesecake)
     - `Pay` (Metode bayar: Cash / Transfer / QRIS)
   - Garis-garis baris kosong siap isi seperti buku catatan fisik.
   - Baris **TOTAL** otomatis di bawah setiap kolom outlet.

2. **Input Sangat Cepat di HP Android:**
   - Tombol Floating **(+)** di kanan bawah khas Android.
   - Pilih outlet, pilih tanggal (otomatis format ramah: *15 oct 2026*).
   - Masukkan nominal Cookies & Cheesecake -> **Total otomatis terhitung langsung**.
   - Tombol cepat metode bayar (*Cash / Transfer / QRIS*).

3. **Tampilan Fleksibel (2 Mode):**
   - **Mode Lembar 3 Kolom**: Sangat cocok saat ingin melihat rekap menyeluruh atau mencetak / ekspor.
   - **Mode Kartu / Per Outlet**: Sangat nyaman saat digunakan dengan satu tangan di layar HP.

4. **Ekspor & Cetak:**
   - **Ekspor Excel (.xlsx)**: Menghasilkan file Excel asli dengan format 3 kolom bersanding lengkap dengan formula total.
   - **Cetak / PDF**: Siap cetak langsung ke kertas printer atau simpan sebagai PDF ukuran A4 landscape.
   - **Cadangan & Pulihkan (Backup & Restore JSON)**.

5. **Dapat Diinstal Sebagai Aplikasi Android (PWA):**
   - Ikon aplikasi di Layar Utama (Home Screen) Android.
   - Dibuka layar penuh (*Full Screen Standalone*) tanpa bar URL browser layaknya aplikasi APK native.
   - Bekerja baik secara Online maupun Offline (data tersimpan di HP dan otomatis sinkron ke server Laragon).

---

## 📱 Cara Membuka & Menginstal di HP Android

Pastikan HP Android dan Laptop/PC Anda terhubung ke **jaringan Wi-Fi yang sama**.

1. Buka browser **Google Chrome** di HP Android Anda.
2. Masukkan alamat IP komputer Anda:
   ```
   http://192.168.1.9/TUTU/
   ```
   *(Jika IP berubah, Anda bisa cek kembali dengan perintah `ipconfig` di CMD atau cek di menu Pengaturan aplikasi).*
3. Akan muncul spanduk di bagian atas atau bawah: **"Pasang Aplikasi di HP Android Anda"** -> Tekan **"Pasang Sekarang"**.
4. Atau tekan **ikon titik tiga (⋮)** di pojok kanan atas browser Chrome -> Pilih **"Tambahkan ke Layar Utama" (Add to Home Screen)** / **"Install Aplikasi"**.
5. Aplikasi **TUTU Rekap** sekarang sudah terpasang di HP Android Anda dengan ikon aplikasi sendiri!

---

## 💻 Cara Mengakses dari Komputer / Laptop

Cukup buka browser (Chrome / Edge / Firefox) dan kunjungi:
```
http://localhost/TUTU/
```

---

## 📂 Struktur File

- `index.html` / `index.php`: Antarmuka aplikasi mobile & desktop responsif.
- `api.php`: API backend untuk menyimpan dan membaca data transaksi ke database JSON.
- `manifest.json`: Konfigurasi instalasi aplikasi Android (PWA).
- `sw.js`: Service worker untuk caching dan akses offline di Android.
- `icons/`: Ikon aplikasi resolusi tinggi (192x192 & 512x512).
- `data/database.json`: Tempat penyimpanan database transaksi.

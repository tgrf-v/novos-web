# Catatan Client — Novos

## Profil Bisnis
- **Nama**: Novos
- **Bisnis**: Custom jersey / konveksi
- **Web**: Sistem pemesanan custom jersey online

## Yang Sudah Dikonfirmasi Client

- Hanya melayani **custom order** (bukan produk katalog siap pakai)
- Pembayaran menggunakan **Midtrans**
- Ada fitur **stress test** khusus pegawai internal
- Form desain berisi: identitas, logo, warna, motif, bahan, bentuk kerah
- Untuk saat ini **1 pesanan = 1 ukuran** (belum multi-ukuran)

## Yang Belum Dikonfirmasi Client (Perlu Ditanyakan)

- [ ] Pembayaran dilakukan **kapan**? Saat pesan pertama, atau setelah customer ACC pesanan?
- [ ] Apakah ada fitur **notifikasi email** ke customer saat status berubah?
- [ ] Apakah customer bisa **batalkan pesanan sendiri**, atau hanya admin?
- [ ] Format **nomor pesanan** — bebas atau ada aturan tertentu?
- [ ] Apakah ada **harga tetap** per jersey atau dihitung manual per pesanan?
- [ ] Apakah **multi ukuran** dalam satu pesanan akan dibutuhkan di masa depan?

## Catatan Teknis

- Stack: Laravel + Blade + Tailwind + DaisyUI
- Auth: Laravel Breeze
- Payment: Midtrans
- Upload: Intervention Image (untuk resize logo/desain)
- Admin panel: Filament (dipasang setelah DB & fitur dasar siap)
- Database: MySQL via Laragon (lokal), migrasi ke server saat deploy

## Prioritas Pengembangan

1. Auth & Role (login semua role)
2. Form pesanan customer
3. Dashboard & kelola pesanan admin
4. Flow status pesanan lengkap
5. Chat per pesanan
6. Pembayaran Midtrans
7. Produksi & Design view
8. Stress Test
9. Laporan
10. Deploy

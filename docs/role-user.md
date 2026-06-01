# Role Pengguna

Semua pengguna disimpan di tabel `users`.
Role disimpan di tabel `roles`, relasi via `role_id` di tabel `users`.

## Daftar Role

| Role | Deskripsi |
|------|-----------|
| Super Admin | Akses penuh ke seluruh sistem |
| Manager | Akses hampir penuh, bisa lihat laporan & stress test |
| Admin | Kelola pesanan, konfirmasi ke customer, kelola chat |
| Design | Lihat & print pesanan yang sudah disetujui customer |
| Produksi | Lihat & update tugas produksi |
| Customer | Pesan jersey, tracking, chat, pembayaran |

## Aturan Akses

- Customer TIDAK BISA akses halaman internal (admin/design/produksi)
- Pegawai (Admin, Design, Produksi, Manager, Super Admin) TIDAK BISA akses halaman customer
- Middleware: `role` — digunakan di semua route yang butuh pembatasan akses

## Contoh Penggunaan Middleware

```php
// Hanya Admin ke atas
Route::middleware(['auth', 'role:Admin,Manager,Super Admin'])->group(function () {
    // route admin
});

// Hanya Design
Route::middleware(['auth', 'role:Design'])->group(function () {
    // route design
});

// Hanya Customer
Route::middleware(['auth', 'role:Customer'])->group(function () {
    // route customer
});
```

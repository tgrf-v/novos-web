# Flow Pesanan Novos

## Flow Lengkap

```
[CUSTOMER]
Isi form pesanan:
- Identitas (nama, kontak)
- Detail desain (nama tim, logo, warna, motif, bahan, bentuk kerah)
- Ukuran & jumlah
- Catatan tambahan
  ↓
Pesanan tersimpan → status: PENDING
  ↓
Pembayaran via Midtrans (atau bisa diatur setelah konfirmasi?)

[ADMIN]
Notifikasi pesanan baru masuk
  ↓
Admin cek kelengkapan & kebenaran pesanan
  ↓
Admin kirim konfirmasi ke customer → status: DIKONFIRMASI

[CUSTOMER]
Customer menerima notifikasi / lihat di dashboard
  ↓
Customer klik ACC / setujui pesanan → status: DISETUJUI

[ADMIN]
Admin teruskan ke tim Design → status: DI_DESIGN

[DESIGN]
Tim Design menerima detail pesanan & desain
  ↓
Print detail pesanan
  ↓
Design selesai → status: SIAP_CETAK
  ↓
Serahkan hasil print ke Produksi

[PRODUKSI]
Produksi menerima tugas → status: DIPRODUKSI
  ↓
Kerjakan pesanan
  ↓
Selesai → status: SELESAI

[CUSTOMER]
Customer bisa tracking status pesanan kapanpun
```

## Catatan Penting

- Setiap perubahan status dicatat di `order_status_histories`
- Customer bisa chat dengan admin di setiap tahap pesanan
- Chat terikat ke pesanan (`order_id`), bukan chat umum
- Pembayaran via Midtrans — timing pembayaran perlu dikonfirmasi dengan client
  (apakah bayar di awal saat pesan, atau setelah customer ACC?)

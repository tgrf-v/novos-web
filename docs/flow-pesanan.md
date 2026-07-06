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
Pesanan tersimpan → status: MENUNGGU_VALIDASI
  ↓ chat otomatis ke customer: "Pesanan Anda telah dibuat dan menunggu validasi admin."

[ADMIN]
Notifikasi pesanan baru masuk
  ↓
Admin cek kelengkapan & validasi pesanan
  ↓
Admin validasi → status: MENUNGGU_PEMBAYARAN
  ↓ chat otomatis ke customer: "Pesanan telah divalidasi. Silakan lakukan pembayaran."

[CUSTOMER]
Customer buka Profil → lihat tombol "Setujui Detail & Bayar Sekarang"
  ↓
Klik tombol → ACC detail pesanan
  ↓
Pesanan dikonfirmasi → status: DIKONFIRMASI
  ↓
Customer transfer DP minimal 10% ke rekening bank (BCA/Mandiri/BNI)
  ↓
Customer upload bukti transfer di halaman tracking atau kirim via chat

[ADMIN]
Admin menerima notifikasi pembayaran masuk
  ↓
Admin cek dan konfirmasi pembayaran → status: LUNAS
  ↓
Admin teruskan ke tim Design → status: DISETUJUI / DI_DESIGN

[DESIGN]
Tim Design menerima detail pesanan & desain
  ↓
Design selesai → status: SIAP_CETAK

[PRODUKSI]
Produksi menerima tugas → status: DIPRODUKSI
  ↓
Kerjakan pesanan (Printing → Jahit → QC)
  ↓
Selesai → status: SELESAI

[CUSTOMER]
Customer bisa tracking status pesanan & chat kapan saja
```

## Catatan Penting

- Setiap perubahan status dicatat di `order_status_histories`
- Customer bisa chat dengan admin di setiap tahap pesanan
- Chat terikat ke pesanan (`order_id`), bukan chat umum
- Pembayaran manual via transfer bank (BCA, Mandiri, BNI) — DP minimal 10%
- Customer upload bukti transfer di halaman tracking atau kirim via chat
- Admin konfirmasi pembayaran secara manual di dashboard
- Auto chat notification dikirim ke chat room terkait setiap perubahan status

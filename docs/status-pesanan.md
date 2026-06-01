# Status Pesanan

Status disimpan di kolom `status` tabel `orders` sebagai enum.
Setiap perubahan status dicatat di tabel `order_status_histories`.

## Daftar Status

| Status | Kode | Keterangan |
|--------|------|------------|
| Pending | `pending` | Pesanan baru masuk, belum dicek admin |
| Dikonfirmasi | `dikonfirmasi` | Admin sudah cek, menunggu ACC customer |
| Disetujui | `disetujui` | Customer ACC, siap diteruskan ke Design |
| Di Design | `di_design` | Sedang dikerjakan tim Design |
| Siap Cetak | `siap_cetak` | Design selesai, siap diprint & ke Produksi |
| Diproduksi | `diproduksi` | Sedang dikerjakan tim Produksi |
| Selesai | `selesai` | Pesanan selesai |
| Dibatalkan | `dibatalkan` | Pesanan dibatalkan |

## Alur Status

```
pending
  ↓ (admin cek pesanan)
dikonfirmasi
  ↓ (customer ACC)
disetujui
  ↓ (admin teruskan ke design)
di_design
  ↓ (design selesai, print)
siap_cetak
  ↓ (diserahkan ke produksi)
diproduksi
  ↓ (produksi selesai)
selesai
```

Dari status manapun bisa → `dibatalkan`

## Siapa yang Bisa Ubah Status

| Dari | Ke | Siapa |
|------|----|-------|
| pending | dikonfirmasi | Admin |
| dikonfirmasi | disetujui | Customer (tombol ACC) |
| disetujui | di_design | Admin |
| di_design | siap_cetak | Design |
| siap_cetak | diproduksi | Admin / Design |
| diproduksi | selesai | Produksi |
| apapun | dibatalkan | Admin / Super Admin |

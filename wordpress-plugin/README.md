# Plugin WordPress: Pasukan Pemadam Hutan

Menampilkan game `pemadam-hutan.html` di halaman atau post WordPress lewat shortcode.

## Membuat zip

```bash
./build.sh   # menghasilkan pemadam-hutan.zip dari ../pemadam-hutan.html
```

## Memasang

1. Di dasbor WordPress: **Plugin > Tambah Baru > Unggah Plugin**, pilih `pemadam-hutan.zip`, lalu **Pasang Sekarang** dan **Aktifkan**.
2. Di halaman atau post, tambahkan blok **Shortcode** berisi `[pemadam_hutan]`.

## Atribut shortcode

| Atribut | Bawaan | Keterangan |
|---|---|---|
| `tinggi` | `min(85vh,760px)` | Tinggi area game (CSS). Minimum tetap 520px. |
| `lebar` | `1200px` | Lebar maksimum area game (CSS). |
| `tautan` | `ya` | `tidak` untuk menyembunyikan tautan "Main di layar penuh". |

Contoh: `[pemadam_hutan tinggi="700px" lebar="1000px" tautan="tidak"]`

Game dimuat dalam iframe supaya CSS game tidak bentrok dengan tema.

## Memperbarui game

Ubah `../pemadam-hutan.html`, naikkan `Version` dan `PEMADAM_HUTAN_VERSION` di `pemadam-hutan.php`
(supaya browser tidak memakai versi lama dari cache), jalankan `./build.sh`, lalu unggah ulang zip-nya.

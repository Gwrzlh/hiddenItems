# 🗺️ Task 2: Hidden Item Game (CLI Based)

Repository ini berisi program berbasis *Command-Line Interface* (CLI) menggunakan **PHP Native** untuk menyelesaikan tantangan permainan pelacakan rute pada sebuah peta grid koordinat.

## 🧠 Logika & Aturan Main
1. **Simbol Peta:**
   * `X` : Posisi awal karakter saat mulai berdiri.
   * `#` : Rintangan / Tembok (Jalur tidak bisa dilewati).
   * `.` : Jalan kosong / Aman untuk dilalui.
   * `$` : Titik koordinat akhir tempat item berhasil ditemukan (Bonus).
2. **Aturan Navigasi:** 
   Pemain harus bergerak secara berurutan: **Ke Atas (A) ➡️ Ke Kanan (B) ➡️ Ke Bawah (C)**. Jika di tengah-tengah langkah kaki menabrak `#` atau keluar dari batas koordinat peta, maka rute otomatis dianggap **gagal**.

---

## 🚀 Cara Menjalankan Program

Pastikan komputer/laptop kamu sudah terinstall PHP (bisa lewat terminal Laragon/CMD biasa).

1. Buka Terminal atau Command Prompt.
2. Masuk ke folder proyek ini:
   ```bash
   cd hiddenItem

## Jalankan Perintah

    php hidden_item.php

## CONTOH PENGUJIAN

    1.Langkah Atas (A): 2
    2.Langkah Kanan (B): 2
    3.Langkah Bawah (C): 1

## TAMPILAN OUTPUT SUCSESS

    🎯 HASIL PELACAKAN KOORDINAT:
    ✅ Kemungkinan lokasi item ada di -> [Baris: 2, Kolom: 4]
    📦 BONUS: Tampilan Peta Akhir (Harta Karun = $):
    . . . # .
    . # . . .
    . . . # $
    . # X . .
    . . . . #

## by Daffa Rizquloh
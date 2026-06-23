# InfraHub - Sistem Pengaduan Infrastruktur Kelurahan

![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

## Deskripsi

**InfraHub** adalah sistem informasi berbasis web untuk mengelola pengaduan kerusakan fasilitas umum di tingkat kelurahan. Sistem ini memungkinkan warga untuk melaporkan kerusakan infrastruktur secara digital dan admin untuk mengelola laporan tersebut dengan efisien.

## Fitur Utama

### Dashboard Admin
-  Statistik laporan real-time (Total, Menunggu, Diproses, Selesai)
- Kelola laporan dengan filter dan search
- ️Manajemen kategori fasilitas
- Manajemen data warga (aktif/nonaktif)
- Widget laporan terbaru

### Dashboard Warga
-  Form pengaduan dengan upload foto
-  Preview foto sebelum kirim
-  Riwayat laporan dengan timeline status
-  Statistik laporan pribadi
-  Fitur upvote untuk mendukung laporan

### Keamanan
- Role-based access control (Admin & Warga)
- CSRF protection
- Password hashing dengan bcrypt
- Validasi input yang ketat

## Teknologi

| Teknologi | Versi | Deskripsi |
|-----------|-------|-----------|
| Laravel | 10.x | Backend Framework |
| PHP | 8.2+ | Programming Language |
| MySQL | 8.0 | Database |
| Tailwind CSS | 3.x | Styling Framework |
| Alpine.js | 3.x | JavaScript Framework |

## Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB

### Langkah Instalasi

1. **Clone repository**
```bash
git clone https://github.com/iqiirascal-lgtm/infrahub-kelurahan-app.git
cd infrahub-kelurahan-app

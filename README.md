# Sistem Pengolahan Data Gereja

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel 11">
  <img src="https://img.shields.io/badge/Livewire-3-4E56A6?style=for-the-badge&logo=livewire" alt="Livewire 3">
  <img src="https://img.shields.io/badge/Tailwind-CSS-38B2AC?style=for-the-badge&logo=tailwind-css" alt="Tailwind CSS">
</p>

## 📖 Deskripsi

Sistem Pengolahan Data Gereja adalah aplikasi manajemen gereja lengkap yang dibangun menggunakan Laravel 11, Livewire 3, dan Tailwind CSS. Sistem ini mencakup manajemen jemaat, persembahan, jadwal ibadah, komsel, pelayanan, dan laporan lengkap dengan role-based access control.

## ✨ Fitur Utama

### 1. Authentication & Authorization
- Login, Logout, Register dengan Laravel Breeze
- Multi-role system (Super Admin, Admin, Sekretaris, Bendahara, Jemaat)
- Role-based access control menggunakan Spatie Permission
- Profile management dengan upload foto

### 2. Dashboard
- Statistik ringkasan (total jemaat, persembahan, jadwal, komsel, pelayanan)
- Grafik pertumbuhan jemaat dan persembahan
- Activity log terbaru
- Quick actions untuk fitur utama

### 3. Manajemen Jemaat
- CRUD lengkap data jemaat dengan berbagai informasi (NIK, alamat, kontak, dll)
- Upload foto jemaat
- Status keanggotaan (Calon Anggota, Anggota Baptis, Anggota Sidi, Anggota Pindahan)
- Search, filter, dan pagination
- Import/Export Excel dan PDF
- Print kartu anggota

### 4. Manajemen Persembahan & Keuangan
- Pencatatan persembahan (Perpuluhan, Syukur, Kolekte, Misi, Pembangunan)
- Laporan keuangan (harian, mingguan, bulanan, tahunan)
- Statistik dan grafik persembahan
- Export laporan ke PDF & Excel

### 5. Jadwal Ibadah
- CRUD jadwal ibadah dengan liturgi lengkap
- Assign pelayan ke jadwal ibadah
- Export jadwal dan liturgi ke PDF
- Kalender view

### 6. Manajemen Komsel (Kelompok Sel)
- CRUD kelompok sel
- Manajemen anggota komsel
- Catatan pertemuan dengan upload foto
- Laporan komsel

### 7. Manajemen Pelayanan
- CRUD jenis pelayanan
- Manajemen pelayan
- Jadwal pelayanan
- History pelayanan

### 8. Laporan Lengkap
- Laporan jemaat, keuangan, ibadah, komsel, dan pelayanan
- Export ke PDF & Excel
- Filter by tanggal range

### 9. Activity Log (Audit Trail)
- Log semua aktivitas user dengan Spatie Activity Log
- Filter by user, tanggal, jenis aktivitas

### 10. Settings
- Informasi gereja
- User management (CRUD users, assign roles)
- Role & permission management

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Frontend**: Livewire 3 + Tailwind CSS + Alpine.js
- **Database**: MySQL/SQLite
- **Authentication**: Laravel Breeze (Livewire stack)
- **Additional Packages**:
  - Laravel Excel (export/import Excel)
  - DomPDF (export PDF)
  - Spatie Laravel Permission (role & permission)
  - Spatie Laravel Activity Log (audit trail)

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL atau SQLite

## 🚀 Installation

### 1. Clone Repository

```bash
git clone https://github.com/Febrii142/sistem_gereja_laravel.git
cd sistem_gereja_laravel
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Environment

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_gereja
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations & Seeders

```bash
php artisan migrate --seed
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Build Assets

```bash
npm run dev
# atau untuk production
npm run build
```

### 8. Run Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 👤 Default User Accounts

Setelah seeding, Anda dapat login dengan akun berikut:

| Role | Email | Password |
|------|-------|----------|
| Super Admin | admin@gereja.com | password |
| Admin | admin2@gereja.com | password |
| Sekretaris | sekretaris@gereja.com | password |
| Bendahara | bendahara@gereja.com | password |
| Jemaat | jemaat@gereja.com | password |

## 📁 Database Schema

### Tables:
- `users` - Data user dengan roles
- `roles` & `permissions` - Role & permission management (Spatie)
- `jemaats` - Data jemaat
- `persembahans` - Data persembahan & keuangan
- `jadwal_ibadahs` - Jadwal ibadah
- `pelayanans` - Jenis pelayanan
- `pelayans` - Data pelayan (pivot jemaat & pelayanan)
- `jadwal_pelayans` - Assign pelayan ke jadwal ibadah
- `komsels` - Kelompok sel
- `komsel_members` - Anggota komsel (pivot)
- `komsel_meetings` - Catatan pertemuan komsel
- `church_settings` - Pengaturan gereja
- `activity_log` - Activity log (Spatie)

## 🎨 UI/UX

- Modern dan responsive design dengan Tailwind CSS
- Dark mode support
- Real-time interaction dengan Livewire
- Modal untuk create/edit tanpa page reload
- Toast notifications
- Loading indicators
- Search dengan debounce

## 📝 Development Notes

### File Structure

```
app/
├── Http/Controllers/
├── Livewire/          # Livewire components
├── Models/            # Eloquent models
├── Exports/           # Excel exports
└── Imports/           # Excel imports

database/
├── migrations/        # Database migrations
├── seeders/          # Database seeders
└── factories/        # Model factories

resources/
├── views/
│   ├── layouts/      # Layout templates
│   └── livewire/     # Livewire views
├── css/
└── js/

public/
├── uploads/          # Uploaded files
│   ├── jemaat/
│   └── komsel/
└── exports/          # Generated exports
```

### Running Tests

```bash
php artisan test
```

### Code Style

```bash
./vendor/bin/pint
```

## 🔒 Security

- CSRF protection
- XSS prevention
- SQL injection prevention
- Role-based access control
- Secure file upload
- Activity logging

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**Febrii142**

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

## ⭐ Show your support

Give a ⭐️ if this project helped you!


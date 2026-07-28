# ICOMMITS Company Profile Website

## 📌 Tentang Project

Website Company Profile untuk **ICOMMITS** yang dibangun menggunakan **Laravel 10** sebagai backend dan **Blade Template** sebagai frontend.

Website ini bertujuan untuk memperkenalkan profil perusahaan, layanan yang ditawarkan, portfolio, serta menyediakan media komunikasi bagi calon klien.

---

## 🚀 Fitur

- Landing Page Modern
- Company Profile
- Daftar Layanan
- Detail Layanan
- Portfolio
- Contact Form
- Responsive Design
- Admin Dashboard (CRUD)

---

## 🛠️ Tech Stack

| Technology | Version |
| ---------- | ------- |
| PHP        | 8.1+    |
| Laravel    | 10.x    |
| Composer   | Latest  |
| MySQL      | 8.x     |
| Bootstrap  | 5.x     |
| HTML5      | Latest  |
| CSS3       | Latest  |
| JavaScript | ES6     |

---

## 📂 Struktur Halaman

### Frontend

- Home
- About Us
- Services
- Service Detail
- Portfolio
- Contact

### Backend

- Dashboard
- Manage Services
- Manage Portfolio
- Contact Messages

---

## 📦 Installation

Clone repository

```bash
git clone https://github.com/yourusername/icommits-company-profile.git
```

Masuk ke folder project

```bash
cd icommits-company-profile
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Konfigurasi database pada file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=icommits
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration

```bash
php artisan migrate
```

Menjalankan server

```bash
php artisan serve
```

Akses website

```
http://127.0.0.1:8000
```

---

## 📁 Struktur Folder

```
app/
bootstrap/
config/
database/
public/
resources/
│
├── css/
├── js/
├── views/
│   ├── layouts/
│   ├── home/
│   ├── about/
│   ├── services/
│   ├── portfolio/
│   ├── contact/
│   └── admin/
routes/
storage/
```

---

## 🗄️ Database

Tabel yang digunakan:

- users
- services
- portfolios
- contacts

---

## 🎨 UI Concept

Mengusung konsep **Modern Corporate Website** dengan karakteristik:

- Clean Layout
- Professional Appearance
- Responsive
- Fast Loading
- User Friendly
- SEO Friendly

Inspirasi desain mengacu pada website perusahaan konsultan IT modern dengan penyesuaian identitas visual ICOMMITS.

---

## 👨‍💻 Developer

**Project:** ICOMMITS Company Profile Website

**Framework:** Laravel 10

**Database:** MySQL

**Frontend:** Blade + Bootstrap 5

---

## 📄 License

This project is intended for internal company use and development purposes.

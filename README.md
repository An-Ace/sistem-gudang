# SISTEM GUDANG
## Test From ID-GROW
### Description
**This application is a test of ID-GROW, using the table models users, items, mutations and using SOFT DELETE implementation.**
#### Relational Database Models
- **User -> Mutations (Has Many)**
- **Item -> Mutations (Has Many)**
- **Mutations -> User, Item (Belongs To)**
### Use Stack
- **Laravel 11 as Backend Framework API**
- **Vue JS as Frontend Framework**
- **Postgres as DBMS**
- **Tailwind as CSS Utility**
- **Prime UI as Frontend UI**
- **Docker Container**
- **Nginx**

## Installations (Docker)
- **Clone this repository**
- **Run `docker-compose build`**
- **Run `docker-compose up -d`**
- **Run `docker exec app-be-nasrulloh php artisan migrate --seed`**
- **Open In Brower Or Click -> ['localhost:8000'](http://localhost:8000)**
- **You can Register an Account On: -> ['localhost:8000/signup'](http://localhost:8000/signup)**

## Installations (Local / Tanpa Docker)

### Prasyarat
| Kebutuhan | Versi | Catatan |
| --- | --- | --- |
| PHP | `>= 8.2` | Ekstensi wajib: `pdo_pgsql`, `pgsql`, `mbstring`, `openssl`, `fileinfo`, `ctype`, `curl`, `xml`, `bcmath` |
| Composer | `2.x` | https://getcomposer.org |
| Node.js | `>= 18` | Boleh pakai `npm`, `bun`, `pnpm`, atau `yarn` |
| PostgreSQL | `>= 14` (Docker image pakai 17) | Jalan di `127.0.0.1:5432` |

> **Windows:** cara termudah memasang PHP + ekstensi adalah lewat [Laragon](https://laragon.org) atau [XAMPP](https://www.apachefriends.org). Pastikan `pdo_pgsql` & `pgsql` sudah di-uncomment pada `php.ini`, lalu cek dengan `php -m`.

### 1. Clone & masuk ke folder project
```bash
git clone <url-repository-ini> sistem-gudang
cd sistem-gudang
```

### 2. Siapkan database PostgreSQL
Buat database kosong bernama `sistem-gudang`:
```bash
# lewat psql
psql -U postgres -c "CREATE DATABASE \"sistem-gudang\";"
```
Atau buat manual lewat pgAdmin / DBeaver dengan nama database `sistem-gudang`.

### 3. Install dependency backend
```bash
composer install
```

### 4. Buat file `.env`
```bash
# Linux / macOS
cp .env.example .env

# Windows (PowerShell)
Copy-Item .env.example .env
```
Sesuaikan bagian database bila kredensial Postgres Anda berbeda:
```env
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=sistem-gudang
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

### 5. Generate application key
```bash
php artisan key:generate
```

### 6. Migrasi + seeding database
```bash
php artisan migrate --seed
```

### 7. Install dependency frontend
```bash
npm install
# atau: bun install
```

### 8. Jalankan aplikasi (butuh 2 terminal)
**Terminal 1 — backend Laravel:**
```bash
php artisan serve --port=8000
```

**Terminal 2 — Vite dev server (frontend):**
```bash
npm run dev
# atau: bun run dev
```
Vite berjalan di port `3000` (lihat `vite.config.js`) dan asset di-inject otomatis ke Blade, jadi **Vite harus tetap menyala** selama development.

### 9. Buka aplikasi
- **Aplikasi:** ['localhost:8000'](http://localhost:8000)
- **Registrasi akun:** ['localhost:8000/signup'](http://localhost:8000/signup)

### Mode produksi (tanpa dev server)
Bila tidak ingin menjalankan Vite terus-menerus, build asset sekali lalu cukup jalankan `php artisan serve`:
```bash
npm run build
php artisan serve --port=8000
```

### Troubleshooting
| Masalah | Solusi |
| --- | --- |
| `could not find driver` | Ekstensi `pdo_pgsql` belum aktif. Aktifkan di `php.ini`, restart terminal, cek `php -m \| grep pgsql`. |
| `SQLSTATE[08006] connection refused` | Service PostgreSQL belum jalan atau host/port di `.env` salah. |
| `No application encryption key has been specified` | Jalankan `php artisan key:generate`. |
| Halaman tampil tanpa CSS/JS | Vite belum jalan (`npm run dev`) atau asset belum di-build (`npm run build`). |
| Perubahan `.env` tidak terbaca | Jalankan `php artisan config:clear` lalu restart `php artisan serve`. |
| Port 8000 / 3000 sudah dipakai | Ganti dengan `php artisan serve --port=8080`, atau ubah `server.port` di `vite.config.js`. |

## Backend Tests
- ~~Open Postman ['Click Here'](https://www.postman.com/satellite-specialist-33117715/workspace/test-muhammad-nasrulloh/collection/30824227-9ba35438-add0-4211-ad95-e8c7a81192bc?action=share&creator=30824227)~~ ***(Issue: can’t send requests to the Localhost)**
- **Open Here:** [<img src="https://run.pstmn.io/button.svg" alt="Run In Postman" style="width: 128px; height: 32px;">](https://god.gw.postman.com/run-collection/30824227-9ba35438-add0-4211-ad95-e8c7a81192bc?action=collection%2Ffork&source=rip_markdown&collection-url=entityId%3D30824227-9ba35438-add0-4211-ad95-e8c7a81192bc%26entityType%3Dcollection%26workspaceId%3D4a395420-f9e6-402f-8703-810890b1988d) **And Choose <ins>import a copy</ins>**
- **SignUp Account on Auth Tab**
- **For Example:**
  - **Name:** `Example`
  - **Email:** `example@demo.com`
  - **Password:** `password`
  - **Confirm Password:** `password`
- **Copy Token from the response (data.token) ex: "1|ec6SeOEog8omnjSsaWWEA9JsFQIkQB80e4UBKkYDf68187eb"**
- **Paste to env Tab -> variable: bearerToken**
  - **Ex: "Bearer 1|ec6SeOEog8omnjSsaWWEA9JsFQIkQB80e4UBKkYDf68187eb"**
- **After Have Bearer Token, You Can Access All APIs**
# 🚀 Panduan Deploy ke Hosting (Railway)

## Prerequisites
1. Akun GitHub dengan project sudah di-push
2. Akun Railway (railway.app)

---

## 🗑️ CARA RESET/MENGHAPUS SETTINGAN GIT LAMA

Kalau sebelumnya sudah ada remote origin yang salah, bisa dihapus dengan:

**Pakau PowerShell:**
```powershell
# Buka PowerShell, cd ke folder project:
cd C:\Users\andik\Desktop\japanese-course-laravel\laravel

# Hapus konfigurasi git lama (folder .git):
Remove-Item -Path ".git" -Recurse -Force
```

**JIka masih error "remote origin already exists", coba:**
```powershell
cd C:\Users\andik\Desktop\japanese-course-laravel\laravel
git remote remove origin
```

**✅ Error "not a git repository" = BERHASIL DIHAPUS!**

Ini tanda .git folder sudah dihapus. Sekarang bisa push ulang ke GitHub baru:

**Atau cara manual:**
1. Buka File Explorer
2. Buka folder `C:\Users\andik\Desktop\japanese-course-laravel\laravel`
3. Cari folder `.git` (mungkin hidden)
4. Klik kanan → Delete

Artinya: Menghapus folder `.git` agar bisa mulai dari awal (reset total).

---

## ⛔IMPORTANT: BUAT REPOSITORY DULU!
**SEBELUM SEMUA HAL, ANDA HARUS MEMBUAT REPOSITORY DI GITHUB!**

1. **Buka:** https://github.com dan login
2. Klik **"+ New repository"** (pojok kanan atas)
3. **ISI:**
   - Repository name: `nihongo-course-laravel`
   - Public: ✅ (jangan Private)
   - ⛔ JANGAN centang "Add a README" ⛔
   - ⛔ JANGAN centang "Add .gitignore" ⛔
4. Klik **"Create repository"**

**SETELAH ITU, BARU BISA UPLOAD FILE!**

---

## Langkah 1: Buat Repository di GitHub (PENTING!)

**INI HARUS DILAKUKAN DI WEBSITE GITHUB, BUKAN DI COMMAND PROMPT!**

1. **Buka browser dan login ke GitHub:** https://github.com
2. Klik tombol **"+"** (pojok kanan atas) → **"New repository"**
3. **isi seperti ini:**
   - **Repository name:** `nihongo-course-laravel` 
   - **Description:** (opsional) Japanese course backend
   - **Public:** ✅
   - **INI PENTING - JANGAN centang** "Add a README file"
   - **INI PENTING - JANGAN centang** "Add .gitignore"
4. Klik **"Create repository"**

**TUNGGU - Jangan закрыть halaman sampai step 2 selesai!**

---

## Langkah 2: Push dari Local (Command Prompt)

```bash
cd japanese-course-laravel/laravel
git init
git add .
git commit -m "Add caching optimization"

# Ganti USERNAME dengan username GitHub Anda:
git remote add origin https://github.com/andhikalalu-cyber/nihongo-course-laravel.git
git push -u origin main
```

**Kalau error "remote origin already exists":**
```bash
# Hapus remote origin dulu:
git remote remove origin
# Lalu tambahkan lagi:
git remote add origin https://github.com/andhikalalu-cyber/nihongo-course-laravel.git
```

---

## Langkah 2: Deploy ke Railway

1. Buka **railway.app** dan login dengan GitHub
2. Klik **"New Project"** → **"Deploy from GitHub repo"**
3. Pilih repository Anda
4. Railway akan auto-detect Laravel

---

## Langkah 3: Setup Database

1. Di Railway dashboard, klik **"+ New"** → **"MySQL"**
2. Copy credentials database

---

## Langkah 4: Konfigurasi Environment Variables

Di Railway dashboard, masuk ke **"Variables"** tab:

```
APP_NAME="Japanese Course"
APP_ENV=production
APP_KEY=base64:XXXXXXXXXXXXXXXXXXXXX  # Generate dengan: php artisan key:generate
APP_DEBUG=false
APP_URL=https://your-domain.railway.app

DB_CONNECTION=mysql
DB_HOST=your-mysql-host
DB_PORT=3306
DB_DATABASE=railwaydb
DB_USERNAME=root
DB_PASSWORD=your-password

CACHE_DRIVER=redis  # Atau "file" untuk development
```

---

## Langkah 5: Generate APP_KEY

Di Railway, klik **"Shell"** lalu jalankan:

```bash
php artisan key:generate
php artisan migrate
```

---

## 🎯 Alternatif Hosting Murah

| Hosting | Harga | Gratis? | Kelebihan |
|---------|------|---------|-----------|
| **Railway** | $5/bulan | $0 (100 jam) | Easy deployment |
| **Render** | $7/bulan | ✓ | Free tier available |
| **DigitalOcean** | $4/bulan | ✗ | Full control |
| **PythonAnywhere** | $5/bulan | ✓ | PHP ready |

---

## ⚡ Rekomendasi: Railway (Sudah Konfigurasi)

File `railway.json` sudah ada di project Anda:

```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "nixpacks/php laravel"
  },
  "deploy": {
    "numReplicas": 1,
    "restartPolicyType": "ON_FAILURE",
    "restartPolicyMaxRetries": 10
  }
}
```

Cukup push ke GitHub dan connect ke Railway!

---

## 🔧 Optimasi Kecepatan yang Sudah Ditambahkan

1. ✅ **Caching** - Cache data courses, testimonials, instructors selama 30 menit
2. ✅ **Database Indexes** - Index pada level, rating, dan created_at columns
3. ✅ **Query Optimization** - Menggunakan eager loading pattern

---

## 📝 Cara Testing Lokal

```bash
cd japanese-course-laravel/laravel

# Install dependencies
composer install

# Copy environment file
copy .env.example .env

# Generate key
php artisan key:generate

# Setup database (SQLite untuk development)
touch database/database.sqlite

# Edit .env:
# DB_CONNECTION=sqlite

# Run migrations
php artisan migrate

# Jalankan server
php artisan serve
```

---

## ✅ Checklist Deploy

- [ ] Push code ke GitHub
- [ ] Connect Railway ke GitHub
- [ ] Tambah MySQL database
- [ ] Konfigurasi environment variables
- [ ] Run `php artisan migrate`
- [ ] Test website

---

**Catatan**: Untuk development gratis, bisa gunakan **Render.com** dengan free tier, atau **Railway** dengan limit 100 jam/bulan.

---

## ❓ Troubleshooting

### Error "remote origin already exists":
```bash
cd C:\Users\andik\Desktop\japanese-course-laravel\laravel
git remote remove origin
git remote add origin https://github.com/andhikalalu-cyber/nihongo-course-laravel.git
git push -u origin main
```

### Error "Repository not found":
**Ini berarti repository BELUM Dibuat di GitHub!**

Silakan IKUTI LANGKAH DIBAWAH ini dengan sangat teliti:

**LANGKAH 1 - BUAT REPOSITORY (PASTIKAN DI浏览器/BROWSER):**
1. Buka **https://github.com** dan login
2. Klik **"+"** (pojok kanan atas) → **"New repository"**
3. Pada halaman baru, ISI:
   - **Repository name:** `nihongo-course-laravel` 
   - **Description:** (kosongkan saja)
   - Pilih **Public** (bukan Private)
   - ⛔ **JANGAN centang** "Add a README file" ⛔
   - ⛔ **JANGAN centang** "Add .gitignore" ⛔
4. Klik tombol **"Create repository"** (warna hijau)

**SETELAH KLIK Create repository, Anda akan masuk ke halaman baru!**

**LANGKAH 2 - PUSH KE GITHUB:**
Setelah halaman repository created, COPY semua perintah di bawah ini:
```bash
cd C:\Users\andik\Desktop\japanese-course-laravel\laravel
git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/andhikalalu-cyber/nihongo-course-laravel.git
git push -u origin main
```

---

## Cara Alternatif: Upload via Browser (Tanpa Git Command/Paling Mudah!)

Kalau git command error terus, pakai cara ini:

1. **Buka folder project:**
   - Buka File Explorer
   - Buka folder `C:\Users\andik\Desktop\japanese-course-laravel\laravel`
   - **KECUALI** folder `.git` dan `node_modules` (jangan di-include)

2. **Buat ZIP:**
   - Select semua file & folder (TEKAN Ctrl+A)
   - Klik kanan → "Send to" → "Compressed (zipped) folder"
   - Simpan dengan nama: `laravel.zip`

3. **Upload ke GitHub:**
   - Buka https://github.com/andhikalalu-cyber/nihongo-course-laravel
   - Kalau belum ada, buat repository dulu!
   - Klik tombol **"Add file"** → **"Upload files"**
   - Drag file `laravel.zip` ke sana
   - Klik **"Commit changes"**

4. **Extract di GitHub:**
   - Setelah upload, klik file zip tersebut
   - Klik "..." → "Download"
   - Nanti bisa diextract di Railway

---

## Atau: Pakai GitHub Desktop (Recommended!)

Cara termudah untuk beginner:

1. Download **GitHub Desktop** dari: https://desktop.github.com
2. Install dan login dengan akun GitHub Anda
3. Setelah install, akan muncul jendela baru
4. Klik **"Add Existing Repository"** (bukan Clone!)
5. Pilih folder: `C:\Users\andik\Desktop\japanese-course-laravel\laravel`
6. Klik **"Choose"**
7. Nanti akan ada tombol **"Publish repository"** di pojok kanan bawah
8. Klik tombol tersebut dan pilih "Publish repository"
9. Selesai! Repository sudah ada di GitHub

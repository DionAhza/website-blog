# 📝 Laravel Blog Application

## 📋 Deskripsi Proyek
**Laravel Blog** adalah aplikasi manajemen blog yang dibangun dengan **Laravel** dan menggunakan **Tailwind CSS** untuk styling. Aplikasi ini memungkinkan pengguna untuk membuat, mengelola, dan melihat postingan blog, dengan fitur penyaringan berdasarkan kategori dan penulis.

## 🚀 Fitur Utama
- 🔐 **Autentikasi Pengguna**: Login, registrasi, dan logout yang aman.
- 🧑‍💻 **Manajemen Profil**: Pengguna dapat mengelola profil dan postingan mereka.
- 📝 **Manajemen Postingan**: Fungsionalitas CRUD penuh untuk postingan blog.
- 🗂️ **Filter Kategori & Penulis**: Saring postingan berdasarkan kategori atau penulis.
- 📱 **Desain Responsif**: Menggunakan Tailwind CSS untuk antarmuka pengguna yang ramping.
- 🌐 **Halaman Statis**: Termasuk halaman Home, About, dan Contact.

## 📦 Instalasi

1. **Clone** repositori ini ke lokal Anda:
    ```bash
    git clone https://github.com/DionAhza/website-blog
    cd website-blog
    ```

2. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```

3. Salin file `.env.example` ke `.env`:
    ```bash
    cp .env.example .env
    ```

4. Generate kunci aplikasi:
    ```bash
    php artisan key:generate
    ```

5. Setel konfigurasi database di file `.env`, kemudian jalankan migrasi:
    ```bash
    php artisan migrate
    ```

6. Jalankan server:
    ```bash
    php artisan serve
    ```

7. Buka aplikasi di browser:
    ```
    http://localhost:8000
    ```

## 🛠️ Teknologi yang Digunakan
- **Laravel** - Framework PHP untuk pengembangan aplikasi web.
- **MySQL** - Sistem manajemen database relasional untuk menyimpan data postingan, pengguna, dan kategori.
- **Tailwind CSS** - Framework CSS untuk desain yang modern dan responsif.
- **Blade** - Templating engine Laravel untuk membuat tampilan dinamis.

## 📄 Dokumentasi API
| Endpoint                     | HTTP Method | Deskripsi                               |
|------------------------------|-------------|-----------------------------------------|
| `/register`                  | POST        | Mendaftarkan pengguna baru              |
| `/login`                     | POST        | Login untuk pengguna                    |
| `/posts`                     | GET         | Mengambil daftar postingan              |
| `/posts/{slug}`              | GET         | Mengambil detail postingan              |
| `/post/create`               | POST        | Membuat postingan baru                  |
| `/post/{slug}`               | PUT         | Mengupdate postingan berdasarkan slug    |
| `/post/{slug}`               | DELETE      | Menghapus postingan berdasarkan slug     |

## 👨‍💻 Kontribusi
Kontribusi sangat diterima! Ikuti langkah-langkah berikut untuk memulai:
1. **Fork** repositori ini.
2. Buat cabang baru untuk fitur atau perbaikan: 
    ```bash
    git checkout -b fitur-baru
    ```
3. Commit perubahan Anda: 
    ```bash
    git commit -m 'Menambahkan fitur baru'
    ```
4. Push ke cabang Anda: 
    ```bash
    git push origin fitur-baru
    ```
5. Buka **Pull Request** untuk review.

## 📧 Kontak
Jika Anda memiliki pertanyaan atau saran, jangan ragu untuk menghubungi kami di [dionahza15@gmail.com](mailto:dionahza15@gmail.com).

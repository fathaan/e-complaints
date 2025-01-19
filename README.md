### **E-Complaints Politeknik Negeri Lampung**

**E-Complaints** adalah aplikasi web pengaduan resmi yang dirancang untuk memfasilitasi pelaporan kerusakan fasilitas kampus di Politeknik Negeri Lampung. Aplikasi ini memberikan kemudahan bagi seluruh civitas akademika untuk melaporkan masalah yang ditemukan, sehingga dapat ditangani dengan cepat dan efektif.

---

### **Fitur Utama**

1. **Pelaporan Kerusakan**  
   Pengguna dapat mengajukan pengaduan terkait fasilitas kampus yang rusak, seperti ruang kelas, laboratorium, taman, atau fasilitas lainnya.

2. **Manajemen Laporan**  
   Setiap laporan akan dikelola oleh admin untuk memastikan tindak lanjut dan penyelesaian masalah.

3. **Notifikasi Status Laporan**  
   Pengguna dapat memantau status pengaduan, mulai dari diterima hingga diselesaikan.

4. **User-Friendly Interface**  
   Antarmuka aplikasi dirancang agar mudah digunakan oleh semua kalangan.

---

### **Teknologi yang Digunakan**

Aplikasi ini dibangun menggunakan **CodeIgniter 4 (CI4)**, sebuah framework PHP yang ringan, cepat, fleksibel, dan aman. Pemilihan CI4 mendukung pengembangan yang efisien dan memungkinkan integrasi dengan teknologi terkini.

#### **Fitur Utama CodeIgniter 4 yang Dimanfaatkan:**
- **Keamanan**: Melindungi aplikasi dari ancaman umum seperti SQL Injection dan XSS.
- **Routing Fleksibel**: Mempermudah pengelolaan jalur akses di aplikasi.
- **Model-View-Controller (MVC)**: Memisahkan logika aplikasi dari tampilan untuk pengelolaan kode yang lebih rapi.
- **Ekstensi Modern**: Dukungan untuk PHP 8.1 atau lebih tinggi, dengan ekstensi seperti:
  - `intl` untuk penanganan bahasa dan waktu lokal.
  - `mbstring` untuk manipulasi string yang kompleks.
  - `json` untuk penanganan data berbasis JSON.
  - `mysqlnd` untuk interaksi dengan database MySQL.
  - `libcurl` untuk pengelolaan HTTP melalui CURL.

---

### **Setup dan Konfigurasi**
1. **Instalasi Framework**  
   Untuk instalasi, gunakan perintah berikut:  
   ```bash
   composer create-project codeigniter4/appstarter
   ```

2. **Konfigurasi Environment**  
   Salin file `env` ke `.env` dan sesuaikan dengan kebutuhan aplikasi, seperti:
   - Base URL aplikasi.
   - Konfigurasi database untuk menyimpan laporan pengaduan.

3. **Pengaturan Server**  
   Aplikasi ini mengikuti standar CI4, di mana file `index.php` ditempatkan di dalam folder *public* untuk keamanan. Pastikan server Anda mengarah ke folder *public*.

---

### **Persyaratan Server**
Untuk menjalankan aplikasi ini, pastikan server memenuhi spesifikasi berikut:
- **PHP**: Versi 8.1 atau lebih tinggi.
- **Ekstensi PHP**:
  - `intl`
  - `mbstring`
  - `json` (aktif secara default)
  - `mysqlnd`
  - `libcurl`

---

Aplikasi **E-Complaints Politeknik Negeri Lampung** adalah langkah nyata dalam mendukung terciptanya lingkungan kampus yang nyaman dan terawat. Dengan memanfaatkan teknologi modern, pengelolaan fasilitas menjadi lebih efektif dan transparan. Mari bersama menjaga dan meningkatkan kualitas kampus! 🚀

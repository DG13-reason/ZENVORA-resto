PANDUAN KOMPREHENSIF NODE.JS
Konsep Dasar, Arsitektur, Runtime Environment, dan Implementasi Server
1. Apa itu Node.js?
Node.js adalah sebuah runtime environment (lingkungan jalur) untuk JavaScript yang bersifat open-source dan cross-platform. Sebelum Node.js lahir pada tahun 2009 oleh Ryan Dahl, JavaScript hanya bisa berjalan di dalam web browser (seperti Google Chrome atau Mozilla Firefox) karena browser memiliki Engine JavaScript internal. Node.js mengambil V8 Engine milik Google Chrome dan mengekstensikannya agar bisa berjalan di luar browser, tepatnya langsung di dalam sistem operasi komputer atau server.
Dengan kata lain, Node.js memungkinkan developer menggunakan JavaScript untuk pemrograman sisi server (backend/server-side programming), seperti mengakses sistem berkas, mengelola koneksi database, dan membuat API jaringan skala besar.
2. Karakteristik Utama Node.js
Node.js menjadi sangat populer di kalangan software engineer karena memiliki tiga karakteristik arsitektur utama:
• Asynchronous dan Event-Driven: Semua API di Node.js bersifat tidak sinkron (non-blocking). Artinya, server Node.js tidak pernah menunggu sebuah API selesai mengembalikan data. Server akan langsung berpindah ke panggilan API berikutnya, dan memanfaatkan mekanisme notifikasi bernama Events untuk mendapatkan respon dari panggilan sebelumnya.
• Single-Threaded tetapi Sangat Scalable: Node.js menggunakan model satu thread untuk menangani banyak permintaan (request). Berbeda dengan server tradisional (seperti Apache) yang membuat thread baru untuk setiap request (memakan banyak RAM), Node.js menangani ribuan koneksi bersamaan dalam satu thread utama melalui sistem Event Loop.
• Sangat Cepat (High Performance): Karena dibangun di atas Engine V8 Google Chrome, proses eksekusi kode JavaScript menjadi sangat cepat karena langsung dikompilasi ke dalam kode mesin (machine code) sebelum dijalankan.
3. Memahami Event Loop dan Arsitektur Internal Node.js
Kunci utama dari kemampuan single-thread Node.js menangani ribuan tugas sekaligus tanpa macet terletak pada Event Loop dan library Libuv.
Ketika sebuah tugas berat masuk (misalnya membaca file 2 GB dari harddisk atau melakukan kueri kompleks ke database):
1. Thread Utama (Event Loop) akan menerima tugas tersebut terlebih dahulu.
2. Karena tugas itu membutuhkan waktu tunggu (I/O bound), Event Loop melempar atau mendatangkan tugas tersebut ke Worker Threads (Thread Pool) yang dikelola oleh library C++ bernama Libuv.
3. Thread Utama langsung bebas dan bisa segera menerima request dari pengguna lain (tidak terjadi gejala freezing atau blocking).
4. Setelah Worker Threads selesai membaca file atau mengeksekusi database, mereka akan mengirimkan callback kembali ke Event Loop untuk mengembalikan hasilnya secara utuh ke pengguna.
4. Mengenal NPM (Node Package Manager)
Saat Anda menginstal Node.js, Anda juga akan secara otomatis mendapatkan NPM. NPM adalah sebuah pengelola paket (package manager) sekaligus ekosistem registri perangkat lunak terbesar di dunia.
NPM utamanya digunakan untuk menginstal library atau framework pihak ketiga (seperti Express, Mongoose, Lodash) serta mengelola dependensi manajemen proyek melalui file manifes bernama package.json.
Perintah Dasar NPM:
• npm init : Membuat file konfigurasi package.json baru untuk proyek Anda.
• npm install <nama_package> : Menginstal library ke dalam folder proyek lokal (dimasukkan ke folder node_modules).
• npm install -g <nama_package> : Menginstal library secara global di dalam sistem operasi komputer Anda agar bisa diakses dari folder mana saja.
5. Sistem Modul di Node.js (Core Modules)
Node.js menyediakan beberapa modul bawaan (core modules) tingkat sistem yang siap digunakan langsung tanpa perlu menginstalnya terlebih dahulu lewat NPM. Beberapa modul bawaan yang paling krusial meliputi:
• http : Digunakan untuk membuat server web mandiri serta menangani komunikasi jaringan berbasis HTTP.
• fs : File System, digunakan untuk membaca, membuat, menghapus, atau memodifikasi file dan folder di dalam storage komputer.
• path : Digunakan untuk mengolah, menggabungkan, dan merapikan alamat direktori atau jalur file (file path) lintas OS.
• os : Menyediakan informasi mendalam mengenai sistem operasi lokal yang digunakan komputer (seperti sisa RAM, info arsitektur CPU, dan waktu aktif).
6. Implementasi Praktis: Membuat Web Server Pertama
Berikut adalah contoh implementasi kode JavaScript menggunakan modul bawaan http untuk membuat web server sederhana di Node.js.
Langkah 1: Menulis Kode Server (app.js)
const http = require('http');
const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Halo! Ini adalah web server pertama saya menggunakan Node.js.\n');
});

server.listen(port, hostname, () => {
  console.log(`Server sedang berjalan di http://${hostname}:${port}/`);
});

Langkah 2: Menjalankan Server via Terminal
Buka aplikasi terminal atau command prompt di direktori tempat file app.js berada, lalu jalankan perintah berikut:
node app.js

Terminal akan menampilkan log: `Server sedang berjalan di http://127.0.0.1:3000/`. Buka alamat tersebut di web browser Anda untuk melihat hasilnya.
7. Ekosistem Framework Terpopuler berbasis Node.js
Guna mempercepat pembuatan aplikasi produksi, komunitas mengembangkan berbagai web framework andal di atas runtime Node.js:
1. Express.js: Framework minimalis dan unopinionated paling populer yang menjadi standar industri untuk membuat RESTful API.
2. NestJS: Framework berbasis TypeScript dengan arsitektur OOP formal (terinspirasi dari Angular), sangat populer untuk aplikasi skala korporat.
3. Koa.js: Dibuat oleh tim asli Express.js, memanfaatkan fitur modern JavaScript (async/await) secara penuh untuk pengelolaan middleware yang lebih bersih.
4. Fastify: Framework web generasi baru yang berfokus penuh pada kecepatan performa eksekusi tingkat tinggi dan overhead routing yang sangat rendah.
8. Kapan Harus Menggunakan Node.js?
Node.js sangat optimal digunakan untuk membangun jenis sistem aplikasi berikut:
• Aplikasi Real-time: Aplikasi Chatting (Real-time Chat), Game Online Multiplayer, atau dashboard interaktif.
• Layanan Data-Intensive I/O: Sistem backend yang melayani operasi baca/tulis masif seperti layanan video streaming (Netflix, Spotify).
• REST API & Microservices: Arsitektur modern yang memecah fungsi server menjadi servis-servis kecil terpisah.

<?php include 'includes/header.php'; ?>

<?php include 'includes/navbar.php'; ?>

<section class="tentang-sect">
    <h1>TENTANG <span>ZENVORA</span></h1>
    <div class="content">
        <div class="text">
            <p>
                ZENVORA resto adalah platform digital yang menggabungkan
                layanan pemesanan makanan dan pencarian lowongan kerja.
            </p>

            <p>
                Melalui ZENVORA, Anda dapat menemukan berbagai makanan
                favorit dan peluang karier terbaik.
            </p>

            <button class="btn">Pelajari lebih lanjut</button>
        </div>

        <div class="gambar">
            <img src="assets/images/LOGO/tentang-zenvora.png" alt="">
        </div>
    </div>
    

</section>

<section class="box">
    <div class="card">
        <div class="visi">
            <h2>Visi Kami</h2>
            <p>
                Menjadi platform digital terdepan
                dalam kebutuhan makanan dan karier.
            </p>
        </div>
        <div class="misi">
            <h2>Misi Kami</h2>
            <p>
                Menyediakan layanan praktis,
                cepat, dan terpercaya.
            </p>
        </div>
    </div>
    

</section>

<section class="keunggulan">

    <h2>Keunggulan ZENVORA</h2>

    <div class="icon-box">
        <div class="card" onclick="toggleText(this)">
            <h3>Mudah Digunakan</h3>
            <p class="hidden-text">
                ZENVORA dirancang dengan tampilan yang sederhana dan mudah dipahami sehingga pengguna dapat menggunakan semua fitur dengan nyamnan tampa merasa kesulitan.
            </p>
        </div>

        <div class="card" onclick="toggleText(this)">
            <h3>Aman & Terpercaya</h3>
            <p class="hidden-text">
                kami selalu menjaga keamanan data pelanggan dan memberikan layanan yang terpecaya agar pengguna merasa aman saat menggunakan ZENVORA.
            </p>
        </div>

        <div class="card" onclick="toggleText(this)">
            <i data-feather="zap"></i>
            <h3>Cepat & Praktis</h3>
            <p class="hidden-text">
                semua layanan dibuat lebih cepat dan pratis sehingga pelanggan dapat melakukan pemesanan dan mencari informasi dengan mudah tampa menunggu lama.
            </p>
            
        </div>

        <div class="card" onclick="toggleText(this)">
            <i data-feather="star"></i>
            <h3>Layanan Terbaik</h3>
            <p class="hidden-text">
                kami berkomitmen memberikan pelayanan terbaik dengan kualitas makanan dan layanan yang memuaskan agar pelanggan mendapatkan pelanggan yang nyaman dan menyenangkan.
            </p>
        </div>
    </div>

</section>

<!-- KONTAK -->
<section class="contact-section">

    <h1>Kontak Kami</h1>
    <p>Hubungi kami kapan saja untuk informasi dan pemesanan.</p>

    <div class="contact-container">

        <div class="contact-card">
            <i data-feather="map-pin"></i>
            <h2>Alamat</h2>
            <span>Jl. Pejanggik No.12, Mataram</span>
        </div>

        <div class="contact-card">
            <i data-feather="mail"></i>
            <h2>Email</h2>
            <span>zenvoraresto@gmail.com</span>
        </div>

        <div class="contact-card">
            <i data-feather="phone"></i>
            <h2>Telepon</h2>
            <span>+62 812-3456-7890</span>
        </div>

    </div>

</section>


<?php include 'includes/footer.php'; ?>
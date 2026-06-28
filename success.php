<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="success-page">

    <div class="success-card">

        <div class="success-icon">
            🎉
        </div>

        <h1>Pesanan Berhasil!</h1>

        <p class="thanks">
            Terima kasih telah melakukan pemesanan di
            <strong>ZENVORA Resto</strong>.
        </p>

        <p class="info">
            Pesanan Anda sedang kami proses.
            <br>
            Silakan cek status pesanan pada menu
            <b>History Pesanan</b>.
        </p>

        <div class="success-btn">
            <a href="history.php" class="history-btn">
                📦 Lihat Pesanan
            </a>

            <a href="index.php" class="home-btn">
                🏠 Kembali ke Home
            </a>
        </div>

    </div>

</section>

<?php
include 'includes/footer.php';
?>
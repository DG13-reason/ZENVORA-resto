<?php 
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="booking">

    <div class="booking-left">

        <img src="img/steak.jpg" class="menu-img">

        <div class="menu-card">
            <h3>Ribeye Steak</h3>
            <p>Rp 98.000</p>
        </div>

        <div class="menu-card">
            <h3>Creamy Carbonara</h3>
            <p>Rp 65.000</p>
        </div>

    </div>


    <div class="booking-right">

        <h1>Form Pemesanan</h1>

        <div class="tab">
            <button onclick="showForm('resto')">
                Makan di Restoran
            </button>

            <button onclick="showForm('delivery')">
                Kirim ke Rumah
            </button>
        </div>


        <!-- FORM RESTORAN -->

        <form id="resto" class="active">

            <input type="text"
                placeholder="Nama Lengkap">

            <input type="tel"
                placeholder="Nomor Telepon">

            <input type="date">

            <input type="time">

            <select>
                <option>Jumlah Orang</option>
                <option>1</option>
                <option>2</option>
                <option>4</option>
            </select>

            <select>
                <option>Pilih Area</option>
                <option>Indoor</option>
                <option>Outdoor</option>
                <option>VIP</option>
            </select>

            <select>
                <option>Nomor Meja</option>
                <option>A01</option>
                <option>A02</option>
                <option>B01</option>
            </select>

            <textarea
                placeholder="Catatan">
            </textarea>

            <h3>Metode Pembayaran</h3>

            <div class="payment">

                <label>
                    <input type="radio" name="pay">
                    Tunai
                </label>

                <label>
                    <input type="radio" name="pay">
                    Transfer
                </label>

                <label>
                    <input type="radio" name="pay">
                    E-Wallet
                </label>
                
                <label>
                    <input type="radio" name="pay">
                    QRIS
                </label>
            </div>

            <button>
                Reservasi Sekarang
            </button>

        </form>


        <!-- FORM DELIVERY -->

        <form id="delivery">

            <input type="text"
                placeholder="Nama Lengkap">

            <input type="tel"
                placeholder="Nomor Telepon">

            <textarea
                placeholder="Alamat Lengkap">
            </textarea>

            <input type="text"
                placeholder="Link Google Maps">

            <select>
                <option>Metode Pengiriman</option>
                <option>Kurir Resto</option>
                <option>GoSend</option>
                <option>Grab Express</option>
            </select>

            <textarea
                placeholder="Catatan Pesanan">
            </textarea>

            <h3>Metode Pembayaran</h3>

            <div class="payment">

                <label>
                    <input type="radio" name="pay2">
                    COD
                </label>

                <label>
                    <input type="radio" name="pay2">
                    Transfer
                </label>

                <label>
                    <input type="radio" name="pay2">
                    E-Wallet
                </label>

                <label>
                    <input type="radio" name="pay2">
                    QRIS
                </label>
            </div>

            <button>
                Pesan Sekarang
            </button>

        </form>

    </div>

</section>

<?php include 'includes/footer.php' ?>
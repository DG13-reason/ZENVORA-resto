<?php 
session_start();
include 'database/koneksi.php';

if(!isset($_SESSION['user'])){
    header("Location: index.php?showLogin=1");
    exit;
}

$menus = [];
$total = 0;

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM menus WHERE id='$id'");
    if(mysqli_num_rows($query)>0){
        $menu = mysqli_fetch_assoc($query);
        $menu['quantity'] = 1;
        $menu['subtotal'] = $menu['harga'];
        $menus[] = $menu;
        $total = $menu['harga'];
    }
}
elseif(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $id => $item){
        $query = mysqli_query($conn,"SELECT * FROM menus WHERE id='$id'");
        if(mysqli_num_rows($query)>0){
            $menu = mysqli_fetch_assoc($query);
            $menu['quantity'] = $item['qty'];
            $menu['subtotal'] = $item['qty'] * $menu['harga'];
            $total += $menu['subtotal'];
            $menus[] = $menu;
        }
    }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="booking">

    <div class="booking-left">
        <?php if(count($menus)>0): ?>
        <img src="assets/images/Menu/<?= $menus[0]['gambar']; ?>" class="menu-img">

        <?php foreach($menus as $menu): ?>
        <div class="menu-card">
            <h3><?= $menu['nama_menu']; ?></h3>
            <p><?= number_format($menu['harga'],0,',','.'); ?></p>
            <small>Qty : <?= $menu['quantity']; ?></small>
        </div>
        <?php endforeach; ?>
        <h2>Total: Rp <?= number_format($total,0,',','.'); ?></h2>
        <?php else: ?>
            <h3>Belum ada Pesanan.</h3>
            <?php endif; ?>
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

        <form id="resto" class="active" method="POST" action="process/payments_process.php" enctype="multipart/form-data">
            <input type="hidden" name="total_harga" value="<?= $total; ?>">
            <input type="hidden" name="jenis_pesanan" value="resto">
            <?php if(isset($_GET['id'])){ ?>
            <input type="hidden" name="menu_id" value="<?= $_GET['id']; ?>">
            <?php
            }
            ?>

            <input type="text" name="nama" placeholder="Nama Lengkap" required>

            <input type="tel" name="telepon" placeholder="Nomor Telepon" required>
            
            <input type="date" name="tanggal" min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+30 days')); ?>" required>
            
            <select name="jam" required>
                <option value="">Pilih Jam Reservasi</option>
                <?php
                $jam = strtotime("10:00");
                $jamAkhir = strtotime("21:00");
                
                while($jam <= $jamAkhir){
                    $waktu = date("h:i", $jam);
                    echo "<option value='$waktu'>$waktu</option>";
                    $jam = strtotime("+30 minutes", $jam);
                }
                ?>
            </select>

            <select name="jumlah_orang" required>
                <option value="">jumlah_orang</option>
                <?php for($i = 1;$i <= 10;$i++){ ?>
                <option value="<?=  $i ?>"><?= $i ?> Orang</option>
                <?php 
                }
                ?>
            </select>

            <select name="area" id="area" required>
                <option value="">Pilih Area</option>
                <option value="Indoor">Indoor</option>
                <option value="Outdoor">Outdoor</option>
                <option value="VIP">VIP</option>
            </select>

            <select name="meja" id="meja" required>
                <option value="">Pilih Nomor Meja</option>
            </select>
            <textarea name="catatan" placeholder="Catatan"></textarea>
            <h3>Metode Pembayaran</h3>
            <div class="payment">
                <label>
                    <input type="radio" name="payment_method" value="Tunai" checked>
                    Tunai
                </label>

                <label>
                    <input type="radio" name="payment_method" value="Transfer">
                    Transfer
                </label>

                <label>
                    <input type="radio" name="payment_method" value="E-Wallet">
                    E-Wallet
                </label>
                
                <label>
                    <input type="radio" name="payment_method" value="QRIS">
                    QRIS
                </label>
            </div>
            <div class="payment-info">
                <div id="tunai" class="payment-box">
                    <h4>Pembayaran Tunai</h4>
                    <p>
                        Silakan lakukan pembayaran langsung di kasir saat datang ke restoran.
                    </p>
                </div>
                <div id="transfer" class="payment-box">
                    <h4>Transfer Bank</h4>
                    <p><b>Bank BCA</b></p>
                    <p>1234567890</p>
                    <p>a.n ZENVORA RESTO</p>
                </div>
                <div id="ewallet" class="payment-box">
                    <h4>E-Wallet</h4>
                    <p>DANA : 081234567890</p>
                    <p>OVO : 081234567890</p>
                    <p>GoPay : 081234567890</p>
                </div>
                <div id="qris" class="payment-box">
                    <img src="assets/images/payment/QRIS.png" width="220">
                    <p>
                        Scan QR Code di atas kemudian upload bukti pembayaran.
                    </p>
                </div>
            </div>
            <div id="uploadSection">
                <label>Upload Bukti Pembayaran</label>
                <input type="file" name="proof_image" id="proof_image" accept=".jpg,.jpeg,.png,.webp">
            </div>
            <button type="submit">
                Reservasi Sekarang
            </button>
        </form>

        <form id="delivery" method="POST" action="process/payments_process.php" enctype="multipart/form-data">
            <input type="hidden" name="total_harga" value="<?= $total; ?>">
            <input type="hidden" name="jenis_pesanan" value="delivery">
            <?php if(isset($_GET['id'])){ ?>
            <input type="hidden" name="menu_id" value="<?= $_GET['id']; ?>">
            <?php } ?>

            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="tel" name="telepon" placeholder="Nomor Telepon" required>
            <textarea name="alamat" 
                placeholder="Alamat Lengkap" required>
            </textarea>
            <input type="text" name="maps"
                placeholder="Link Google Maps">
            <select name="pengiriman" required>
                <option value="Kurir Resto" selected>
                    Kurir Resto
                </option>
            </select>
            <textarea name="catatan" placeholder="Catatan Pesanan">
            </textarea>

            <h3>Metode Pembayaran</h3>
            <div class="payment">
                <label>
                    <input type="radio" name="pay2" value="COD" checked>
                    COD
                </label>
                <label>
                    <input type="radio" name="pay2" value="Transfer">
                    Transfer
                </label>
                <label>
                    <input type="radio" name="pay2" value="E-Wallet">
                    E-Wallet
                </label>
                <label>
                    <input type="radio" name="pay2" value="QRIS">
                    QRIS
                </label>
            <div class="payment-info">
                <div id="cod" class="payment-box">
                    <h4>Bayar di Tempat (COD)</h4>
                    <p>
                        Pembayaran dilakukan saat pesanan diterima.
                    </p>
                </div>
                <div id="transfer2" class="payment-box">
                    <h4>Transfer Bank</h4>
                    <p><b>Bank BCA</b></p>
                    <p>1234567890</p>
                    <p>a.n ZENVORA RESTO</p>
                </div>
                <div id="ewallet2" class="payment-box">
                    <h4>E-Wallet</h4>
                    <p>DANA : 081234567890</p>
                    <p>OVO : 081234567890</p>
                    <p>GoPay : 081234567890</p>
                </div>
                <div id="qris2" class="payment-box">
                    <img src="assets/images/payment/QRIS.png" width="220">
                    <p>
                        Scan QR Code di atas kemudian upload bukti pembayaran.
                    </p>
                </div>
            </div>
            <div id="uploadDelivery">
                <label>Upload Bukti Pembayaran</label>
                <input type="file" name="proof_image" id="proof_image_delivery" accept=".jpg,.jpeg,.png,.webp" required>
            </div>
            <button type="submit">
                Pesan Sekarang
            </button>
        </form>
    </div>
</section>

<?php include 'includes/footer.php' ?>
<?php 
session_start();
include 'database/koneksi.php';

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
    foreach($_SESSION['cart'] as $item){
        $id = $item['id'];
        $query=mysqli_query($conn,"SELECT * FROM menus WHERE id='$id'");
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
            <?php if(isset($_GET['id'])){ ?>
            <input type="hidden" name="menu_id" value="<?= $_GET['id']; ?>">
            <?php
            }
            ?>

            <input type="text" name="nama" placeholder="Nama Lengkap">

            <input type="tel" name="telepon" placeholder="Nomor Telepon">
            
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

            <select name="jumlah_orang">
                <option value="">jumlah_orang</option>
                <?php for($i = 1;$i <= 10;$i++){ ?>
                <option value="<?=  $i ?>"><?= $i ?> Orang</option>
                <?php 
                }
                ?>
            </select>

            <select name="area" id="area">
                <option value="">Pilih Area</option>
                <option value="Indoor">Indoor</option>
                <option value="Outdoor">Outdoor</option>
                <option value="VIP">VIP</option>
            </select>

            <select name="meja" id="meja">
                <option value="">Pilih Nomor Meja</option>
            </select>

            <textarea name="catatan" placeholder="Catatan"></textarea>

            <h3>Metode Pembayaran</h3>

            <div class="payment">

                <label>
                    <input type="radio" name="payment_method" value="Tunai">
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
            <div>
                <label>Upload Bukti Transfer</label>
                <input type="file" name="proof_image">
            </div>

            <button type="submit">
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
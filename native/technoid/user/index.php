<?php
require '../function/home.php';
$judul = home()['judul'];
$produk = home()['produk'];

//keranjang
if (isset($_POST['cart'])) {
    if (cekLogin() === true) {
        tambahCart($_POST);
    } else {
        $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    }
}


require 'templates/header.php';
?>

<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= url ?>assets/images/pages/car-3.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= url ?>assets/images/pages/car-4.png" class="d-block w-100" alt="...">
        </div>
    </div>
</div>


<!-- Produk Baru -->
<div class="mt-5">
    <h5 class="text-uppercase text-center">Jelajahi Komunitas Perdagangan Terbesar di Dunia</h5>
</div>

<div class="row bg-light my-5 p-3 justify-content-center" style="margin: 0 -50px">
    <div class="col-12">
        <div class="d-flex justify-content-center flex-wrap">
            <div class="p-2">
                <img class="w-100" src="<?= url ?>assets/images/pages/ban1.png" alt="">
            </div>
            <div class="p-2">
                <img class="w-100" src="<?= url ?>assets/images/pages/ban5.png" alt="">
            </div>
            <div class="p-2">
                <img class="w-100" src="<?= url ?>assets/images/pages/ban2.png" alt="">
            </div>
            <div class="p-2">
                <img class="w-100" src="<?= url ?>assets/images/pages/ban6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Produk Baru -->
<div class="mt-5">
    <h5 class="text-uppercase text-center">Pricing</h5>
    <div class="produk-front border-top bg-light d-flex flex-wrap justify-content-center">
        <?php foreach ($produk as $value) : ?>
            <div class="col-md-2 card-produk shadow-sm m-3 bg-white">
                <div class="card-img" style="height: 50%;">
                    <img src="<?= url ?>assets/images/produk/<?= $value->gambar ?>" class="img-fluid" style="width: 100%;" alt="...">
                </div>
                <div class="card-body" style="height: 25%;">
                    <h6 class=""><?= $value->nama ?></h6>
                    <p>USD<?= number_format($value->harga, 0) ?></p>
                </div>
                <div class="d-flex justify-content-around p-2 w-75 border-top m-auto">
                    <a href="<?= url ?>user/detail.php/?id=<?= $value->id_produk ?>" class="btn btn-sm btn-info mr-1">Detail</a>
                    <form method="POST" action="">
                        <input type="hidden" name="id_produk" value="<?= $value->id_produk ?>">
                        <input type="hidden" name="nama" value="<?= $value->nama ?>">
                        <input type="hidden" name="harga" value="<?= $value->harga ?>">
                        <input type="hidden" name="kuantiti" value="1">
                        <input type="hidden" name="gambar" value="<?= $value->gambar ?>">
                        <input type="hidden" name="kategori" value="<?= $value->kategori ?>">
                        <button name="cart" class="btn btn-sm btn-success">Beli</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?= require 'templates/footer.php'; ?>
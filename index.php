<?php
 include_once 'classles/Barang.php';
 $brg = new Barang();
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $barangs = $brg->addBarang($_POST, $_FILES);
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <br><br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <?php
                        if (isset($barangs)) {
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?=$barangs?></strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="card-header">
                        <h1>Formulir Tambah Inventaris</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="">
                            <label for="Nama">Nama Barang</label>
                            <input type="text" name="nama_barang" placeholder="Masukan Nama Barang...." class="form-control">
                            <label for="jumlah">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" placeholder="0 . . 9" class="form-control">
                            <label for="kondisi">Kondisi Barang</label>
                            <input type="text" name="kondisi_barang" placeholder="Baik / Rusak" class="form-control">
                            <label for="foto">Foto Barang</label>
                            <input type="file" name="foto_barang" placeholder="Masukan Nama Barang...." class="form-control">
                            <label for="deskripsi">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang" placeholder="Masukan Nama Barang...." class="form-control"></textarea>
                            <br>
                            <input type="submit" value="input" class="btn btn-success form-control">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
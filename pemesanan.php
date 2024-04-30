<?php
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
  </script>

  <style>
    #namaMobil input[type="text"] {
      background-color: transparent;
      border: none;
      outline: none;
      text-align: center;
    }

    #namaMobil input[type="text"]:disabled {
      pointer-events: none;
    }
  </style>
</head>

<body>
  <script>
    $(document).ready(function() {
      $('form').submit(function(event) {
        event.preventDefault();
        var nama_mobil = $('#nama_mobil').val();
        var nama = $('#nama').val();
        var telepon = $('#telepon').val();
        var email = $('#email').val();
        var tanggal_peminjaman = $('#tanggal_peminjaman').val();
        var tanggal_pengembalian = $('#tanggal_pengembalian').val();

        $.ajax({
          url: 'prosesPemesanan.php',
          type: 'POST',
          data: {
            nama_mobil: nama_mobil,
            nama: nama,
            telepon: telepon,
            email: email,
            tanggal_peminjaman: tanggal_peminjaman,
            tanggal_pengembalian: tanggal_pengembalian
          },
          success: function(response) {
            alert('Data berhasil disimpan ke database.');
          },
          error: function(xhr, status, error) {
            console.error(error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
          }
        });
      });
    });
  </script>

  <section>
    <div class="container mt-4">
      <div class="row" style="margin-top: 100px">
        <div class="col-6 offset-lg-3">
          <h3 style="text-align: center">Detail Pemesanan</h3>
          <form action="pemesanan.php" class="card rounded-5 p-3" style="background-color: #ffb6b6 " method="post" enctype="multipart/form-data">
            <div class="container">
              <div id="namaMobil" style="display: flex; justify-content: center;">
                <input value="<?php
                              if (isset($_GET['pilih'])) {
                                $nama_mobil = $_GET['pilih'];
                                echo $nama_mobil;
                              }
                              ?>" class="fw-bold fs-2" type="text" name="nama_mobil" id="nama_mobil">
              </div>
              <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="form-control py-3 mt-4" />
              <input type="text" id="telepon" name="telepon" class="form-control py-3 mt-4" placeholder="Nomor telepon" />
              <input type="text" name="email" id="email" class="form-control py-3 mt-4" placeholder="Alamat email" />

              <div class="row mt-4">
                <div class="col-5">
                  <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control py-3" placeholder="Tanggal peminjaman" />
                </div>
                <div class="col-2">
                  <img src="img/Resize Horizontal.png" alt="" />
                </div>
                <div class="col-5">
                  <input name="tanggal_pengembalian" id="tanggal_pengembalian" type="date" class="form-control py-3" placeholder="Tanggal pengembalian" />
                </div>
                <label for="bukti">Kirim bukti transaksi</label>
                <input type="file" id="bukti" class="form-control" name="bukti" />
                <button type="submit" class="btn text-center rounded-3 fw-semibold mt-3" name="submit" style="background-color: red">
                  Pesan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <?php
  $pesanan = $conn->query("select mobil.nama_mobil, pesanan.nama, pesanan.telepon, pesanan.tanggal_peminjaman, pesanan.tanggal_pengembalian
  from pesanan
  inner join mobil on pesanan.id_mobil = mobil.id_mobil;");
  foreach ($pesanan as $row) :
  ?>
    <section>
      <div class="container mt-4">
        <div class="row">
          <div class="col-6 offset-lg-3">

            <div class="container card rounded-5 p-4" style="background-color: #ffb6b6;">
              <div class="d-flex" style="align-items: center; gap: 4px">
                <img src="img/Car.png" alt="" style="object-fit: none" />
                <?= $row["nama_mobil"] ?>
              </div>
              <H3>Nama Peminjam</H3>
              <p><?= $row["nama"] ?></p>
              <H3>Nomor telepon</H3>
              <p><?= $row["telepon"] ?></p>
              <h3>Tanggal peminjaman</h3>
              <p><?= $row["tanggal_peminjaman"] ?></p>
              <h3>Tanggal pengembalian</h3>
              <p><?= $row["tanggal_pengembalian"] ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach ?>
</body>

</html>
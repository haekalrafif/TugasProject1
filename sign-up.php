<?php
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    header("Location: sign-in.php");
  } else {
    echo mysqli_error($connection);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top shadow-lg" style="background-color: #fff">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3" href="index.html">
        HRF TRANS
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto fw-semibold">
          <a class="nav-link" href="index.html" style="padding-right: 40px">Sewa Mobil</a>
          <a class="nav-link" href="index.html" style="padding-right: 40px">Kontak Kami</a>
          <a class="nav-link" href="sign-in.php">Akun</a>
        </div>
      </div>
    </div>
  </nav>

  <section>
    <div class="container">
      <div class="row" style="margin-top: 150px">
        <div class="col-lg-6 offset-lg-3 col-md-12">
          <form class="card rounded-5" style="background-color: #ffb6b6" method="post">
            <div class="container">
              <div class="row">
                <div class="col p-3 mt-4">
                  <h1 style="
                        font-size: 36px;
                        font-weight: 700;
                        text-align: center;
                      ">
                    Daftar
                  </h1>
                </div>
              </div>
              <div class="row ms-4">
                <p>Masukkan alamat email</p>
              </div>
              <div class="row ms-3">
                <div class="col-11">
                  <input type="text" name="email" id="email" class="form-control py-3" placeholder="Email address" />
                </div>
              </div>
              <div class="row ms-4 mt-4">
                <div class="col-11">
                  <label for="username">Masukkan Username</label>
                  <input type="text" name="username" id="username" class="form-control py-3 mt-3" placeholder="Username" />
                </div>
              </div>
              <div class="row ms-3 mt-4">
                <p>Masukkan kata sandi</p>
                <div class="col-11">
                  <input type="password" name="password" id="password" class="form-control py-3" placeholder="Password" />
                </div>
              </div>
              <div class="row ms-3 mt-2 pt-3" style="padding-bottom: 4rem">
                <div class="col-11">
                  <button class="btn text-center rounded-3 fw-semibold" type="submit" name="register" style="
                        color: #fff;
                        background-color: red;
                        width: 100%;
                        height: 3.25rem;
                      ">
                    Register
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
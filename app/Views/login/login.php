
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="card">

    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->
      <div class="login-logo">
        <p><b>Payroll</b></p>
      </div>

      <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>
      <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <form action="/login/login" method="post">

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
          </div>
        </div>

      </form>

  </div>
</div>


<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
</body>
</html>

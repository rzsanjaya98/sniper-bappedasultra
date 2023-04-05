<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Monitoring dan Evaluasi Perencanaan Sulawesi Tenggara</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background: linear-gradient(0deg, rgba(234, 234, 234, 0.7), rgba(255, 255, 255, 0.1)), url('<?php echo base_url(); ?>assets/utama/images/bappeda.jpg'); background-size: 100%;">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url(); ?>assets/admin/dist/img/sultra.png" alt="Bappeda Sultra" height="60" width="60">
  </div>

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>SNIPER</b> SULTRA</a>
      </div>
      <div class="card-body">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->
        <?php
        if ($this->session->flashdata('login')) {
          if ($this->session->flashdata('login')['from']) {
            echo "
              <div class='alert alert-info alert-dismissible'>
                <h4><i class='icon fa fa-globe'></i> Information!</h4>" .
              $this->session->flashdata('login')["message"] .
              "</div>
              ";
          } else {
            echo "
              <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Alert!</h4>" .
              $this->session->flashdata('login')["message"] .
              "</div>
              ";
          }
        } else {
          echo "
            <div class='alert alert-info alert-dismissible'>
              <h4><i class='icon fa fa-globe'></i> Information!</h4>
              Please Sign In to Start Your Session
            </div>
            ";
        }
        ?>
        <?php echo form_open("user/login"); ?>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="user_username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="user_password" class="form-control" placeholder="Password" id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkbox_pw">
                <label class="form-check-label">Show Password</label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $('#checkbox_pw').click(function() {
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });
</script>

</html>
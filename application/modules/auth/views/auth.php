<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Inv</title>
    <script src="<?php echo base_url()?>assets/js/vendors/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css">
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <link href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo base_url()?>assets/js/require.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
    <!-- <script src="https://unpkg.com/promise-polyfill"></script> -->
    <!-- <script src="<?php echo base_url()?>assets/js/vendors/bootstrap.bundle.min.js"></script> -->

    <script>
      requirejs.config({
          baseUrl: '<?php echo base_url() ?>'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="<?php echo base_url()?>assets/css/dashboard.css" rel="stylesheet" />
    <script src="<?php echo base_url()?>assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?php echo base_url()?>assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url()?>assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?php echo base_url()?>assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url()?>assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?php echo base_url()?>assets/plugins/input-mask/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="./assets/brand/tabler.svg" class="h-6" alt="">
              </div>
              <form class="card" id="card">
                <div class="card-body p-6">
                  <div class="card-title">LOGIN</div>
                  <div class="form-group">
                    <label class="form-label">Username / E-Mail</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="Nama User Atau Email">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                      <a href="./forgot-password.html" class="float-right small">Lupa Password ?</a>
                    </label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" />
                      <span class="custom-control-label">Ingat Saya</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="button" class="btn btn-primary btn-block login" onclick="login()">Login</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                <a href="javascript:;" class="btn btn-info btn-sm" style="color:white">Cara pengajuan akun Inv !</a> <a href="javascript:;" class="btn btn-info btn-sm" style="color:white"> Ajukan User</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
function login()
{
  $.ajax({
    url:"<?php echo base_url('index.php/auth/action') ?>",
    data:$('#card').serialize(),
    type:"post",
    dataType:"JSON",
    success:function(data)
    {
      if(data.status)
      {
        location.href = "<?php echo base_url('index.php/pengajuan') ?>",
        console.log(data);
      }else{
        swal({
          type: 'warning',
          title: 'Login Gagal, User tidak ada di database !',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}
</script>
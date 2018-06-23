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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dropzone.css">
    <link href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/require.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url()?>assets/js/dropzone.js"></script>
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
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <!-- <img src="<?php echo base_url() ?>assets/demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo"> -->
               Inv
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                  <a href="javascript:;" class="btn btn-sm btn-outline-warning">Under Contruction !</a>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?php echo base_url() ?>assets/admin.png)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <?php if (isset($_SESSION['userdata'])) {$user = $this->session->userdata('userdata'); ?> 
                          <span class="text-default"><?php echo $user->username ?></span>
                          <small class="text-muted d-block mt-1"><?php echo $user->email ?></small>
                        <?php } ?>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-settings"></i> Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <i class="dropdown-icon fe fe-mail"></i> Inbox
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-send"></i> Message
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                    </a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/auth/logout') ?>">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
<!--                 <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form> -->
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/pengajuan') ?>" class="nav-link"><i class="fe fe-home"></i> Pengajuan</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/datang') ?>" class="nav-link"><i class="fe fe-box"></i> Barang Datang</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/master_data') ?>" class="nav-link"><i class="fe fe-home"></i> Master Barang</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/distribusi') ?>" class="nav-link"><i class="fe fe-home"></i> Distribusi</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/lokasi') ?>" class="nav-link"><i class="fe fe-home"></i> Lokasi</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/stockopname') ?>" class="nav-link"><i class="fe fe-home"></i> Stockopname</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/upload') ?>" class="nav-link"><i class="fe fe-home"></i> Upload</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="my-3 my-md-5">
            <?php $this->load->view($template); ?>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <!-- <li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li> -->
                    <li class="list-inline-item"><a href="./faq.html">FAQ</a></li>
                  </ul>
                </div>

              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018<a href="."> INV</a> <a href=".">. Tabler</a>. Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a> All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script> -->
  </body>
</html>
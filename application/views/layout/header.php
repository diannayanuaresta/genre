<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href='<?= base_url('assets/images/') ?>logo-genre.png' rel='shortcut icon'>

  <?php if ($this->uri->segment(1) == 'admin') { ?>
    <title>-ADMIN FORGEN-</title>
  <?php } else if ($this->uri->segment(1) == 'home') { ?>
    <title>-FORGEN-</title>
  <?php }; ?>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/fontawesome.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/templatemo-seo-dream.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/animated.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/owl.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <?php if ($this->uri->segment(1) == 'admin') { ?>
              <a href="<?= base_url('assets/') ?>index.html" class="logo">
                <h4>ADMIN FORGEN<img src="<?= base_url('assets/') ?>images/logo-genre.png" alt=""></h4>
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li class="scroll-to-section"><a href="<?= base_url('admin') ?>" class="active">Home</a></li>
                <li class="scroll-to-section"><a href="<?= base_url('admin/duta') ?>">Duta Genre</a></li>
                <li class="scroll-to-section"><a href="<?= base_url('admin/blog') ?>">Kegiatan</a></li>
                <li class="scroll-to-section"><a href="<?= base_url('admin/galeri') ?>">Galeri</a></li>
                <li class="scroll-to-section"><a href="<?= base_url('admin/setting') ?>">Setting</a></li>
                <li class="scroll-to-section">
                  <div class="main-blue-button"><a href="<?= base_url('admin/chat') ?>">Live Chat</a></div>
                </li>                
              </ul>
              <a class='menu-trigger'>
                <span>Menu</span>
              </a>
            <?php } else if ($this->uri->segment(1) == 'auth') { ?>

            <?php } else { ?>
              <a href="<?= base_url('assets/') ?>index.html" class="logo">
                <h4>FORGEN KAB.TEGAL <img src="<?= base_url('assets/') ?>images/logo-genre.png" alt=""></h4>
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li class="scroll-to-section"><a href="<?= base_url('home') ?>" class="active">Home</a></li>
                <li class="scroll-to-section"><a href="<?= base_url('home/duta') ?>">Duta Genre</a></li>
                <li class="scroll-to-section"><a href="<?= base_url('home/blog') ?>">Kegiatan</a></li>
                <li class="scroll-to-section"><a href="<?= base_url('home/galeri') ?>">Galeri</a></li>
                <li class="scroll-to-section">
                  <div class="main-blue-button"><a href="<?= base_url('home/#contact') ?>">Live Chat</a></div>
                </li>
              </ul>
              <a class='menu-trigger'>
                <span>Menu</span>
              </a>


            <?php }; ?>


            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
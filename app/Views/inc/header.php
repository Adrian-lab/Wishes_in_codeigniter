
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Header</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/">

	<link rel="stylesheet" type="text/css" href="../../public/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../../public/assets/css/bootstrap.min.css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
   <!-- <link href="sticky-footer-navbar.css" rel="stylesheet">-->
    
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <?php 

  if (isset($_SESSION['name'])){
    ?>
      <!-- navbar logged -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <img src="../../public/assets/img/logo.png" style="width:100px;height:45px;">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('home'); ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('home/products'); ?>">Products</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a class="nav-link" href="<?php echo base_url('home/profile'); ?>">Hi <?php echo $_SESSION["name"]; ?></a>
        <a class="nav-link" href="<?php echo base_url('home/logout'); ?>">Logout</a>
      </form>
    </div>
  </nav>
  <?php
  }else{

  ?>
    <!-- Default navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <img src="../../public/assets/img/logo.png" style="width:100px;height:45px;">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('home'); ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('home/products'); ?>">Products</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
          <a class="nav-link" href="<?php echo base_url('home/login'); ?>">Login</a>
          <a class="nav-link" href="<?php echo base_url('home/signin'); ?>">SingIn</a>
      </form>
    </div>
  </nav>
  <?php
  }
  ?>
</header>


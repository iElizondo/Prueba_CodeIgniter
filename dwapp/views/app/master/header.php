
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="<?=base_url()?>"> 
  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="tema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="tema/css/sb-admin.css" rel="stylesheet">

  <!-- Page level plugin CSS-->
  <link href="tema/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

</head>

<body class="bg-dark">

<!-- Header -->
<?php 
  if($this->sesion->conectado()){ 
?>

<!-- Menu -->
<?php include 'menu.php' ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include 'sidebar.php' ?>

<div id="content-wrapper">

  <div class="container-fluid">

  <?php 
    }else{
      # Login
      include 'login.php'; 
    }
  ?>
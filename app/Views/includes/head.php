<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?= base_url('global/global.css'); ?>">
   <link rel="stylesheet" type="text/css" href="<?= base_url('modules/dashboard/css/dashboard.css'); ?>">
  
  <script src="<?= base_url('global/jquery-3.7.1.min.js'); ?>"></script>

  <!-- Toastr CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <!-- jQuery (required for Toastr) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- wait me js loader -->
    <!-- WaitMe CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.min.css">
  <!-- WaitMe JS -->
  <script src="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.min.js"></script>

  <title><?= esc($title) . ' | Ignite Start' ?></title>
  <!--

  Soon to Implement

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/hamburgers.min.css">
  <link rel="stylesheet" href="css/media.css">
  <link rel="stylesheet" href="css/rslides.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/skitter.styles.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/animate.min.css">
  -->
</head>

<body>
  <!-- appear menu when session login is not null -->
  <!-- ?= view('templates/menus') ?> -->
  <!-- container -->
  <div class="container">
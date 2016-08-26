<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <?= css_asset('bootstrap.min.css') ?>
  </head>
  <body>
  <?php include('navbar.php') ?>
  <div class="container">
    <?php include('alert.php') ?>
<?php
require_once(ROOT_PATH .'Controllers/CustomerControllers.php');

session_start();

$cus = new CustomerController();
$cus->register();


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>登録完了</title>
<link rel="stylesheet" type="text/css" href="/css/reg_em.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

  <a href="customer.php">トップへ戻る</a>

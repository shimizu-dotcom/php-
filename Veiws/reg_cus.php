<?php

require_once(ROOT_PATH .'Controllers/CustomerControllers.php');

session_start();

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>顧客登録</title>
<link rel="stylesheet" type="text/css" href="/css/reg_em.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

  <div class = "top">
        <h2>REGISTER</h2>
  </div>


  <form method = "POST" action = "cus_comp.php" class = "aa">
    <p>
      <label for = "name">名前</label>
        <input type = "text" name = "name">
        <?php if(isset($err['name'])): ?>
          <?php echo $err['name']; ?>
        <?php endif; ?>
    </p>
    <p>
      <label for = "birth">誕生日</label>
        <input type = "text" name = "birth">
        <?php if(isset($err['birth'])): ?>
          <?php echo $err['birth']; ?>
        <?php endif; ?>
    </p>
    <p>
      <label for = "gender">性別</label>
        <input type = "text" name = "gender">
    </p>
    <p>
      <label for = "coming">最終来店</label>
        <input type = "date" name = "coming">
        <?php if(isset($err['coming'])): ?>
          <?php echo $err['coming']; ?>
        <?php endif; ?>
    </p>
    <p>
      <input type = "submit" value = "登録">
    </p>
  </form>

<body>
</html>

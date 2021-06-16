<?php

require_once(ROOT_PATH .'Controllers/EmployeeControllers.php');

session_start();

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>従業員登録</title>
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

  <form method = "POST" action = "reg_comp.php" class = "aa">
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
      <label for = "password">パスワード</label>
        <input type = "password" name = "password">
        <?php if(isset($err['password'])): ?>
          <?php echo $err['password']; ?>
        <?php endif; ?>
    </p>
    <p>
      <input type = "submit" value = "登録">
    </p>

<body>
</html>

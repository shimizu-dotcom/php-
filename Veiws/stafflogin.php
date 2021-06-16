<?php

require_once(ROOT_PATH .'Controllers/EmployeeControllers.php');

session_start();

$err = $_SESSION;

$_SESSION = array();
session_destroy();

$Token = new EmployeeController();
$Token->token_one();
$csrf_token1 = $_SESSION['csrf_token1'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>スタッフログイン</title>
<link rel="stylesheet" type="text/css" href="/css/stafflogin.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

  <?php
    include("top_back.php")
  ?>

    <div class = "top">
          <h2>STAFF ONLY</h2>
    </div>


    <div class = "login">
        <form action = "logcomp.php" method = "POST">
          <?php if(isset($err['msg'])): ?>
            <p><?php echo $err['msg']; ?></p>
          <?php endif; ?>
            <p>
                <label for = "name">NAME:</label>
                <input type = "text" name = "name" class = "log">
                <?php if(isset($err['name'])): ?>
                  <?php echo $err['name']; ?>
                <?php endif; ?>
            </p>
            <p>
                <label for = "name">PASSWORD:</label>
                <input type = "password" name = "password" class = "log">
                <?php if(isset($err['password'])): ?>
                  <?php echo $err['password']; ?>
                <?php endif; ?>
            </p>
            <p>
              <input type = "hidden" name = "csrf_token1" value = "<?php echo $csrf_token1; ?>">
            </p>
            <p class>
                <input type = "image" src = "/img/original.jpeg" class = "book" >
            </p>
        </form>
    </div>

<body>
</html>

<?php

require_once(ROOT_PATH .'Controllers/CalenderControllers.php');

session_start();

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>カレンダー</title>
<link rel="stylesheet" type="text/css" href="/css/calender.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

    <div class = "top">
          <h2>CALENDER</h2>
    </div>

    <div class = "up">
      <form method = "POST" action = "upcalender.php">
        <p>
          <label for = "date">日にち</label>
            <input type = "date" name = "date">
            <?php if(isset($err['date'])): ?>
              <?php echo $err['date']; ?>
            <?php endif; ?>
        </p>
        <p>
          <label for = "body">内容</label>
            <input type = "text" name = "body">
            <?php if(isset($err['body'])): ?>
              <?php echo $err['body']; ?>
            <?php endif; ?>
        </p>
        <p>
            <input type = "submit" value = "登録">
        </p>
      </form>

      <a href="staffonly.php">back</a>

    </div>



<body>
</html>

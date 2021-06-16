<?php

require_once(ROOT_PATH .'Controllers/ReserveControllers.php');

session_start();

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>予約</title>
<link rel="stylesheet" type="text/css" href="/css/reserve.css">
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
          <h2>RESERVE</h2>
    </div>

    <div class = "info">

        <form action = "send_reg.php" method = "POST">
                <p>
                    <label for = "name">NAME:</label>
                    <input type = "text" name = "name" placeholder = "ミックス太郎" class = "in">
                    <?php if(isset($err['name'])): ?>
                      <?php echo $err['name']; ?>
                    <?php endif; ?>
                </p>
                <p>
                    <label for = "tel">TEL:</label>
                    <input type = "text" name = "tel" placeholder = "00000000000" class = "in">
                    <?php if(isset($err['tel'])): ?>
                      <?php echo $err['tel']; ?>
                    <?php endif; ?>
                </p>
                <p>
                    <label for = "people">PEOPLE:</label>
                    <input type = "text" name = "people" placeholder = "10" class = "in">人
                    <?php if(isset($err['people'])): ?>
                      <?php echo $err['people']; ?>
                    <?php endif; ?>
                </p>
                <p>
                    <label for = "budget">BUDGET:</label>
                    <input type = "text" name = "budget" placeholder = "5000" class = "in">円
                    <?php if(isset($err['budget'])): ?>
                      <?php echo $err['budget']; ?>
                    <?php endif; ?>
                </p>
                <p>
                    <label for = "date">DATE:</label>
                    <input type = "date" name = "date" class = "in">
                    <?php if(isset($err['date'])): ?>
                      <?php echo $err['date']; ?>
                    <?php endif; ?>
                </p>
                <p>
                    <label for = "time">TIME:</label>
                    <input type = "time" name = "time" value = "19:00" class = "in">
                    <?php if(isset($err['time'])): ?>
                      <?php echo $err['time']; ?>
                    <?php endif; ?>
                </p>
            <p>
                <input type = "image" src = "/img/original.jpeg" class = "book" >
                <br>RESERVE
            </p>
        </form>

    </div>


<body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ヘッダー</title>
<link rel="stylesheet" type="text/css" href="/css/header.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<header>

    <div class = "head" style = "padding-top:20px;">

        <form action = "index.php" method = "post">
            <input type = "image" src = "/img/original.jpeg" style = "width:100px; height:auto; padding-left:20px;">
        </form>


        <div class = "menu">

            <div class = "open">
                <a class = "modal-open" data-target = "modal" onclick = "sound()"><img src = "/img/1531937.png" alt = "beru" style = "width:80px; height:auto;"></a>
                <audio id="sound" preload="auto">
                    <source src="/img/nc146712.mp3" type="audio/mp3">
                    <source src="/img/nc146712.wav" type="audio/wav">
                </audio>
            </div>

            <div class = "modal">

                <div class = "modal-bg js-modal-close"></div>

                <div class = "mo">
                  <a href = "drink.php">RECOMMEND</a><br><br>
                  <a href = "reserve.php">RESERVE</a><br><br>
                  <a href = "staff.php">STAFF</a><br><br>
                  <a href = "event.php">EVENT</a><br><br>
                  <a href = "access.php">ACCESS</a><br><br>
                  <a href = "contacts.php">CONTACTS</a><br><br>
                  <a href = "stafflogin.php">STAFF ONLY</a><br>
                </div>

            </div>

        </div>


    </div>

    <script>
            $(function(){
                $(".open").on("click",function(){
                    $(".modal").fadeIn();
                    return false;
                });
                $(".js-modal-close").on("click",function(){
                    $(".modal").fadeOut();
                    return false;
                });
            });

            (function (window, $) {
              'use strict';
              $.fn.useSound = function (_event, _id) {
                var se = $(_id);
                this.on(_event, function(){
                  se[0].currentTime = 0;
                  se[0].play();
                });
                return this;
              };
            })(this, this.jQuery);
            $('.open a').useSound('mousedown touchstart', '#sound');

     </script>


</header>

<body>
</html>

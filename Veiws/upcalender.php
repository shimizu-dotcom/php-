<?php
require_once(ROOT_PATH .'Controllers/CalenderControllers.php');

session_start();

$cal = new CalenderController();
$cal->calender();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>カレンダー登録</title>
<link rel="stylesheet" type="text/css" href="/css/calender.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <?php
      include("header.php")
    ?>

    <div class = "top">
        <h2>OK!!</h2>
    </div>


<body>
</html>

<?php
    require_once(ROOT_PATH .'Controllers/EmployeeControllers.php');

    session_start();
    $check = new EmployeeController();
    $check->check();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>スタッフオンリー</title>
<link rel="stylesheet" type="text/css" href="/css/staffonly.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>
    <div class = "top">
          <h2>STAFF MENU</h2>
    </div>

    <div class = "staff">

        <ul>
            <li><a href = "customer.php">Customer Information</a></li>
            <li><a href = "employee.php">Employee Information</a></li>
            <li><a href = "reserver.php">Reserver</a></li>
            <li><a href = "calender.php">Calendar</a></li>
        </ul>

    </div>

<body>
</html>

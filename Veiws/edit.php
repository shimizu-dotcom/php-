<?php
require_once(ROOT_PATH .'Controllers/CustomerControllers.php');
$customers = new CustomerController();
$params = $customers->view();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>編集</title>
<link rel="stylesheet" type="text/css" href="/css/customer.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <script>
      function submitChk () {
          var flag = confirm ( "更新しますか？");
          return flag;
      }
  </script>

  <?php
    include("header.php")
  ?>

  <div class = "top">
        <h2>EDIT</h2>
  </div>

  <?php foreach($params["customer"] as $customer): ?>
  <form method = "post" action = "upcomp.php" onsubmit="return submitChk()" class = "aa">
    <input type = "hidden" name = 'id' value = "<?php echo $customer["id"] ?>">
    <p>
      <label for = "name">名前</label>
        <input type = "text" name = "name" value = "<?php echo $customer["name"] ?>">
    </p>
    <p>
      <label for = "birth">誕生日</label>
        <input type = "text" name = "birth" value = "<?php echo $customer["birth"] ?>">
    </p>
    <p>
      <label for = "gender">性別</label>
        <input type = "text" name = "gender" value = "<?php echo $customer["gender"] ?>">
    </p>
    <p>
      <label for = "coming">最終来店</label>
        <input type = "date" name = "coming" value = "<?php echo $customer["coming"] ?>">
    </p>
    <p>
      <input type = "submit" value = "更新">
    </p>
  </form>
  <?php endforeach; ?>
</body>

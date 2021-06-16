<?php
  require_once(ROOT_PATH .'Controllers/CustomerControllers.php');
  $customers = new CustomerController(); //インスタンス化

  $params = $customers->update();
  header("Location:customer.php");
?>

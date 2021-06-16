<?php
require_once(ROOT_PATH .'Controllers/EmployeeControllers.php');

session_start();

$log = new EmployeeController();
$log->log();


header("Location:staffonly.php");
?>

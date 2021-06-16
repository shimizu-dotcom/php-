<?php
require_once(ROOT_PATH .'Controllers/EmployeeControllers.php');
$employee = new EmployeeController();
$params = $employee->delete();

header("Location:employee.php");
?>

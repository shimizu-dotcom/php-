<?php
  require_once(ROOT_PATH .'Controllers/EmployeeControllers.php');

  $employee = new EmployeeController(); //インスタンス化
  $params = $employee->index(); //$paramsをindex関数から取得できる＄paramsと連携している？

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>従業員情報</title>
<link rel="stylesheet" type="text/css" href="/css/employee.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

    <div class = "top">
          <h2>EMPLOYEE INFORMATION</h2>
    </div>

    <div class = "cus">
        <table>
            <tr>
              <th>No</th>
              <th>名前</th>
              <th>誕生日</th>
            </tr>
              <?php foreach($params['employee'] as $employee): ?>
            <tr>
              <td><?php echo $employee['id'] //なぜかplayers．idとすると動かない?></td>
              <td><?php echo $employee['name']?></td>
              <td><?php echo $employee['birth']?></td>
              <td><a href = "./delete.php?id=<?php echo $employee['id']?>" onclick = "return confirm('削除しますか？')">削除</a></td>
            </tr>
              <?php endforeach; ?>
        </table>

        <div class = 'paging'>
            <?php
                for($i=0;$i<=$params['pages'];$i++) {
                  if(isset($_GET['pages']) && $_GET['pages'] == $i) {
                    echo $i+1;
                  } else {
                    echo "<a href='?page=".$i."'>".($i+1)."</a>";
                  }
                }
            ?>
        </div>

        <p><a href = "reg_em.php">Register</a></p>

          <a href="staffonly.php">back</a>
    </div>



<body>
</html>

<?php
  require_once(ROOT_PATH .'Controllers/ReserveControllers.php');


  $Reserve = new ReserveController(); //インスタンス化
  $params = $Reserve->index(); //$paramsをindex関数から取得できる＄paramsと連携している？

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>予約一覧</title>
<link rel="stylesheet" type="text/css" href="/css/reserver.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

    <div class = "top">
          <h2>RESERVER</h2>
    </div>

    <div class = "cus">
        <table>
            <tr>
              <th>No</th>
              <th>名前</th>
              <th>電話番号</th>
              <th>日付</th>
              <th>人数</th>
              <th>予算</th>
              <th>時間</th>
            </tr>
              <?php foreach($params['reserver'] as $reserve): ?>
            <tr>
              <td><?php echo $reserve['id'] //なぜかplayers．idとすると動かない?></td>
              <td><?php echo $reserve['name']?></td>
              <td><?php echo $reserve['tel']?></td>
              <td><?php echo $reserve['date']?></td>
              <td><?php echo $reserve['people']?></td>
              <td><?php echo $reserve['budget']?></td>
              <td><?php echo $reserve['time']?></td>
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

        <a href="staffonly.php">back</a>
    </div>



<body>
</html>

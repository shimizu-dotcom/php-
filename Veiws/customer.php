<?php
  require_once(ROOT_PATH .'Controllers/CustomerControllers.php');


  $customer = new CustomerController(); //インスタンス化
  $params = $customer->index(); //$paramsをindex関数から取得できる＄paramsと連携している？

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>顧客情報</title>
<link rel="stylesheet" type="text/css" href="/css/customer.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

    <div class = "top">
          <h2>CUSTOMER INFORMATION</h2>
    </div>

    <div class = "cus">
        <table>
            <tr>
              <th>No</th>
              <th>名前</th>
              <th>誕生日</th>
              <th>性別</th>
              <th>最終来店日</th>
            </tr>
              <?php foreach($params['customer'] as $customer): ?>
            <tr>
              <td><?php echo $customer['id'] //なぜかplayers．idとすると動かない?></td>
              <td><?php echo $customer['name']?></td>
              <td><?php echo $customer['birth']?></td>
              <td><?php echo $customer['gender']?></td>
              <td><?php echo $customer['coming']?></td>
              <td><a href = "./edit.php?id=<?php echo $customer['id']?>">編集</a></td>
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

        <p>
            <form method = "POST" action = "search.php">
              <label name = "search">birth search</label>
              <select name = "month">
                <option value = "01">1</option>
                <option value = "02">2</option>
                <option value = "03">3</option>
                <option value = "04">4</option>
                <option value = "05">5</option>
                <option value = "06">6</option>
                <option value = "07">7</option>
                <option value = "08">8</option>
                <option value = "09">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
              </select>
              <input type = "submit" value = "検索">
            </form>
        </p>

        <p><a href = "reg_cus.php">Register</a></p>

        <p><a href="staffonly.php">back</a></p>
    </div>



<body>
</html>

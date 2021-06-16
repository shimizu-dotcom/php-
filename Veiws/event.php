<?php

require_once(ROOT_PATH .'Controllers/CalenderControllers.php');

$cals = new CalenderController(); //インスタンス化
$params = $cals->index(); //$paramsをindex関数から取得できる＄paramsと連携している？


date_default_timezone_set('Asia/Tokyo');

//表示させる年月を設定　↓これは現在の月
$year = date('Y');
$month = date('m');


//月末日を取得
$end_month = date('t', strtotime($year.$month.'01'));
//1日の曜日を取得
$first_week = date('w', strtotime($year.$month.'01'));
//月末日の曜日を取得
$last_week = date('w', strtotime($year.$month.$end_month));

$aryCalendar = [];
$j = 0;

//1日開始曜日までの穴埋め
for($i = 0; $i < $first_week; $i++){
    $aryCalendar[$j][] = '';
}

//1日から月末日までループ
for ($i = 1; $i <= $end_month; $i++){
    //日曜日まで進んだら改行
    if(isset($aryCalendar[$j]) && count($aryCalendar[$j]) === 7){
        $j++;
    }
    $aryCalendar[$j][] = $i;
}

//月末曜日の穴埋め
for($i = count($aryCalendar[$j]); $i < 7; $i++){
    $aryCalendar[$j][] = '';
}

$aryWeek = ['日', '月', '火', '水', '木', '金', '土'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>イベント</title>
<link rel="stylesheet" type="text/css" href="/css/event.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <?php
    include("header.php")
  ?>

  <?php
    include("top_back.php")
  ?>

    <div class = "top">
          <h2>EVENT</h2>
    </div>
    <div class="ajax-iine" data-pid="0cxr8upxst9opspts5l3" data-tid="tpl-sb-drawer-red"></div>

    <div class = "diary">
      <h3><?php echo $month."月"; ?></h3>
        <table class="calendar">
                <!-- 曜日の表示 -->
                <tr>
                    <?php foreach($aryWeek as $week){ ?>
                        <th><?php echo $week ?></th>
                    <?php } ?>
                </tr>
                <!-- 日数の表示 -->
                <?php foreach($aryCalendar as $tr){ ?>
                    <tr>
                        <?php foreach($tr as $td){ ?>
                            <?php if($td != date('j')){ ?>
                                <td>
                                    <?php echo $td ?>
                                    <p>
                                      <?php foreach ($params["calender"] as $cals): ?>
                                          <?php if($td <= 9 && $year."-".$month."-0".$td == $cals["date"]):?>
                                              <?php echo $cals["body"] ?>
                                          <?php elseif($td >= 10 && $year."-".$month."-".$td == $cals["date"]): ?>
                                              <?php echo $cals["body"] ?>
                                          <?php endif; ?>
                                      <?php endforeach; ?>
                                    </p>
                                </td>
                            <?php }else{ ?>
                                <!-- 今日の日付 -->
                                <td class="today"><?php echo $td ?></td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
        </table>
    </div>


<body>
</html>

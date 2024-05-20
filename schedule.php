<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

<html>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/parts.css">
  <link rel="stylesheet" type="text/css" href="css/schedule.css">
  <title>スケジュール</title>
</head>

<body>
  <?php
  // ①しおりの情報を取得
  $sql = $pdo->prepare('SELECT * FROM plan WHERE id=?');
  $sql->execute([$_GET['plan_id']]);
  foreach ($sql as $row) {
    $title = $row['title'];
    $departure_date = $row['departure_date'];
    $departure_date = strtotime($row['departure_date']);
    $arrival_date = strtotime($row['arrival_date']);
    $week1 = date('w', $departure_date);
    $week2 = date('w', $arrival_date);
    // ０～６に対応した曜日の配列を用意
    $week = ["(日)", "(月)", "(火)", "(水)", "(木)", "(金)", "(土)"];
    // 曜日の数字に対応した配列を取得(出発日)
    $weekDep = $week[$week1];
    // 曜日の数字に対応した配列を取得(出発日)
    $weekArr = $week[$week2];

    // 日数を計算
    $days = (($arrival_date - $departure_date) / 86400) + 1;
  }
  ?>

  <?php
  echo '<main>';
  echo '<div id="top">';
  echo '<div class="back"><a href="index.php">＜ 戻る</a></div>';
  echo '<h1>スケジュール</h1>';
  echo '<h2 class="trip_title">', $title, '</h2>';
  echo '<p class="schedule_date">', date('Y年m月d日', $departure_date), $weekDep, '～', date('Y年m月d日', $arrival_date), $weekArr, '</p>';
  echo '</div>';

  // ②計画の情報を取得
  // URL情報を取得する
  if (isset($_GET['plan_id'])) {
    $plan_id = $_GET['plan_id'];
  }

  // クエリの実行
  $schedule = $pdo->prepare('SELECT * FROM schedule WHERE plan_id=? and schedule_date=?');
  $schedule->execute([$plan_id, date('Y-m-d', $departure_date)]);

  // クエリのログに記録
  $queryLog = "SELECT * FROM schedule WHERE plan_id=$plan_id and schedule_date='" . date('Y-m-d', $departure_date) . "'";
  error_log("Query executed: $queryLog");

  // クエリの実行結果をログに記録
  $rows = $schedule->fetchAll();
  if (empty($rows)) {
    error_log("No rows found for query: $queryLog");
    echo '新規登録してください';
  } else {
    error_log("Rows found for query: $queryLog");
    error_log(print_r($rows, true)); // 結果をログに出力

    echo '登録内容を表示します';


    for ($i = 1; $i <= $days; $i++) {
      echo '<h3>', $i, '日目&emsp;', date('Y年m月d日', $departure_date), $weekDep, '</h3>';
      echo '<div class="plan">';

      // クエリの実行
      $test1 = $pdo->prepare('SELECT * FROM schedule WHERE plan_id=? and schedule_date=?');
      $test1->execute([$plan_id, date('Y-m-d', $departure_date)]);

      foreach ($test1 as $row) {
        $schedule_name = $row['name'];
        $start_time = substr($row['start_time'], 0, 5);
        $end_time = substr($row['end_time'], 0, 5);

        echo '<div class="container">';
        echo '<p class="item1"><span class="start">', $start_time, '</span><br>&nbsp;<span class="end">ー', $end_time, '</span></p>';
        echo '<div class="icon">';
        echo '<img class="item2" src="image/icon/星アイコン8.svg" alt="">
      </div>';
        echo '<p class="item3">', $schedule_name, '</p>';
        echo '</div>';
        echo '<hr>';
      }
      echo '</div>';
      $departure_date = strtotime("+1 day", $departure_date);
    }
  }

  ?>

  </div>

  <div class="container">
    <p class="item01"><span class="start">12:05</span><br>&nbsp;<span class="end">ー14:25</span></p>
    <div class="icon">
      <img class="item02" src="image/icon/airplane.svg" alt="">
    </div>
    <p class="item03">OZ1075 羽田空港⇒金浦空港</p>
  </div>

  <hr>

  <div class="container">
    <p class="item01"><span class="start">15:20</span><br>&nbsp;<span class="end"></span></p>
    <div class="icon">
      <img class="item02" src="image/icon/星アイコン8.svg" alt="">
    </div>
    <p class="item03">スーツケースを預ける</p>
  </div>

  <hr>

  <div class="container">
    <p class="item01"><span class="start">16:00</span><br>&nbsp;<span class="end">ー17:00</span></p>
    <div class="icon">
      <img class="item02" src="image/icon/宿泊アイコン1.svg" alt="">
    </div>
    <p class="item03">西鉄ソラリアホテル</p>
  </div>

  <hr>

  <div class="container">
    <p class="item01"><span class="start">16:00</span><br>&nbsp;<span class="end">ー20:00</span></p>
    <div class="icon">
      <img class="item02" src="image/icon/歩くアイコン.svg" alt="">
    </div>
    <p class="item03">明洞プラプラ</p>
  </div>
  <hr>
  </div>

  <h3>2日目　2024年6月24日(月)</h3>

  <div class="plan">
    <div class="container">
      <p class="item01">09:00</span><br>&nbsp;<span class="end">ー09:01</span></p>
      <div class="icon">
        <img class="item02" src="image/icon/電車、駅のフリーアイコン.svg" alt="">
      </div>
      <p class="item03">②乙支路3街駅→乙支路入口駅</p>
    </div>

    <hr>

    <div class="container">
      <p class="item01"><span class="start">09:04</span><br>&nbsp;<span class="end">ー09:13</span></p>
      <div class="icon">
        <img class="item02" src="image/icon/電車、駅のフリーアイコン.svg" alt="">
      </div>
      <p class="item03">②乙支路入口駅→乙支路3街駅→③鍾路3街駅</p>
    </div>

    <hr>

    <div class="container">
      <p class="item01"><span class="start">09:15</span><br>&nbsp;<span class="end">ー11:00</span></p>
      <div class="icon">
        <img class="item02" src="image/icon/歩くアイコン.svg" alt="">
      </div>
      <p class="item03">益善洞散策</p>
    </div>

    <hr>

    <div class="container">
      <p class="item01"><span class="start">11:30</span><br>&nbsp;<span class="end">ー12:30</span></p>
      <div class="icon">
        <img class="item02" src="image/icon/フォークとナイフのお食事アイコン素材.svg" alt="">
      </div>
      <p class="item03">ミルトースト</p>
    </div>

    <hr>

  </div>

  <!-- 追加ボタン -->
  <?php
  echo '<a href="schedule-input.php?plan_id=', $_GET['plan_id'], '">';
  echo ' <div class="add_img">';
  echo '<img src="image/icon/plus-circle.svg" alt="">';
  echo ' </div>';
  echo '</a>';
  ?>



  </main>
</body>

</html>

<style>
  main {
    background-color: #FAEAE7;
  }

  main,
  .biz-udpgothic-regular {
    font-family: "BIZ UDPGothic", sans-serif;
    font-weight: 400;
    font-style: normal;
  }

  #top {
    background-color: #DF4456;
    padding: 20px 10px;
    text-align: center;
    color: #fff;
  }

  .back {
    text-align: left;
  }

  .schedule_date {
    font-size: 0.8rem;
  }

  .trip_title {
    font-weight: bold;
    padding-top: 6px;
    padding-bottom: 10px;
  }

  h3 {
    font-weight: bold;
    background-color: #fff;
    line-height: 28px;
    padding: 4px 4px;
  }

  .plan {
    width: 96%;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.6);
  }

  .item1 {
    text-align: right;
  }

  .start {
    font-weight: bold;
    font-size: 14px;
  }

  .end {
    font-size: 12px;
  }

  .container {
    width: 350px;
    display: grid;
    grid-auto-flow: column;
    grid-template-columns: 58px 36px 246px;
    column-gap: 4px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin: 0 auto;
    place-items: center start;
  }

  .icon {
    margin: 0 auto;
  }

  .item2 {
    width: 26px;
  }

  .item3 {
    font-size: 12px;
  }

  hr {
    color: gray;
  }

  /* 追加ボタン */
  .add_img {
    position: fixed;
    bottom: 3%;
    right: 2%;
    width: 36px;
    height: 36px;
    line-height: 36px;
    background: #DF4456;
    border-radius: 50%;
    text-align: center;
  }

  .add_img img {
    width: 36px;
  }
</style>

</html>
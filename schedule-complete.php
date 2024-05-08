<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/parts.css">
  <link rel="stylesheet" type="text/css" href="css/schedule.css">
  <title>スケジュール作成完了 | 旅のしおり</title>
</head>

<?php
// セッションの変数を定義
$name = $nickname = $post_code = $address = $mail = $password = '';
if (isset($_SESSION['customer'])) {
  $id = $_SESSION['customer']['id'];
  $name = $_SESSION['customer']['name'];
  $nickname = $_SESSION['customer']['nickname'];
  $mail = $_SESSION['customer']['mail'];
  $password = $_SESSION['customer']['password'];
}

// URL情報を取得する
if (isset($_GET['plan_id'])) {
  $plan_id = $_GET['plan_id'];
}

// 現在の日時を取得
date_default_timezone_set('Asia/Tokyo');
$current_time = date('Y/m/d H:i:s');
?>

<body>
  <main>
    <div id="top">
      <div class="back"><a href="index.php">＜ 戻る</a></div>
      <h1>スケジュール作成完了</h1>
      <h2 class="trip_title"></h2>
    </div>
    <?php
    if (isset($_SESSION['customer'])) {
      // true セットされている=ログイン中だったら
      $sql = $pdo->prepare('INSERT INTO schedule VALUES(null,?,?,?,?,?,?,?,?,?,?)');
      $sql->execute([
        $_REQUEST['title'],
        $_REQUEST['schedule_date'],
        $_REQUEST['start_time'],
        $_REQUEST['end_time'],
        $_REQUEST['icon'],
        $id,
        $plan_id,
        $current_time,
        $current_time,
        $current_time
      ]);
      echo '<p class="user_name">', $_SESSION['customer']['nickname'], 'さん</p>';

      echo '<div class="content">';
      echo '<h1 class="textalign_center">新しいスケジュールを追加しました</h1>';
      echo '<p class="textalign_center">スケジュール一覧を確認する</p>';
      echo '<div class="topics-btn smoothTrigger textalign_center"><a href="schedule.php?plan_id=', $plan_id, '" class="btnlinestretches4"><span>一覧</span></a></div>';
      echo '</div>';
      echo '';
      echo '';
      echo '';
    } else {
      echo '<p>エラーが発生しました。</p>';
      echo '<p>再度登録をお願いいたします。</p>';
      echo '<a href="schedule-input.php?category=', $_REQUEST['category'], '"><p>入力画面に戻る</p></a>';
    }
    ?>


    </div><!-- /content -->
  </main>
</body>

</html>
<script src="common/js.js"></script>
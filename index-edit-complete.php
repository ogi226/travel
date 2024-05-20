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
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <title>編集完了 | 旅のしおり</title>
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
// 現在の日時を取得
date_default_timezone_set('Asia/Tokyo');
$current_time = date('Y/m/d H:i:s');
?>

<body>
  <main>
    <div id="top" class="textalign_center mt-20">
      <div class="back"><a href="javascript:history.back()">＜ 戻る</a></div>
      <h1>しおり更新成完了</h1>
      <h2 class="trip_title"></h2>
    </div>
    <?php
    // URL情報を取得する
    if (isset($_GET['plan_id'])) {
      $plan_id = $_GET['plan_id'];
    }

    if (isset($_SESSION['customer'])) {
      // true セットされている=ログイン中だったら
      $sql = $pdo->prepare('UPDATE plan SET title=?,departure_date=?, arrival_date=?,price=?,plan_image=?,updated_at=? WHERE id=?');
      $sql->execute([
        $_REQUEST['title'],
        $_REQUEST['departure_date'],
        $_REQUEST['arrival_date'],
        preg_replace("/[^0-9]/", "", mb_convert_kana($_REQUEST['price'], 'n')),
        $_REQUEST['plan_image'],
        $current_time,
        $plan_id
      ]);

      echo '<p class="user_name">', $_SESSION['customer']['nickname'], 'さん</p>';

      echo '<div class="content">';
      echo '<h1 class="textalign_center">しおりが更新できました</h1>';
      echo '<p class="textalign_center">プラン一覧を確認する</p>';
      echo '<div class="topics-btn smoothTrigger textalign_center"><a href="index.php" class="btnlinestretches4"><span>一覧</span></a></div>';
      echo '</div>';
      echo '';
      echo '';
      echo '';
    } else {
      echo '<p>エラーが発生しました。</p>';
      echo '<p>再度登録をお願いいたします。</p>';
      echo '<a href="index-input.php?category=', $_REQUEST['category'], '"><p>入力画面に戻る</p></a>';
    }
    ?>


    </div><!-- /content -->
  </main>
</body>

</html>
<script src="common/js.js"></script>
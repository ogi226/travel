<?php session_start(); ?>


<?php require 'includes/database.php'; ?>

<!--自作のCSS-->
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/parts.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<title>作成完了 | 旅のしおり</title>

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

echo $_REQUEST['photo'];

?>

<body>
  <main>
    <?php
    if (isset($_SESSION['customer'])) {
      // true セットされている=ログイン中だったら
      $sql = $pdo->prepare('INSERT INTO plan VALUES(null,?,?,?,?,?,?,?,?)');
      $sql->execute([
        $_REQUEST['title'],
        $_REQUEST['departure_date'],
        $_REQUEST['arrival_date'],
        $_REQUEST['photo'],
        $_SESSION['customer']['id'],
        $current_time,
        $current_time,
        $current_time
      ]);
      echo '<p class="user_name">ようこそ&emsp;', $_SESSION['customer']['nickname'], '様</p>';
      echo '<hr>';
      echo '<p class="breadcrumbs"><a href="index.php">TOP</a></p>';
      echo '<hr>';

      echo '<h1>登録完了</h1>';
      echo '<div class="content">';
      echo '<a href="index.php"><p>プラン一覧を確認する</p></a>';
      echo '';
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
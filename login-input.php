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
  <!--自作のCSS-->
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/parts.css">
  <link rel="stylesheet" type="text/css" href="css/loginout.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/index.css"> -->
  <title>ログイン | 旅のしおり</title>
</head>

<main>
  <div id="top">
    <div class="back"><a href="index.php">＜ 戻る</a></div>
    <h1>ログイン</h1>
    <!-- <h2 class="trip_title">韓国旅行</h2> -->
    <!-- <p class="schedule_date">2024年6月23日(日)～2024年6月25日(火)</p> -->
  </div>

  <?php
  unset($_SESSION['customer']);
  if (isset($_REQUEST['mail']) && isset($_REQUEST['password'])) {
    $sql = $pdo->prepare('SELECT * FROM customer WHERE mail=? and password=?');
    $sql->execute([$_REQUEST['mail'], $_REQUEST['password']]);
    foreach ($sql as $row) {
      $_SESSION['customer'] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'nickname' => $row['nickname'],
        'mail' => $row['mail'],
        'password' => $row['password']
      ];
    }
  }
  ?>

  <?php
  if (isset($_SESSION['customer'])) {
    echo '<div class="content">';
    echo '<h1>ログイン中</h1>';
    echo '<div class="content_inner complete_content_inner textalign_center">';
    echo '<p class="message">すでにログインしています。</p>';
    // echo '<div class="textalign_center">';
    echo '<a class="flamein_memo textalign_center" href="logout-input.php?id=$id">ログアウト画面へ進む</a>';
    // echo '</div>';
    echo '</div><!-- /content_inner -->';
    echo '<div class="textalign_right">';
    echo '<a href="index.php?id=$id" class="flameout_memo">TOPページへ戻る</a>';
    echo '</div>';
    echo '</div><!-- /content -->';
  } else {
    echo <<<END
<form class="" action="login-complete.php " method="post">
<div class="grid_content">
<div class="item">
<h2>Email</h2>
<input type="mail" id="inputField" class="input_field"  name="mail" value="" pattern="[^\s]+" title="空白以外の文字を入力してください" placeholder="Email" required>
</div>

<div class="item">
<h2>Password</h2>
<input type="password" id="inputField" class="input_field"  name="password" value="" pattern="[^\s]+" title="空白以外の文字を入力してください" placeholder="Password" required>
</div>

<div class="textalign_center">
<input class="btn login_btn" type="submit" value="Log in">
</div>
</form>
END;
  }
  echo '<div class="textalign_center">';
  echo '<a href="customer-input.php">';
  echo '<p class="flameout_memo">会員登録がお済みでない方は<a href="customer-input.php">こちら</a></p>';
  echo '</a>';
  echo '</div>';
  ?>

</main>
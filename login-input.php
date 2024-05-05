<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<!--自作のCSS-->
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/parts.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" href="css/login.css">
<title>ログイン | 旅のしおり</title>
<main>

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
    echo '<div class="content">';
    echo '<h1 class="textalign_center">ログイン</h1>';
    echo '<div class="content_inner">';
    echo '<form action="login-complete.php " method="post">';
    echo '<input class="input_field" input type="mail" name="mail" placeholder="Email"><br>';
    echo '<input class="input_field" input type="password" name="password" placeholder="Password"><br>';
    echo '<div class="textalign_center">';
    echo '<input class="login_btn" type="submit" value="Log in">';
    echo '</div>';
    echo '</form>';
    echo '</div><!-- /content_inner -->';
    echo '<div class="textalign_center">';
    echo '<a href="customer-input.php">';
    echo '<p class="flameout_memo">会員登録がお済みでない方は<a href="customer-input.php">こちら</a></p>';
    echo '</a>';
    echo '</div>';
    echo '</div><!-- /content -->';
  }
  ?>

</main>
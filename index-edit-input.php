<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>新規作成 | 旅のしおり</title>
  <meta name="description" content="旅の計画を立てるサイトです">
  <meta name="robots" content="noindex,nofollow">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!--=============Google Font ===============-->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP%7CRoboto&display=swap" rel="stylesheet">
  <!--==============レイアウトを制御する独自のCSSを読み込み===============-->
  <!--印象編　8-8 テキストがランダムに出現-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
  <!--自作のCSS-->
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/parts.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<main>
  <div id="top" class="textalign_center">
    <div class="back"><a href="index.php">＜ 戻る</a></div>
    <h1>しおり編集</h1>
    <h2 class="trip_title">編集入力</h2>
  </div>

  <body class="appear">
    <?php require 'header.php';  ?>

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

    // クエリの実行
    $sql = $pdo->prepare('SELECT * FROM plan WHERE id=?');
    $sql->execute([$plan_id]);

    foreach ($sql as $row) {
      $title = $row['title'];
      $departure_date = $row['departure_date'];
      $arrival_date = $row['arrival_date'];
      $price = $row['price'];
      $plan_image = $row['plan_image'];
    }
    ?>

    <?php

    // if (isset($_SESSION['customer'])) {
    // true セットされている=ログイン中だったら
    echo '<p class="textalign_center mt_20">編集して更新ボタンを押してください</p>';

    echo '<div class="content">';
    echo '<form class="form" action="index-edit-confirm.php?plan_id=', $plan_id, '" method="post" enctype="multipart/form-data">';

    echo '<div class="grid_content">';
    echo '<h2>タイトル</h2>';
    echo '<input type="text" id="inputField" name="title" value="', $title, '" pattern="[^\s]+" title="空白以外の文字を入力してください"  placeholder="タイトル" required>';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2>出発日</h2>';
    echo '<input class=mini-input type="date" id="inputField" name="departure_date" value="', $departure_date, '" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2>帰宅日</h2>';
    echo '<input type="date" id="inputField" name="arrival_date" value="', $arrival_date, '" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2>費用</h2>';
    echo '<input class="input_field" type="text" id="inputField" name="price" value="&yen;', number_format($price), '"pattern="[^\s]+" title="空白以外の文字を入力してください" placeholder="費用">';
    // echo '<input class="input_field" type="text" id="inputField" name="price" value="', $price, '"pattern="[^\s]+" title="空白以外の文字を入力してください" placeholder="費用">';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2>写真</h2>';
    echo '<input class="input_field" type="file"  id="photo" name="photo" value="', $plan_image, '" >';
    echo '</div>';

    echo '</div>';

    echo '<input type="hidden" name="plan_image" value="', $plan_image, '">';

    echo '<div class="textalign_center">';
    echo '<input class="create_btn" type="submit" value="更新する">';
    echo '</div>';
    echo '</form>';

    echo '<form action="index-delete.php?plan_id=', $plan_id, '" method="post" enctype="multipart/form-data">';
    echo '<div class="textalign_center mt_20">';
    echo '<input class="delete_btn" type="submit" value="削除する">';
    echo '</div>';
    echo '</form>';
    ?>

    <?php
    // } else {

    //   echo '<p>ログインしてください</p>';
    //   echo '<p>手順を守ってください</p>';
    // }
    ?>

</main>
</body>

</html>
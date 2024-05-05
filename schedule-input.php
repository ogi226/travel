<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>スケジュール作成</title>
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
  <div id="top">
    <div class="back"><a href="schedule.php">＜ 戻る</a></div>
    <h1>スケジュール作成</h1>
    <h2 class="trip_title">新規登録</h2>
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
    if (isset($_GET['id'])) {
      $treatment_id = $_GET['id'];
    }

    // カテゴリーを取得
    // $category = $pdo->query('SELECT * FROM category');
    ?>


    <?php

    // if (isset($_SESSION['customer'])) {
    // true セットされている=ログイン中だったら

    echo '<div class="content">';
    echo '<form action="schedule-confirm.php? method="post" enctype="multipart/form-data">';

    echo '<div class="grid_content">';
    echo '<h2>予定<span class="must">※</span></h2>';
    echo '<input type="text" id="inputField" name="title" value="{$title}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2>日付<span class="must">※</span></h2>';
    echo '<input type="date" id="inputField" name="arrival_date" value="{$arrival_date}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2>開始時刻<span class="must">※</span></h2>';
    echo '<input class=mini-input type="time" id="inputField" name="departure_date" value="{$departure_date}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2>終了時刻<span class="must">※</span></h2>';
    echo '<input type="time" id="inputField" name="arrival_date" value="{$arrival_date}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2 class="item_name">アイコン</h2>';
    echo '<input class="input_field" type="text" id="inputField" name="select" pattern="[^\s]+" title="空白以外の文字を入力してください">';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2 class="item_name">費用</h2>';
    echo '<input class="input_field" type="text" id="inputField" name="price" pattern="[^\s]+" title="空白以外の文字を入力してください">';
    echo '</div>';

    echo '<div class="grid_content">';
    echo '<h2 class="item_name">写真</h2>';
    echo '<input type="file" id="photo" class="input_field" name="newphoto" accept="image/*" onchange="previewPhoto(event)">';
    echo '<input type="hidden" name="photo" value="', $file, '">';
    echo '</div>';

    echo '<div class="textalign_center">';
    echo '<input class="create_btn" type="submit" value="作成する">';
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
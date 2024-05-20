<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

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
  <link rel="stylesheet" type="text/css" href="css/schedule.css">
</head>

<main>
  <!-- しおりを取得 -->
  <?php
  // URL情報を取得する
  if (isset($_GET['plan_id'])) {
    $plan_id = $_GET['plan_id'];
  }

  $sql = $pdo->prepare('SELECT * FROM plan WHERE id=?');
  $sql->execute([$plan_id]);
  ?>
  <?php
  echo '<div id="top">';
  echo '<div class="back"><a href="schedule.php?plan_id=', $plan_id, '">＜ 戻る</a></div>';
  echo '<h1>スケジュール作成</h1>';
  echo '<h2 class="trip_title">新規登録</h2>';
  echo '</div>';
  ?>

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
    ?>


    <?php
    if (isset($_SESSION['customer'])) {
      // true セットされている=ログイン中だったら

      echo '<div class="content">';
      echo '<form action="schedule-confirm.php?plan_id=', $plan_id, '" method="post" enctype="multipart/form-data">';

      echo '<div class="grid_content">';
      echo '<h2>予定</h2>';
      echo '<input type="text" id="inputField" name="title" value="" required>';
      echo '</div>';

      echo '<div class="grid_content">';
      echo '<h2>日付</h2>';
      echo '<input type="date" id="inputField" name="schedule_date" value="{$date}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
      echo '</div>';

      echo '<div class="grid_content">';
      echo '<h2>開始時刻</h2>';
      echo '<input class=mini-input type="time" id="inputField" name="start_time" value="{$start_time}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
      echo '</div>';

      echo '<div class="grid_content">';
      echo '<h2>終了時刻</h2>';
      echo '<input type="time" id="inputField" name="end_time" value="{$end_time}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>';
      echo '</div>';

      echo '<div class="grid_content item">';
      echo '<h2 class="item_name">アイコン</h2>';
      echo '<select class="imgSel" id="sel1" name="icon" onChange="selectChange(\'sel1\')">';
      echo '<option value="image/icon/電車、駅のフリーアイコン.svg"> 電車</option>';
      echo '<option value="image/icon/airplane.svg">飛行機</option>';
      echo '<option value="image/icon/フォークとナイフのお食事アイコン素材.svg">食事</option>';
      echo '<option value="image/icon/宿泊アイコン1.svg">宿泊</option>';
      echo '</select>';
      echo '</div>';

      echo '<div class="grid_content item">';
      echo '<h2 class="item_name">費用</h2>';
      echo '<input class="input_field" type="text" id="inputField" name="price" pattern="[^\s]+" title="空白以外の文字を入力してください">';
      echo '</div>';

      echo '<div class="grid_content item">';
      echo '<h2 class="item_name">写真</h2>';
      echo '<input type="file" id="photo" class="input_field" name="newphoto" accept="image/*" onchange="previewPhoto(event)">';
      echo '<input type="hidden" name="photo" value="', $file, '">';
      echo '</div>';

      echo '<div class="textalign_center">';
      echo '<input class="create_btn" type="submit" value="作成する">';
      echo '</div>';
      echo '</form>';
    ?>

      <script type="text/javascript">
        $(document).ready(function() {
          $('select[name=logo]').ImageSelect({
            dropdownWidth: 425
          });
        });
      </script>
    <?php
    } else {

      echo '<p>ログインしてください</p>';
      echo '<p>手順を守ってください</p>';
    }
    ?>

</main>
<script>
  /* SELECTの結果、画像を変える */
  function selectChange(id) {
    var select = document.getElementById(id); // select object
    var option = select.options[select.selectedIndex]; // option object
    select.style.backgroundImage = "url(" + option.value + ")";
  }

  /* 実行部 */
  selectChange("sel1"); // 画像表示
</script>
</body>

</html>
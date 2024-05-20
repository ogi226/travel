<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>しおり編集 | 旅のしおり</title>
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

<body>
  <main>
    <div id="top" class="textalign_center mt_20">
      <div class="back"><a href="javascript:history.back()">＜ 戻る</a></div>
      <h1>しおり編集</h1>
      <h2 class="trip_title">更新確認</h2>
    </div>

    <?php
    // URL情報を取得する
    if (isset($_GET['plan_id'])) {
      $plan_id = $_GET['plan_id'];
    }

    // セッションの変数を定義
    // $name = $nickname = $post_code = $address = $mail = $password = '';
    if (isset($_SESSION['customer'])) {
      $id = $_SESSION['customer']['id'];
      $name = $_SESSION['customer']['name'];
      $nickname = $_SESSION['customer']['nickname'];
      $mail = $_SESSION['customer']['mail'];
      $password = $_SESSION['customer']['password'];
    }
    ?>

    <?php
    if (!empty($_FILES['newphoto']['full_path'])) {
      $photo = 'upload/' . $_FILES['newphoto']['full_path'];
      $_FILES['photo'] = $_FILES['newphoto'];
    } else {
      // $photo = $_FILES['photo']['name'];
      $file = $_REQUEST['plan_image'];
    }
    ?>

    <?php
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
      // ファイルが正常にアップロードされている場合の処理
      $file_name = $_FILES['photo']['name'];
      // ここでファイル名を隠しフィールドに設定するなどの処理を行います
    }

    echo '<div class="content">';
    echo '<form action="index-edit-complete.php?plan_id=', $plan_id, '" method="post">';
    echo '<div class="confirm_content">';

    echo '<div class="item_name">タイトル</div>';
    echo '<div class="item_input">',  $_REQUEST['title'], '</div>';

    echo '<div class="item_name">出発日</div>';
    echo '<div class="item_input">', $_REQUEST['departure_date'], '</div>';

    echo '<div class="item_name">帰宅日</div>';
    echo '<div class="item_input">', $_REQUEST['arrival_date'], '</div>';

    echo '<div class="item_name">費用</div>';
    // echo '<div class="item_input">&yen;', number_format($_REQUEST['price']), '</div>';
    echo '<div class="item_input">', mb_convert_kana($_REQUEST['price'], 'n'), '</div>';
    // preg_replace("/[^0-9]/", "", $price)

    echo '<div class="item_name">写真</div>';
    echo '<div class="item_input">';
    if (isset($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
      if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        // ファイルがアップロードされている場合の処理
        $file = 'upload/' . basename($_FILES['photo']['name']);
        // ここでファイルを処理する
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $file)) {
          echo '<img alt="image" src="', $file, '">';
        } else {
          echo 'アップロードに失敗しました。';
        }
      } else {
        // ファイルがアップロードされていない場合のエラー処理
        echo "ファイルがアップロードされていません";
      }
    } else {
      // 'photo' キーが存在しない場合のエラー処理
      echo '<td>', $file, '</td>';
    }
    echo '</div>';
    echo '</div>';

    echo '</div>'; // content

    echo '<div class="textalign_center">';
    echo '<input id="get_time_btn" class="btn create_btn" type="submit" value="この内容で更新する">';
    echo '</div>';

    echo '<input type="hidden" name="title" value="', $_REQUEST['title'], '">';
    echo '<input type="hidden" name="departure_date" value="', $_REQUEST['departure_date'], '">';
    echo '<input type="hidden" name="arrival_date" value="', $_REQUEST['arrival_date'], '">';
    echo '<input type="hidden" name="price" value="', $_REQUEST['price'], '">';
    echo '<input type="hidden" name="plan_image" value="', $file, '">';
    echo '</form>';


    ?>

  </main>
</body>

</html>
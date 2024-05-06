<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="css/loginout.css">
  <link rel="stylesheet" href="common/css/footer.css">
  <link rel="stylesheet" href="css/customer.css">
  <title>ログアウト | 旅のしおり</title>
</head>

<body>
  <main>
    <div id="top">
      <div class="back"><a href="index.php">＜ 戻る</a></div>
      <h1>会員登録</h1>
      <!-- <h2 class="trip_title">韓国旅行</h2> -->
      <!-- <p class="schedule_date">2024年6月23日(日)～2024年6月25日(火)</p> -->
    </div>
    <?php
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
      echo '<p class="user_name">ようこそ&emsp;', $_SESSION['customer']['nickname'], '様</p>';
      echo '<hr>';
      echo '<div class="content">';
      echo '<h1>Log out</h1>';
      echo '<div class="content_inner complete_content_inner textalign_center">';
      echo '<p class="message">ログアウトしますか？</p>';
      echo '<form action="logout-complete.php" method="post">';

      echo '<div class="textalign_center">';
      echo '<input class="logout_btn" type="submit" value="Log out">';
      echo '</div>';

      echo '</div><!-- /content_inner -->';

      echo '<div class="textalign_center">';
      echo '<a href="index.php" class="flameout_memo">TOPページへ戻る</a>';
      echo '</div>';


      echo '</form>';
      echo '</div><!-- /content -->';
    } else {
      // echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
      // echo '<hr>';
      echo '<p>セッションなし</p>';
      echo '<h1>ログイン</h1>';
      echo '<div class="content">';
      echo '<div class="content_inner complete_content_inner textalign_center">';
      echo '<p class="message">ログインしていません</p>';
      echo '</div><!-- /content_inner -->';
      echo '<div class="textalign_right">';
      echo '<a href="login-input.php" class="memo">ログインページへ戻る</a>';
      echo '</div>';
      echo '</div><!-- /content -->';
    }

    ?>

    </div><!-- /content_inner -->
    </div><!-- /content -->


  </main>
<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

<link rel="stylesheet" href="css/loginout.css">
<link rel="stylesheet" href="common/css/footer.css">
<title>ログアウト | beatyAPP</title>

<main>
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
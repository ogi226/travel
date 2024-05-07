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
  <link rel="stylesheet" href="common/css/footer.css">
  <link rel="stylesheet" href="css/customer.css">
  <title>会員登録 | 旅のしおり</title>
</head>

<?php
$name = $nickname = $post_code = $address = $mail = $password = '';
if (isset($_SESSION['customer'])) {
  $name = $_SESSION['customer']['name'];
  $nickname = $_SESSION['customer']['nickname'];
  $mail = $_SESSION['customer']['mail'];
  $password = $_SESSION['customer']['password'];
}
?>

<body>
  <main>
    <div id="top">
      <div class="back"><a href="index.php">＜ 戻る</a></div>
      <h1>会員登録</h1>
      <!-- <h2 class="trip_title">韓国旅行</h2> -->
      <!-- <p class="schedule_date">2024年6月23日(日)～2024年6月25日(火)</p> -->
    </div>
    <?php
    if (isset($_SESSION['customer'])) {
      // ログインしてる
      echo '<p class="user_name">', $_SESSION['customer']['nickname'], '様</p>';
    } else {
      // ログインしてない
      echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
    }
    ?>
    <?php
    if (isset($_SESSION['customer'])) {
      // true セットされている=ログイン中だったら
      echo '<h1>ログイン中です</h1>';
      echo '<div class="content">';
      echo '<div class="content_inner complete_content_inner textalign_center">';
      echo '<p class="message">ログアウトしてから<br>新規登録をお願いいたします。</p>';
      echo '<div class="textalign_center">';
      echo '<a class="memo" href="logout-input.php">ログアウト画面へ進む</a>';
      echo '</div>';
      echo '</div><!-- /content_inner -->';
      echo '</div><!-- /content -->';
    } else {
    ?>
      <!-- <h1 class="textalign_center">会員登録</h1> -->
      <div class="content">
      <?php
      // フォームの出力
      echo <<<END
<form action="customer-confirm.php" method="post">
<div class="grid_content">
<div class="item">
<h2>お名前</h2>
<input type="text" id="inputField" class="input_field"  name="name" value="{$name}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>
</div>

<div class="item">
<h2>ニックネーム</h2>
<input type="text" id="inputField" class="input_field"  name="nickname" value="{$nickname}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>
</div>

<div class="item">
<h2>メールアドレス</h2>
<input type="email" class="input_field"  name="mail"  value="{$mail}" required>
</div>

<div class="item">
<h2>パスワード</h2>
<input type="password" id="inputField" class="input_field"  name="password" value="{$password}" pattern="[^\s]+" title="空白以外の文字を入力してください" required>
</div>
<p class="caution textalign_right">A-Z、a-z、0-9を少なくとも各1つは含めて8文字以上で入力してください。</p>
</div>


<div class="textalign_center">
<input class="btn login_btn" type="submit" value="確認する">
</div>
</form>

<div class="link_group">
ログインは<a href="login-input.php">こちら</a><br>

ログアウトは<a href="logout-input.php">こちら</a><br>

<a href="index.php">トップページに戻る</a><br>
</div>
END;
    }
      ?>
      </div><!-- /content -->
  </main>
</body>

</html>
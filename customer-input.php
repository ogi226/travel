<?php session_start(); ?>

<head>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/footer.css">
  <link rel="stylesheet" href="css/customer.css">
  <title>会員登録 | 旅のしおり</title>
</head>

<!-- <?php
      $name = $nickname = $post_code = $address = $mail = $password = '';
      if (isset($_SESSION['customer'])) {
        $name = $_SESSION['customer']['name'];
        $nickname = $_SESSION['customer']['nickname'];
        $mail = $_SESSION['customer']['mail'];
        $password = $_SESSION['customer']['password'];
      }
      ?> -->

<body>
  <main>
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
      <h1 class="textalign_center">会員登録</h1>
      <div class="content">
      <?php
      // フォームの出力
      echo <<<END
<form action="customer-confirm.php" method="post">

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
<span class="caution">A-Z、a-z、0-9を少なくとも各1つは含めて8文字以上で入力してください。</span>
</div>

<div class="textalign_center">
<input class="btn login_btn" type="submit" value="確認する">
</div>
</form>

ログインは<a href="login-input.php">こちら</a><br>
<a href="index.php">トップに戻る</a><br>
ログアウトは<a href="logout-input.php">こちら</a><br>
END;
    }
      ?>

      <button id="logoutButton">ログアウト</button>

      <script>
        // ボタンをクリックしたときにセッションを破棄する関数
        function logout() {
          // AJAXを使用してサーバー上でセッションを破棄する
          var xhr = new XMLHttpRequest();
          xhr.open('GET', 'logout.php', true);
          xhr.send();

          // セッションが破棄されたらページを再読み込みする
          xhr.onload = function() {
            if (xhr.status == 200) {
              location.reload();
            }
          };
        }

        // ボタンをクリックしたらlogout関数を実行する
        document.getElementById('logoutButton').addEventListener('click', logout);
      </script>


      </div><!-- /content -->
  </main>
</body>

</html>

<!-- <?php require 'includes/footer.php'; ?> -->
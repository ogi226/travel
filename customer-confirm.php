<?php require 'includes/database.php'; ?>

<head>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/footer.css">
  <link rel="stylesheet" href="css/customer.css">
  <title>確認 | 旅のしおり</title>
</head>

<body>
  <main>

    <?php
    echo '<h1 class="textalign_center">ご入力内容の確認</h1>';

    // もしセッションcustomerがセットされていたら
    if (isset($_SESSION['customer'])) {
      // true セットされている=ログイン中だったら
      echo 'ログアウトしてから新規登録をお願いいたします。';
      echo '<a href="logout.php">ログアウトする</a>';
      $id = $_SESSION['customer']['id'];
    } else {
      // false セットされていない＝ログインしてない
      // 条件：メールアドレスが一致するデータを取得するSQL
      $sql = $pdo->prepare('SELECT * FROM customer WHERE mail=?');
      $sql->execute([htmlspecialchars($_REQUEST['mail'])]);
    }
    $name = htmlspecialchars(mb_convert_kana($_REQUEST['name']));
    $nickname = htmlspecialchars(mb_convert_kana($_REQUEST['nickname']));
    $mail = htmlspecialchars(mb_convert_kana($_REQUEST['mail']));


    if (empty($sql->fetchAll())) {
      // true 入力されたメールアドレスと一致するデータがなかった場合➡新規登録する*********  
      echo '<div class="content">';
      echo '<form id="customerForm" action="customer-complete.php" method="post">';
      // １．名前
      echo '<div class="item">';
      echo '<h2>お名前</h2>';
      echo '<p class="input_result">',  $name, '</p>';
      echo '</div>';

      // ２．名前(カナ)
      echo '<div class="item">';
      echo '<h2>ニックネーム</h2>';
      echo '<p class="input_result">', $nickname, '</p>';
      echo '</div>';

      // ３．メールアドレス
      echo '<div class="item">';
      echo '<h2>メールアドレス</h2>';
      echo '<p class="input_result">', $mail, '</p>';
      echo '</div>';

      // ４．パスワード
      echo '<div class="item">';
      $password = htmlspecialchars($_REQUEST['password']);
      $maskedPassword = str_repeat('●', strlen($password));
      if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/', $password)) {
        echo '<h2>パスワード&emsp;<span class="caution">※適切なパスワードではありません</span></h2>';
        echo '<p class="input_result input_error" id="password">', $password, '</p>';
      } else {
        echo '<h2>パスワード&emsp;<button type="button" class="display_btn" onclick="toggleDisplay();">表示する</button></h2>';
        echo '<p class="input_result password" id="maskoff">', $maskedPassword, '</p>';
        echo '<p class="input_result mask_off pass_display" id="password">', $password, '</p>';
      }
      echo '</div>';

      // ボタン
      echo '<div class="textalign_center">';
      echo '<input class="btn login_btn" type="submit" value="こちらの内容で登録する">';

      echo '<input type="hidden" name="name" value="', $name, '"</p>';
      echo '<input type="hidden" name="nickname" value="', $nickname, '"</p>';
      echo '<input type="hidden" name="mail" value="', $mail, '"</p>';
      echo '<input type="hidden" name="password" value="', $password, '"</p>';
      echo '</form>';
      echo '</div><!-- /content -->';
    }
    // 入力されたメールアドレスが既に登録されていた場合********************************      
    else {
      echo '<div class="content">';
      echo '<div class="content_inner complete_content_inner textalign_center">';
      echo '<p class="message">このメールアドレスは<br>既に使用されていますので、<br>登録できません。</p>';
      echo '<button class="login_btn confirm_back_btn" type="button" onclick="history.back()">戻る</button>';
      echo '</div>';
      echo '</div>';
    }
    ?>

    <script>
      function toggleDisplay() {
        var password = document.querySelector('#password');
        var password2 = document.querySelector('.mask_off');
        password.classList.toggle('pass_display');
        password2.classList.toggle('pass_display');
      }
    </script>

  </main>
</body>

</html>
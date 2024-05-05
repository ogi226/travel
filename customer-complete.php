<?php require 'includes/database.php'; ?>

<head>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/footer.css">
  <link rel="stylesheet" href="css/customer.css">
  <title>会員登録完了 | donuts-site</title>
</head>


<?php
$sql = $pdo->prepare('INSERT INTO customer VALUES(null,?,?,?,?)');
$sql->execute([$_REQUEST['name'], $_REQUEST['nickname'],  $_REQUEST['mail'], $_REQUEST['password']]);
?>

<body>
  <main>
    <a href="index.php"><img src="image/icon/airplane.png" alt=""></a>
    <h1 class="textalign_center">会員登録完了</h1>
    <div class="content">
      <div class="content_inner complete_content_inner textalign_center">
        <p class="message">会員登録が完了しました</p>
        <div class="textalign_center">
          <a class="memo" href="login-input.php">ログイン画面へ進む</a>
        </div>
      </div><!-- /content_inner -->
    </div><!-- /content -->

  </main>
</body>

</html>
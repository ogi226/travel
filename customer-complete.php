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
  <title>会員登録完了 | 旅のしおり</title>
</head>


<?php
$sql = $pdo->prepare('INSERT INTO customer VALUES(null,?,?,?,?)');
$sql->execute([$_REQUEST['name'], $_REQUEST['nickname'],  $_REQUEST['mail'], $_REQUEST['password']]);
?>

<body>
  <main>

    <div id="top">
      <div class="back"><a href="index.php">＜ 戻る</a></div>
      <h1>内容のご確認</h1>
      <!-- <h2 class="trip_title">韓国旅行</h2> -->
      <!-- <p class="schedule_date">2024年6月23日(日)～2024年6月25日(火)</p> -->
    </div>

    <!-- <a href="index.php"><img src="image/icon/airplane.png" alt=""></a> -->
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
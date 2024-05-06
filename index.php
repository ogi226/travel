<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>トップページ</title>
  <meta name="description" content="旅の計画を立てるサイトです">
  <meta name="robots" content="noindex,nofollow">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!--=============Google Font ===============-->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP%7CRoboto&display=swap" rel="stylesheet">
  <!--==============レイアウトを制御する独自のCSSを読み込み===============-->
  <!--印象編　8-8 テキストがランダムに出現-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
  <!--==============レイアウトを制御する独自のCSSを読み込み===============-->
  <!--機能編 6-1-1　横移動させて全画面で見せる-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <!--自作のCSS-->
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/parts.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>


<body class="appear">

  <!-- ローディング -->
  <!-- <div id="splash">
    <div id="splash_text"></div>
  </div> -->

  <!-- 幾何学 -->
  <div id="particles-js"></div>
  <!-- <div id="wrapper"> -->

  <header id="header" class="fadeDownTrigger fadeDown">
    <h1 class="smoothTrigger smooth"><a href="#">travel planner</a></h1>
  </header>

  <main>
    <div id="menu">
      <a href="">
        <img src="image/icon/bookmark.svg" alt="">
        <span>プラン一覧</span>
      </a>
      <a href="checklist.php">
        <img src="image/icon/checkbox.svg" alt="">
        <span>チェックリスト</span>
      </a>
      <a href="checklist.php">
        <img src="image/icon/diary.svg" alt="">
        <span>日記</span>
      </a>
      <a href="customer-input.php">
        <img src="image/icon/mypage.svg" alt="">
        <span>マイページ</span>
      </a>
    </div>

    <?php
    // セッションを変数に定義
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
      // ログインしてる
      echo '<p class="user_name">ようこそ&emsp;', $_SESSION['customer']['nickname'], '様</p>';
    } else {
      // ログインしてない
      echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
    }
    ?>

    <?php
    if (isset($_SESSION['customer'])) {
      echo '<div id="container">';
      echo '<section id="topics">';
      echo '<!-- <div class="heading-block smoothTrigger">';
      echo '<h2 class="heading01">T<span class="en">ravelList</span><span class="jp">一覧</span></h2>';
      echo $name, '様';
      echo '</div> -->';
      echo '<div class="topics-area">';
      echo '<article class="smoothTrigger"><a href="schedule.php">';
      echo '<figure class="zoomOut"><span class="mask"><img src="image/korea_m.jpg" alt=""></span></figure>';
      echo '<div class="topics-block">';
      echo '<h3 class="trip_title">韓国旅行</h3>';
      echo '<p class="schedule_date">2024年6月23日(日)～2024年6月25日(火)</p>';
      echo '</div>';
      echo '</a></article>';

      echo ' <article class="smoothTrigger"><a href="#">';
      echo ' <figure class="zoomOut"><span class="mask"><img src="image/bali_m.jpg" alt=""></span></figure>';
      echo ' <div class="topics-block">';
      echo '   <h3 class="trip_title">バリ旅行</h3>';
      echo '   <p class="schedule_date">2024年11月18日(月)～2024年11月22日(金)</p>';
      echo ' </div>';
      echo '</a></article>';
      echo '</div>';

      echo '</section>';
    } else {
      echo <<< END
<section id="concept" class="inner">
<h2 class="flipRightTopTrigger"><span>Concept</span>旅行を楽しもう！</h2>
<div class="concept_area zoomInTrigger">
<div class="concept_img zoomInTrigger textalign_center">
<img class="concept_img_photo" src="image/main_image.jpg" alt="">
</div>
<ul>
<li class="fadeInTrigger">旅のしおり作成</li>
<li class="fadeInTrigger">メンバーと予定を共有</li>
<li class="fadeInTrigger">日記を残そう</li>
<li class="fadeInTrigger">チャット機能</li>
<li class="fadeInTrigger">持ち物リスト</li>
<li class="fadeInTrigger">フォト共有・公開</li>
</ul>
<div class="concept-btn fadeUpTrigger"><p>ご利用はログインしてください</p><a href="login-input.php" class="btn03 pushright underline"><span>ログインはコチラ</span></a></div>

</div>
</section>
END;
    }
    // <!--/topics-area-->
    echo '<div class="topics-btn smoothTrigger"><a href="#" class="btnlinestretches4"><span>一覧</span></a></div>';

    // 追加ボタン
    echo '<a href="index-create.php">';
    echo ' <div class="add_img">';
    echo '<img src="image/icon/plus-circle.svg" alt="">';
    echo ' </div>';
    echo '</a>';

    echo '</main>';
    ?>

    <footer id="footer">
      <!-- <div id="page-top"><a href="#header"></a></div> -->
      <small>&copy; Good Trip</small>
    </footer>

    <!-- <canvas id="waveCanvas"></canvas> -->


    <!-- </div> -->
    <!--/container-->

    <!-- </div> -->
    <!--/wrapper-->

    <!--=============JS ===============-->
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--機能編 4-1-2 プログレスバー＋数字カウントアップ-->
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <!--機能編 9-5-2 棒グラフ（縦）9-5-6 円グラフ-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <!--機能編 9-5-1 数字のカウントアップ・ダウン + 9-5-2 棒グラフ（縦）9-5-6 円グラフ-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>
    <!--印象編　8-8 テキストがランダムに出現-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/textillate/0.4.0/jquery.textillate.min.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <!--印象編　5-4 幾何学模様-->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--機能編 6-1-1　横移動させて全画面で見せる-->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--印象編　9-2　PNG アニメーション（APNG）-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apng-canvas/2.1.1/apng-canvas.min.js"></script>
    <!--自作のJS-->
    <script src="js/script.js"></script>
</body>

</html>
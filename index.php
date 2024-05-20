<?php session_start(); ?>
<?php require 'includes/database.php'; ?>

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
  <div class="wrap">
    <header id="header" class="fadeDownTrigger fadeDown">
      <h1 class="smoothTrigger smooth"><a href="#">travel planner</a></h1>
    </header>

<<<<<<< HEAD
  <div class="wrap">
    <header id="header" class="fadeDownTrigger fadeDown">
      <h1 class="smoothTrigger smooth"><a href="index.php"><img class="" src="image/logo_2.png" alt=""></a></h1>
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

=======
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

>>>>>>> 2970f899d23dd4694761512f557eaf0e3ab59e94
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
        echo '<p class="user_name">', $_SESSION['customer']['nickname'], 'さん</p>';
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

<<<<<<< HEAD
        $sql = $pdo->prepare('SELECT * FROM plan WHERE customer_id=? and deleted_at IS NULL ORDER BY departure_date ASC');
        $sql->execute([$_SESSION['customer']['id']]);
        $id_list[] = $sql->fetchAll();
        if (empty($id_list[0])) {
          // しおりがないとき
          echo '<div class="topics-area">予定を立てよう</div>';
          echo '<div class="topics-area">新規作成<span><a href="index-create.php">コチラ</a></span></div>';
        } else {
          // しおりがあるとき
          $sql->execute([$_SESSION['customer']['id']]);
          foreach ($sql as $row) {
            $plan_id = $row['id'];
            $title = $row['title'];
            $departure_date = $row['departure_date'];
            $arrival_date = $row['arrival_date'];
            $plan_image = $row['plan_image'];
            $week1 = date('w', strtotime($departure_date));
            $week2 = date('w', strtotime($arrival_date));
            // ０～６に対応した曜日の配列を用意
            $week = ["(日)", "(月)", "(火)", "(水)", "(木)", "(金)", "(土)"];
            // 曜日の数字に対応した配列を取得(出発日)
            $weekDep = $week[$week1];
            // 曜日の数字に対応した配列を取得(出発日)
            $weekArr = $week[$week2];

            echo '<article class="smoothTrigger">';
            echo '<figure class="zoomOut">';
            echo '<div class="mask">';
            echo '<button class="openModal dli-more-v"></button>';
            //モーダルエリアここから↓
            echo '<section class="modalArea">';
            echo '<div class="modalBg"></div>';
            echo '<div class="modalWrapper">';
            echo '<div class="modalContents">';
            echo '<p><a href="index-edit-input.php?plan_id=', $plan_id, '">編集</a></p>';
            echo '<hr>';
            echo '<p><a href="index-edit-input.php?plan_id=', $plan_id, '">削除</a></p>';
            echo '</div>';
            echo '</section>';
            //モーダルエリアここまで↑
            echo '<a href="schedule.php?plan_id=', $plan_id, '"><img src="', $plan_image, '" alt=""></a></div>';
            echo '</figure>';

            echo '<div class="topics-block">';
            echo '<h3 class="trip_title">', $title, '</h3>';
            echo '<p class="schedule_date">', date('Y年m月d日', strtotime($departure_date)), $weekDep, '～', date('Y年m月d日', strtotime($arrival_date)), $weekArr, '</p>';
            echo '</div>';
            echo '</article>';
          }
=======
        $sql = $pdo->prepare('SELECT * FROM plan WHERE customer_id=? ORDER BY departure_date ASC');
        $sql->execute([$_SESSION['customer']['id']]);
        // しおりがないとき
        echo '<div class="topics-area">予定を立てよう</div>';
        echo '<div class="topics-area">新規作成<span><a href="index-create.php">コチラ</a></span></div>';
        foreach ($sql as $row) {
          $plan_id = $row['id'];
          $title = $row['title'];
          $departure_date = $row['departure_date'];
          $arrival_date = $row['arrival_date'];
          $plan_image = $row['plan_image'];
          $week1 = date('w', strtotime($departure_date));
          $week2 = date('w', strtotime($arrival_date));
          // ０～６に対応した曜日の配列を用意
          $week = ["(日)", "(月)", "(火)", "(水)", "(木)", "(金)", "(土)"];
          // 曜日の数字に対応した配列を取得(出発日)
          $weekDep = $week[$week1];
          // 曜日の数字に対応した配列を取得(出発日)
          $weekArr = $week[$week2];

          echo ' <article class="smoothTrigger"><a href="#">';
          echo ' <figure class="zoomOut"><a href="schedule.php?plan_id=', $plan_id, '"><span class="mask"><img src="', $plan_image, '" alt=""></span></a></figure>';
          echo '<div class="topics-block">';
          echo '<h3 class="trip_title">', $title, '</h3>';
          echo '<p class="schedule_date">', date('Y年m月d日', strtotime($departure_date)), $weekDep, '～', date('Y年m月d日', strtotime($arrival_date)), $weekArr, '</p>';
          echo '</div>';
          echo '</a></article>';
>>>>>>> 2970f899d23dd4694761512f557eaf0e3ab59e94
        }

        echo '</div>';
        echo '</section>';
      } else {
        echo <<< END
<section id="concept" class="inner">
<div class="concept_header textalign_center">
<div class="top_title">旅のしおり作成</div>
<p class="flipRightTopTrigger flipRightTop concept_text">Concept</p>
<h2 class="flipRightTopTrigger flipRightTop">旅行を楽しもう！</h2>
</div>

<div class="concept_area zoomInTrigger zoomIn">
<div class="concept_img zoomInTrigger zoomIn textalign_center">
<img class="concept_img_photo zoomIn" src="image/main_image.jpg" alt="">
</div>
<ul>
<li class="fadeInTrigger fadeIn">旅のしおり作成</li>
<li class="fadeInTrigger fadeIn"><a href="#sec01">メンバーと予定を共有</a></li>
<li class="fadeInTrigger fadeIn"><a href="#sec02">日記を残そう</a></li>
<li class="fadeInTrigger fadeIn">チャット機能</li>
<li class="fadeInTrigger fadeIn">持ち物リスト</li>
<li class="fadeInTrigger fadeIn">フォト共有・公開</li>
</ul>
<div class="concept-btn"><p>ご利用はログインしてください</p><a href="login-input.php" class="btn03 pushright underline"><span>ログインはコチラ</span></a></div>

<section id="sec01" class="section">
<h4 class="point">メンバーと予定を共有</h4>
<img class="sec_img" src="image/device.jpg" alt="">
<p>みんなで楽しく旅行の計画を立てよう！</p>
</section>

<section id="sec02" class="section">
<h4 class="point">日記を残そう</h4>
<img class="sec_img" src="image/travel_image.jpg" alt="">
<p>楽しかった思い出を日記にしよう！</p>
</section>

</div>
</section>
END;
      }

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
<<<<<<< HEAD
        <small class="textalign_center">&copy; Good Trip</small>
=======
        <small>&copy; Good Trip</small>
>>>>>>> 2970f899d23dd4694761512f557eaf0e3ab59e94
      </footer>
  </div><!-- </.wrap> -->
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
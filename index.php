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
  <!--自作のCSS-->
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/parts.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>


<body class="appear">
  <?php require 'header.php';  ?>

  <!-- ローディング -->
  <!-- <div id="splash">
    <div id="splash_text"></div>
  </div> -->

  <!-- 幾何学 -->
  <div id="particles-js"></div>
  <div id="wrapper">

    <header id="header" class="fadeDownTrigger">
      <h1 class="smoothTrigger"><a href="#">travel planner</a></h1>
    </header>
    <div id="menu">
      <div><img src="image/icon/bookmark.svg" alt="">プラン一覧</div>
      <div><a href="checklist.php"><img src="image/icon/checkbox.svg" alt="">チェックリスト</a></div>
      <div><a href="checklist.php"><img src="image/icon/diary.svg" alt="">日記</a></div>
      <div><a href="#"><img src="image/icon/mypage.svg" alt="">マイページ</a></div>
    </div>

    <div id="container">
      <main>
        <section id="topics">
          <!-- <div class="heading-block smoothTrigger">
            <h2 class="heading01">T<span class="en">ravelList</span><span class="jp">一覧</span></h2>
          </div> -->
          <div class="topics-area">
            <article class="smoothTrigger"><a href="schedule.php">
                <figure class="zoomOut"><span class="mask"><img src="image/korea_m.jpg" alt=""></span></figure>
                <div class="topics-block">
                  <h3 class="trip_title">韓国旅行</h3>
                  <p class="schedule_date">2024年6月23日(日)～2024年6月25日(火)</p>
                </div>
              </a></article>

            <article class="smoothTrigger"><a href="#">
                <figure class="zoomOut"><span class="mask"><img src="image/hawaii_m.jpg" alt=""></span></figure>
                <div class="topics-block">
                  <h3 class="trip_title">ハワイ旅行</h3>
                  <p class="schedule_date">2024年10月10日(木)～2024年10月15日(火)</p>
                </div>
              </a></article>

            <article class="smoothTrigger"><a href="#">
                <figure class="zoomOut"><span class="mask"><img src="img/03.jpg" alt=""></span></figure>
                <div class="topics-block">
                  <h3 class="trip_title">バリ旅行</h3>
                  <p class="schedule_date">2024年11月18日(月)～2024年11月22日(金)</p>
                </div>
              </a></article>

            <!--/topics-area-->
          </div>
          <div class="topics-btn smoothTrigger"><a href="#" class="btnlinestretches4"><span>一覧</span></a></div>
        </section>

        <!-- 追加ボタン -->
        <a href="create.php">
          <div class="add_img">
            <a href="index-create.php"><img src="image/icon/plus-circle.svg" alt=""></a>
          </div>
        </a>

      </main>

      <footer id="footer">
        <div id="page-top"><a href="#header"></a></div>
        <small>&copy; Good Trip</small>
      </footer>

      <canvas id="waveCanvas"></canvas>
      <!--/container-->
    </div>
    <!--/wrapper-->
  </div>

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
  <!--自作のJS-->
  <script src="js/script.js"></script>
</body>

</html>
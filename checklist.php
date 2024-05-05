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
  <link rel="stylesheet" type="text/css" href="css/checklist.css">
</head>


<body>
  <div id="top">
    <div class="back"><a href="index.php">＜ 戻る</a></div>
  </div>

  <div class="wrapper">
    <ul class="tab">
      <li><a href="#lunch">持ち物リスト</a></li>
      <li><a href="#drink">お土産リスト</a></li>
      <li><a href="#dinner">その他</a></li>
    </ul>

    <div id="lunch" class="area">
      <h2>持ち物リスト</h2>
      <ul>
        <li>パスポート</li>
        <li>充電器</li>
        <li>コンタクト</li>
      </ul>
      <!--/area-->
    </div>
    <div id="drink" class="area">
      <h2>お土産リスト</h2>
      <ul>
        <li>家族</li>
        <li>友達</li>
        <li>職場</li>
      </ul>
      <!--/area-->
    </div>
    <div id="dinner" class="area">
      <h2>その他</h2>
      <ul>
        <li>寝坊しないこと</li>
        <li></li>
        <li></li>
      </ul>
      <!--/area-->
    </div>
    <!--wrapper-->
    <!-- 追加ボタン -->
    <div class="add_img">
      <a href="#"><img src="image/icon/plus-circle.svg" alt=""></a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-4-1/js/5-4-1.js"></script>
</body>

</html>
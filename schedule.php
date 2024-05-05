<?php session_start(); ?>

<html>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <title>Document</title>
</head>

<body>
  <?php
  require 'header.php';
  ?>
  <main>
    <div id="top">
      <div class="back"><a href="index.php">＜ 戻る</a></div>
      <h1>スケジュール</h1>
      <h2 class="trip_title">韓国旅行</h2>
      <p class="schedule_date">2024年6月23日(日)～2024年6月25日(火)</p>
    </div>


    <h3>1日目　2024年6月23日(日)</h3>

    <div class="plan">
      <div class="container">
        <p class="item01"><span class="start">09:05</span><br>&nbsp;<span class="end">ー09:29</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/電車、駅のフリーアイコン.svg" alt="">
        </div>
        <p class="item03">横浜駅→羽田空港国際ターミナル</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">10:15</span><br>&nbsp;<span class="end">ー10:30</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/星アイコン8.svg" alt="">
        </div>
        <p class="item03">SIMカード受け取り</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">12:05</span><br>&nbsp;<span class="end">ー14:25</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/airplane.svg" alt="">
        </div>
        <p class="item03">OZ1075 羽田空港⇒金浦空港</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">15:20</span><br>&nbsp;<span class="end"></span></p>
        <div class="icon">
          <img class="item02" src="image/icon/星アイコン8.svg" alt="">
        </div>
        <p class="item03">スーツケースを預ける</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">16:00</span><br>&nbsp;<span class="end">ー17:00</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/宿泊アイコン1.svg" alt="">
        </div>
        <p class="item03">西鉄ソラリアホテル</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">16:00</span><br>&nbsp;<span class="end">ー20:00</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/歩くアイコン.svg" alt="">
        </div>
        <p class="item03">明洞プラプラ</p>
      </div>
      <hr>
    </div>

    <h3>2日目　2024年6月24日(月)</h3>

    <div class="plan">
      <div class="container">
        <p class="item01">09:00</span><br>&nbsp;<span class="end">ー09:01</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/電車、駅のフリーアイコン.svg" alt="">
        </div>
        <p class="item03">②乙支路3街駅→乙支路入口駅</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">09:04</span><br>&nbsp;<span class="end">ー09:13</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/電車、駅のフリーアイコン.svg" alt="">
        </div>
        <p class="item03">②乙支路入口駅→乙支路3街駅→③鍾路3街駅</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">09:15</span><br>&nbsp;<span class="end">ー11:00</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/歩くアイコン.svg" alt="">
        </div>
        <p class="item03">益善洞散策</p>
      </div>

      <hr>

      <div class="container">
        <p class="item01"><span class="start">11:30</span><br>&nbsp;<span class="end">ー12:30</span></p>
        <div class="icon">
          <img class="item02" src="image/icon/フォークとナイフのお食事アイコン素材.svg" alt="">
        </div>
        <p class="item03">ミルトースト</p>
      </div>

      <hr>

    </div>

    <!-- 追加ボタン -->
    <?php
    echo '<a href="schedule-input.php">';
    echo ' <div class="add_img">';
    echo '<img src="image/icon/plus-circle.svg" alt="">';
    echo ' </div>';
    echo '</a>';
    ?>



  </main>
</body>

</html>

<style>
  main {
    background-color: #FAEAE7;
  }

  main,
  .biz-udpgothic-regular {
    font-family: "BIZ UDPGothic", sans-serif;
    font-weight: 400;
    font-style: normal;
  }

  #top {
    background-color: #DF4456;
    padding: 20px 10px;
    text-align: center;
    color: #fff;
  }

  .back {
    text-align: left;
  }

  .schedule_date {
    font-size: 0.8rem;
  }

  .trip_title {
    font-weight: bold;
    padding-top: 6px;
    padding-bottom: 10px;
  }

  h3 {
    font-weight: bold;
    background-color: #fff;
    line-height: 28px;
    padding: 4px 4px;
  }

  .plan {
    width: 96%;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.6);
  }

  .item01 {
    text-align: right;
  }

  .start {
    font-weight: bold;
    font-size: 14px;
  }

  .end {
    font-size: 12px;
  }

  .container {
    width: 350px;
    display: grid;
    grid-auto-flow: column;
    grid-template-columns: 58px 36px 246px;
    column-gap: 4px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin: 0 auto;
    place-items: center start;
  }

  .icon {
    margin: 0 auto;
  }

  .item02 {
    width: 26px;
  }

  .item03 {
    font-size: 12px;
  }

  hr {
    color: gray;
  }

  /* 追加ボタン */
  .add_img {
    position: fixed;
    bottom: 3%;
    right: 2%;
    width: 36px;
    height: 36px;
    line-height: 36px;
    background: #DF4456;
    border-radius: 50%;
    text-align: center;
  }

  .add_img img {
    width: 36px;
  }
</style>

</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
  <title>Lesson Sample Site</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    
    $(function(){
      // ここに処理を記述
      $('.jump').on("click", function(){
        $("html,body").animate({scrollTop:0},"slow");
      });

      $('.contact').on("click", function(){
        $("header").removeClass("one");
      });
      $('.contact').on("click", function(){
        $("header").addClass("one");
      });

      $('#menu-click-first').on("click", function(){
        $("html,body").animate({scrollTop:$("#cafe_intro").offset().top},"slow");
      });
      
      $('#menu-click-exp').on("click", function(){
        $("html,body").animate({scrollTop:$("#cafe_exp").offset().top},"slow");
      });
  
    });
    var adOffset, adSize;

    $(window).on('load resize',function(){
        adOffset = $('main').offset().top;
        winH = $(window).height();
    });
    $(function() {
        var message = $('#jump');    
        message.hide();
        //スクロール量がmesPointに達していなければmessageを非表示、達して入れば表示します
        $(window).scroll(function () {
            if ($(this).scrollTop() > adOffset - winH) {
                message.fadeIn();
            } else {
                message.fadeOut();
            }
        });
    });

    </script>
</head>

<body class id="app" v-on="click: closeMenu">
    <div class="alert"><a href="#">新型コロナウイルスに対する取り組みの最新情報をご案内</a></div>
    <header class="one">
        <h1 class="concept">
            あなたの<br>好きな空間を作る。
        </h1>
        <?php include (dirname(__FILE__) . '/header.php'); ?>
    </header>

    <open-modal v-show="showContent" v-on="click: closeModal"></open-modal>
        <section>
            <div class="cafe_intro" id="cafe_intro">
                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="./cafe/img/cafe1.jpg" alt="東京 カフェ" class="box-img"></div>
                        <div class="access">
                            <p class="area">東京</p>
                            <p class="distance">車で15分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="./cafe/img/cafe2.jpg" alt="神奈川 カフェ" class="box-img"></div>
                        <div class="access">
                            <p class="area">神奈川</p>
                            <p class="distance">車で30分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="./cafe/img/cafe3.jpg" alt="愛知 カフェ" class="box-img"></div>
                        <div class="access">
                            <p class="area">愛知</p>
                            <p class="distance">車で1時間</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="./cafe/img/cafe4.jpg" alt="京都 カフェ" class="box-img"></div>
                        <div class="access">
                            <p class="area">京都</p>
                            <p class="distance">車で40分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="./cafe/img/cafe5.jpg" alt="岡山 カフェ" class="box-img"></div>
                        <div class="access">
                            <p class="area">岡山</p>
                            <p class="distance">車で1.5時間</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="./cafe/img/cafe6.jpg" alt="鹿児島 カフェ" class="box-img"></div>
                        <div class="access">
                            <p class="area">鹿児島</p>
                            <p class="distance">車で50分</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="./cafe/img/cafe7.jpg" alt="沖縄 カフェ" class="box-img"></div>
                        <div class="access">
                            <p class="area">沖縄</p>
                            <p class="distance">車で2時間</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <main>
            <section id="location">
                <h2>好きなロケーションを選ぼう</h2>
                <div class="img-flex4">
                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/intro1.jpg" alt="クラシック" class="location_img"></div>
                            <div class="text">クラシック</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/intro2.jpg" alt="バー" class="location_img"></div>
                            <div class="text">バー</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/intro3.jpg" alt="キャンプs" class="location_img"></div>
                            <div class="text">キャンプ</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/intro4.jpg" alt="リゾート" class="location_img"></div>
                            <div class="text">リゾート</div>
                        </div>
                    </div>
                </div>

                <div class="goto">
                    <div class="goto_text">
                        <h3>Go To Eats</h3>
                        <p>キャンペーンを利用して、全国で食事しよう。<br>
                            いつもと違う景色に囲まれてカラダもココロもリフレッシュ。
                        </p>
                    </div>
                    <img src="./cafe/img/goto.jpg" class="goto_img" alt="ゴートゥイメージ">
                </div>
            </section>

            <section class="cafe bg_black" id="cafe_exp">
                <h2>カフェ作りを体験しよう</h2>
                <p>お店のエキスパートが案内するユニークな体験（直接対面型またはオンライン）。</p>
                <div class="cafe_exp">
                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/exp1.jpg" alt="ジョブ"></div>
                            <div class="text">ジョブ体験</div>
                            <p>カフェカウンターを体験しよう。</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/exp2.jpg" alt="レシピ"></div>
                            <div class="text">レシピ体験</div>
                            <p>美味しいレシピを考えてみよう。</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/exp3.jpg" alt="プロモーション"></div>
                            <div class="text">プロモーション体験</div>
                            <p>お店の宣伝を手伝ってみよう。</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="host">
                <h2>全国のホストに仲間入りしよう</h2>
                <div class="cafe_host">
                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/host1.jpg" class="cafe_img" alt="ビジネス"></div>
                            <div class="text">ビジネス</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/host2.jpg" class="cafe_img" alt="コミュニティ"></div>
                            <div class="text">コミュニティ</div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="info">
                            <div class="photo"><img src="./cafe/img/host3.jpg" class="cafe_img" alt="食べ歩き"></div>
                            <div class="text">食べ歩き</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include (dirname(__FILE__) . '/footer.php'); ?>

    <div class="jump" id="jump">Jump To Top</div> 

</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>


<script type="text/javascript" src="script.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</body>
</html>
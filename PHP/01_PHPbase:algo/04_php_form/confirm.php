<?php 
  session_start();  
  if($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: contact.php');
    exit();
  }
  header('Express:-1');
  header('Cache-Control:');
  header('Pragma:');
  $errmessage = array();
  $errmessage['name'] = "";
  $errmessage['kana'] = "";
  $errmessage['tel'] = "";
  $errmessage['email'] = "";
  $errmessage['body'] = "";
if(isset($_POST['name'])){
  if ($_POST["name"] == "" || mb_strlen($_POST["name"]) > 10) {
    $errmessage['name'] = "1";
  }
  // if (preg_match("/^[ぁ-ん]+$/u", $string)) {
  //     echo "ひらがなのみ";
  // }
  // if (preg_match("/^[ァ-ヶー]+$/u", $string)) {
  //     echo "カタカナのみ";
  // }
  $_SESSION['name'] = htmlspecialchars($_POST['name'],ENT_QUOTES,"UTF-8");
  $_SESSION['errname'] = htmlspecialchars($errmessage['name'],ENT_QUOTES,"UTF-8");
}
if(isset($_POST['kana'])){
  if($_POST["kana"] == "" || mb_strlen($_POST["kana"]) > 10){
    $errmessage['kana'] = "1";
  }
  $_SESSION['kana'] = htmlspecialchars($_POST['kana'],ENT_QUOTES,"UTF-8");
  $_SESSION['errkana'] = htmlspecialchars($errmessage['kana'],ENT_QUOTES,"UTF-8");
}
if(isset($_POST['kana'])){
if(!preg_match("/^[ァ-ヶー]+$/u" ,$_POST["kana"])){
  $errmessage['kana'] = "1";
  }$_SESSION['kana'] = htmlspecialchars($_POST['kana'],ENT_QUOTES,"UTF-8");
  $_SESSION['errrkana'] = htmlspecialchars($errrmessage['kana'],ENT_QUOTES,"UTF-8");

}
if(isset($_POST["tel"])){
  if($_POST['tel'] == ""){
    $_POST['tel'] = "";
  }elseif(!preg_match("/^[0-9]+$/", $_POST["tel"])){
    $errmessage['tel'] = "1";
  }
  $_SESSION['tel'] = htmlspecialchars($_POST['tel'],ENT_QUOTES,"UTF-8");
  $_SESSION['errtel'] = htmlspecialchars($errmessage['tel'],ENT_QUOTES,"UTF-8");
}
if(isset($_POST['email'])){
  if($_POST["email"] == "" || !preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",$_POST["email"])){
    $errmessage['email'] = "1";
  }
  $_SESSION['email'] = htmlspecialchars($_POST['email'],ENT_QUOTES,"UTF-8");
  $_SESSION['erremail'] = htmlspecialchars($errmessage['email'],ENT_QUOTES,"UTF-8");
}  
if(isset($_POST['body'])){
  if($_POST['body'] == ""){
    $errmessage['body'] = "1";
  }
  $_SESSION['body'] = htmlspecialchars($_POST['body'],ENT_QUOTES,"UTF-8");
  $_SESSION['errbody'] = htmlspecialchars($errmessage['body'],ENT_QUOTES,"UTF-8");
}
?>
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
      $('#menu-click-first').on("click", function(){
        window.location.href = 'index.php#cafe_intro';
      });
      
      $('#menu-click-exp').on("click", function(){
        window.location.href = 'index.php#cafe_exp';
      });
  
    });

    
    
</script>
</head>
<body id="app" v-on="click: closeMenu">
    <header class="contact">
        <?php include dirname(__FILE__) . '/header.php';?>
        
    </header>
    <open-modal v-show="showContent" v-on="click: closeModal"></open-modal>
    
      <?php if($_SESSION['errname']=="" && $_SESSION['errrkana']=="" && $_SESSION['errkana']=="" && $_SESSION['errtel']=="" && $_SESSION['erremail']=="" && $_SESSION['errbody']==""){ ?>
      <section>
          <div class="contact_box">
              <h2>お問い合わせ</h2>
        <form action="complete.php" method="post">
              <p>下記の内容をご確認の上送信ボタンを押してください</p>
              <p>内容を訂正する場合は戻るを押してください。</p>
          <dl class="confirm">
                  <dt>氏名</dt>
                  <dd><?php echo ($_SESSION['name']); ?></dd>
                  <dt>フリガナ</dt>
                  <dd><?php echo ($_SESSION['kana'])?></dd>
                  <dt>電話番号</dt>
                  <dd><?php echo ($_SESSION['tel'])?></dd>
                  <dt>メールアドレス</dt>
                  <dd><?php echo ($_SESSION['email'])?></dd>
                  <dt>お問い合わせ内容</dt>
                  <dd><?php echo nl2br($_SESSION['body'])?></dd>
                  <dd class="confirm_btn">
                      <button type="submit" id="submit" name="submit">送　信</button>
                      <button type="button" onclick=history.back()>戻　る</button>
                  </dd>
          </dl>
        </form>
          </div>
          <?php if(isset($_POST['submit']) && $_POST['submit']){
            $_SESSION = array(); // セッション変数解除
            // セッション破壊
            session_destroy();
          }
        
          ?>
      </section>
      <?php } else{?>
        <section>
          <div class="contact_box">
              <h2>お問い合わせ</h2>
        <form action="confirm.php" method="post">
              <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
              <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
              <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
              <p><span class="required">*</span>は必須項目となります。</p>
              <dl>
                  <dt><label for="name">氏名</label><span class="required">*</span></dt>
                  <?php if($_SESSION['errname']=="1"){?>
                    <span style="color: red;">
                      <?php echo "氏名は必須入力です。10文字以内でご入力ください。"; ?> 
                      <dd><input type="text" name="name" id="name" placeholder="山田太郎" value="<?php echo ($_SESSION['name']); ?>"></dd>
                    </span>                    
                  <?php }else{ ?>
                    <dd><?php echo ($_SESSION['name']); ?></dd>
                  <?php }?>
                  <dt><label for="kana">フリガナ</label><span class="required">*</span></dt>
                  <?php if($_SESSION['errkana']=="1"){?>
                    <span style="color: red;">
                      <?php echo "フリガナは必須入力です。10文字以内でご入力ください。"; ?> 
                      <dd><input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="<?php echo ($_SESSION['kana']); ?>"></dd>
                    </span>                    
                  <?php }elseif($_SESSION['errrkana']=="1"){ ?>
                    <span style="color: red;">
                      <?php echo "全角カナで入力ください。"; ?> 
                      <dd><input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="<?php echo ($_SESSION['kana']); ?>"></dd>
                    </span> 
                  <?php }else{ ?>
                    <dd><?php echo ($_SESSION['kana'])?></dd>
                  <?php }?>
                  <dt><label for="tel">電話番号</label></dt>
                  <?php if($_SESSION['errtel']=="1"){?>
                    <span style="color: red;">
                      <?php echo "電話番号は0-9の数字のみでご入力ください。"; ?> 
                      <dd><input type="text" name="tel" id="tel" placeholder="09012345678" value="<?php echo ($_SESSION['tel']); ?>"></dd>
                    </span>                    
                  <?php }else{?>
                  <dd><?php echo ($_SESSION['tel'])?></dd>
                  <?php }?>
                  <dt><label for="email">メールアドレス</label><span class="required">*</span></dt>
                  <?php if($_SESSION['erremail']){?>
                    <span style="color: red;">
                      <?php echo "メールアドレスは正しくご入力ください。"; ?> 
                      <dd><input type="text" name="email" id="email" placeholder="test@test.co.jp" value="<?php echo ($_SESSION['email']); ?>"></dd>
                    </span>                    
                  <?php }else{?>
                    <dd><?php echo ($_SESSION['email'])?></dd>
                  <?php }?>
              </dl>
              <h3><label for="body">お問い合わせ内容をご記入ください<span class="required">*</span></label></h3>
              <?php if($_SESSION['errbody']){?>
                    <span style="color: red;">
                      <?php echo "お問い合わせ内容は必須入力です。"; ?> 
                      <dl class="body">
                      <dd><textarea name="body" id="body" value="<?php echo ($_SESSION['body']); ?>"></textarea></dd>
                    </span>                    
                  <?php }else{ ?>
                    <dd><?php echo nl2br($_SESSION['body']);?></dd>
                    <?php }?>
                  
          <dd><button type="submit" id="submit_btn">送　信</button></dd>
        </dl>
        </form>
          </div>
      </section>
      <?php } ?>
      
     
    <?php include dirname(__FILE__) . '/footer.php';?>
    

    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>
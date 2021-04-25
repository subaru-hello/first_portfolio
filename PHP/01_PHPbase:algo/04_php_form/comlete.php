<?php 
  session_start();  
  if($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: contact.php');
    exit();
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
<?php
  try {
    //DB名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=cafe;host=localhost';
    $user = 'root';
    $password = 'root';

    $PDO = new PDO($dsn, $user, $password);//MySQLのデータベースに接続
    $PDO->beginTransaction();
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//PDOのエラーレポートを表示

    //confirm.phpの値を取得
    $name = $_SESSION['name'];
    $kana = $_SESSION['kana'];
    $tel = $_SESSION['tel'];   
    $email = $_SESSION['email'];
    $body = $_SESSION['body'];

    $sql = "INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)";// INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
    $stmt = $PDO->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params = array(':name' => $name, ':kana' => $kana, ':tel' => $tel, ':email' => $email, ':body' => $body); // 挿入する値を配列に格納する
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    $PDO->commit();
  } catch (PDOException $e){
    $PDO->rollBack();
    exit('データベースに接続できませんでした。' . $e->getMessage());
  }
  $PDO = null;
?>  
    <header class="contact">
        <?php include dirname(__FILE__) . '/header.php';?>
        
    </header>
    <open-modal v-show="showContent" v-on="click: closeModal"></open-modal>

    <section>
        <div class="contact_box">
            <h2>お問い合わせ</h2>
			<div class="complete_msg">
                <p>送信が完了しました。お問い合わせありがとうございました。</p>
                
                <a href="index.php">トップへ戻る</a>
            </div>
        </div>
    </section>

    <?php include dirname(__FILE__) . '/footer.php';?>
    

    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>
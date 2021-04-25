<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Lesson Sample Site</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
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
      $('.del_btn').on("click", function(){
        var select = confirm("問い合わせますか？「OK」で削除「キャンセル」で削除中止");
        return select;
      });
    });
    
  </script>
</head>
<body id="app" v-on="click: closeMenu">
    <header class="contacts">
        <?php include dirname(__FILE__) . '/header.php';?>
        
    </header>
    <open-modal v-show="showContent" v-on="click: closeModal"></open-modal>

    <section>
        <div class="contact_box">
            <h2>お問い合わせ</h2>
          <form action="confirm.php" method="post">
                <input type="hidden" name="check_flg" value="<?php echo $_SESSION['check_flg']; ?>">
                <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <p><span class="required">*</span>は必須項目となります。</p>
                <dl>
                    <dt><label for="name">氏名</label><span class="required">*</span></dt>
                    <dd><input type="text" name="name" id="name" placeholder="山田太郎" value=""></dd>
                    <dt><label for="kana">フリガナ</label><span class="required">*</span></dt>
                    <dd><input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value=""></dd>
                    <dt><label for="tel">電話番号</label></dt>
                    <dd><input type="text" name="tel" id="tel" placeholder="09012345678" value=""></dd>
                    <dt><label for="email">メールアドレス</label><span class="required">*</span></dt>
                    <dd><input type="text" name="email" id="email" placeholder="test@test.co.jp" value=""></dd>
                </dl>
                <h3><label for="body">お問い合わせ内容をご記入ください<span class="required">*</span></label></h3>
                <dl class="body">
                    <dd><textarea name="body" id="body" value=""></textarea></dd>
            <dd><button type="submit" id="submit_btn">送　信</button></dd>
          </dl>
          </form>
          
        </div>
        <div class="db">
        <?php
          try {
              $dsn = 'mysql:dbname=cafe;host=localhost';
              $user = 'root';
              $password = 'root';

              $PDO = new PDO($dsn, $user, $password);
              $PDO->beginTransaction();
              $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              

          } catch (PDOException $e){
            exit('データベースに接続できませんでした。' . $e->getMessage());
          }
          try{
              $sql = "SELECT * FROM cafe.contacts";// SQL作成
              $stmh = $PDO->prepare($sql);// プリペアドステートメントを用意する
              $stmh->execute();
              $PDO->commit();
          }catch(PDOException $e){
            $PDO->rollBack();
            die('接続エラー：' .$e->getMessage());
          }
          $PDO = null;
        ?>  
            <table class="db_contact">
                <tr>
                  <th>ID</th>
                  <th>name</th>
                  <th>kana</th>
                  <th>tel</th>
                  <th>email</th>
                  <th>body</th>
                  <th>created_at</th>
                  <th>update</th>
                  <th>delete</th>
                  
                </tr>
              <?php
                  while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
              ?>
                  <tr>
                      <td><?=htmlspecialchars($row['id'])?></td>
                      <td><?=htmlspecialchars($row['name'])?></td>
                      <td><?=htmlspecialchars($row['kana'])?></td>
                      <td><?=htmlspecialchars($row['tel'])?></td>
                      <td><?=htmlspecialchars($row['email'])?></td>
                      <td><?=nl2br(htmlspecialchars($row['body'])) ?></td>
                      <td><?=htmlspecialchars($row['created_at'])?></td>
                      <td>
                        <?php echo "<a href=edit.php?id=" . $row["id"] .">編集</a>";?>  
                      </td>
                      <td>
                        <div class="del_btn"><?php echo "<a href=del.php?id=" . $row["id"] .">削除</a>";?></div>                       
                      </td>
                  </tr>
              <?php } ?>   
            </table>
        <?php
            $PDO = null;
        ?>
    
    </div>
    </section>
    
    
    <?php include dirname(__FILE__) . '/footer.php';?>

    


    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    
</body>
</html>
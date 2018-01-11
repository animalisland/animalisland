<?php
  session_start();
//echo $_GET["id"];

  if (!isset($_GET['id'])) {
    $_SESSION['msg'] = "不正なアクセス";
    //header('Location: ./deleteForm.php?id='.$id);
      echo "わかんない";
    exit;
  }


// if ($upfile['error'] > 0) {
//         throw new Exception('ファイルアップロードに失敗しました。');
// }

  $dsn = "mysql:host=localhost;dbname=gp41;charset=utf8";
  $dbuser = "root";
  $dbpass = "";
$id = $_GET['id']; 
try {
    // 接続
$pdo = new PDO($dsn, $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//DefaultはERRMODE_SILENT
$sql = "select * from ani_data where id=?";
$preStmt = $pdo->prepare($sql);
$preStmt->bindValue(1,$id);
$preStmt->execute();
      
  while($res = $preStmt->fetch(PDO::FETCH_ASSOC)){
    if($res['id'] == $id){
        $preStmt = $pdo -> prepare("delete from ani_data where id=?");
       $preStmt->bindValue(1,$id);
      // 実行
     $preStmt -> execute();
    $_SESSION['msg'] = "削除しました。";
       
    header('Location: ./island.php');
        exit;
    }
  }
    
  } catch (Exception $e) {
    echo $e->getMessage();
    $_SESSION['msg'] = "データベースエラー"+$e;

    header('Location: ./deleteForm.php?id='.$id);
  }

  
?>

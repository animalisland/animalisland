<?php
  session_start();

  if (!isset($_POST['id'], $_POST['name'])) {
    $_SESSION['msg'] = "不正なアクセス";
    header('Location: ./update.php?id='.$id);
    exit;
  }
  if (empty($_POST['id']) ||
  empty($_POST['name']) ||
  empty($_POST['ani_kind']) ||
  empty($_POST['sex']) ||
  empty($_POST['age']) ||
  empty($_POST['health'])) {
    $_SESSION['msg'] = "入力してください";
    header('Location: ./update.php?id='.$id);
    exit;
  }


// if ($upfile['error'] > 0) {
//         throw new Exception('ファイルアップロードに失敗しました。');
// }

  $dsn = "mysql:host=localhost;dbname=gp41;charset=utf8";
  $dbuser = "root";
  $dbpass = "";
$id = $_POST["id"]; 
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
        $preStmt = $pdo -> prepare("UPDATE `ani_data` SET `id`=:id,`name`=:name,`ani_kind`=:ani_kind,`url`=:url,`sex`=:sex,`age`=:age,`health`=:health where id='$id'");
        $preStmt->bindParam(":id", $_POST['id']);
        $preStmt->bindParam(":name", $_POST['name']);
        $preStmt->bindParam(":ani_kind", $_POST['ani_kind']);
        $preStmt->bindParam(":url", photo());
        $preStmt->bindParam(":sex", $_POST['sex']);
        $preStmt->bindParam(":age", $_POST['age']);
        $preStmt->bindParam(":health", $_POST['health']);
          // 実行
     $preStmt -> execute();
    $_SESSION['msg'] = "登録しました。";
       
    header('Location: ./update.php?id='.$id);
        exit;
    }
  }
    
  } catch (Exception $e) {
    echo $e->getMessage();
    $_SESSION['msg'] = "データベースエラー"+$e;

    //header('Location: ./update.php?id='.$id);
  }

function photo() {
  if (isset($_FILES['up']['error']) && is_int($_FILES['up']['error'])) {
    switch ($_FILES['up']['error']) {
      case UPLOAD_ERR_OK: // OK
      break;
      case UPLOAD_ERR_NO_FILE:   // ファイル未選択
        throw new RuntimeException('ファイルが選択されていません');
      case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
      case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
        throw new RuntimeException('ファイルサイズが大きすぎます');
      default:
        throw new RuntimeException('その他のエラーが発生しました');
    }
    // $_FILES['upfile']['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
    $type = @exif_imagetype($_FILES['up']['tmp_name']);
    if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
      throw new RuntimeException('形式が未対応です');
    }

    // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
    $filepath = sha1_file($_FILES['up']['tmp_name']) . image_type_to_extension($type);
    $path = sprintf('images/%s', $filepath);

    if (!move_uploaded_file($_FILES['up']['tmp_name'], $path)) {
      throw new RuntimeException('ファイル保存時にエラーが発生しました');
    }
    chmod($path, 0644);
    return $path;

  }else{
    throw new RuntimeException('エラー');
  }
}
  
?>

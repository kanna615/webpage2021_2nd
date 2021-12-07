<?php
session_start();
?>
<html>
<head>
    <title>カード登録情報編集</title>
    <meta charset="utf-8">
</head>
<body>

<?php
$pass = "Nstyle";
if(isset($_SESSION["pass"]) && $_SESSION["pass"]==$pass){
?>

<hr size="9" noshade>
<h1>#データ更新ページ</h1>
<hr size="4" noshade>
<a href="" onclick="document.card.submit();return false;">戻る</a>
<form method="post" name="card" action="カード管理.php">
    <input type="hidden" name="pass" value=<?=$_SESSION["pass"]?>>
</form>
<br>

<?php
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //DB接続処理
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
$dbhost="ec2-52-205-61-60.compute-1.amazonaws.com";
$dbname="dcg3sava0u5ic6";
$dbuser="tlvwasltznluaj";
$dbpass="828dff754cd6db621b4756042f5c3b47623ca41fcf8cf4e817fa7efffef3a21c";
$dbtype="pgsql";
$dsn = "$dbtype:dbname=$dbname host=$dbhost port=5432";
try{
    $pdo=new PDO($dsn,$dbuser,$dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    //print"接続しました<br>";
}catch(PDOException $Exception){
    die('エラー:'.$Exception->getMessage());}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/

if(isset($_GET['id'])){

$tabsel = "SELECT * FROM sample_member";
try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
}catch(PDOException $Exception){
    print "エラー:".$Exception->getMessage();
}


$rs = $stmh->fetchall ();
foreach ( $rs as $row ) {
    if($row['card_id']==$_GET['id']){
    ?>
    <font size="3" color="#000000">カードID：</font><font size="4" color="#ff0000"><?=htmlspecialchars($row['card_id'])?></font>
    <br>
    <form name="form3" method="post" action="uptab.php">
    姓　　　：   <input type="text" name="last_name" value="<?=htmlspecialchars($row['last_name'])?>"><br>
    名　　　：   <input type="text" name="first_name" value="<?=htmlspecialchars($row['first_name'])?>"><br>
    作業内容：   <input type="text" name="work" value="<?=htmlspecialchars($row['work'])?>"><br>
                <input type="hidden" name="card_id" value="<?=$row['card_id']?>">
                <input type="hidden" name="action" value="update">
                <input type="submit" value="更新">
    </form> 
    
    <?php    
    }
}//foreachの括弧

?>

  

<?php
}

}
?>

</body>
</html>
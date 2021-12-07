<?php
session_start();
?>
<html> 
<head>
    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>

<body bgcolor="#e0ffff" text="#000000">

<?php
$pass="Nstyle";
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
}catch(PDOException $Exception){
    die('エラー:'.$Exception->getMessage());}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
?>

    <hr size="9" noshade>
    <h1>#ホーム画面</h1>
    <hr size="4" noshade>
    <br>
    <font >
    <?php
    if((isset($_SESSION["pass"])) && ($_SESSION["pass"]==$pass)){
    ?>
        <a href="" onclick="document.sagyou.submit();return false;"><font size="5">作業記録管理ページ</font></a><br><br>
        <a href="" onclick="document.card.submit();return false;"><font size="5">カード管理ページ</font></a>
        <form method="post" name="sagyou" action="作業記録.php">
            <input type="hidden" name="pass" value=<?=$_SESSION["pass"]?>>
        </form>
        <form method="post" name="card" action="カード管理.php">
            <input type="hidden" name="pass" value=<?=$_SESSION["pass"]?>>
        </form>
    <?php
    }else{
    ?>
        <a href="ログイン画面(作業記録).html"><font size="5">作業記録管理ページ</font></a><br><br>
        <a href="ログイン画面(カード管理).html"><font size="5">カード管理ページ</font></a>
    <?php
    }
    ?>
    
    <br><br>
    <hr size="4" noshade>
    <h2>作業の状況</h2>
    <hr size="4" noshade>

<?php
try{
    $stmh=$pdo->query("SELECT * FROM sample_member");
    $stmh->execute();
}catch(PDOException $Exception){
    print "エラー:".$Exception->getMessage();
}

$rs = $stmh->fetchall ();
$count = 0;
foreach ( $rs as $row ) {
    if($row['rane'] != "0"){
?>
    <h3><?=$row['last_name']?>:　<font color="#ff0000"><?=$row['rane']?></font>レーン [<?=$row['work']?>]</h3>
<?php
    $count += 1;
    }
}
?>
<h4>作業中の人数：<?=$count?>人</h4>
</body>
</html>
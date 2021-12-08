<?php
session_start();
?>
<html>
<head>
<title>作業記録管理ページ</title>
<meta charset=utf-8>
</head>
<body>

<?php
$_SESSION["pass"] = htmlspecialchars($_POST["pass"]);
$pass = "Nstyle";
if(isset($_SESSION["pass"]) && $_SESSION["pass"]==$pass){
?>

<hr size="9" noshade>
<h1>#作業記録管理ページ</h1>
<hr size="4" noshade>
<a href="index.php">ホームページへ</a><br>
<a href="グラフ表示ページ.php">グラフ表示</a><br>
<form name="form1" method="post" action="作業記録.php">
       
        <font size="4" color="#000000">名前で検索:</font><br>
        <input type="text" name="search_key"><br> 
        
        <font size="4" color="#000000">作業内容を指定:</font><br>
        <select name="work">
            <option value="" selected>$_POST["work"]</option>
            <option value="収穫">収穫</option>
            <option value="芽かき">芽かき</option>
            <option value="追い巻き">追い巻き</option>
        </select>
        <br>      

        <font size="4" color="#000000">日付で検索:</font><br>
        <select name="year">
            <option value="" selected>$_POST["year"]</option>
            <?php
                for($i=2021;$i<=2035;$i++){
                    echo"<option value='{$i}'>{$i}</option>";
                }
            ?>
        </select>
        年
        <select name="month">
            <option value="" selected>$_POST["month"]</option>
            <?php
                for($i=1;$i<=12;$i++){
                    echo"<option value='{$i}'>{$i}</option>";
                }
            ?>
        </select>
        月
        <select name="day">
            <option value="" selected>$_POST["day"]</option>
            <?php
                for($i=1;$i<=31;$i++){
                    echo"<option value='{$i}'>{$i}</option>";
                }
            ?>
        </select>
        日     
        <br>
        <input type="hidden" name="pass" value="<?=$_SESSION["pass"]?>">
        <input type="submit" value="検索">
</form>

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
    die('エラー:'.$Exception->getMessage());
    print "データベース接続失敗<br>";
}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
?>

<?php 
function Harvest_color($row_){
    echo "<tr><td align='center'>{$row_['member']}</td>";
    echo "<td align='center'>{$row_['work_time']}</td>";
    echo "<td align='center'>{$row_['work']}</td>";
    
    if($row_['eff']>80 && $row_['work']=="収穫"){
        echo "<td align='center' bgcolor='#7cfc00'><b>{$row_['eff']}</b></td>";
    
    }elseif($row_['eff']>50 && $row_['work']=="収穫"){
    
        echo "<td align='center' bgcolor='#00bfff'><b>{$row_['eff']}</b></td>";
    
    }elseif($row_['eff']>30 && $row_['work']=="収穫"){
    
        echo "<td align='center' bgcolor='#ffd700'><b>{$row_['eff']}</b></td>";
    
    }elseif($row_['eff']<30 && $row_['work']=="収穫" && $row_['eff']!=""){
    
        echo "<td align='center' bgcolor='#ff4500'><b>{$row_['eff']}</b></td>";
    
    }else{
    
        echo "<td align='center'>{$row_['eff']}</td>";
    
    }
    
    echo "<td align='center'>{$row_['bx']}</td>";
    echo "<td align='center'>{$row_['rane']}</td>";
    echo "<td align='center'>{$row_['d_ymd']}</td>";
    echo "<td align='center'>{$row_['dt']}</td></tr>";

}
?>

<?php
$DAY = (string) $_POST["day"];
$work = $_POST["work"];
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //SELECT処理
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
/*■■■■■■■■■■■■■■■■■■■
(1)名前(作業名)、年、月、日
パターン番号＝11
■■■■■■■■■■■■■■■■■■■■■*/
if($_POST["search_key"]!="" && $_POST["year"]!="" && $_POST["month"]!="" && $DAY!=""){

    $KEY1="11";
    $KEY21=$_POST["search_key"];
    $KEY31=$_POST["year"];
    $KEY32=$_POST["month"];
    $KEY33=$DAY;

    $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
    $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
    $search_key=$_POST["search_key"];
    //クエリ実行
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";
    }
    ?>
    <font size="3" color="#000000"><b>[指定内容]</b></font><br>
    <font size="3" color="#000000">名前　　　：</font>
    <font size="4" color="#ff0000"><?=$search_key?></font><br>
    <font size="3" color="#000000">作業内容　：</font>
    <font size="4" color="#ff0000"><?=$work?></font><br>   
    <font size="3" color="#000000">指定年月日：</font>
    <font size="4" color="#ff0000"><?=$_POST["year"]?>年<?=$_POST["month"]?>月<?=$_POST["day"]?>日</font><br>

    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key31" value="<?=$KEY31?>">
        <input type="hidden" name="key32" value="<?=$KEY32?>">
        <input type="hidden" name="key33" value="<?=$KEY33?>">
        <input type="submit" value="CSVファイルを保存">
    </form>

    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

    <?php
    $rs = $stmh->fetchall ();
    
    foreach ( $rs as $row ) {
        if($work == ""){
            if(($row['member']==$search_key) && ($row['dd']==$DAY)){
                Harvest_color($row);
    ?> 
                
    <?php
            }
        }else{
            if(($row['member']==$search_key) && ($row['work']==$work) && ($row['dd']==$DAY)){
                Harvest_color($row);
    ?>
                             
            <?php
            }
        }
    }//foreachの括弧
    if(count($rs) == 0){
        print "検索結果がありません。";
    }

/*■■■■■■■■■■■■■■■■■■■
(2)名前、年、月
パターン番号＝12
■■■■■■■■■■■■■■■■■■■■■*/
}elseif($_POST["search_key"]!="" && $_POST["year"]!="" && $_POST["month"]!="" && $DAY==""){
    $KEY1="12";
    $KEY21=$_POST["search_key"];
    $KEY31=$_POST["year"];
    $KEY32=$_POST["month"];
    $KEY33=$DAY;
    
    $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
    $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
    $search_key=$_POST["search_key"];
    //クエリ実行
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";
    }
    ?>

    <font size="3" color="#000000"><b>[指定内容]</b></font><br>
    <font size="3" color="#000000">名前　　　：</font>
    <font size="4" color="#ff0000"><?=$search_key?></font><br>
    <font size="3" color="#000000">作業内容　：</font>
    <font size="4" color="#ff0000"><?=$work?></font><br>   
    <font size="3" color="#000000">指定年月日：</font>
    <font size="4" color="#ff0000"><?=$_POST["year"]?>年<?=$_POST["month"]?>月<?=$_POST["day"]?>日</font><br>

    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key31" value="<?=$KEY31?>">
        <input type="hidden" name="key32" value="<?=$KEY32?>">
        <input type="hidden" name="key33" value="<?=$KEY33?>">
        <input type="submit" value="CSVファイルを保存">
    </form>

    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

    <?php
    $rs = $stmh->fetchall ();
    foreach ( $rs as $row ) {
        if($work == ""){
            if($row['member']==$search_key){
                Harvest_color($row);
    ?> 
                
    
    <?php
            }    
        }else{
            if(($row['member']==$search_key) && ($row['work']==$work)){
                Harvest_color($row);
            ?>
                
            <?php
            }
        }
    }//foreachの括弧
    if(count($rs) == 0){
        print "検索結果がありません。";
    }
/*■■■■■■■■■■■■■■■■■■■
(3)名前、年
パターン番号＝13
■■■■■■■■■■■■■■■■■■■■■*/
}elseif($_POST["search_key"]!="" && $_POST["year"]!="" && $_POST["month"]=="" && $DAY==""){
    $KEY1="13";
    $KEY21=$_POST["search_key"];
    $KEY31=$_POST["year"];
    $KEY32=$_POST["month"];
    $KEY33=$DAY;
    $GYOU = 0;
    ?>

    <font size="3" color="#000000"><b>[指定内容]</b></font><br>
    <font size="3" color="#000000">名前　　　：</font>
    <font size="4" color="#ff0000"><?=$search_key?></font><br>
    <font size="3" color="#000000">作業内容　：</font>
    <font size="4" color="#ff0000"><?=$work?></font><br>   
    <font size="3" color="#000000">指定年月日：</font>
    <font size="4" color="#ff0000"><?=$_POST["year"]?>年<?=$_POST["month"]?>月<?=$_POST["day"]?>日</font><br>

    
    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key31" value="<?=$KEY31?>">
        <input type="hidden" name="key32" value="<?=$KEY32?>">
        <input type="hidden" name="key33" value="<?=$KEY33?>">
        <input type="submit" value="CSVファイルを保存">
    </form>
    
    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>
    <?php
    for($mm=1;$mm<13;$mm++){                //ループで、1月～12月のテーブルを全て取得
        $tabname="b_".$_POST["year"]."_".$mm;   //テーブル名を作成
        $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
        $search_key=$_POST["search_key"];
        //クエリ実行
        try{
            $stmh=$pdo->query($tabsel);
            $stmh->execute();
        }catch(PDOException $Exception){
            print "エラー:"."データテーブルが見つかりません。<br>";
        }
 
        $rs = $stmh->fetchall ();
        foreach ( $rs as $row ) {
            if($work == ""){
                if($row['member']==$search_key){
                    $GYOU += 1;
                    Harvest_color($row);
    ?> 
    
    <?php
                }else{
                    if(($row['member']==$search_key) && ($row['work']==$work)){
                        $GYOU += 1;
                        Harvest_color($row);
                    ?>
                        
                    <?php
                    }
                }
            }
        }//foreachの括弧
    
    }
    if($GYOU == 0){
        print "検索結果がありません。";
    }
/*■■■■■■■■■■■■■■■■■■■
(4)年、月、日
パターン番号＝21
■■■■■■■■■■■■■■■■■■■■■*/
}elseif($_POST["search_key"]=="" && $_POST["year"]!="" && $_POST["month"]!="" && $DAY!=""){
    $KEY1="21";
    $KEY21=$_POST["search_key"];
    $KEY31=$_POST["year"];
    $KEY32=$_POST["month"];
    $KEY33=$DAY;

    $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
    $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
    $search_key=$_POST["search_key"];
    //クエリ実行
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";
    }
    ?>

    <font size="3" color="#000000"><b>[指定内容]</b></font><br>
    <font size="3" color="#000000">名前　　　：</font>
    <font size="4" color="#ff0000"><?=$search_key?></font><br>
    <font size="3" color="#000000">作業内容　：</font>
    <font size="4" color="#ff0000"><?=$work?></font><br>   
    <font size="3" color="#000000">指定年月日：</font>
    <font size="4" color="#ff0000"><?=$_POST["year"]?>年<?=$_POST["month"]?>月<?=$_POST["day"]?>日</font><br>
    
    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key31" value="<?=$KEY31?>">
        <input type="hidden" name="key32" value="<?=$KEY32?>">
        <input type="hidden" name="key33" value="<?=$KEY33?>">
        <input type="submit" value="CSVファイルを保存">
    </form>
    
    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

    <?php
    $rs = $stmh->fetchall ();
    foreach ( $rs as $row ) {
        if($work == ""){
            if($row['dd']==$DAY){
                Harvest_color($row);
    ?> 
                
    <?php
            }
        }else{
            if(($row['dd']==$DAY) && ($row['work']==$work)){
                Harvest_color($row);
            ?>
                
            <?php
            }
        }
    }//foreachの括弧
    if(count($rs) == 0){
        print "検索結果がありません。";
    }

/*■■■■■■■■■■■■■■■■■■■
(5)年、月
パターン番号＝22
■■■■■■■■■■■■■■■■■■■■■*/
}elseif($_POST["search_key"]=="" && $_POST["year"]!="" && $_POST["month"]!="" && $DAY==""){
    $KEY1="22";
    $KEY21=$_POST["search_key"];
    $KEY31=$_POST["year"];
    $KEY32=$_POST["month"];
    $KEY33=$DAY;

    $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
    $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
    $search_key=$_POST["search_key"];
    //クエリ実行
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";
    }
    ?>

    <font size="3" color="#000000"><b>[指定内容]</b></font><br>
    <font size="3" color="#000000">名前　　　：</font>
    <font size="4" color="#ff0000"><?=$search_key?></font><br>
    <font size="3" color="#000000">作業内容　：</font>
    <font size="4" color="#ff0000"><?=$work?></font><br>   
    <font size="3" color="#000000">指定年月日：</font>
    <font size="4" color="#ff0000"><?=$_POST["year"]?>年<?=$_POST["month"]?>月<?=$_POST["day"]?>日</font><br>
    
    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key31" value="<?=$KEY31?>">
        <input type="hidden" name="key32" value="<?=$KEY32?>">
        <input type="hidden" name="key33" value="<?=$KEY33?>">
        <input type="submit" value="CSVファイルを保存">
    </form>
    
    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

    <?php
    $rs = $stmh->fetchall ();
    foreach ( $rs as $row ) {
        if($work == ""){
             Harvest_color($row);
    ?> 
                
    <?php
        }else{
            if($row['work']==$work){
                Harvest_color($row);
            ?>
                
            <?php
            }
        }
    }//foreachの括弧
    if(count($rs) == 0){
        print "検索結果がありません。";
    }
/*■■■■■■■■■■■■■■■■■■■
(6)年
パターン番号＝23
■■■■■■■■■■■■■■■■■■■■■*/
}elseif($_POST["search_key"]=="" && $_POST["year"]!="" && $_POST["month"]=="" && $DAY==""){
    $KEY1="23";
    $KEY21=$_POST["search_key"];
    $KEY31=$_POST["year"];
    $KEY32=$_POST["month"];
    $KEY33=$DAY;
    $GYOU = 0;
    ?>

    <font size="3" color="#000000"><b>[指定内容]</b></font><br>
    <font size="3" color="#000000">名前　　　：</font>
    <font size="4" color="#ff0000"><?=$search_key?></font><br>
    <font size="3" color="#000000">作業内容　：</font>
    <font size="4" color="#ff0000"><?=$work?></font><br>   
    <font size="3" color="#000000">指定年月日：</font>
    <font size="4" color="#ff0000"><?=$_POST["year"]?>年<?=$_POST["month"]?>月<?=$_POST["day"]?>日</font><br>
    
    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key31" value="<?=$KEY31?>">
        <input type="hidden" name="key32" value="<?=$KEY32?>">
        <input type="hidden" name="key33" value="<?=$KEY33?>">
        <input type="submit" value="CSVファイルを保存">
    </form>
    
    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>
    <?php
    for($mm=1;$mm<13;$mm++){                //ループで、1月～12月のテーブルを全て取得
        $tabname="b_".$_POST["year"]."_".$mm;   //テーブル名を作成
        $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
        $search_key=$_POST["search_key"];
        //クエリ実行
        try{
            $stmh=$pdo->query($tabsel);
            $stmh->execute();
        }catch(PDOException $Exception){
            print "エラー:"."データテーブルが見つかりません。<br>";
        }
 
        $rs = $stmh->fetchall ();
        foreach ( $rs as $row ) {
            $GYOU += 1;
            if($work == ""){
                Harvest_color($row);
    ?> 
                    
    <?php
            }else{
                if($row['work']==$work){
                    Harvest_color($row);
                ?>
                    
                <?php
                }
            }
        }//foreachの括弧
    
    }

    if($GYOU == 0){
        print "検索結果がありません。";
    }
/*■■■■■■■■■■■■■■■■■■■
(7)名前(無効)
パターン番号＝
■■■■■■■■■■■■■■■■■■■■■*/
}elseif($_POST["search_key"]!="" && $_POST["year"]=="" && $_POST["month"]=="" && $DAY==""){
    print("年を指定してください。<br>")
    ?>
<!--    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>-->
    <?php
    /*for($mm=1;$mm<13;$mm++){   
        $YEA=2019;             //ループで、1月～12月のテーブルを全て取得
        $tabname="b_".$YEA."_".$mm;   //テーブル名を作成
        $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
        $search_key=$_POST["search_key"];
        //クエリ実行
        try{
            $stmh=$pdo->query($tabsel);
            $stmh->execute();
        }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";
        }
 
        $rs = $stmh->fetchall ();
        foreach ( $rs as $row ) {
            if($row['member']==$search_key){
    ?> 
        <tr>
        <td align="center"><?=htmlspecialchars($row['member'])?></td>
        <td align="center"><?=htmlspecialchars($row['work_time'])?></td>
        <td align="center"><?=htmlspecialchars($row['work'])?></td>
        <?php
        if($row['eff']>80 && $row['work']=="収穫"){?>
            <td align="center" bgcolor="#7cfc00"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }elseif($row['eff']>50 && $row['work']=="収穫"){
        ?>
            <td align="center" bgcolor="#00bfff"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }elseif($row['eff']>30 && $row['work']=="収穫"){
        ?>
            <td align="center" bgcolor="#ffd700"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }elseif($row['eff']<30 && $row['work']=="収穫" && $row['eff']!=""){
        ?>
            <td align="center" bgcolor="#ff4500"><b><?=htmlspecialchars($row['eff'])?></b></td>
        <?php
        }else{
        ?>
            <td align="center"><?=htmlspecialchars($row['eff'])?></td>
        <?php
        }
        ?>
        <td align="center"><?=htmlspecialchars($row['bx'])?></td>
        <td align="center"><?=htmlspecialchars($row['rane'])?></td>
        <td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
        <td align="center"><?=htmlspecialchars($row['dt'])?></td>
        </tr>
          
    <?php
            
            }
    
        }//foreachの括弧
    }*/
/*■■■■■■■■■■■■■■■■■■■
(8)全て空(今月の記録)
パターン番号＝4
■■■■■■■■■■■■■■■■■■■■■*/
}elseif($_POST["search_key"]=="" && $_POST["year"]=="" && $_POST["month"]=="" && $DAY==""){
    $KEY1="4";
    $KEY21=$_POST["search_key"];
    $KEY31=$_POST["year"];
    $KEY32=$_POST["month"];
    $KEY33=$DAY;
    $T=time();
    $Y=date('Y',$T);
    $M=date('n',$T);
    $tabname="b_".$Y."_".$M;//テーブル名作成
    $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
    $search_key=$_POST["search_key"];
    //クエリ実行
    try{
    $stmh=$pdo->query($tabsel);
    $stmh->execute();
    }catch(PDOException $Exception){
        print "エラー:"."データテーブルが見つかりません。<br>";       
    }
    ?>
    <font size="3" color="#000000"><b>[指定内容]</b></font><br>
    <font size="4" color="#ff0000">なし</font><br><br>
    <font size="4" color="#ff0000">今月の記録</font><br>
    
    <form name="formcsv" method="post" action="記録CSV処理.php">
        <input type="hidden" name="key1" value="<?=$KEY1?>">
        <input type="hidden" name="key21" value="<?=$KEY21?>">
        <input type="hidden" name="key31" value="<?=$Y?>">
        <input type="hidden" name="key32" value="<?=$M?>">
        <input type="hidden" name="key33" value="<?=$KEY33?>">
        <input type="submit" value="CSVファイルを保存">
    </form>
    
    <table width="1300" border="1" cellspacing="2" cellpadding="18">
    <tbody>
    <tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>

    <?php
    $rs = $stmh->fetchall ();
    foreach ( $rs as $row ) {
        Harvest_color($row);
    ?>         
    
    <?php
        
    }//foreachの括弧
    if(count($rs) == 0){
        print "検索結果がありません。";
    }
/*■■■■■■■■■■■■■■■■■■■
(9)作業内容のみ指定
パターン番号--
■■■■■■■■■■■■■■■■■■■■■
}elseif(($work!="" && $_POST["search_key"]=="" && $_POST["year"]=="" && $_POST["month"]=="" && $DAY=="")
        || ($work!="" && $_POST["search_key"]=="" && $_POST["year"]=="" && $_POST["month"]=="")
        || ($work!="" && $_POST["search_key"]=="" && $_POST["year"]=="")
        || ($work!="" && $_POST["search_key"]=="" )
        || ($work!="" && $_POST["search_key"]=="" && $_POST["year"]=="" && $DAY=="")
        || ($work!="" && $_POST["search_key"]=="" && $_POST["month"]=="" && $DAY=="")
        || ($work!="" && $_POST["year"]=="" && $_POST["month"]=="" && $DAY=="")
        || ($work!="" && $_POST["year"]=="" && $_POST["month"]=="")
        || ($work!="" && $_POST["year"]=="")
        || ($work!="" && $_POST["year"]=="" && $DAY=="")
        || ($work!="" && $_POST["month"]=="" && $DAY=="")){
print "年月または名前を指定してください。<br>";*/

}
}else{
    print "パスワードが間違っているか、入力されていません。<br>";
?>
    <a href="ログイン画面_作業記録.html">ログインページへ。</a><br>
<?php
}
?>

</body>
</html>
<?php
session_start();
?>
<html>
<head>
<!-- Bootstrap CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title>作業記録管理ページ</title>
<meta charset=utf-8>
</head>
<body>

<?php
$_SESSION["pass"] = htmlspecialchars($_POST["pass"]);
$pass = "Nstyle";
if(isset($_SESSION["pass"]) && $_SESSION["pass"]==$pass){
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search_key']) OR isset($_POST['work']) OR isset($_POST['year']) OR isset($_POST['month']) OR isset($_POST['day'])) {
        $set_name = $_POST['search_key'];
        $set_work = $_POST['work'];
        $set_year = $_POST['year'];
        $set_month = $_POST['month'];
        $set_day = $_POST['day'];
    }
    if ($_POST['search_key'] == '' && $_POST['work'] == '' && $_POST['year'] == '' && $_POST['month'] == '' && $_POST['day'] == ''){
        $set_name = '';
        $set_work = '';
        $set_year = date('Y');
        $set_month = date('n');
        $set_day = '';
    }
} 
else {
    $set_name = '';
    $set_work = '';
    $set_year = date('Y');
    $set_month = date('n');
    $set_day = '';
}
?>

<hr size="9" noshade>
<h1>#作業記録管理ページ</h1>
<hr size="4" noshade>
<a href="index.php">ホームページへ</a><br>
<a href="グラフ表示ページ.php">グラフ表示</a><br>
<!-- <form name="form1" method="post" action="作業記録.php"> -->


<form class="form-horizontal" name="form1" method="post" action="作業記録.php">
    <div class="row mb-3">
        <label for="inputname" class="col-sm-1 col-form-label">名前</label>
        <div class="col-sm-3">
            <input class="form-control"　type="text" name="search_key" value="<?php echo $set_name; ?>">
        </div> 
    </div>   
    <div class="row mb-3">
        <label for="inputsagyo" class="col-sm-1 control-label">作業内容</label>
        <div class="col-sm-3">
            <select class="form-select"　name="work">
                <option value="<?php echo $set_work; ?>" selected><?php echo $set_work; ?></option>
                <option value="">指定なし</option>
                <option value="収穫">収穫</option>
                <option value="芽かき">芽かき</option>
                <option value="追い巻き">追い巻き</option>
        </div> 
        </select>
    </div>
    <div class="row">
        <div class="col-sm-1">日付</label>
        <div class="col-sm-3">
            <select class="form-select"　name="year">
                <option value="<?php echo $set_year; ?>" selected><?php echo $set_year; ?></option>
                <option value="">指定なし</option>
                <?php
                    for($i=2021;$i<=2035;$i++){
                        echo"<option value='{$i}'>{$i}</option>";
                    }
                ?>
            </select>
        </dev>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">年</label>
        <!-- <div class="col-sm-1">年</label> -->
        <div class="col-sm-1">
            <select class="form-select"　name="month">
                <option value="<?php echo $set_month; ?>" selected><?php echo $set_month; ?></option>
                <option value="">指定なし</option>
                <?php
                    for($i=1;$i<=12;$i++){
                        echo"<option value='{$i}'>{$i}</option>";
                    }
                ?>
            </select>
        </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">月</label>
        <!-- <div class="col-sm-1">月</label> -->
        <div class="col-sm-1">
            <select class="form-select"　name="day">
                <option value="<?php echo $set_day; ?>" selected><?php echo $set_day; ?></option>
                <option value="">指定なし</option>
                <?php
                    for($i=1;$i<=31;$i++){
                        echo"<option value='{$i}'>{$i}</option>";
                    }
                ?>
            </select>
        </dev>    
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">日</label>
        <!-- <div class="col-sm-1">日</label> -->
    </div>
    <div class="row mb-3">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="pass" value="<?=$_SESSION["pass"]?>">
            <input type="submit" value="検索">
        </div>
    </div>
</form>



        <!-- <font size="4" color="#000000">名前で検索:</font><br>
        <input type="text" name="search_key" value="<?php echo $set_name; ?>"><br> 
        
        <font size="4" color="#000000">作業内容を指定:</font><br>
        <select name="work">
           <option value="<?php echo $set_work; ?>" selected><?php echo $set_work; ?></option>
            <option value="">指定なし</option>
            <option value="収穫">収穫</option>
            <option value="芽かき">芽かき</option>
            <option value="追い巻き">追い巻き</option>
        </select>
        <br>      

        <font size="4" color="#000000">日付で検索:</font><br>
        <select name="year">
            <option value="<?php echo $set_year; ?>" selected><?php echo $set_year; ?></option>
            <option value="">指定なし</option>
            <?php
                for($i=2021;$i<=2035;$i++){
                    echo"<option value='{$i}'>{$i}</option>";
                }
            ?>
        </select>
        年
        <select name="month">
            <option value="<?php echo $set_month; ?>" selected><?php echo $set_month; ?></option>
            <option value="">指定なし</option>
            <?php
                for($i=1;$i<=12;$i++){
                    echo"<option value='{$i}'>{$i}</option>";
                }
            ?>
        </select>
        月
        <select name="day">
            <option value="<?php echo $set_day; ?>" selected><?php echo $set_day; ?></option>
            <option value="">指定なし</option>
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
</form> -->

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
function csv_tablename($KEY1_ , $KEY21_ , $KEY31_ , $KEY32_ , $KEY33_){
    echo '<form name="formcsv" method="post" action="記録CSV処理.php">';
        echo "<input type='hidden' name='key1' value={$KEY1_}>";
        echo "<input type='hidden' name='key21' value={$KEY21_}>";
        echo "<input type='hidden' name='key31' value={$KEY31_}>";
        echo "<input type='hidden' name='key32' value={$KEY32_}>";
        echo "<input type='hidden' name='key33' value={$KEY33_}>";
        echo "<input type='submit' value='CSVファイルを保存'>";
    echo '</form>';

    echo '<table width="1300" border="1" cellspacing="2" cellpadding="18">';
    echo '<tbody>';
    echo '<tr><th>名前</th><th>作業時間[分]</th><th>作業内容</th><th>作業効率[%]</th><th>収穫ケース個数</th><th>レーン</th><th>年月日</th><th>時刻</th></tr>';

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
    
    <?php
    csv_tablename($KEY1 , $KEY21 , $KEY31 , $KEY32 , $KEY33);
    ?>
    
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

    <?php
    csv_tablename($KEY1 , $KEY21 , $KEY31 , $KEY32 , $KEY33);
    ?>

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
    
    <?php
    csv_tablename($KEY1 , $KEY21 , $KEY31 , $KEY32 , $KEY33);
    ?>

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
    
    <?php
    csv_tablename($KEY1 , $KEY21 , $KEY31 , $KEY32 , $KEY33);
    ?>

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

    <?php
    csv_tablename($KEY1 , $KEY21 , $KEY31 , $KEY32 , $KEY33);
    ?>

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
    
    <?php
    csv_tablename($KEY1 , $KEY21 , $KEY31 , $KEY32 , $KEY33);
    ?>

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

<?php
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
    
    <?php
    csv_tablename($KEY1 , $KEY21 , $Y , $M , $KEY33);
    ?>

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

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
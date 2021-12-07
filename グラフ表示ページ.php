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
$pass = "Nstyle";
if(isset($_SESSION["pass"]) && $_SESSION["pass"]==$pass){
?>

<hr size="10" noshade>
<h1>#作業記録ページ</h1>
<hr size="10" noshade>
<a href="index.php">ホームページへ</a><br>
<a href="" onclick="document.sagyou.submit();return false;">戻る</a><br><br>
<form method="post" name="sagyou" action="作業記録.php">
  <input type="hidden" name="pass" value=<?=$_SESSION["pass"]?>>
</form>

<form name="form1" method="post" action="グラフ表示ページ.php">
       
        <font size="4" color="#000000">日付で検索:</font><br>
        <select name="year">
        <option value="" selected>----年を選択してください----</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
        </select>
        年
        <select name="month">
        <option value="" selected>----月を選択してください----</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        月
        <select name="day">
        <option value="" selected>----日を選択してください----</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>  
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
        日     
        <br>
        <input type="submit" value="検索">
</form>

<?php
$DAY = (string) $_POST["day"];
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




/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //sample_memberからラベル用に取得
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
try{
  $stmh=$pdo->query("SELECT * FROM sample_member");
  $stmh->execute();
}catch(PDOException $Exception){
  print "エラー:"."データテーブルが見つかりません。<br>";
}
$sample_member = $stmh->fetchall ();
foreach ( $sample_member as $member_b ) {
  if($member_b["work"] == "収穫"){
    $member[] = $member_b["last_name"];
  }  
}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/




/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //検索条件に応じて、グラフの値を取得する
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
$Y=$_POST["year"];
$M=$_POST["month"];
if($Y!="" && $M!="" && $DAY==""){//年月のみ指定
  $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
  $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
  try{
  $stmh=$pdo->query($tabsel);
  $stmh->execute();
  }catch(PDOException $Exception){
      print "エラー:"."データテーブルが見つかりません。<br>";
  }
  $data = $stmh->fetchall ();
  for($a=0;$a<count($member);$a++){
    $sum_time=0;//合計時間の初期化
    $sum_eff=0;//効率の合計初期化
    $count_eff=0;//効率の平均を求めるときに使う値
    foreach ( $data as $wtime ) {
      if($wtime["member"]==$member[$a]){      //$member[]の名前と一致したら
        $fl_time=(float)$wtime["work_time"];  //float型に変換
        $sum_time+=$fl_time;                  //作業時間を足していく
        if(($wtime["work"]=="収穫") && ($wtime["eff"]!="")){
          $fl_eff=(float)$wtime["eff"];         //float型に変換
          $sum_eff=+$fl_eff;                   //作業効率値を足していく
          $count_eff+=1;
        }
      }      
    }
    $sum_worktime[$a]=$sum_time;              //作業時間の合計を配列に保存
    if($count_eff>1){                         //効率の平均値を配列に保存
      $ave_eff[$a]=($sum_eff/$count_eff);       
    }else{
      $ave_eff[$a]=0;
    }
  }  
}elseif($Y!="" && $M!="" && $DAY!=""){  //年月日指定
  $tabname="b_".$_POST["year"]."_".$_POST["month"];//テーブル名作成
  $tabsel="SELECT * FROM ".$tabname;//セレクト文作成
  try{
  $stmh=$pdo->query($tabsel);
  $stmh->execute();
  }catch(PDOException $Exception){
      print "エラー:"."データテーブルが見つかりません。<br>";
  }
  $data = $stmh->fetchall ();
  for($a=0;$a<count($member);$a++){
    $sum_time=0;//合計時間の初期化
    $sum_eff=0;//効率の合計初期化
    $count_eff=0;//効率の平均を求めるときに使う値
    foreach ( $data as $wtime ) {
      if(($wtime["member"]==$member[$a]) && ($wtime["dd"]==$DAY)){      //$member[]の名前と一致かつ$DAYの日付と一致したら
        $fl_time=(float)$wtime["work_time"];  //float型に変換
        $sum_time+=$fl_time;                  //作業時間を足していく
        if(($wtime["work"]=="収穫") && ($wtime["eff"]!="")){
          $fl_eff=(float)$wtime["eff"];         //float型に変換
          $sum_eff+=$fl_eff;                   //作業効率値を足していく
          $count_eff+=1;
        }
      }      
    }
    $sum_worktime[$a]=$sum_time;              //作業時間の合計を配列に保存
    if($count_eff>0){                         //効率の平均値を配列に保存
      $ave_eff[$a]=($sum_eff/$count_eff);       
    }else{
      $ave_eff[$a]=0;
    }
  }  
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<h2 color="#ffa500">作業時間の合計</h2>
<font size="4" color="#ff0000"><?=$Y?>年 <?=$M?>月 <?=$DAY?>日</font><br>
<canvas id="作業時間合計" width="20" height="5"></canvas><br><br>
<br><br><br><br><br><br><br>

<h2 color="#ffa500">平均作業効率</h2>
<font size="4" color="#ff0000"><?=$Y?>年 <?=$M?>月 <?=$DAY?>日</font><br>
<canvas id="平均作業効率" width="20" height="5"></canvas><br><br>

<script type="text/javascript">
var member = <?php echo json_encode($member); ?>;
var sum_worktime = <?php echo json_encode($sum_worktime); ?>;
var ave_eff = <?php echo json_encode($ave_eff); ?>;
var work_time = document.getElementById('作業時間合計').getContext('2d');
var myChart1 = new Chart(work_time, {
  type: 'bar',
  data: {
    labels: member,
    datasets: [{
      label: '作業時間合計',
      data: sum_worktime,
      backgroundColor: "rgba(20,255,0,0.9)"    
    }]
  }   
});
var work_time2 = document.getElementById('平均作業効率').getContext('2d');
var myChart2 = new Chart(work_time2, {
  type: 'bar',
  data: {
    labels: member,
    datasets: [{
      label: '平均作業効率',
      data: ave_eff,
      backgroundColor: "rgba(20,255,0,0.9)"
    }]
  }
});
</script>
<?php
}else{
  print "パスワードが間違っているか、入力されていません。<br>";
?>
  <a href="ログイン画面(作業記録).html">ログインページへ。</a><br>
<?php
}
?>  


</body>
</html>
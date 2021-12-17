<?php
session_start();
?>
<html>

<head>
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="./assets/css/custom.css" rel="stylesheet">

    <title>ホームページ</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="tes1.css">
</head>

<body bgcolor="#e0ffff" text="#000000">

    <?php
    $pass = "Nstyle";
    /*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //DB接続処理
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
    $dbhost = "ec2-52-205-61-60.compute-1.amazonaws.com";
    $dbname = "dcg3sava0u5ic6";
    $dbuser = "tlvwasltznluaj";
    $dbpass = "828dff754cd6db621b4756042f5c3b47623ca41fcf8cf4e817fa7efffef3a21c";
    $dbtype = "pgsql";
    $dsn = "$dbtype:dbname=$dbname host=$dbhost port=5432";
    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('エラー:' . $Exception->getMessage());
    }
    /*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
    ?>

    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ホーム画面</a>
        </div>
    </nav>
    <!-- <hr size="9" noshade>
    <h1>#ホーム画面</h1>
    <hr size="4" noshade>
    <br> -->
    <!-- <font> -->
    <?php
    if ((isset($_SESSION["pass"])) && ($_SESSION["pass"] == $pass)) {
    ?>

        <br>
        <hr size="4" noshade>
        <h3>管理ページリンク</h3>
        <hr size="4" noshade>

        <div class="container-fluid">
            <a href="" class="link-dark" onclick="document.sagyou.submit();return false;">
                <font size="5">作業記録管理ページ</font>
            </a><br><br>
            <a href="" class="link-dark" onclick="document.card.submit();return false;">
                <font size="5">カード管理ページ</font>
            </a>
            <form method="post" name="sagyou" action="作業記録.php">
                <input type="hidden" name="pass" value=<?= $_SESSION["pass"] ?>>
            </form>
            <form method="post" name="card" action="カード管理.php">
                <input type="hidden" name="pass" value=<?= $_SESSION["pass"] ?>>
            </form>
        </div>

    <?php
    } else {
    ?>
        <br>
        <hr size="4" noshade>
        <h3>管理ページリンク</h3>
        <hr size="4" noshade>

        <div class="container-fluid">
            <a href="ログイン画面_作業記録.html" class="link-dark">
                <font size="5">作業記録管理ページ</font>
            </a><br><br>
            <a href="ログイン画面_カード管理.html" class="link-dark">
                <font size="5">カード管理ページ</font>
            </a>
        </div>
    <?php
    }
    ?>

    <br><br>
    <hr size="4" noshade>
    <div class="col-auto">
        <div class="m-0 bd-highlight d-inline-block">.</div>
    </div>

    <div class="col-auto">
        <h3>作業の状況</h3>
    </div>
    <hr size="4" noshade>

    <?php
    try {
        $stmh = $pdo->query("SELECT * FROM sample_member");
        $stmh->execute();
    } catch (PDOException $Exception) {
        print "エラー:" . $Exception->getMessage();
    }

    $rs = $stmh->fetchall();
    $count = 0;
    foreach ($rs as $row) {
        if ($row['rane'] != "0") {
    ?>
            <h3><?= $row['last_name'] ?>:　<font color="#ff0000"><?= $row['rane'] ?></font>レーン [<?= $row['work'] ?>]</h3>
    <?php
            $count += 1;
        }
    }
    ?>
    <h4>作業中の人数：<?= $count ?>人</h4>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
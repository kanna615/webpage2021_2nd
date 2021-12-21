<?php
session_start();
?>
<html>

<head>
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="./assets/css/custom.css" rel="stylesheet">

    <title>カード登録情報編集</title>
    <meta charset="utf-8">
</head>

<body>

    <?php
    $pass = "Nstyle";
    if (isset($_SESSION["pass"]) && $_SESSION["pass"] == $pass) {
    ?>

        <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">カード管理ページ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="index.php">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="作業記録.php">作業管理</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <hr size="9" noshade>
        <h1>#データ更新ページ</h1>
        <hr size="4" noshade> -->
        <a href="" onclick="document.card.submit();return false;">戻る</a>
        <form method="post" name="card" action="カード管理.php">
            <input type="hidden" name="pass" value=<?= $_SESSION["pass"] ?>>
        </form>
        <br>

        <?php
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
            //print"接続しました<br>";
        } catch (PDOException $Exception) {
            die('エラー:' . $Exception->getMessage());
        }
        /*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/

        if (isset($_GET['id'])) {

            $tabsel = "SELECT * FROM sample_member";
            try {
                $stmh = $pdo->query($tabsel);
                $stmh->execute();
            } catch (PDOException $Exception) {
                print "エラー:" . $Exception->getMessage();
            }


            $rs = $stmh->fetchall();
            foreach ($rs as $row) {
                if ($row['card_id'] == $_GET['id']) {
        ?>

                    <div class="row justify-content-md-center">
                        <div class="col-10 mx-5 my-3">
                            <div class="card">
                                <div class="card-header">
                                    作業記録書き換えフォーム
                                </div>
                                <div class="card-body">
                                    <font size="3" color="#000000">カードID：</font>
                                    <font size="4" color="#ff0000"><?= htmlspecialchars($row['card_id']) ?></font>
                                    <br>
                                    <form name="form3" method="post" action="uptab.php">
                                        姓　　　： <input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>"><br>
                                        名　　　： <input type="text" name="first_name" value="<?= htmlspecialchars($row['first_name']) ?>"><br>
                                        作業内容： <input type="text" name="work" value="<?= htmlspecialchars($row['work']) ?>"><br>
                                        <input type="hidden" name="card_id" value="<?= $row['card_id'] ?>">
                                        <input type="hidden" name="action" value="update">
                                        <div class="row mt-3">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" value="更新">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-muted">
                                    <!-- <div class="row mt-3"> -->
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <input class="bg-info" type="submit" value="更新">
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-10 mx-5 my-3">
                                <span class="border-top border-2"><input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>"></span>
                                <!-- <div class="d-flex justify-content-start mb-2">
                                <div class="p-2 bd-highlight">Flex item</div>
                                <input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>">
                            </div> -->
                                <span class="border-top"></span>
                                <span class="border-top"></span>
                                <span class="border-top"></span>
                                <span class="border-top"></span>
                            </div>
                        </div>

                <?php
                }
            } //foreachの括弧

                ?>



        <?php
        }
    }
        ?>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
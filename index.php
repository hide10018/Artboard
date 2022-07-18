<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/canvas.css" rel = "stylesheet" type = "text/css">
    <title>Document</title>
</head>
<body>
    <h1>Artboard</h1>
    <!-- <a href="user_regist.php">新規登録はこちら</a>
    <br>
    <a href="login.php">ログインはこちら</a>
    <br> -->
    <?php 
    session_start();
    if(isset($_SESSION['login'])) {
        echo "<a href='canvas.php'>ようこそ ".$_SESSION['login']."さん</a>";
        echo "<br>";
        echo "<a href='logout.php'>ログアウトはこちら</a>";
    }else{
        echo "<a href='user_regist.php'>新規登録はこちら</a>";
        echo "<br>";
        echo "<a href='login.php'>ログインはこちら</a>";
        echo "<br>";
    }
    ?>
    <p>シンプルなイラスト描画サービス</p>
</body>
</html>
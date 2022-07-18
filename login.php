<!DOCTYPE html> <!--html5で書かれていることを宣言-->
<html lang="ja"> <!--言語指定-->
<!---->

    <head>
        <meta charset="utf-8">
        <title>Artboard Login</title>
        <link href="./css/canvas.css" rel = "stylesheet" type = "text/css">
    </head>

    <body>
        <h1>ログインページ</h1>
        <form action = "login.php" method = "POST">
                <p>            
                    ユーザーネーム：<input type = "text" name = "username"><br>
                    パスワード：<input type = "text" name = "password"><br>
                    <input type = "submit" value = "送信する">
                </p>
        </form>

        <?php
            session_start();
            require_once('db_connect.php');
            
            if((isset($_POST['username']) && $_POST['username'] !=="") || (isset($_POST['password']) && $_POST['password'] !=="")){
                // var_dump($_POST);
                try{
                    $sql=$db->prepare('SELECT * FROM users WHERE username=?');
                    $sql->bindParam(1,$_POST["username"],PDO::PARAM_STR);
                    $sql->execute();
                    $result=$sql->fetch(PDO::FETCH_ASSOC);
                }
                catch(PDOException $e){
                    echo("エラー");
                }
                if($result === false || !password_verify($_POST["password"], $result['password'])){
                    $preview="ユーザー名またはパスワードが間違っています";
                }else{
                    $_SESSION["login"] = $_POST['username'];
                    echo  "<a href='canvas.php'>サービスへ移動</a>";
                    $preview="";
                }
            }else{
                $preview="ユーザー名またはパスワードが入力されていません";
            }

                // echo '<br>';
                // var_dump($result);
                // echo '<br>';
                // echo $_POST['password'];
                // echo '<br>';
                // echo $result['password'];
                // echo '<br>';
                echo $preview;
                // echo '<br>';
                // var_dump($_POST['username']);
                // echo '<br>';
                // var_dump($_SESSION);
        ?>
    </body>
</html>
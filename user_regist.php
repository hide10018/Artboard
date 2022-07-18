<!DOCTYPE html> <!--html5で書かれていることを宣言-->
<html lang="ja"> <!--言語指定-->
<!---->

    <head>
        <meta charset="utf-8">
        <title>Web開発第4回目</title>
        <link href="css/index.css" rel = "stylesheet" type = "text/css">
    </head>

    <body>
    <h1>新規登録ページ</h1>
    <form action = "user_regist.php" method = "POST">
        <p>            
            ユーザーネーム：<input type = "text" name = "username"><br>
            パスワード：<input type = "text" name = "password"><br>
            <input type = "submit" value = "送信する">
        </p>
    </form>
        <?php
            require_once('db_connect.php');


            if(!empty($_POST)){
                if($_POST['username'] === ""){
                    $error = "ユーザーネームが入力されていません";
                    echo $error;
                }

                if($_POST['password'] === ""){
                    $error = "パスワードが入力されていません";
                    echo $error;
                }

                if(!isset($error)){
                    $member = $db->prepare('SELECT COUNT(*) as cnt FROM users WHERE username=?');
                    $member->execute(array(
                        $_POST['username']
                    ));
                    $record = $member->fetch();
                    if ($record['cnt'] > 0) {
                        $error= 'このユーザー名は登録済みです';
                        echo $error;
                    }else{
                        $sql = $db->prepare("INSERT INTO users(username,password) VALUES(:new_username, :new_password)");
                        $sql->bindValue(':new_username',$_POST['username']);
                        $sql->bindValue(':new_password', password_hash($_POST['password'], PASSWORD_DEFAULT));
                        $sql->execute();

                        echo "ユーザー登録が完了しました";
                        echo "<br>";
                        echo "<a href='login.php'>ログインはこちら</a>";
                    }
                }
            }
        ?>
    </body>
</html>
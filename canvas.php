<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/canvas.css" rel = "stylesheet" type = "text/css">
    <title>Document</title>
</head>
<body>
        <div class="main-wrap">
            <div class="cnavas-wrap">
                <canvas
                    id="draw-area"
                    width="400px"
                    height="400px"
                    style="border: 1px solid #000000;">
                </canvas>

                <div>
                <button id="clear-button">全消し</button>
                </div>

                <script src="draw.js"></script>

                <div>
                    <button id="output-button">画像出力</button>
                </div>

                <img id="link" ></img>

                <form action="canvas.php" method="post">
                    <input type="text" id="img_url" name="txt" readonly>
                    <input type="submit" name="save-button" value="保存"></input>
                </form>
            </div>
            <div class="header-wrap">
            <h1>Artboard</h1>
                <ul>
                    <li><a href="index.php">Top</a></li>
                    <li><a href="logout.php">ログアウト</a></li>
                    <li><a href="user.php">ユーザーページ</a></li>
                </ul>
            </div>
        </div>

    <script src="image_trans.js"></script>

    <?php
        require_once('db_connect.php');

        if (isset($_POST['save-button'])){
        session_start();
//         var_dump($_SESSION);
//         var_dump($_POST['txt']);

        if($_POST['txt'] == ""){
            $error = "画像が出力されていません";
            echo $error;
        }
        
        if(!isset($error)){
            $member = $db->prepare('SELECT COUNT(*) as cnt FROM images WHERE image=?');
            $member->execute(array(
                $_POST['txt']
            ));
            $record = $member->fetch();
            if ($record['cnt'] > 0) {
                $error= 'この画像は登録済みです';
                echo $error;
            }else{
                $sql = $db->prepare("INSERT INTO images(username,image) VALUES(:new_username, :new_images)");
                $sql->bindValue(':new_username',$_SESSION['login']);
                $sql->bindValue(':new_images', $_POST['txt']);
                $sql->execute();
                

                echo "保存が完了しました";
                echo "<br>";
                echo "<a href='user.php'>保存した画像はこちら</a>";
            }
        }
        }
    ?>

</body>
</html>

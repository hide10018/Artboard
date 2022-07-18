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
    <header>
        <div>
          <h1>Artboard</h1>
        </div>
        <div>
            <ul>
                <li><a href="index.php">Top</a></li>
                <li><a href="logout.php">ログアウト</a></li>
                <li><a href="canvas.php">キャンバス</a></li>
            </ul>
        </div>
    </header>
    <?php
        session_start();
        require_once('db_connect.php');


        if(isset($_SESSION['login'])){
            $member = $db->prepare('SELECT * FROM images WHERE username= :username');
            $member->bindValue('username',$_SESSION['login']);
            $member->execute();
            
            // 取得したデータを出力
            foreach ($member as $row) {
                // var_dump($row['image']);
                echo "<img src=".$row['image']." alt=''>";
            }
            
            }
    ?>
</body>
</html>
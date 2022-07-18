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
    <?php 
        session_start();
        $_SESSION = array();
        session_destroy(); 
        
    ?>
    <h3>ログアウトしました</h3>
    <a href="index.php">トップページへ</a>
    
</body>
</html>
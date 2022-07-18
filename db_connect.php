<?php 
try{

    $user = 'root';
    $pass = 'root' ;
    $db = new PDO('mysql:dbname=artboard;host=localhost; port=8889; charset=utf8',$user,$pass);
    // echo "db接続".'<br>';

}catch(PDOException $e){
    echo "エラー".$e->getMessage();
} 
?>
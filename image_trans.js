window.onload = function(){
    // const mysql = require('mysql');
    // const connection = mysql.createConnection({
    // host: 'localhost',
    // user: 'root',
    // password: 'root',
    // database: 'artboard'
    // });
    // connection.connect((err) => {
    // if (err) throw err;
    // console.log('Connected!');
    // });

    // var username = JSON.parse("<?php json_encode($_SESSION['login'];) ?>");
    var canvas = document.getElementById('draw-area');
    var Link = document.getElementById('link');
    // console.log(username);

    var button = document.getElementById('output-button');
    button.addEventListener('click', function(){

        Link.src = canvas.toDataURL('image/png');
        var txt = canvas.toDataURL('image/png');
        document.getElementById('img_url').value = txt;
        console.log(Link);

    });

};
<?php
    require_once './db.php';
    extract($_GET);
    $stmt = $db->prepare("select * from userdetails where id = ?");
    $stmt->execute([$id]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($userData);
    $ig = base64_decode($userData['picture']);
    echo $userData['picture'];
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    </body>
    
</html>

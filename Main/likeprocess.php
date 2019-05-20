<?php
require '../db.php';
$id=($_GET['id']);
$postId=($_GET['postId']);
session_start();
try {
    $sql="insert into Likes (postID,userID) values (?,?)";
    $stmt=$db->prepare($sql);
    $stmt->execute([$postId,$id]);
    header("Location: dash.php?id=". $_SESSION['user']['id']);
    exit;
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}





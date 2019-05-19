<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

try{
    $pdo = new PDO("mysql:host=remotemysql.com;dbname=dqBmkgCDYi;charset=utf8mb4", "dqBmkgCDYi", "tXX4UQ2gs8");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt search query execution
try{
    if(isset($_REQUEST["term"])){
        // create prepared statement
        //$curid = $_REQUEST["cid"];
        
        $both=explode(":",$_REQUEST["term"]);
        //alert($_REQUEST["term"]);
        $sql = "SELECT * FROM userdetails WHERE fullname LIKE :term";
        //alert($both[0]);
        $stmt = $pdo->prepare($sql);
        $term =  $both[0]. '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                $iid = $row["id"];
                //isset($cid)?$cid=$userData['id']:$cid="";
                echo "<a href='dashboardnew.php?id=$iid&curid=$both[1]'>" . $row["fullname"]."</a><br>";
            }
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close statement
unset($stmt);
 
// Close connection
unset($pdo);
?>
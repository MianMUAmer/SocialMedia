<?php
  try {
      $db = new PDO("mysql:host=remotemysql.com;dbname=dqBmkgCDYi;charset=utf8mb4", "dqBmkgCDYi", "tXX4UQ2gs8") ;
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
  } catch (Exception $ex) {
    die ("Connection Error : " . $ex->getMessage()) ;
  }
  
 
//Host = remotemysql.com
//Db name = dqBmkgCDYi
//Table : - UserDetails
//Username : dqBmkgCDYi
//Password : tXX4UQ2gs8
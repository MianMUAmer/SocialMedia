<?php
  try {
      $db = new PDO("mysql:host=localhost;dbname=SocialMedia;charset=utf8mb4", "admin", "admin") ;
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
  } catch (Exception $ex) {
    die ("Connection Error : " . $ex->getMessage()) ;
  }
  
  
//Db name = SocialMedia
//Table : - UserDetails
//Username : admin
//Password : admin